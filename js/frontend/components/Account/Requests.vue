<template slot-scope="row">
  <div data-turbolinks="false">
    <b-form-group>
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
        R{{ row.item.id }}
      </template>
      <template v-slot:cell(thumbnail)="row">
        <b-img thumbnail fluid v-bind="mainThumbProps" alt="-" :src="row.item.thumbnail"></b-img>
      </template>
      <template v-slot:cell(actions)="row">
        <b-button
          :to="'/listing/' + row.item.rk + '/' + row.item.slug"
          pill variant="outline-primary"
          v-if="row.item.state.match($i18n.t('labels.frontend.listings.open'))"
        >
          <i class="fa fa-info-circle" aria-hidden="true"></i>
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
          label: 'Nr.',
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
          key: 'subcategory',
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
          key: 'requester',
          label: this.$i18n.t('labels.frontend.listings.requester'),
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'contact',
          label: 'Contact',
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'workInAutoIndustry',
          label: 'Branche',
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'state',
          label: this.$i18n.t('labels.frontend.listings.status'),
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
      for (let item in this.items) {
        let results = this.items[item]
        if (results.contact === ' email') {
          results.contact = 'Email'
        }
        if (results.contact === 'phone') {
          results.contact = 'Telephone'
        }
        if (results.contact === 'phone email') {
          results.contact = 'Email / Telefoon'
        }
        if (results.workInAutoIndustry === 'yes') {
          results.workInAutoIndustry = 'Ja'
        }
        if (results.workInAutoIndustry === 'no') {
          results.workInAutoIndustry = 'Nee'
        }
      }
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
