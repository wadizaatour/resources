import swal from 'sweetalert2'
import Flatpickr from 'flatpickr'
import FlatpickrLocaleNl from 'flatpickr/dist/l10n/nl'

window.swal = swal
window.Flatpickr = Flatpickr
window.FlatpickrLocaleNl = FlatpickrLocaleNl

// JS Settings App
let jsonSettings = document.querySelector(
  '[data-settings-selector="settings-json"]'
)
window.settings = jsonSettings ? JSON.parse(jsonSettings.textContent) : {}
