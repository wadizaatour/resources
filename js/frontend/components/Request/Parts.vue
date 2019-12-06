<template>
  <div class="m-4">
    <ul class="position-ul">
      <li v-for="(input, index) in inputs" :key="input.id">
        <request-part :index="index" :input="input" :inputs="inputs">
        </request-part>
        <button
          type="button"
          @click="deleteRow(index)"
          class="btn btn-danger mb-3 fa fa-trash bt-radius"
        ></button>
      </li>
    </ul>
    <button
      type="button"
      @click="addRow"
      class="btn font-montserrat-regular btn-success btn-plus bt-radius-add green-btn-position"
    >
      Onderdeel toevoegen
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      category: null,
      selectedFile: null,
      subcategory: null,
      inputs: [],
      categories: [],
      subcategories: [],
      counter: 0,
      data: []
    }
  },
  mounted() {
    axios.get('/api/categories').then(res => {
      this.categories = res.data
    })
    axios
      .get(
        this.$app.route('frontend.request.data', {
          step: 'parts'
        })
      )
      .then(res => {
        for (let r in res.data) {
          if (!isNaN(r)) {
            if (r > 0) {
              this.addRow()
            }
            this.inputs[r].category = res.data[r].category
            // Seems we need to trigger an onchange category
            // in the child component right here.
            // Also, it will probably be a pain to re-show the img.
            this.inputs[r].subcategory = res.data[r].subcategory
            this.inputs[r].sku = res.data[r].sku
            this.inputs[r].description = res.data[r].description
          }
        }
        this.data = res.data
      })
  },
  created() {
    this.addRow()
  },
  methods: {
    addRow() {
      this.count()
      this.inputs.push({
        category: '',
        subcategory: '',
        sku: '',
        description: '',
        image: '',
        id: this.counter
      })
    },
    count() {
      this.counter += 1
    },
    deleteRow(index) {
      this.$delete(this.inputs, index)
    },
    onFileChanged(event) {
      this.selectedFile = event.target.files[0]
    }
  }
}
</script>
