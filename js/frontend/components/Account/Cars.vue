<template slot-scope="row">
  <div>
    <b-form-group label-cols-sm="1" class="mt-2 mr-2">
      <b-input-group>
        <b-form-input
          class="ml-5"
          v-model="filter"
          placeholder="Vul je zoekterm in"
        >
        </b-form-input>
        <b-input-group-append>
          <button
            :disabled="!filter"
            class="blue-light-bg white-text-color btn-size-color ml-2 font-montserrat-regular"
            @click="filter = ''"
          >
            {{ $t('labels.frontend.listings.search') }}
          </button>
        </b-input-group-append>
      </b-input-group>
    </b-form-group>
    <!--
    <input type="checkbox" :value="items.id" v-model="selected" />
    -->
    <!-- eslint-disable -->
    <b-table
      striped
      hover
      :items="items"
      :fields="fields"
      :filter="filter"
      selectable
      :select-mode="selectMode"
      selected-variant="success"
      @row-selected="rowSelected"
      :current-page="currentPage"
      :per-page="perPage"
      :outlined="outlined"
      responsive
      autoWidth
      @filtered="onFiltered"
    >
      <!-- eslint-disable -->
      <template slot="selected" slot-scope="{ rowSelected }">
        <input type="checkbox" :value="items.id" v-model="selected" />
        <span v-if="rowSelected">✔</span>
      </template>
      <template v-slot:cell(Actions)="row">
        <b-button
          size="sm"
          :to="'/account/cars/' + row.item.id"
          pill variant="outline-primary"
        >
          <i class="fa fa-info-circle" aria-hidden="true"></i>
        </b-button>
        <b-button
          size="sm"
          @click="fireDelete(row.item, row.index)"
          class="mr-1"
          pill variant="outline-danger"
        >
          <i class="fa fa-trash" aria-hidden="true">
          </i>
        </b-button>
      </template>
    </b-table>
    <b-row>
      <b-col md="10" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          class="my-0"
        ></b-pagination>
      </b-col>
      <b-col md="2" class="my-1 mb-2">
        <b-form-select v-model="perPage" :options="pageOptions"></b-form-select>
      </b-col>
    </b-row>
  </div>
</template>
<script src="../../assets/js/cars.js"></script>
<style>
#__BVID__9 {
  border: 0 !important;
}
</style>
