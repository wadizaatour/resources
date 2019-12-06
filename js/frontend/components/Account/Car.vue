<template>
  <div class="ml-2">
    <div class="row mb-5">
      <div class="col">
        <input
          name="lpn"
          maxlength="8"
          class="plate-input-parts img-input-r plate-width-mobile"
          v-if="mode === 'u'"
          v-model="lpn"
        />
        <input
          name="lpn"
          maxlength="8"
          class="plate-input-parts img-input-r plate-width-mobile"
          v-else
          v-model="lpn"
          readonly="readonly"
        />
      </div>
      <div class="col">
        <img
          src="/images/blueButton.png"
          alt="button"
          class="blue-button-mobile"
          v-if="mode === 'u'"
          @click="getLP"
        />
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="make">
            {{ $t('labels.frontend.listings.make') }}
          </label>
        </div>
        <div class="form-group brd3">
          <select
            name="make"
            id="make"
            class="form-control light-gray-background request-input"
            v-if="mode === 'u'"
            v-model="make_id"
            @change="onChangeMake"
          >
            <option :value="null" disabled selected>Selecteer merk</option>
            <option
              v-for="(option, index) in makes"
              :value="index"
              :key="index"
            >
              {{ option }}
            </option>
          </select>
          <span v-else class="locked-span">{{ makes[make_id] }} 🔒</span>
        </div>
      </div>
      <div class="col-md-6">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="model">
            {{ $t('labels.frontend.listings.model') }}
          </label>
        </div>
        <div class="form-group brd3">
          <select
            name="model"
            id="model"
            v-if="mode === 'u'"
            v-model="model_id"
            class="form-control light-gray-background request-input"
            @change="onChangeType"
          >
            <option
              v-for="(option, index) in models_dynamic"
              :key="index"
              :value="index"
            >
              {{ option }}
            </option>
          </select>
          <span v-else class="locked-span">
            {{ models_dynamic[model_id] }} 🔒
          </span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div>
          <label
            class="gray-text-color font-montserrat-regular"
            for="chassis_nr"
          >
            {{ $t('forms.request.chassisNumber') }}
            {{ $t('forms.request.optional') }}
          </label>
        </div>
        <div
          class="form-group light-gray-background brd3"
          style="margin-left:-11px"
        >
          <input
            type="text"
            name="chassis_nr"
            id="chassis_nr"
            v-if="mode === 'u' && this.$props.car.chassis_nr !== ''"
            v-model="chassis_nr"
            class="form-control light-gray-background request-input"
          />
          <span v-else>{{ chassis_nr }}</span>
        </div>
      </div>
      <div class="col-md-3">
        <div>
          <label
            class="gray-text-color font-montserrat-regular"
            for="build_year"
          >
            {{ $t('forms.request.constructionYear') }} *
          </label>
        </div>
        <div class="form-group brd3">
          <select
            name="build_year"
            id="build_year"
            class="form-control light-gray-background request-input"
            v-if="mode === 'u'"
            v-model="build_year"
          >
            <option :value="option" :key="option.id" v-for="option in years">
              {{ option }}
            </option>
          </select>
          <span v-else class="locked-span">{{ build_year }}🔒</span>
        </div>
      </div>
      <div class="col-md-3">
        <div>
          <label
            class="gray-text-color font-montserrat-regular"
            for="build_month"
          >
            {{ $t('forms.request.constructionMonth') }}
          </label>
        </div>
        <div class="form-group brd3">
          <select
            name="build_month"
            id="build_month"
            class="form-control light-gray-background request-input"
            v-if="mode === 'u'"
            v-model="build_month"
          >
            <option :value="option" :key="option" v-for="option in months">
              {{ option }}
            </option>
          </select>
          <span v-else class="locked-span">{{ build_month }}🔒</span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="type">
            {{ $t('forms.request.performance') }}
          </label>
        </div>
        <div class="form-group brd3">
          <select
            name="type"
            id="type"
            v-if="mode === 'u'"
            v-model="type_id"
            class="form-control light-gray-background request-input"
          >
            <option
              v-for="(option, index) in types_dynamic"
              :key="index"
              :value="index"
            >
              {{ option }}
            </option>
          </select>
          <span v-else class="locked-span">{{ types_dynamic[type_id] }}🔒</span>
        </div>
      </div>
      <div class="col-md-3">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="doors">
            {{ $t('forms.request.doors') }}
          </label>
        </div>
        <div class="form-group brd3">
          <select
            name="doors"
            id="doors"
            class="form-control light-gray-background request-input"
            v-if="mode === 'u'"
            v-model="doors"
          >
            <option value="">-</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
          <span v-else class="locked-span">{{ doors }}🔒</span>
        </div>
      </div>
      <div class="col-md-4">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="fueltype">
            {{ $t('forms.request.fueltype') }}
            *
          </label>
        </div>
        <div class="form-group brd3">
          <select
            name="fueltype"
            id="fueltype"
            class="form-control light-gray-background request-input"
            v-if="mode === 'u'"
            v-model="fueltype_id"
          >
            <option
              v-for="(option, index) in fueltypes"
              :key="index"
              :value="index"
            >
              {{ option }}
            </option>
          </select>
          <span v-else class="locked-span">{{ fueltypes[fueltype_id] }}🔒</span>
        </div>
      </div>
      <div class="col-md-2">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="power">
            {{ $t('forms.request.power') }}
          </label>
        </div>
        <div class="form-group brd3">
          <input
            type="text"
            name="power"
            id="power"
            class="form-control light-gray-background request-input"
            v-if="mode === 'u'"
            :value="kw"
          />
          <span v-else class="locked-span">{{ kw }}</span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div>
          <label class="gray-text-color font-montserrat-regular" for="drive">
            {{ $t('forms.request.drive') }}
          </label>
        </div>
        <div class="form-group brd3">
          <select
            name="drive"
            id="drive"
            class="form-control light-gray-background request-input"
            v-if="mode === 'u'"
            v-model="drive"
          >
            <option
              v-for="(option, index) in drives"
              :key="index"
              :value="index"
            >
              {{ option }}
            </option>
          </select>
          <span v-else class="locked-span">{{ drive }}🔒</span>
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
    },
    drives: {
      type: Object,
      default: () => ({})
    },
    fueltypes: {
      type: Object,
      default: () => ({})
    },
    makes: {
      type: Object,
      default: () => ({})
    },
    mode: {
      type: String,
      default: ''
    },
    models: {
      type: Object,
      default: () => ({})
    },
    types: {
      type: Object,
      default: () => [{}]
    }
  },
  data() {
    return {
      models_dynamic: this.models,
      types_dynamic: this.types,
      lpn: null,
      chassis_nr: null,
      fueltype_id: null,
      build_month: null,
      build_year: null,
      make_id: null,
      model_id: null,
      type_id: null,
      doors: null,
      drive: null,
      kw: null,
      lp: {},
      months: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
    }
  },
  computed: {
    years() {
      const year = new Date().getFullYear()
      return Array.from({ length: year - 1900 }, (value, index) => 1901 + index)
    }
  },
  mounted() {
    if (Object.keys(this.car).length > 0) {
      this.lpn = this.car.lpn
      this.chassis_nr = this.car.chassis_nr
      this.make_id = this.car.make_id
      this.model_id = this.car.model_id
      this.type_id = this.car.type_id
      this.doors = this.car.doors
      this.build_year = this.car.year
      this.build_month = this.car.month
      this.kw = this.car.power
      this.fueltype_id = this.car.fueltype_id
      this.drive = this.car.drive
    }
  },
  methods: {
    getLP(event) {
      if (event) event.preventDefault()
      if (this.mode === 'r') return false
      if (this.lpn === '' || this.lpn < 6) return
      axios
        .post('/api/car/lp', {
          q: this.lpn
        })
        .then(res => {
          this.lp = res.data
          axios
            .post('/api/car/models', {
              q: this.lp.make_id
            })
            .then(res => {
              this.models_dynamic = res.data
            })
        })
        .then(() => {
          axios
            .post('/api/car/types', {
              q: this.lp.model_id
            })
            .then(res => {
              this.types_dynamic = res.data
            })
        })
        .then(() => {
          this.make_id = this.lp.make_id
          this.model_id = this.lp.model_id
          this.type_id = this.lp.type_id
          this.doors = this.lp.doors
          this.build_year = this.lp.build_year
          this.build_month = this.lp.build_month
          this.kw = this.lp.kw
          this.fueltype_id = this.lp.fueltype_id
          this.drive = this.lp.drive
        })
    },
    onChangeMake(e) {
      if (this.mode === 'r') return false
      axios
        .post('/api/car/models', {
          q: e.target.value
        })
        .then(res => {
          this.models_dynamic = res.data
        })
    },
    onChangeType(e) {
      if (this.mode === 'r') return false
      axios
        .post('/api/car/types', {
          q: e.target.value
        })
        .then(res => {
          this.types_dynamic = res.data
        })
    }
  }
}
</script>
