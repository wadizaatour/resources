function loadPage(url) {
  if (history.pushState) {
    history.pushState(null, null, url)
  }

  if (xhr && xhr.readyState < 4) {
    xhr.abort()
  }

  $('#indicator').show()
  let start_time = new Date()

  xhr = $.ajax({
    url: url,
    success: function(data) {
      $('#clear-filters').html(
        $(data)
          .find('#clear-filters')
          .html()
      )
      $('#category_filter').html(
        $(data)
          .find('#category_filter')
          .html()
      )
      $('#listing_results').html(
        $(data)
          .find('#listing_results')
          .html()
      )
      initListings()
      //setUpScroll()
    },
    complete: function(data) {
      $('#indicator').hide()
      let request_time = new Date().getTime() - start_time
      $('#request_time').html(request_time)
    }
  })
}
function initListings() {
  // on click categories submit new URL
  let mp_index = route('frontend.catalog').template

  $('.category-link').click(function(e) {
    e.preventDefault()
    let url =
      mp_index +
      '?' +
      $('.auto_submit_item').awesomeFormSerializer({
        category: $(this).data('category')
      })
    loadPage(url)
  })

  // on change search bar submit new URL
  $('#top-search').on('submit', function(e) {
    e.preventDefault()
    $(".auto_submit_item [name='q']").val($("#top-search [name='q']").val())
    //$(".auto_submit_item [name='location']").val($("#top-search [name='location']").val())
    loadPage(mp_index + '?' + $('.auto_submit_item').serialize())
    //console.log($("#top-search").serialize())
  })
  $("#top-search [name='q']").on(
    'input',
    $.debounce(250, function(e) {
      e.preventDefault()
      $('#top-search').submit()
    })
  )

  // on change form submit new URL
  $('.auto_submit_item').on('submit change', function(e) {
    e.preventDefault()
    loadPage(mp_index + '?' + $('.auto_submit_item').serialize())
  })

  // on change sort submit new URL
  $('#sort').change(function(e) {
    e.preventDefault()
    $(".auto_submit_item [name='sort']").val($('#sort').val())
    loadPage(mp_index + '?' + $('.auto_submit_item').serialize())
  })

  $('.list-row .image-wrapper')
    .width('100%')
    .height($('.list-row .list-width').width())
    .css('line-height', $('.list-row .list-width').width() + 'px')
}
