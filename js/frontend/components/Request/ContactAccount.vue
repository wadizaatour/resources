<template>
  <div class="row ml-0">
    <div class="form-group">
      <div class="form-check form-check-inline">
        <input
          type="radio"
          name="createAccount"
          v-model="x"
          id="createAccount1"
          value="yes"
          class="form-check-input"
        />
        <label
          class="form-check-label gray-text-color font-montserrat-regular"
          for="createAccount1"
        >
          Ja
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input
          type="radio"
          name="createAccount"
          id="createAccount2"
          value="no"
          v-model="x"
          class="form-check-input"
        />
        <label
          class="form-check-label gray-text-color font-montserrat-regular"
          for="createAccount2"
        >
          Nee
        </label>
      </div>
    </div>
    <div v-show="x === 'yes'">
      <label for="password" class="gray-text-color font-montserrat-regular">
        Password *
      </label>
      <input
        type="password"
        name="password"
        id="password"
        class="form-control light-gray-background request-input"
      />
      <label
        for="password_confirmation"
        class="gray-text-color font-montserrat-regular"
      >
        Repeat password *
      </label>
      <input
        type="password"
        name="password_confirmation"
        id="password_confirmation"
        class="form-control light-gray-background request-input"
      />
    </div>
    <div v-show="x === 'no'"></div>
  </div>
</template>
<script>
export default {
  props: {
    test: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      x: 'no'
    }
  }
}
</script>
