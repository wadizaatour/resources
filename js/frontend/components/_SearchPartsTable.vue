<template>
  <div class="grid-x grid-padding-x m-4" style="border:none">
    <div style="border:none">
      <v-server-table
        url="/companies/search"
        :columns="columns"
        :options="options"
        class="table-header"
      >
        <div slot="company_name" slot-scope="props">
          <h5 class="title-align font-montserrat" style="color: #5b2557">
            {{ props.row.name }} (demontage)
          </h5>
          <div class="row">
            <div class="col">
              <p class="gray-text-color font-montserrat-thin font-weight-bold">
                {{ props.row.address.street }}
                {{ props.row.address.building_nr }},
                {{ props.row.address.postal }}, {{ props.row.address.city }},
                {{ props.row.address.state }},
                {{ props.row.address.country }}
              </p>
            </div>
            <div class="col ml-lg-5">
              <p
                class="font-montserrat-thin font-weight-bold"
                style="color: #74aee0"
              >
                T. {{ props.row.address.phone }}<br />
                <a
                  :href="props.row.website"
                  target="_blank"
                  :title="props.row.name"
                >
                  Ga naar website
                </a>
              </p>
            </div>
            <div class="col ml-lg-5">
              <a class="font-montserrat-regular" style="color: #74aee0">
                Meer informatie »
              </a>
            </div>
          </div>
          <div>
            <label class="gray-text-color font-montserrat-thin">
              Gespecialiseerd in
            </label>
          </div>
          <div>
            <p class="gray-text-color font-montserrat-thin font-weight-bold">
              {{ props.row.main_brands }}
            </p>
          </div>
          <div>
            <img
              src="../../../../public/images/homepage/Onderdelen voorraad.png"
              alt="button"
              title="submit"
            />
          </div>
          <br />
        </div>
      </v-server-table>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
import { ServerTable } from 'vue-tables-2'

Vue.use(ServerTable, {}, false, 'bootstrap4', 'default')

export default {
  name: 'SearchCompaniesTable',
  props: {
    companyName: {
      type: String,
      required: false,
      default: () => ''
    }
  },
  data() {
    return {
      columns: ['company_name'],
      options: {
        headings: {
          remote_id: 'Document'
        },
        highlightMatches: true,
        pagination: {
          chunk: 10,
          edge: true,
          dropdown: false,
          nav: 'fixed'
        },
        perPage: 10,
        perPageValues: [10],
        preserveState: true,
        sortable: ['company_name'],
        filterable: ['company_name'],
        skin: 'table-bordered table-hover'
      },
      page: 1
    }
  }
}
</script>
<style lang="scss" scoped>
.table-header /deep/ {
  thead {
    border: none;
  }
  th {
    border: none;
  }
  td {
    border: none;
  }
}
</style>
