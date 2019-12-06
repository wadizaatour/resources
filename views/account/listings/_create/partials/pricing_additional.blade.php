@if(is_object($listing->pricingModel) && $listing->pricingModel->can_add_additional_pricing)
    <div class="card mb-4">
      <h6 class="card-header bg-white">{{ __('Additional options & services') }}</h6>
      <div class="card-body">
        <div class="repeater-default">
          <div>
            <div class="row mb-2">
              <div class="col-6 small">{{ __('Name') }}</div>
              <div class="col-3 small">{{ __('Price') }}</div>
            </div>
          </div>
          <div data-repeater-list="additional">
@if($listing->additional_options === null) {{-- was originally if count() === 0, but it isnt always a countable --}}
            <div data-repeater-item>
              <div class="row mb-2">
                <div class="col-6">
                  <input type="text" name="name" placeholder="{{ __('e.g. Gift wrap') }}" class="form-control"/>
                </div>
                <div class="col-3">
                  <input type="text" name="price" placeholder="{{ __('0.00') }}" class="form-control"/>
                </div>
                <div class="col-3">
                  <span data-repeater-delete class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-remove"></span> {{ __('Delete') }}
                  </span>
                </div>
              </div>
            </div>
@else
@foreach($listing->additional_options as $additional_option)
            <div data-repeater-item>
              <div class="row mb-2">
                <div class="col-6">
                  <input type="text" name="name" value="{{ $additional_option->name }}" class="form-control"/>
                </div>
                <div class="col-3">
                  <input type="text" name="price" value="{{ $additional_option->price }}" class="form-control"/>
                </div>
                <div class="col-3">
                  <span data-repeater-delete class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-remove"></span> {{ __('Delete') }}
                  </span>
                </div>
              </div>
            </div>
@endforeach
@endif
          </div>
          <div class="form-group">
            <div class="">
              <span data-repeater-create class="btn btn-info btn-sm">
                <span class="mdi mdi-plus"></span> {{ __('Add') }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
@endif