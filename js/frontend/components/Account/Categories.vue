<template>
  <div>
    <div class="row mt-3">
      <div class="col-lg-2">
        <label class="mt-1" :for="category">
          {{ $t('labels.account.create.cat') }}
        </label>
      </div>
      <div class="col-lg-4">
        <select
          name="category"
          id="category"
          class="form-control br-r-4"
          v-model="category_dynamic"
          @change="onchangeCategorie"
          required
        >
          <option :value="null" disabled>-</option>
          <option
            v-for="(option, index1) in categories"
            :value="index1"
            :key="index1"
          >
            {{ option }}
          </option>
        </select>
      </div>
      <div class="col-lg-2 d-flex justify-content-end">
        <label class="mt-2" :for="name">
          {{ $t('labels.account.create.subcat') }}
        </label>
      </div>
      <div class="col-lg-4">
        <select
          name="name"
          id="name"
          class="form-control br-r-4"
          v-model="name_dynamic"
          required
        >
          <option :value="null" disabled>-</option>
          <option
            v-for="(option, index1) in names"
            :value="index1"
            :key="option.id"
          >
            {{ option }}
          </option>
        </select>
      </div>
    </div>
    <div
      v-for="i in Math.ceil(attributes.length / 2)"
      :key="i"
      class="row mt-3"
    >
      <slot v-for="(item, item_index) in attributes.slice((i - 1) * 2, i * 2)">
        <div
          class="col-lg-2"
          :class="{ 'd-flex justify-content-end': item_index === 1 }"
          :key="(i + 1) * (item_index + 1)"
        >
          <label class="mt-1" :for="'attr_' + (i - 1) * 2 + item_index">
            {{ item[0].toUpperCase() + item.slice(1) }}
          </label>
        </div>
        <div
          class="col-lg-4"
          :class="{ 'p-left-10': item_index === 1 }"
          :key="(i + 2) * (item_index + 1)"
        >
          <input
            type="text"
            :name="'attr_' + item"
            :id="'attr_' + (i - 1) * 2 + item_index"
            class="form-control p-left-10 br-r-4"
          />
        </div>
      </slot>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    category: {
      type: Number,
      default: 0
    },
    name: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      category_dynamic: null,
      name_dynamic: null,
      categories: [],
      names: [],
      attributes: []
    }
  },
  mounted() {
    this.category_dynamic = this.category
    axios.get('/api/categories').then(res => {
      this.categories = res.data
      if (this.name > 0) {
        axios.get('/api/categories/' + this.category).then(res => {
          this.names = res.data
        })
        this.name_dynamic = this.name
      }
    })
  },
  methods: {
    onchangeCategorie(e) {
      axios.get('/api/categories/' + e.target.value).then(res => {
        this.names = res.data
      })
      axios
        .get(
          this.$app.route('api.attributes', {
            id: e.target.value
          })
        )
        .then(res => {
          this.attributes = res.data
        })
    }
  }
}
</script>
