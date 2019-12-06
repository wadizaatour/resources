<template slot-scope="row">
  <div>
    <b-form-group label-cols-sm="3" label="Filter" class="mt-2 mr-2">
      <b-input-group>
        <b-form-input v-model="filter" placeholder="Type to Search">
        </b-form-input>
        <b-input-group-append>
          <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
        </b-input-group-append>
      </b-input-group>
    </b-form-group>
    <b-form-group label-cols-sm="3" label="Per page" class="mb-2">
      <b-form-select v-model="perPage" :options="pageOptions"></b-form-select>
    </b-form-group>
    <input type="checkbox" :value="items.id" v-model="selected" />
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
    >
      <!-- eslint-disable -->
      <template slot="selected" slot-scope="{ rowSelected }">
        <input type="checkbox" :value="items.id" v-model="selected" />
        <span v-if="rowSelected">✔</span>
      </template>
      <template slot="actions" slot-scope="row">
        <b-button
          size="sm"
          @click="info(row.item, row.index, $event.target)"
          class="mr-1"
          id="test2"
        >
          Information
        </b-button>
      </template>
      <template slot="delete" slot-scope="row">
        <b-button
          size="sm"
          @click="fireDelete(row.item, row.index)"
          class="mr-1"
          id="delete"
        >
          <i class="fa fa-trash-o" aria-hidden="true">
          </i>
        </b-button>
      </template>
    </b-table>
    <b-row>
      <b-col md="6" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>
    <b-modal
      :id="infoModal.id"
      :title="infoModal.title"
      ok-only
      @hide="resetInfoModal"
    >
      <b-row>
        <b-col md="6" class="my-1">
          <b-button
            size="sm"
            @click="info(row.item, row.index, $event.target)"
            class="mr-1"
          >
            Volgende aanvraag
          </b-button>
        </b-col>
        <b-col md="6" class="my-1">
          <b-button
            size="sm"
            @click="info(row.item, row.index, $event.target)"
            class="mr-1"
          >
            Vorige aanvraag
          </b-button>
        </b-col>
      </b-row>
      <b-row>
        <b-col>
          <label id="test">Model Foto:</label>
        </b-col>
        <b-col>
          <pre class="font-montserrat-regular">{{ infoModal.content.slice(17,20) }}</pre>
        </b-col>
      </b-row>
    </b-modal>
  </div>
</template>
<script>
export default {
  data() {
    return {
      selectMode: 'multi',
      selected: [],
      filter: null,
      totalRows: 1,
      currentPage: 1,
      perPage: 2,
      pageOptions: [2, 3, 4],
      outlined: true,
      infoModal: {
        id: 'info-modal',
        title: '',
        content: ''
      },
      fields: {
        selected: {
          label: '-',
          sortable: false
        },
        foto: {
          label: 'foto',
          sortable: false
        },
        make: {
          label: 'Merk',
          sortable: true
        },
        model: {
          label: 'Uitvoering',
          sortable: true
        },
        year: {
          label: 'Jaar',
          sortable: true
        },
        categorie: {
          label: 'Categorie',
          sortable: true
        },
        price: {
          label: 'Prijs',
          sortable: true
        },
        condition: {
          label: 'Conditie',
          sortable: true
        },
        stock: {
          label: 'Voorraad',
          sortable: true
        },
        art_nr: {
          label: 'Art. nr.',
          sortable: true
        },
        actions: {
          label: 'Actions'
        },
        delete: {
          label: 'Delete'
        }
      },
      items: []
    }
  },
  mounted() {
    axios.get('/account/api/listings/my').then(res => {
      //to do change the end point to get data informations for parts
      let listings = []
      for (let i in res.data.listings) listings.push(res.data.listings[i])
      this.items = listings
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
    info(item, index, button) {
      this.infoModal.title = `Row index: ${index}`
      this.infoModal.content = JSON.stringify(item, null, 2)
      this.$root.$emit('bv::show::modal', this.infoModal.id, button)
    },
    resetInfoModal() {
      this.infoModal.title = ''
      this.infoModal.content = ''
    },
    fireDelete(id, index) {
      axios.delete('/item/' + id).then(response => this.items.splice(index, 1))
    }
  }
}
</script>
<style>
pre {
  font-family: font-montserrat-regular;
}
#test {
  color: #5b2557;
}
</style>
