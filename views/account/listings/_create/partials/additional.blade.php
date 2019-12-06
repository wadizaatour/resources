    <div class="card mb-4">
      <h6 class="card-header bg-white">{{ __('Additional Information') }}</h6>
      <div class="card-body">
        <div class="render-form"></div>
      </div>
    </div>

    <script>
      let formData = {!! json_encode($listings_form) !!};
      document.addEventListener('turbolinks:load', function() {
          let formRenderOpts = {
          dataType: 'json', formData: {!! json_encode($listings_form) !!}
        };
        $('.render-form').formRender(formRenderOpts);
      });
    </script>
