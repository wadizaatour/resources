export default {
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
      page: this.$i18n.t('labels.frontend.listings.perPage'),
      search: this.$i18n.t('labels.frontend.listings.search'),
      infoModal: {
        id: 'info-modal',
        title: '',
        content: ''
      },
      fields: [
        {
          key: 'id',
          label: 'ID',
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'lpn',
          label: this.$i18n.t('labels.frontend.listings.licensePlate'),
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
          key: 'model',
          label: this.$i18n.t('labels.frontend.listings.model'),
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
          key: 'km',
          label: 'KM',
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'apk',
          label: 'APK',
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'purchase_date',
          label: this.$i18n.t('labels.frontend.listings.purchase'),
          sortable: true,
          thClass: 'background-gray',
          tdClass: 'black-color'
        },
        {
          key: 'Actions',
          label: this.$i18n.t('labels.frontend.listings.actions'),
          sortable: false,
          thClass: 'background-gray',
          tdClass: 'black-color'
        }
      ],
      items: []
    }
  },
  mounted() {
    axios.get(this.$app.route('account.api.cars')).then(res => {
      for (let i in res.data) this.items.push(res.data[i])
      this.totalRows = this.items.length
      for (let item in this.items) {
        if (this.items[item].apk === 1) {
          this.items[item].apk = 'Ja'
        } else {
          this.items[item].apk = 'Nee'
        }
      }
    })
  },
  methods: {
    rowSelected(items) {
      this.selected = items
    },
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length
      this.currentPage = 1
    },
    select() {
      this.selected = []
      if (!this.selectAll) {
        for (let i in this.items) {
          this.selected.push(this.items.i.ID)
        }
      }
    },
    async fireDelete(id, index) {
      try {
        let { data } = await axios.delete(
          this.$app.route('account.cars.destroy', {
            car: id.id
          })
        )
        this.items.splice(index, 1)
        this.$app.noty[data.status](data.message)
      } catch (e) {
        this.$app.error(e)
      }
    }
  }
}
