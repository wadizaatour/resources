<template>
  <div class="row" data-no-turbolinks="true">
    <div class="col-lg-3 mt-lg-5">
      <div class="card bord-rad-5">
        <div class="card-header purple-background top-borders">
          <h4
            class="title-align font-montserrat text-light white-text-color mt-3 position-filter"
          >
            Filter
          </h4>
        </div>
        <div class="card-body">
          <div class="d-flex flex-column">
            <div
              class="gray-text-color font-weight-bold font-montserrat-regular mb-2"
            >
              <h5>{{ $t('labels.frontend.filters.companyName') }}</h5>
            </div>
            <div class="form-group">
              <b-form-group>
                <b-input-group>
                  <b-form-input v-model="filter" :placeholder="search">
                  </b-form-input>
                  <b-input-group>
                    <b-button
                      class="button-search-position mt-2 font-montserrat-regular"
                      :disabled="!filter"
                      @click="filter = ''"
                    >
                      {{ $t('labels.frontend.listings.clear') }}
                    </b-button>
                  </b-input-group>
                </b-input-group>
              </b-form-group>
            </div>
            <div
              class="gray-text-color font-weight-bold font-montserrat-regular mt-2 mb-2"
            >
              <h5>{{ $t('labels.frontend.filters.companyType') }}</h5>
            </div>
            <div class="form-check form-check-inline mt-1 mb-1">
              <input
                type="checkbox"
                value="disassembly"
                v-model="type"
                id="disassembly"
                @change="onCheck(type)"
              />
              <label
                class="form-check-label ml-2 gray-text-color font-weight-bold font-montserrat-thin"
                for="garage"
              >
                {{ $t('labels.frontend.filters.dismantling') }}
              </label>
            </div>
            <div class="form-check form-check-inline mt-1 mb-1">
              <input
                type="checkbox"
                value="garage"
                v-model="type"
                id="garage"
                @change="onCheck(type)"
              />
              <label
                class="form-check-label ml-2 gray-text-color font-weight-bold font-montserrat-thin"
                for="disassembly"
              >
                {{ $t('labels.frontend.filters.garage') }}
              </label>
            </div>
            <div class="form-check form-check-inline mt-1 mb-1">
              <input
                type="checkbox"
                value="revision"
                v-model="type"
                id="revision"
                @change="onCheck(type)"
              />
              <label
                class="form-check-label ml-2 gray-text-color font-weight-bold font-montserrat-thin"
                for="revision"
              >
                {{ $t('labels.frontend.filters.revision') }}
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5 col-lg-9">
      <div class="card-header purple-background bord-top-lr-5">
        <b-row class="mt-2">
          <b-col>
            <h4 class="title-align font-montserrat text-light white-text-color">
              {{ items.count }} {{ $t('labels.frontend.companies.results') }}
            </h4>
          </b-col>
          <b-form-group label-cols-sm="3" class="mb-2 w-25 mr-4">
            <b-form-select v-model="perPage" :options="pageOptions">
            </b-form-select>
          </b-form-group>
        </b-row>
      </div>
      <div class="card-body white-bg">
        <div class="grid-x grid-padding-x m-2 border-0">
          <div class="border-0 mb-2">
            <b-table
              striped
              hover
              thead-class="hidden_header"
              :items="items.data"
              :fields="fields"
              :filter="filter"
              :current-page="currentPage"
              :per-page="perPage"
              :outlined="outlined"
              responsive
              @filtered="onFiltered"
              @filterIncludedFields="filterOn"
            >
              <template v-slot:cell(name)="data">
                <h5 class="title-align font-montserrat" style="color: #5b2557">
                  <a :href="data.item.url" :title="data.item.name">
                    {{ data.item.name }}
                  </a>
                </h5>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-2">
                    <p
                      class="gray-text-color font-montserrat-thin font-weight-bold"
                    >
                      {{ data.item.street }}
                      {{ data.item.building_nr }} {{ data.item.postal }}
                      {{ data.item.city }} {{ data.item.state }}
                    </p>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-4 ml-lg-2 col-xl-3">
                    <p
                      class="font-montserrat-thin blue-light-color font-weight-bold"
                    >
                      T. {{ data.item.phone }}<br />
                      <a
                        :href="data.item.website"
                        target="_blank"
                        :title="data.item.name"
                        class="gray-text-color"
                      >
                        {{ $t('labels.frontend.companies.goTo') }}
                      </a>
                    </p>
                  </div>
                  <div class="col-lg-3 col-xl-3 col-md-3 mr-xl-4 ml-md-5">
                    <a
                      class="font-montserrat-regular"
                      :href="
                        $app.route('frontend.companies.show', data.item.slug)
                      "
                      style="color: #74aee0"
                    >
                      {{ $t('labels.frontend.companies.moreInfo') }} »
                    </a>
                  </div>
                </div>
                <a
                  class="mb-3 blue-light-bg btn bord-rad-5 white-text-color font-montserrat-regular"
                  :href="$app.route('frontend.catalog.company', data.item.slug)"
                  title="Stock"
                >
                  {{ $t('labels.frontend.companies.stock') }}
                </a>
                <br />
              </template>
            </b-table>
            <b-row>
              <b-col md="6" class="my-1">
                <b-pagination
                  v-model="currentPage"
                  :total-rows="totalRows"
                  :per-page="perPage"
                  class="my-0"
                ></b-pagination>
              </b-col>
            </b-row>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script src="../assets/js/search-company.js"></script>
<style src="../assets/css/search-company.css"></style>
