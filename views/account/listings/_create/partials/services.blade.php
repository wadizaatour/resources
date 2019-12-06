@if(is_object($listing->pricingModel) && $listing->pricingModel->can_list_multiple_services)
    <div class="card mb-4">
      <h6 class="card-header bg-white">{{ __('List of services') }}</h6>
      <div class="card-body">
        <div class="repeater-default">
          <div>
            <div class="row mb-2">
              <div class="col-6 small">{{ __('Name') }}</div>
              <div class="col-2 small">{{ __('Time (in mins)') }}</div>
              <div class="col-3 small">{{ __('Price') }}</div>
            </div>
          </div>
          <div data-repeater-list="services">
@if(count($listing->services) === 0)
            <div data-repeater-item>
              <div class="row mb-2">
                <div class="col-6">
                  <input type="text" name="name" placeholder="{{ __('e.g. Lawn mowing') }}" class="form-control" />
                </div>
                <div class="col-2">
                  <input type="text" name="duration" placeholder="" class="form-control"/>
                </div>
                <div class="col-3">
                  <input type="text" name="price" placeholder="{{ __('0.00') }}" class="form-control" />
                </div>
                <div class="col-1">
                  <span data-repeater-delete class="btn btn-link btn-sm">
                    <span class="mdi mdi-close"></span>
                  </span>
                </div>
              </div>
            </div>
@else
@foreach($listing->services as $service)
            <div data-repeater-item>
              <div class="row mb-2">
                <div class="col-6">
                  <input type="text" name="name" value="{{ $service->name }}" class="form-control" />
                </div>
                <div class="col-2">
                  <input type="text" name="duration" value="{{ $service->duration }}" class="form-control" />
                </div>
                <div class="col-3">
                  <input type="text" name="price" value="{{ $service->price }}" class="form-control" />
                </div>
                <div class="col-1">
                  <span data-repeater-delete class="btn btn-link btn-sm">
                    <span class="mdi mdi-close"></span>
                  </span>
                </div>
              </div>
            </div>
@endforeach
@endif
          </div>
          <div class="form-group">
            <div>
              <span data-repeater-create class="btn btn-info btn-sm">
                <span class="mdi mdi-plus"></span> {{ __('Add') }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
@endif
