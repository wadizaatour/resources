export default {
  props: {
    part: {
      type: String,
      default: null
    },
    sku: {
      type: String,
      default: null
    },
    description: {
      type: String,
      default: null
    },
    image: {
      type: String,
      default: null
    },
    index: {
      type: Number,
      default: 0
    },
    input: {
      type: Object,
      default: () => ({})
    },
    inputs: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      attributes: [],
      category: null,
      categories: [],
      selectedFile: null,
      sizeImage: null,
      subcategory: null,
      subcategories: [],
      url: null
    }
  },
  mounted() {
    axios.get('/api/categories').then(res => {
      this.categories = res.data
    })
  },
  methods: {
    deleteImage() {
      this.url = null
      return (this.input.image = null)
    },
    onFileChanged(event) {
      this.selectedFile = event.target.files[0]
      let n = this.selectedFile.size / 1000000
      this.sizeImage = n.toFixed(1 - Math.floor(Math.log(n) / Math.log(10)))
      if (this.sizeImage > 4) {
        alert(
          this.$i18n.t('labels.frontend.request.size') +
            this.sizeImage +
            this.$i18n.t('labels.frontend.request.denySize')
        )
        this.selectedFile = null
      } else {
        this.input.image = this.selectedFile
        this.url = URL.createObjectURL(this.selectedFile)
      }
    },
    onchangeCategory(e) {
      axios.get('/api/categories/' + e.target.value).then(res => {
        this.subcategories = res.data
      })
      this.getAttributes(e.target.value)
    },
    onchangeSubCategory(e) {
      this.getAttributes(e.target.value)
    },
    getAttributes(id) {
      axios
        .get(
          this.$app.route('api.attributes', {
            id: id
          })
        )
        .then(res => {
          this.attributes = res.data
        })
    }
  }
}
