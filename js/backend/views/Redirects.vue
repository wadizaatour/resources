<template>
  <div>
    <b-row>
      <b-col xl="6">
        <b-card>
          <h3 class="card-title" slot="header">
            {{ $t('labels.backend.redirects.import.title') }}
          </h3>
          <form @submit.prevent="onFileImport">
            <b-form-file
              required
              :placeholder="$t('labels.no_file_chosen')"
              v-model="importFile"
            ></b-form-file>
            <b-button type="submit" variant="warning" class="mt-3">
              {{ $t('buttons.redirects.import') }}
            </b-button>
          </form>
        </b-card>
      </b-col>
    </b-row>

    <b-card>
      <template slot="header">
        <h3 class="card-title">
          {{ $t('labels.backend.redirects.titles.index') }}
        </h3>
        <div class="card-options" v-if="this.$app.user.can('create redirects')">
          <b-button to="/redirects/create" variant="success" size="sm">
            <i class="fe fe-plus-circle"></i>
            {{ $t('buttons.redirects.create') }}
          </b-button>
        </div>
      </template>
      <b-datatable
        ref="datasource"
        @context-changed="onContextChanged"
        search-route="backend.redirects.search"
        delete-route="backend.redirects.destroy"
        action-route="backend.redirects.batch_action"
        :actions="actions"
        :selected.sync="selected"
      >
        <b-table
          ref="datatable"
          striped
          bordered
          show-empty
          stacked="md"
          no-local-sorting
          :empty-text="$t('labels.datatables.no_results')"
          :empty-filtered-text="$t('labels.datatables.no_matched_results')"
          :fields="fields"
          :items="dataLoadProvider"
          sort-by="created_at"
          :sort-desc="true"
        >
          <template v-slot:cell(HEAD_checkbox)="data"></template>
          <template v-slot:cell(checkbox)="row">
            <b-form-checkbox
              :value="row.item.id"
              v-model="selected"
            ></b-form-checkbox>
          </template>
          <template v-slot:cell(active)="row">
            <c-switch
              v-if="row.item.can_edit"
              :checked="row.value"
              @change="onActiveToggle(row.item.id)"
            ></c-switch>
          </template>
          <template v-slot:cell(actions)="row">
            <b-button
              v-if="row.item.can_edit"
              size="sm"
              variant="primary"
              :to="`/redirects/${row.item.id}/edit`"
              v-b-tooltip.hover
              :title="$t('buttons.edit')"
              class="mr-1"
            >
              <i class="fe fe-edit"></i>
            </b-button>
            <b-button
              v-if="row.item.can_delete"
              size="sm"
              variant="danger"
              v-b-tooltip.hover
              :title="$t('buttons.delete')"
              @click.stop="onDelete(row.item.id)"
            >
              <i class="fe fe-trash"></i>
            </b-button>
          </template>
        </b-table>
      </b-datatable>
    </b-card>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'RedirectList',
  data() {
    return {
      selected: [],
      fields: [
        { key: 'checkbox' },
        {
          key: 'source',
          label: this.$t('validation.attributes.source_path'),
          sortable: true
        },
        {
          key: 'active',
          label: this.$t('validation.attributes.active'),
          class: 'text-center'
        },
        {
          key: 'target',
          label: this.$t('validation.attributes.target_path'),
          sortable: true
        },
        {
          key: 'type',
          label: this.$t('validation.attributes.redirect_type'),
          class: 'text-center'
        },
        {
          key: 'created_at',
          label: this.$t('labels.created_at'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'updated_at',
          label: this.$t('labels.updated_at'),
          class: 'text-center',
          sortable: true
        },
        { key: 'actions', label: this.$t('labels.actions'), class: 'nowrap' }
      ],
      actions: {
        destroy: this.$t('labels.backend.redirects.actions.destroy'),
        enable: this.$t('labels.backend.redirects.actions.enable'),
        disable: this.$t('labels.backend.redirects.actions.disable')
      },
      importFile: null
    }
  },
  methods: {
    dataLoadProvider(ctx) {
      return this.$refs.datasource.loadData(ctx.sortBy, ctx.sortDesc)
    },
    onContextChanged() {
      return this.$refs.datatable.refresh()
    },
    onDelete(id) {
      this.$refs.datasource.deleteRow({ redirect: id })
    },
    onActiveToggle(id) {
      axios
        .post(this.$app.route('backend.redirects.active', { redirect: id }))
        .catch(error => {
          this.$app.error(error)
        })
    },
    async onFileImport() {
      let formData = new FormData()
      formData.append('import', this.importFile)

      try {
        let { data } = await axios.post(
          this.$app.route('backend.redirects.import'),
          formData
        )
        this.$refs.datatable.refresh()
        this.$app.noty[data.status](data.message)
      } catch (e) {
        this.$app.error(e)
      }
    }
  }
}
</script>
