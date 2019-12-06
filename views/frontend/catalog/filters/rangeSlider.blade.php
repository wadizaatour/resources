@if(request()->get($facet->field.'_min', $facet->options[0]) && request()->get($facet->field.'_max', $facet->options[1]))
    <style>
      #{{ $facet->field }}_slider .noUi-connect {
        background: #eee;
      }
    </style>

    <div class="c">
      <h6 class="mt-0 text-capitalize">{{ _l($facet->name) }}</h6>
      <div class="row">
        <div class="col-sm-12">
          <div style="height:10px;display:block" class="mt-2 mb-2 pl-2 pr-2">
            <div id="{{ $facet->field}}_slider"></div>
          </div>
        </div>
        <div class="col-sm-6 text-left small">
          {{ __('Min:') }} <span class="{{ $facet->field }}_min">{{ $facet->options[0] }}</span>
          <input type="hidden" id="{{ $facet->field }}_min" name="{{ $facet->field }}_min" value="{{ request()->get($facet->field.'_min') }}" />
        </div>
        <div class="col-sm-6 text-right small">
          {{ __('Max:') }} <span class="{{ $facet->field }}_max">{{ $facet->options[1] }}</span>
          <input type="hidden" id="{{ $facet->field }}_max" name="{{ $facet->field }}_max" value="{{ request()->get($facet->field.'_max') }}" />
        </div>
      </div>
    </div>
    <hr />

@push('scripts')
    <script>
      let start = getParameterByName('{{ $facet->field }}' + '_min');
      let end = getParameterByName('{{ $facet->field }}' + '_max');

      if (start == null) {
        start = {{ request()->get($facet->field.'_min', $facet->options[0]) }};
      }
      if(end == null) {
        end = {{ request()->get($facet->field.'_max', $facet->options[1]) }};
      }
      console.log(start, end);

      $('#{{ $facet->field }}_slider').slider({
        range: true,
        min: {{ $facet->options[0] }},
        max: {{ $facet->options[1] }},
        values: [ start, end ],
        create: function(event, ui) {
          let values =$(this).slider('values');
          $('#{{ $facet->field }}_label').text('$' + values[0] + '-' + '$' + values[1]); {{-- meh. $ signs by default for currency, inside range slider.... todo --}}
        },
        slide: function( event, ui ) {
          $('#{{ $facet->field }}_min').val(ui.values[0].toFixed(2));
          $('#{{ $facet->field }}_max').val(ui.values[1].toFixed(2));
          $('#{{ $facet->field }}_label').text('$' + ui.values[0] + '-' + '$' + ui.values[1]); {{-- todo too --}}
        },
        stop: function( event, ui ) {
          console.log("*******************");
          console.log(ui.values);
          $('#{{ $facet->field }}_min').val(ui.values[0].toFixed(2));
          $('#{{ $facet->field }}_max').val(ui.values[1].toFixed(2));

          loadPage('{{ route(Settings::get('marketplace_index')) }}?' + $('.auto_submit_item').serialize());
        }
      });

      function getParameterByName(name, url) {
        if (!url) url = window.location.href
        name = name.replace(/[\[\]]/g, '\\$&')
        let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
          results = regex.exec(url)
        if (!results) return null
        if (!results[2]) return ''
        return decodeURIComponent(results[2].replace(/\+/g, ' '))
      }
    </script>
@endpush
@endif
