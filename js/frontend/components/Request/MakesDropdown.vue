<template>
  <div class="form-group brd3 mt-3 mb-3">
    <div class="row">
      <div
        class="col-lg-8 col-md-8 col-sm-12 ml-sm-2 d-flex justify-content-center"
      >
        <select
          name="make"
          id="make"
          class="form-control light-gray-background request-input"
          v-model="make"
        >
          <option value="null" selected="selected" disabled>
            OF KIES EEN AUTOMERK
          </option>
          <option
            v-for="(option, index) in makes"
            :key="option.id"
            :value="index"
          >
            {{ option }}
          </option>
        </select>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      makes: [],
      make: null,
      selected: null
    }
  },
  mounted() {
    axios.post('/api/car/makes').then(res => {
      this.makes = res.data
    })
  }
}
</script>
