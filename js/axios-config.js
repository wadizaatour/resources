import axios from 'axios'

/**
 * Axios config
 */
//axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
let token = document.head.querySelector('meta[name="token"]')
if (token) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
}

export { axios }
