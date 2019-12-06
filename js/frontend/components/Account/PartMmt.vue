<template>
  <div>
    <div class="row d-flex justify-content-end">
      <label class="mt-1 mr-3" id="model_label" for="model_id">
        {{ $t('forms.request.model') }}
      </label>
      <div class="col-lg-4">
        <select
          name="model_id"
          id="model_id"
          v-model="model_id"
          class="form-control br-r-4"
          @change="onChangeModel"
        >
          <option v-for="(option, index) in models" :key="index" :value="index">
            {{ option }}
          </option>
        </select>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-2">
        <label class="mt-1" id="make_label" for="make_id">
          {{ $t('forms.request.make') }}
        </label>
      </div>
      <div class="col-lg-4">
        <select
          name="make_id"
          id="make_id"
          class="form-control br-r-4"
          v-model="make_id"
          @change="onChangeMake"
        >
          <option :value="null" disabled selected>
            {{ $t('labels.account.cars.selectBrand') }}
          </option>
          <option v-for="(option, index) in makes" :value="index" :key="index">
            {{ option }}
          </option>
        </select>
      </div>
      <div class="col-lg-2 d-flex justify-content-end">
        <label
          class="gray-text-color font-montserrat-regular d-flex justify-content-end"
          for="type_id"
          id="type_label"
        >
          {{ $t('labels.frontend.overview.Type') }}
        </label>
      </div>
      <div class="col-lg-4">
        <select
          name="type_id"
          id="type_id"
          v-model="type_id"
          class="form-control br-r-4 input-type-position"
        >
          <option v-for="(option, index) in types" :key="index" :value="index">
            {{ option }}
          </option>
        </select>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    make: {
      type: Number,
      default: 0
    },
    model: {
      type: Number,
      default: 0
    },
    type: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      makes: {},
      models: {},
      types: {},
      make_id: 0,
      model_id: 0,
      type_id: 0
    }
  },
  mounted() {
    axios.post('/api/car/makes').then(res => {
      this.makes = res.data
    })
    if (this.make > 0) {
      axios
        .post('/api/car/models', {
          q: this.make
        })
        .then(res => {
          this.models = res.data
        })
      this.make_id = this.make
    }
    if (this.model > 0) {
      axios
        .post('/api/car/types', {
          q: this.model
        })
        .then(res => {
          this.types = res.data
        })
      this.model_id = this.model
    }
    if (this.type > 0) {
      this.type_id = this.type
    }
  },
  methods: {
    onChangeMake(e) {
      axios
        .post('/api/car/models', {
          q: e.target.value
        })
        .then(res => {
          this.models = res.data
        })
    },
    onChangeModel(e) {
      axios
        .post('/api/car/types', {
          q: e.target.value
        })
        .then(res => {
          this.types = res.data
        })
    }
  }
}
</script>
