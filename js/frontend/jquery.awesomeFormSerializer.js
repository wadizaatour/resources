;(function($) {
  // Pass an object of key/vals to override
  $.fn.awesomeFormSerializer = function(overrides) {
    // Get the parameters as an array
    let newParams = this.serializeArray()

    for (let key in overrides) {
      let newVal = overrides[key]
      // Find and replace `content` if there
      for (index = 0; index < newParams.length; ++index) {
        if (newParams[index].name == key) {
          newParams[index].value = newVal
          break
        }
      }

      // Add it if it wasn't there
      if (index >= newParams.length) {
        newParams.push({
          name: key,
          value: newVal
        })
      }
    }

    // Convert to URL-encoded string
    return $.param(newParams)
  }
})(jQuery)
