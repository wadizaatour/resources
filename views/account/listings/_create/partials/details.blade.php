    <div class="card mb-4 border-0 bord-rad-5 gray-background">
      <h5 class="card-header gray-background border-0 bord-rad-5 font-montserrat gray-text-color mt-2">{{ __('Listing details') }}</h5>
      <hr>
      <div class="card-body">
        <div class="form-group">
          <label>{{ __('Title') }}</label>
          <input type="text" name="title" class="form-control bord-rad-5 border-0" />
        </div>
        <div class="form-group">
          <label>{{ __('Description') }}</label>
          <div id="description" class="font-montserrat-thin font-weight-bolder" style="height:200px">
            {!! $listing->description !!}
          </div>
          <input type="hidden" name="description" id="description" class="form-control" />
        </div>
        <div class="form-group">
          <label>{{ __('Tags') }}</label>
          <input type="text" name="tags_string" class="tags bord-rad-5 border-0 mt-2 ml-2" />
        </div>
      </div>
    </div>

    <div class="card mb-4 border-0 bord-rad-5 gray-background">
      <h5 class="card-header gray-background border-0 bord-rad-5 font-montserrat gray-text-color mt-2">{{ __('Location') }}</h5>
      <hr>
      <div class="card-body">
        <div class="form-group">
          <input type="text" name="location" id="location" class="form-control bord-rad-5 border-0" />
          <input type="hidden" name="lat" id="lat" class="form-control" />
          <input type="hidden" name="lng" id="lng" class="form-control" />
{{--
          <div id="create_map" style="width: 100%; height: 400px;"></div>
--}}
          <div class="row mt-4">
            <div class="col-6">
              <div class="form-group">
                <label>{{ __('City') }}</label>
                <input type="text" name="city" id="city" class="form-control bord-rad-5 border-0" />
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="country">{{ __('Country') }}</label>
{{--@if(count($countries) > 0)--}}
                <select type="select" name="country" id="country" readonly="readonly" class="form-control bord-rad-5 white-bg border-0">
{{--@foreach($countries as $cca3 => $country)--}}
            <option>-</option>
{{--@endforeach--}}
              </select>
{{--@endif--}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      if($('#description').length) {
        let quill = new Quill('#description', {
          placeholder: '',
          theme: 'snow'  // or 'bubble'
        });
        quill.on('editor-change', function (eventName, args) {
            $('input[name=description]').val(quill.root.innerHTML);
        });
      }
      if($('#create_map').length) {
        $('#create_map').locationpicker({
          location: {
            latitude: {{ $listing->lat }},
            longitude: {{ $listing->lng }}
          },
          radius: 0,
          enableAutocomplete: true,
          enableAutocompleteBlur: true,
          inputBinding: {
            latitudeInput: $('#lat'),
            longitudeInput: $('#lng'),
            locationNameInput: $('#location')
          },
          onchanged: function (currentLocation, radius, isMarkerDropped) {
            let addressComponents = $(this).locationpicker('map').location.addressComponents;
            $('#city').val(addressComponents.city);
            $('#country').val(addressComponents.country);
          }
        });
      }
    </script>
