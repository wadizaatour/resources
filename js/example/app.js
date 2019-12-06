import { axios } from '../axios-config'
import BootstrapVue from 'bootstrap-vue'
import Flatpickr from 'flatpickr'
import FlatpickrLocaleNl from 'flatpickr/dist/l10n/nl'
import Noty from 'noty'
import './polyfill'
//import cssVars from 'css-vars-ponyfill'
import Popper from 'popper.js/dist/umd/popper'
import swal from 'sweetalert2'
import Vue from 'vue'

import App from './App.vue'

import { createLocales } from '../vue-i18n-config'
import { createRouter } from '../example/router'
import { createStore } from '../example/store'

// JS Settings App
let jsonSettings = document.querySelector(
    '[data-settings-selector="settings-json"]'
)
window.axios = axios
window.Flatpickr = Flatpickr
window.FlatpickrLocaleNl = FlatpickrLocaleNl
window.Popper = Popper
window.settings = jsonSettings ? JSON.parse(jsonSettings.textContent) : {}
window.swal = swal

Vue.use(BootstrapVue)

export function createApp() {
  // Init router and store
  const i18n = createLocales(window.settings.locale)
  const router = createRouter(window.settings.basePath, i18n)
  const store = createStore(window.route)

  // Server-side settings
  Vue.prototype.$app = window.settings

  // Server-side named routes function router
  Vue.prototype.$app.route = window.route

  // Client-side permissions
  if (Vue.prototype.$app.user) {
    Vue.prototype.$app.user.can = permission => {
      if (Vue.prototype.$app.user.id === 1) {
        return true
      }
      return Vue.prototype.$app.permissions.includes(permission)
    }
  }

  // Object to FormData converter
  let objectToFormData = (obj, form, namespace) => {
    let fd = form || new FormData()

    for (let property in obj) {
      if (!obj.hasOwnProperty(property)) {
        continue
      }

      let formKey = namespace ? `${namespace}[${property}]` : property

      if (obj[property] === null) {
        fd.append(formKey, '')
        continue
      }
      if (typeof obj[property] === 'boolean') {
        fd.append(formKey, obj[property] ? '1' : '0')
        continue
      }
      if (obj[property] instanceof Date) {
        fd.append(formKey, obj[property].toISOString())
        continue
      }
      if (typeof obj[property] === 'object' &&
        !(obj[property] instanceof File)
      ) {
        objectToFormData(obj[property], fd, formKey)
        continue
      }
      fd.append(formKey, obj[property])
    }

    return fd
  }

  Vue.prototype.$app.objectToFormData = objectToFormData

  // Notifications
  let noty = (type, text) => {
    new Noty({
      layout: 'topRight',
      theme: 'bootstrap-v4',
      timeout: 2000,
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

  router.beforeEach((to, from, next) => {
    document.title = `${to.meta.label} - ${window.settings.appName}`
    next()
  })

  const app = new Vue({
    router,
    store,
    i18n,
    render: h => h(App)
  })

  return { app, router, store }
}

// Init App
if (document.getElementById('app') !== null) {
  const { app } = createApp()
  app.$mount('#app')
}
