<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">
          {{ $t('labels.backend.listings.titles.index') }}
        </h3>
        <div class="card-options" v-if="this.$app.user.can('disable listings')">
          <b-button to="/listings/create" variant="success" size="sm">
            <i class="fe fe-plus-circle"></i>
            {{ $t('buttons.create') }}
          </b-button>
        </div>
      </template>
      <b-datatable
        ref="datasource"
        @context-changed="onContextChanged"
        search-route="backend.listings.search"
        delete-route="backend.listings.destroy"
        action-route="backend.listings.batch_action"
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
          <template v-slot:cell(user)="row">
            <span v-text="row.value.id"></span>
          </template>
          <template v-slot:cell(title)="row">
            <router-link
              v-if="row.item.can_edit"
              :to="`/listings/${row.item.id}/edit`"
              v-text="row.value"
            ></router-link>
            <span v-else v-text="row.value"></span>
          </template>
          <template v-slot:cell(actions)="row">
            <b-button
              v-if="row.item.can_edit"
              size="sm"
              variant="primary"
              :to="`/listings/${row.item.id}/edit`"
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
export default {
  name: 'Listings',
  data() {
    return {
      selected: [],
      fields: [
        { key: 'checkbox' },
        {
          key: 'user',
          label: this.$t('validation.attributes.user'),
          sortable: true
        },
        {
          key: 'title',
          label: this.$t('validation.attributes.title'),
          sortable: true
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
        destroy: this.$t('labels.backend.listings.actions.destroy')
      }
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
      this.$refs.datasource.deleteRow({ listing: id })
    }
  }
}
</script>
