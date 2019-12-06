<template>
  <div class="row">
    <div class="col-lg-6 form-group brd3">
      <select
        name="make"
        :id="make"
        class="form-control light-gray-background gray-text-color request-input"
        v-model="make"
        @change="onChangeMake"
      >
        <option :value="null" disabled selected>
          {{ $t('labels.account.cars.selectBrand') }}
        </option>
        <option
          :value="index"
          :key="option.id"
          v-for="(option, index) in makes"
        >
          {{ option }}
        </option>
      </select>
    </div>
    <div class="col-lg-6 form-group brd3">
      <select
        name="model"
        id="model"
        class="form-control gray-background request-input ml-2"
        v-model="model"
      >
        <option :value="null" disabled selected>
          {{ $t('labels.account.cars.selectModel') }}
        </option>
        <option
          :value="index"
          :key="option.id"
          v-for="(option, index) in models"
        >
          {{ option }}
        </option>
      </select>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      makes: [],
      models: [],
      make: null,
      model: null
    }
  },
  mounted() {
    axios.post('/api/car/makes').then(res => {
      this.makes = res.data
    })
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
    }
  }
}
</script>
