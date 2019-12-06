import axios from 'axios'

export default {
  props: {
    make: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      lpn: null,
      makes: [],
      models: [],
      types: [],
      lp: {},
      body: null,
      gearBox: null,
      fueltypes: [],
      drives: [],
      months: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
    }
  },
  computed: {
    years() {
      const year = new Date().getFullYear()
      return Array.from(
        { length: year - 1900 },
        (value, index) => 1901 + index
      ).reverse()
    }
  },
  mounted() {
    axios.get(this.$app.route('frontend.request.car-data')).then(res => {
      this.drives = res.data.drives
      this.fueltypes = res.data.fueltypes
      this.lpn = res.data.lpn
      this.makes = res.data.makes
      if (res.data.lpn !== null) {
        this.$refs.bigBlue.click()
      }
      if (this.$props.make > 0) {
        this.lp.make_id = this.$props.make
        axios
          .post(this.$app.route('api.car.models'), {
            q: this.$props.make
          })
          .then(res => {
            this.models = res.data
          })
      }
    })
  },
  methods: {
    getLP(el) {
      if (el) el.preventDefault()
      if (this.lpn === '' || this.lpn < 6) return
      axios
        .post(this.$app.route('frontend.car.lp'), {
          q: this.lpn
        })
        .then(res => {
          this.lp = res.data
          axios
            .post(this.$app.route('api.car.models'), {
              q: this.lp.make_id
            })
            .then(res => {
              this.models = res.data
            })
        })
        .then(() => {
          axios
            .post(this.$app.route('api.car.types'), {
              q: this.lp.model_id
            })
            .then(res => {
              this.types = res.data
            })
        })
    },
    onChangeMake(e) {
      axios
        .post(this.$app.route('api.car.models'), {
          q: e.target.value
        })
        .then(res => {
          this.models = res.data
        })
    },
    onChangeType(e) {
      axios
        .post(this.$app.route('api.car.types'), {
          q: e.target.value
        })
        .then(res => {
          this.types = res.data
        })
    }
  }
}
