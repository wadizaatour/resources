export default {
  name: 'SearchCompaniesTable',
  props: {
    companyName: {
      type: String,
      required: false,
      default: () => ''
    }
  },
  data() {
    return {
      search: this.$i18n.t('labels.frontend.companies.search'),
      selected: false,
      filter: null,
      totalRows: 1,
      currentPage: 1,
      perPage: 10,
      pageOptions: [5, 10, 25],
      outlined: true,
      fields: [{ key: 'name', sortable: true }],
      items: [],
      filterOn: [],
      checked: false,
      type: [],
      filtered: []
    }
  },
  computed: {
    rows() {
      return Object.keys(this.items).length
    }
  },
  mounted() {
    axios.get('/companies/search').then(response => {
      this.items = response.data
      this.totalRows = this.items.count
    })
  },
  methods: {
    onFiltered(filteredItems) {
      this.totalRows = filteredItems.length
      this.currentPage = 1
      this.items.count = filteredItems.length
    },
    onCheck(value) {
      let k = 0
      let companyType = this.items.data
      if (value[0] === 'garage' || value[0] === 'disassembly') {
        for (let i = 0; i < this.items.count; i++) {
          if (companyType[i].type[0] === value[0]) {
            this.filtered.push(companyType[i])
            k++
          }
        }
        companyType = this.filtered
        this.items.count = k
        this.totalRows = k
      } else if (value[0] === 'revision') {
        for (let i = 0; i < this.items.count; i++) {
          if (companyType[i].type[1] === value[0]) {
            this.filtered.push(companyType[i])
            k++
          }
        }
        companyType = this.filtered
        this.items.count = k
        this.totalRows = k
      } else {
        axios.get('/companies/search').then(response => {
          this.items = response.data
          this.totalRows = this.items.count
          this.filtered = []
          k = 0
        })
      }
    }
  }
}
