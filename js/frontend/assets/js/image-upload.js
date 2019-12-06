export default {
  props: {
    imageUrl: {
      type: String,
      default: null
    }
  },
  created() {
    if (this.imageUrl !== null) {
      this.url = this.imageUrl
    }
  },
  data() {
    return {
      sizeImage: null,
      selectedFile: null,
      url: null,
      image: null
    }
  },
  methods: {
    deleteImage() {
      this.url = null
      return (this.image = null)
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
        this.image = this.selectedFile
        this.url = URL.createObjectURL(this.selectedFile)
      }
    }
  }
}
