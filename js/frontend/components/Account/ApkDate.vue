<template>
  <div class="row">
    <div class="col-lg">
      <label class="gray-text-color font-montserrat-regular" for="apk">
        APK
      </label>
      <div class="form-group light-gray-background brd3">
        <select
          name="apk"
          id="apk"
          class="form-control light-gray-background h-47 request-input"
          v-model="apk"
        >
          <option
            v-for="option in options"
            :value="option.id"
            :key="option.value"
          >
            {{ option.value }}
          </option>
        </select>
      </div>
    </div>
    <div class="col-lg-6">
      <div v-if="apk === 1">
        <label class="gray-text-color font-montserrat-regular" for="apk_date">
          Datum APK
        </label>
        <div class="form-group brd3">
          <input
            type="date"
            name="apk_date"
            id="apk_date"
            class="form-control h-47 padding-4 w-104 light-gray-background font-montserrat-regular request-input"
            v-model="apkDate"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    car: {
      type: Object,
      default: () => ({})
    }
  },
  data() {
    return {
      apk: null,
      apkDate: null,
      options: [
        { id: 1, value: 'Ja' },
        { id: 2, value: 'Nee' }
      ]
    }
  },
  created() {
    this.edit()
  },
  methods: {
    edit() {
      if (this.apk === null) {
        this.apk = this.car.apk
        this.apkDate = this.car.apk_date
      }
    }
  }
}
</script>
