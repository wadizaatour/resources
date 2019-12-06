<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">
          {{ $t('labels.backend.posts.titles.index') }}
        </h3>
        <div class="card-options" v-if="this.$app.user.can('create posts')">
          <b-button to="/posts/create" variant="success" size="sm">
            <i class="fe fe-plus-circle"></i> {{ $t('buttons.posts.create') }}
          </b-button>
        </div>
      </template>
      <b-datatable
        ref="datasource"
        @context-changed="onContextChanged"
        search-route="backend.posts.search"
        delete-route="backend.posts.destroy"
        action-route="backend.posts.batch_action"
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
          sort-by="posts.created_at"
          :sort-desc="true"
        >
          <template v-slot:cell(HEAD_checkbox)="data"></template>
          <template v-slot:cell(checkbox)="row">
            <b-form-checkbox
              :value="row.item.id"
              v-model="selected"
            ></b-form-checkbox>
          </template>
          <template v-slot:cell(image)="row">
            <template v-if="row.item.featured_image_url">
              <router-link
                v-if="row.item.can_edit"
                :to="`/posts/${row.item.id}/edit`"
              >
                <b-img-style
                  :src="row.item.featured_image_url"
                  :width="120"
                  :height="80"
                  rounded
                ></b-img-style>
              </router-link>
              <b-img-style
                v-else
                :src="row.item.featured_image_url"
                :width="120"
                :height="80"
                rounded
              ></b-img-style>
            </template>
          </template>
          <template v-slot:cell(title)="row">
            <router-link
              v-if="row.item.can_edit"
              :to="`/posts/${row.item.id}/edit`"
              v-text="row.value"
            ></router-link>
            <span v-else v-text="row.value"></span>
          </template>
          <template v-slot:cell(status)="row">
            <b-badge :variant="row.item.state">{{
              $t(row.item.status_label)
            }}</b-badge>
          </template>
          <template v-slot:cell(pinned)="row">
            <c-switch
              v-if="row.item.can_edit"
              :checked="row.value"
              @change="onPinToggle(row.item.id)"
            ></c-switch>
          </template>
          <template v-slot:cell(promoted)="row">
            <c-switch
              v-if="row.item.can_edit"
              :checked="row.value"
              @change="onPromoteToggle(row.item.id)"
            ></c-switch>
          </template>
          <template v-slot:cell(owner)="row">
            <span v-if="row.item.owner">{{ row.item.owner.name }}</span>
            <span v-else>{{ $t('labels.anonymous') }}</span>
          </template>
          <template v-slot:cell(posts.created_at)="row">
            {{ row.item.created_at }}
          </template>
          <template v-slot:cell(posts.updated_at)="row">
            {{ row.item.updated_at }}
          </template>
          <template v-slot:cell(actions)="row">
            <b-button
              size="sm"
              variant="success"
              :href="$app.route('backend.posts.show', { post: row.item.slug })"
              target="_blank"
              v-b-tooltip.hover
              :title="$t('buttons.preview')"
              class="mr-1"
            >
              <i class="fe fe-eye"></i>
            </b-button>
            <b-button
              v-if="row.item.can_edit"
              size="sm"
              variant="primary"
              :to="`/posts/${row.item.id}/edit`"
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
  name: 'PostList',
  data() {
    return {
      selected: [],
      fields: [
        { key: 'checkbox' },
        { key: 'image', label: this.$t('validation.attributes.image') },
        {
          key: 'title',
          label: this.$t('validation.attributes.title'),
          sortable: true
        },
        {
          key: 'status',
          label: this.$t('validation.attributes.status'),
          class: 'text-center'
        },
        {
          key: 'pinned',
          label: this.$t('validation.attributes.pinned'),
          class: 'text-center'
        },
        {
          key: 'promoted',
          label: this.$t('validation.attributes.promoted'),
          class: 'text-center'
        },
        { key: 'owner', label: this.$t('labels.author'), sortable: true },
        {
          key: 'posts.created_at',
          label: this.$t('labels.created_at'),
          class: 'text-center',
          sortable: true
        },
        {
          key: 'posts.updated_at',
          label: this.$t('labels.updated_at'),
          class: 'text-center',
          sortable: true
        },
        { key: 'actions', label: this.$t('labels.actions'), class: 'nowrap' }
      ],
      actions: {
        destroy: this.$t('labels.backend.posts.actions.destroy'),
        publish: this.$t('labels.backend.posts.actions.publish'),
        pin: this.$t('labels.backend.posts.actions.pin'),
        promote: this.$t('labels.backend.posts.actions.promote')
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
      this.$refs.datasource.deleteRow({ post: id })
    },
    onPinToggle(id) {
      axios
        .post(this.$app.route('backend.posts.pinned', { post: id }))
        .catch(error => {
          this.$app.error(error)
        })
    },
    onPromoteToggle(id) {
      axios
        .post(this.$app.route('backend.posts.promoted', { post: id }))
        .catch(error => {
          this.$app.error(error)
        })
    }
  }
}
</script>
