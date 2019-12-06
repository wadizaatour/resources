<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row class="justify-content-center">
        <b-col xl="8">
          <b-card>
            <h3 class="card-title" slot="header">
              {{
                isNew
                  ? $t('labels.backend.plans.titles.create')
                  : $t('labels.backend.plans.titles.edit')
              }}
            </h3>

            <b-form-group
              :label="$t('validation.attributes.name')"
              label-for="name"
              :label-cols="2"
            >
              <b-row>
                <b-col md="6">
                  <b-form-input
                    id="name"
                    name="name"
                    required
                    :placeholder="$t('validation.attributes.name')"
                    v-model="model.name"
                    :state="state('name')"
                  ></b-form-input>
                  <b-form-feedback>{{ feedback('name') }}</b-form-feedback>
                </b-col>
              </b-row>
            </b-form-group>

            <b-form-group
              :label="$t('validation.attributes.display_name')"
              label-for="display_name"
              :label-cols="2"
            >
              <b-row>
                <b-col md="6">
                  <b-form-input
                    id="display_name"
                    name="display_name"
                    required
                    :placeholder="$t('validation.attributes.display_name')"
                    v-model="model.display_name"
                    :state="state('display_name')"
                  ></b-form-input>
                  <b-form-feedback>
                    {{ feedback('display_name') }}
                  </b-form-feedback>
                </b-col>
              </b-row>
            </b-form-group>

            <b-form-group
              :label="$t('validation.attributes.description')"
              label-for="description"
              :label-cols="2"
              :feedback="feedback('description')"
            >
              <b-form-input
                id="description"
                name="description"
                :placeholder="$t('validation.attributes.description')"
                v-model="model.description"
                :state="state('description')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('validation.attributes.order')"
              label-for="order"
              :label-cols="2"
            >
              <b-row>
                <b-col md="3">
                  <b-form-input
                    id="order"
                    name="order"
                    type="number"
                    required
                    v-model="model.order"
                  ></b-form-input>
                </b-col>
              </b-row>
            </b-form-group>

            <div class="form-group">
              <b-row>
                <label class="col-sm-2 col-form-label">{{
                  $t('validation.attributes.features')
                }}</label>
                <b-col sm="10">
                  <b-row>
                    <b-col md="6" xl="4" class="mb-3">
                      <b-form-checkbox-group
                        stacked
                        v-model="model.features"
                        name="features[]"
                      >
                        <b-form-checkbox
                          v-for="feature in features"
                          :key="feature.id"
                          v-b-tooltip.left
                          :title="feature.name"
                          :value="feature.value"
                        >
                          {{ $t(feature.name) }}
                        </b-form-checkbox>
                      </b-form-checkbox-group>
                    </b-col>
                  </b-row>
                </b-col>
              </b-row>
            </div>

            <b-row slot="footer">
              <b-col md>
                <b-button to="/plans" exact variant="danger" size="sm">
                  {{ $t('buttons.back') }}
                </b-button>
              </b-col>
              <b-col md>
                <b-button
                  type="submit"
                  variant="success"
                  size="sm"
                  class="float-right"
                  :disabled="pending"
                  v-if="isNew || this.$app.user.can('edit plans')"
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
import axios from 'axios'
import form from '../mixins/form'

import _ from 'lodash'
// eslint-disable-next-line no-unused-vars
import { groupBy, forEach } from 'lodash/collection'

export default {
  name: 'PlanForm',
  mixins: [form],
  data() {
    return {
      features: [],
      modelName: 'plan',
      resourceRoute: 'plans',
      listPath: '/plans',
      model: {
        name: null,
        display_name: null,
        description: null,
        order: 0,
        features: []
      }
    }
  },
  async created() {
    this.fetchData()
    let { data } = await axios.get(
      this.$app.route(`backend.plans.get_features`)
    )
    this.features = data
  },
  methods: {
    onModelChanged() {
      if (this.model.features) {
        this.model.features = this.model.features.map(item => {
          return item.id
        })
      }
    }
  }
}
</script>
