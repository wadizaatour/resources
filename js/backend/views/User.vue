<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row class="justify-content-center">
        <b-col xl="6">
          <b-card>
            <h3 class="card-title" slot="header">
              {{
                isNew
                  ? $t('labels.backend.users.titles.create')
                  : $t('labels.backend.users.titles.edit')
              }}
            </h3>

            <b-form-group
              :label="$t('validation.attributes.name')"
              label-for="name"
              horizontal
              :label-cols="3"
              :feedback="feedback('name')"
            >
              <b-form-input
                id="first_name"
                name="first_name"
                required
                :placeholder="$t('validation.attributes.first_name')"
                v-model="model.first_name"
                :state="state('first_name')"
              ></b-form-input>
              <b-form-input
                id="last_name"
                name="last_name"
                required
                :placeholder="$t('validation.attributes.last_name')"
                v-model="model.last_name"
                :state="state('last_name')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('validation.attributes.email')"
              label-for="email"
              horizontal
              :label-cols="3"
              :feedback="feedback('email')"
            >
              <b-form-input
                id="email"
                name="email"
                type="email"
                required
                :placeholder="$t('validation.attributes.email')"
                v-model="model.email"
                :state="state('email')"
              ></b-form-input>
            </b-form-group>

            <div class="form-group">
              <b-row>
                <b-col lg="9" offset-lg="3">
                  <c-switch
                    name="active"
                    v-model="model.active"
                    :description="$t('validation.attributes.active')"
                  ></c-switch>
                </b-col>
              </b-row>
            </div>

            <b-form-group
              :label="$t('validation.attributes.password')"
              label-for="password"
              horizontal
              :label-cols="3"
              :feedback="feedback('password')"
            >
              <b-form-input
                id="password"
                name="password"
                type="password"
                :placeholder="$t('validation.attributes.password')"
                v-model="model.password"
                :state="state('password')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('validation.attributes.password_confirmation')"
              label-for="password_confirmation"
              horizontal
              :label-cols="3"
              :feedback="feedback('password_confirmation')"
            >
              <b-form-input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                :placeholder="$t('validation.attributes.password_confirmation')"
                v-model="model.password_confirmation"
                :state="state('password_confirmation')"
              ></b-form-input>
            </b-form-group>
            <!-- roles are not currently used -->
            <!--  <b-form-group
              :label="$t('validation.attributes.roles')"
              label-for="roles"
              horizontal
              :label-cols="3"
            >
              <b-form-checkbox-group
                stacked
                v-model="model.roles"
                name="roles[]"
              >
                <b-form-checkbox
                  v-for="role in roles"
                  :key="role.id"
                  v-b-tooltip.left
                  :title="role.description"
                  :value="role.id"
                >
                  {{ role.display_name }}
                </b-form-checkbox>
              </b-form-checkbox-group>
            </b-form-group> -->
            <b-form-group
              :label="$t('forms.onboarding.type')"
              label-for="type"
              horizontal
              :label-cols="3"
            >
              <b-form-radio-group
                v-model="model.type"
                name="type"
                stacked
                required
              >
                <b-form-radio value="free">
                  Free
                </b-form-radio>
                <b-form-radio value="sell">
                  Sell
                </b-form-radio>
              </b-form-radio-group>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.companyName')"
              label-for="company_name"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.companyName')"
            >
              <b-form-input
                id="company_name"
                name="company_name"
                type="text"
                :placeholder="$t('forms.onboarding.companyName')"
                v-model="model.company.name"
                :state="state('forms.onboarding.companyName')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.affiliatedWith')"
              label-for="affiliated_with"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.affiliatedWith')"
              v-if="model.type === 'sell'"
            >
              <multiselect
                v-model="model.company.affiliated_with"
                :state="state('forms.onboarding.affiliatedWith')"
                :tag-placeholder="$t('forms.onboarding.affiliatedWith')"
                :placeholder="$t('forms.onboarding.affiliatedWith')"
                :options="affiliated_options"
                :multiple="true"
                :taggable="true"
                @tag="addTag"
                v-if="model.type === 'sell'"
              >
              </multiselect>
              <input
                type="hidden"
                name="affiliated_with"
                :value="affiliated_values"
                v-if="model.type === 'sell'"
              />
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.type')"
              label-for="type"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.type')"
              v-if="model.type === 'sell'"
            >
              <multiselect
                v-model="model.company.type"
                :state="state('forms.onboarding.type')"
                :tag-placeholder="$t('forms.onboarding.type')"
                :placeholder="$t('forms.onboarding.type')"
                :options="companyTypes"
                :multiple="true"
                :taggable="true"
                @tag="addTag"
                v-if="model.type === 'sell'"
              >
              </multiselect>
              <input
                id="type"
                name="type"
                type="hidden"
                :value="affiliated_values"
                v-if="model.type === 'sell'"
              />
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.coc_nr')"
              label-for="coc_nr"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.coc_nr')"
              v-if="model.type === 'sell'"
            >
              <b-form-input
                id="coc_nr"
                name="coc_nr"
                type="text"
                :placeholder="$t('forms.onboarding.coc_nr')"
                v-model="model.company.coc_nr"
                :state="state('forms.onboarding.coc_nr')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.vat_nr')"
              label-for="vat_nr"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.vat_nr')"
              v-if="model.type === 'sell'"
            >
              <b-form-input
                id="vat_nr"
                name="vat_nr"
                type="text"
                :placeholder="$t('forms.onboarding.vat_nr')"
                v-model="model.company.vat_nr"
                :state="state('forms.onboarding.vat_nr')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.address')"
              label-for="address"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.address')"
            >
              <b-form-input
                id="address"
                name="address"
                type="text"
                :placeholder="$t('forms.onboarding.address')"
                v-model="model.address[0].street"
                :state="state('forms.onboarding.address')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.request.houseNo')"
              label-for="houseNo"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.request.houseNo')"
            >
              <b-form-input
                id="houseNo"
                name="houseNo"
                type="text"
                :placeholder="$t('forms.request.houseNo')"
                v-model="model.address[0].building_nr"
                :state="state('forms.request.houseNo')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.postal')"
              label-for="postcode"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.postal')"
            >
              <b-form-input
                id="postcode"
                name="postcode"
                type="text"
                :placeholder="$t('forms.onboarding.postal')"
                v-model="model.address[0].postal"
                :state="state('forms.onboarding.postal')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.request.place')"
              label-for="place"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.request.place')"
            >
              <b-form-input
                id="place"
                name="place"
                type="text"
                :placeholder="$t('forms.request.place')"
                v-model="model.address[0].city"
                :state="state('forms.request.place')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.province')"
              label-for="province"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.province')"
            >
              <select
                name="province"
                id="province"
                class="form-control br-r-4"
                required
              >
                <option :value="null">-</option>
                <option
                  v-for="(province, index) in provincies"
                  :value="index"
                  :key="province.id"
                  :selected="index === model.address[0].state"
                >
                  {{ province }}
                </option>
              </select>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.country')"
              label-for="country"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.country')"
            >
              <select
                name="country"
                id="country"
                class="form-control br-r-4"
                required
              >
                <option :value="null" disabled>-</option>
                <option
                  v-for="(country, index) in countries"
                  :value="index"
                  :key="country.id"
                  :selected="index === model.address[0].country"
                >
                  {{ country }}
                </option>
              </select>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.website')"
              label-for="website"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.website')"
              v-if="model.type === 'sell'"
            >
              <b-form-input
                id="website"
                name="website"
                type="text"
                :placeholder="$t('forms.onboarding.website')"
                v-model="model.company.website"
                :state="state('forms.onboarding.website')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.phone')"
              label-for="phone"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.phone')"
            >
              <b-form-input
                id="phone"
                name="phone"
                type="text"
                :placeholder="$t('forms.onboarding.phone')"
                v-model="model.address[0].phone"
                :state="state('forms.onboarding.phone')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.mobile')"
              label-for="mobile"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.mobile')"
            >
              <b-form-input
                id="mobile"
                name="mobile"
                type="text"
                :placeholder="$t('forms.onboarding.mobile')"
                v-model="model.address[0].mobile"
                :state="state('forms.onboarding.mobile')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.iban')"
              label-for="iban"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.iban')"
              v-if="model.type === 'sell'"
            >
              <b-form-input
                id="iban"
                name="iban"
                type="text"
                :placeholder="$t('forms.onboarding.iban')"
                v-model="model.company.iban"
                :state="state('forms.onboarding.iban')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.accountHolder')"
              label-for="account_holder"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.accountHolder')"
              v-if="model.type === 'sell'"
            >
              <b-form-input
                id="account_holder"
                name="account_holder"
                type="text"
                :placeholder="$t('forms.onboarding.accountHolder')"
                v-model="model.company.account_name"
                :state="state('forms.onboarding.accountHolder')"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              :label="$t('forms.onboarding.bic')"
              label-for="bic"
              horizontal
              :label-cols="3"
              :feedback="feedback('forms.onboarding.bic')"
              v-if="model.type === 'sell'"
            >
              <b-form-input
                id="bic"
                name="bic"
                type="text"
                :placeholder="$t('forms.onboarding.bic')"
                v-model="model.company.bic"
                :state="state('forms.onboarding.bic')"
              ></b-form-input>
            </b-form-group>
            <b-row slot="footer">
              <b-col>
                <b-button to="/users" exact variant="danger" size="sm">
                  {{ $t('buttons.back') }}
                </b-button>
              </b-col>
              <b-col>
                <b-button
                  type="submit"
                  variant="success"
                  size="sm"
                  class="float-right"
                  :disabled="pending"
                  v-if="isNew || this.$app.user.can('edit users')"
                >
                  {{ isNew ? $t('buttons.create') : $t('buttons.edit') }}
                </b-button>
              </b-col>
            </b-row>
          </b-card>
        </b-col>
      </b-row>
    </form>
  </div>
