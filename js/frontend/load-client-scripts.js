import '../fontawesome'
import 'bootstrap'
//import 'slick-carousel'
import intlTelInput from 'intl-tel-input'
//import 'pwstrength-bootstrap/dist/pwstrength-bootstrap'
import swal from 'sweetalert2'
import Turbolinks from 'turbolinks'
import 'cookieconsent'
import alertify from 'alertify.js'
import 'webui-popover'
import initListings from './catalog'
import './jquery.awesomeFormSerializer'

// Settings
let jsonSettings = document.querySelector(
  '[data-settings-selector="settings-json"]'
)
let toggles = {
  toggle: function($element) {
    $element.toggle()
  },
  hide: function($element) {
    $element.hide()
  },
  show: function($element) {
    $element.show()
  }
}

window.locale = $('html').attr('lang')
window.swal = swal
window.settings = jsonSettings ? JSON.parse(jsonSettings.textContent) : {}

function main() {
  //console.log('main')
  $('.pop').webuiPopover()

  alertify.reset()

  $('[data-toggle="tooltip"]').tooltip()

  $('a[id^="captcha-gen-"]').each(function() {
    $(this).click(function(e) {
      e.preventDefault()
      let f = e.target.id.replace('captcha-gen-', '')
      axios
        .post('/img/captcha', {
          f: f
        })
        .then(res => {
          let img_el = document.getElementById('captcha-img-' + f)
          $(img_el)
            .fadeOut(100, function() {
              $(img_el).html(res.data)
            })
            .fadeIn(500)
        })
      return false
    })
  })

  if (window.location.pathname.startsWith('/catalog')) {
    if (typeof xhr === 'undefined') {
      let xhr = null
    }
    initListings
  }
}
if (window.location.pathname.startsWith('/account/listings/create')) {
  let date = new Date().getFullYear(),
    selectYear = document.getElementById('build_year')
  for (let i = 0; i <= 50; i++) {
    let opt = document.createElement('option')
    opt.value = date - i
    opt.innerHTML = date - i
    selectYear.appendChild(opt)
  }
  let month = 1,
    selectMonth = document.getElementById('build_month')
  for (let i = 0; i <= 11; i++) {
    let opt = document.createElement('option')
    opt.value = month + i
    opt.innerHTML = month + i
    selectMonth.appendChild(opt)
  }
}
export default createApp => {
  Turbolinks.start()

  // Cookie Consent
  window.addEventListener('load', () => {
    cookieconsent.initialise({
      palette: {
        popup: {
          background: '#fff',
          text: '#777'
        },
        button: {
          background: '#3097d1',
          text: '#ffffff'
        }
      },
      showLink: false,
      theme: 'edgeless',
      content: {
        message: window.settings.cookieconsent.message,
        dismiss: window.settings.cookieconsent.dismiss
      }
    })
  })

  $(document).on('click', '[data-toggle-target]', function(e) {
    e.preventDefault()
    handleToggles($(this).data('toggle-target'))
  })

  function handleToggles(input) {
    if (!$.isArray(input)) {
      return handleToggles(input.split(' '))
    }

    $.each(input, function(i, item) {
      item = item.split(':')

      if (item.length === 1) {
        item.unshift('toggle')
      }

      toggles[item[0]].call(null, getElement(item[1]))
    })
  }

  function getElement(toggleName) {
    return $('[data-toggle-name~="' + toggleName + '"]')
  }

  $(document).on('turbolinks:render', function() {
    main()
  })

  document.addEventListener('turbolinks:load', () => {
    // Vue Mounting
    if (document.getElementById('app') !== null) {
      const { app } = createApp()
      app.$mount('#app')
    }

    main()

    if ($('div#review-rating').length) {
      $('div#review-rating').raty({ path: '/images/' })
    }

    // Tel Input
    document.querySelectorAll('input[type="tel"]').forEach(input => {
      intlTelInput(input)
    })

    // Bind all bootstrap tooltips
    $('[data-toggle="tooltip"]').tooltip()

    // Bind all bootstrap popovers
    $('[data-toggle="popover"]').popover()

    // Bind all swal confirm buttons
    $('[data-toggle="confirm"]').click(e => {
      e.preventDefault()

      window
        .swal({
          title: $(e.currentTarget).attr('data-trans-title'),
          type: 'warning',
          showCancelButton: true,
          cancelButtonText: $(e.currentTarget).attr('data-trans-button-cancel'),
          confirmButtonColor: '#dd4b39',
          confirmButtonText: $(e.currentTarget).attr(
            'data-trans-button-confirm'
          )
        })
        .then(result => {
          if (result.value) {
            $(e.target)
              .closest('form')
              .submit()
          }
        })
    })

    // Bootstrap tabs nav specific hash manager
    let hash = document.location.hash
    let tabanchor = $('.nav-tabs a:first')
    if (hash) {
      tabanchor = $(`.nav-tabs a[href="${hash}"]`)
    }
    tabanchor.tab('show')
    $('a[data-toggle="tab"]').on('show.bs.tab', e => {
      window.location.hash = e.target.hash
    })
  })
  // Bind all carousels
  //$('.carousel').carousel()

  // Slick
  //$('[data-toggle="slider"]')
  //  .not('.slick-initialized')
  //  .slick({
  //    dots: true,
  //    infinite: true,
  //    speed: 300,
  //    slidesToShow: 3,
  //    slidesToScroll: 3,
  //    responsive: [
  //      {
  //        breakpoint: 768,
  //        settings: {
  //          slidesToShow: 2
  //        }
  //      },
  //      {
  //        breakpoint: 576,
  //        settings: {
  //          slidesToShow: 1
  //        }
  //      }
  //    ]
  //  })

  //$('[data-toggle="password-strength-meter"]').pwstrength({
  //  ui: {
  //    bootstrap4: true
  //  }
  //})
}
