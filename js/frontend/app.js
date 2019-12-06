import loadClientScripts from './load-client-scripts'

// Vue & axios
import Vue from 'vue'
import { axios } from '../axios-config'
import Multiselect from 'vue-multiselect'

import 'babel-polyfill'
import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue.esm'
import { createLocales } from '../vue-i18n-config'
import Noty from 'noty'

import AccountApkDate from './components/Account/ApkDate'
import AccountCar from './components/Account/Car'
import AccountCars from './components/Account/Cars'
import Multiselectdropdown from './components/Account/Multiselectdropdown'
import AccountCategories from './components/Account/Categories'
import AccountPartMMT from './components/Account/PartMmt'
import AccountParts from './components/Account/Parts'
import AccountRequests from './components/Account/Requests'
import CompanyDetails from './components/CompanyDetails'
import FinalComponent from './components/FinalComponent'
import ImageAvatar from './components/ImageAvatar'
import ImageUpload from './components/ImageUpload'
import ImageSlider from './components/ImageSlider'
import MakeModel from './components/MakeModel'
import Message from './components/Message'
import PartsDashboard from './components/PartsDashboard'
import PartsOverview from './components/PartsOverview'
import RequestCar from './components/Request/Car'
import RequestContactAccount from './components/Request/ContactAccount'
import RequestMakes from './components/Request/MakesDropdown'
import RequestPart from './components/Request/Part'
import RequestParts from './components/Request/Parts'
import SearchCompaniesTable from './components/SearchCompaniesTable'
import TermsAndConditions from './components/TermsAndConditions'
//import MyRequest from './components/MyRequest'
//import SearchPartsTable from './components/SearchPartsTable'

window.axios = axios

// Bootstrap Vue
Vue.use(BootstrapVue)
Vue.component('multiselect', Multiselect)
Vue.component('account-apk-date', AccountApkDate)
Vue.component('account-car', AccountCar)
Vue.component('account-cars', AccountCars)
Vue.component('account-categories', AccountCategories)
Vue.component('account-part-mmt', AccountPartMMT)
Vue.component('account-parts', AccountParts)
Vue.component('account-requests', AccountRequests)
Vue.component('company-details', CompanyDetails)
Vue.component('final-component', FinalComponent)
Vue.component('image-upload', ImageUpload)
Vue.component('image-avatar', ImageAvatar)
Vue.component('image-slider', ImageSlider)
Vue.component('make-model', MakeModel)
Vue.component('message', Message)
Vue.component('multi-select', Multiselectdropdown)
Vue.component('part-dashboard', PartsDashboard)
Vue.component('part-overview', PartsOverview)
Vue.component('request-car', RequestCar)
Vue.component('request-contact-account', RequestContactAccount)
Vue.component('request-makes', RequestMakes)
Vue.component('request-part', RequestPart)
Vue.component('request-parts', RequestParts)
Vue.component('search-companies', SearchCompaniesTable)
Vue.component('terms-condition', TermsAndConditions)
//Vue.component('my-request', MyRequest)
//Vue.component('search-parts', SearchPartsTable)

export function createApp() {
  const i18n = createLocales(window.locale)

  // Server-side settings
  Vue.prototype.$app = window.settings

  // Server-side named routes function router
  Vue.prototype.$app.route = window.route

  // Notifications
  let noty = (type, text) => {
    new Noty({
      layout: 'topRight',
      theme: 'relax',
      timeout: 3000,
      text,
      type
    }).show()
  }

  Vue.prototype.$app.noty = {
    alert: text => {
      noty('alert', text)
    },
    success: text => {
      noty('success', text)
    },
    error: text => {
      noty('error', text)
    },
    warning: text => {
      noty('warning', text)
    },
    info: text => {
      noty('info', text)
    }
  }

  Vue.prototype.$app.error = error => {
    if (error instanceof String) {
      noty('error', error)
      return
    }

    if (error.response) {
      // Not allowed error
      if (error.response.status === 403) {
        noty('error', i18n.t('exceptions.unauthorized'))
        return
      }

      // Domain error
      if (error.response.data.error !== undefined) {
        noty('error', error.response.data.message)
        return
      }
    }

    // Generic error
    noty('error', i18n.t('exceptions.general'))
  }

  const app = new Vue({
    i18n
  })

  return { app }
}

// Load Client Scripts
loadClientScripts(createApp)
