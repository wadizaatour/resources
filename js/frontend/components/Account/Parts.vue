<template slot-scope="row">
  <div data-turbolinks="false">
    <b-form-group label-cols-sm="3" class="mt-2 mr-2">
      <b-input-group>
        <b-form-input v-model="filter" placeholder="Vul je zoekterm in">
        </b-form-input>
        <b-input-group-append>
          <button
            :disabled="!filter"
            @click="filter = ''"
            class="blue-light-bg white-text-color btn-size-color ml-2 font-montserrat-regular"
          >
            Zoeken
          </button>
        </b-input-group-append>
      </b-input-group>
    </b-form-group>
    <!-- eslint-disable -->
    <b-table
      striped
      hover
      :items="items"
      :fields="fields"
      :filter="filter"
      selectable
      :select-mode="selectMode"
      selected-variant="success"
      @row-selected="rowSelected"
      :current-page="currentPage"
      :per-page="perPage"
      :outlined="outlined"
      responsive
      autoWidth
      borderless
    >
      <!-- eslint-disable -->
      <template v-slot:cell(id)="row">
        P{{ row.item.id }}
      </template>
      <template v-slot:cell(thumbnail)="row">
        <b-img thumbnail fluid v-bind="mainThumbProps" :src="row.item.thumbnail"></b-img>
      </template>
      <template v-slot:cell(actions)="row">
        <b-button
          :to="'/listing/' + row.item.rk + '/' + row.item.slug"
          pill variant="outline-primary"
          v-if="row.item.state.match($i18n.t('labels.frontend.listings.open'))"
        >
          <i class="fa fa-info-circle" aria-hidden="true"></i>
        </b-button>
        <b-button
          pill variant="outline-primary"
          @click="printQR(row.item)"
        >
          <i class="fa fa-qrcode" aria-hidden="true"></i>
        </b-button>
      </template>
    </b-table>
    <b-row>
      <b-col md="10" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          class="my-0"
        ></b-pagination>
      </b-col>
      <b-col md="2" class="my-1 mb-2">
        <b-form-select v-model="perPage" :options="pageOptions"></b-form-select>
      </b-col>
    </b-row>
  </div>
</template>
<script>
let QRCode = require('qrcode')

export default {
  props: {
    mode: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      selectMode: 'multi',
      selected: [],
      filter: null,
      totalRows: 1,
      currentPage: 1,
      perPage: 100,
      pageOptions: [100, 200, 500],
      outlined: true,
      mainThumbProps: { width: 60, height: 60 },
      fields: [
        {
          key: 'id',
          label: 'Onderdeel ID',
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'make',
          label: this.$i18n.t('labels.frontend.listings.make'),
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'type',
          label: this.$i18n.t('labels.frontend.listings.performance'),
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'year',
          label: this.$i18n.t('labels.frontend.listings.year'),
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'part',
          label: this.$i18n.t('labels.frontend.listings.part'),
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'thumbnail',
          label: this.$i18n.t('labels.frontend.listings.photo'),
          sortable: false,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'time',
          label: this.$i18n.t('labels.frontend.listings.date'),
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'region',
          label: this.$i18n.t('labels.frontend.listings.city'),
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'actions',
          label: this.$i18n.t('labels.frontend.listings.actions'),
          sortable: false,
          thClass: 'background-gray',
          tdClass: 'black-color'
        }
      ],
      items: [],
      durl: this.$app.route('account.api.listings')
    }
  },
  mounted() {
    if (this.mode === 'requests') {
      this.durl = this.$app.route('account.api.listings.requests')
    } else if (this.mode === 'others') {
      this.durl = this.$app.route('account.api.listings.requests.others')
    }

    axios.get(this.durl).then(res => {
      let listings = []
      for (let i in res.data.listings) listings.push(res.data.listings[i])
      this.items = listings.reverse()
      this.totalRows = this.items.length
    })
  },
  methods: {
    rowSelected(items) {
      this.selected = items
    },
    select() {
      this.selected = []
      if (!this.selectAll) {
        for (let i in this.items) {
          this.selected.push(this.items.i.ID)
        }
      }
    },
    fireDelete(id, index) {
      axios
        .delete('/account/listings/' + id)
        .then(response => this.items.splice(index, 1))
    },
    printQR(item) {
      let qrdata =
        this.$app.route('frontend.listing.show', {
          listing: item.rk,
          slug: item.slug
        }) + ' '
      //let txt = item.part + '<br \/>' + item.sku
      let txt = 'P' + item.id + (item.sku !== '' ? ' - ' + item.sku : '')
      txt += '<br \/>' + item.part
      txt += '<br \/>' + item.time.substr(0, item.time.indexOf(' '))
      txt += '<br \/>' + item.co

      const label = window.open(
        '',
        '',
        'left=0,top=0,width=378,height=189,toolbar=0,scrollbars=0,status=0'
      )
      label.document.write(`<!DOCTYPE html>
<html>
  <head>
    <title> </title>
  </head>
  <body style="margin:14px">
    <table style="border:0;width:100%">
      <tr>
        <td style="width:120px"><canvas id="canvas"></canvas></td>
        <td style="font-weight:700">${txt}</td>
      </tr>
    </table>
  </body>
</html>`)

      let canvas = label.document.getElementById('canvas')
      QRCode.toCanvas(canvas, qrdata, {
        margin: 8,
        width: 150
      })

      label.document.close()
      label.focus()
      label.print()
      label.close()
    }
  }
}
</script>
<style module lang="css">
.background-gray {
  background-color: #d8d8d8 !important;
  font-size: 14px;
}
.black-color {
  color: black !important;
  font-size: 13px;
  font-family: Ubuntu;
}
table {
  border-collapse: separate !important;
  border: 0 !important;
}
.table-striped > tbody > tr:nth-child(2n + 1) > td,
.table-striped > tbody > tr:nth-child(2n + 1) > th {
  background-color: whitesmoke;
  border: none;
}
table thead tr th,
table tbody tr td {
  background-color: #ddebf4;
}
table.border {
  border: 0 !important;
}
.btn-size-color {
  padding: 7px;
  font-size: inherit;
}
</style>