</template>

<script>
import Vue from 'vue'
import axios from 'axios'
import form from '../mixins/form'
import Multiselect from 'vue-multiselect'

Vue.component('multiselect', Multiselect)

export default {
  name: 'UserForm',
  mixins: [form],
  data() {
    return {
      //roles: [], // roles are not currently in use.
      countries: {},
      provincies: {},
      modelName: 'user',
      resourceRoute: 'users',
      listPath: '/users',
      companyTypes: ['revision', 'garage', 'disassembly'],
      affiliated_options: ['ARN', 'KZD', 'Stiba'],
      affiliated_values: [],
      model: {
        first_name: null,
        last_name: null,
        email: null,
        active: true,
        type: null,
        address: [
          {
            street: null,
            building_nr: null,
            state: null,
            country: null,
            phone: null,
            mobile: null
          }
        ],
        //roles: [], // roles are not currently in use.
        company: {
          name: null,
          type: [],
          coc_nr: null,
          vat_nr: null,
          website: null,
          account_name: null,
          bic: null,
          iban: null,
          affiliated_with: null
        },
        company_name: null
      }
    }
  },
  async created() {
    this.fetchData()
    // roles are currently not used.
    //let { data } = await axios.get(this.$app.route(`backend.users.get_roles`))
    //this.roles = data
  },
  mounted() {
    axios.get('/api/location/countries').then(res => {
      this.countries = res.data
    })
    // not every customer is in NLD ...
    axios.get('/api/location/states/NLD').then(res => {
      this.provincies = res.data
    })
  },
  methods: {
    addTag(newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000)
      }
      this.affiliated_options.push(tag)
      this.affiliated_values.push(tag)
    },
    onModelChanged() {
      //if (this.model.roles) { //roles are currently not used
      //  this.model.roles = this.model.roles.map(item => {
      //    return item.id
      //  })
      //}
      if (this.model.company === null) {
        this.model.company = {}
        this.model.company.name = this.model.company_name
      }
    }
  }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
