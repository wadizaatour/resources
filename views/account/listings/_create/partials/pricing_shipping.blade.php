@if(is_object($listing->pricingModel) && $listing->pricingModel->can_add_shipping)
    <div class="card mb-4">
      <h6 class="card-header bg-white">{{ __('Shipping fees') }}</h6>
      <div class="card-body">
        <div class="repeater-default">
          <div>
            <div class="row mb-2">
              <div class="col-sm-6 small">{{ __('Name') }}</div>
              <div class="col-sm-3 small">{{ __('Price') }}</div>
            </div>
          </div>
          <div data-repeater-list="shipping">
@if($listing->shipping_options === null) {{-- was originally if count() === 0, but it isnt always a countable --}}
            <div data-repeater-item>
              <div class="row mb-2">
                <div class="col-sm-6">
                  <input type="text" name="name" placeholder="e.g. First Class" class="form-control"/>
                </div>
                <div class="col-sm-3">
                  <input type="text" name="price" placeholder="" class="form-control"/>
                </div>
                <div class="col-sm-3">
                  <span data-repeater-delete class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-remove"></span> {{ __('Delete') }}
                  </span>
                </div>
              </div>
            </div>
@else
@foreach($listing->shipping_options as $shipping_option)
            <div data-repeater-item>
              <div class="row mb-2">
                <div class="col-sm-6">
                  <input type="text" name="name" value="{{ $shipping_option->name }}"
                    class="form-control"/>
                </div>
                <div class="col-sm-3">
                  <input type="text" name="price" value="{{ $shipping_option->price }}"
                    class="form-control"/>
                </div>
                <div class="col-sm-3">
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
