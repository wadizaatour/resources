<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row class="justify-content-center">
        <b-col xl="8">
          <b-card>
            <h3 class="card-title" slot="header">
              {{
                isNew
                  ? $t('labels.backend.companies.titles.create')
                  : $t('labels.backend.companies.titles.edit')
              }}
            </h3>

            <b-form-group
              :label="$t('validation.attributes.name')"
              label-for="name"
              horizontal
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
              :label="$t('validation.attributes.description')"
              label-for="description"
              horizontal
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
              horizontal
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

            <b-row slot="footer">
              <b-col md>
                <b-button to="/companies" exact variant="danger" size="sm">
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
                  v-if="isNew || this.$app.user.can('edit companies')"
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
import form from '../mixins/form'

export default {
  name: 'Company',
  mixins: [form],
  data() {
    return {
      permissions: [],
      modelName: 'company',
      resourceRoute: 'companies',
      listPath: '/companies',
      model: {
        name: null,
        description: null,
        order: 0
      }
    }
  },
  async created() {
    this.fetchData()
  }
}
</script>
