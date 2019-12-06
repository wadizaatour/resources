    <div data-toggle-name="times_section" class="hidden" style="display: none;background: #fff; position: fixed; top: 0; right: 0; width: 50%; max-width: 360px; height: 100vh; z-index: 300;">
      <div class="p-0" style="overflow-y: scroll; height: 100vh;">
        <div id="editor">
        </div>
      </div>
    </div>

    <div class="card mb-4 border-0 bord-rad-5 gray-background">
      <h5 class="card-header gray-background border-0 bord-rad-5 font-montserrat gray-text-color mt-2">{{ __('Pricing information') }}</h5>
      <div class="card-body">
        <div class="row ">
          <div class="col-sm-6">
            <div class="form-group mt-2">
              <label>{{ __('Price in :currency', ['currency' => $listing->currency]) }}</label>
              <div class="input-group mb-0">
                <input type="text" name="price" id="price" class="form-control border-0 bord-rad-5" />
@if(is_object($listing->pricingModel))
@if($listing->pricingModel->widget !== 'request')
                <div class="input-group-append">
@if($listing->pricingModel->widget === 'book_date')
                  <span class="input-group-text">{{ __('per') }} {{ $listing->pricingModel->duration_name }}</span>
@else
                  <span class="input-group-text">{{ __('per') }} {{ $listing->pricingModel->pricing_unit }}</span>
@endif
                </div>
@endif
@endif
              </div>
            </div>
          </div>
          <div class="col-sm-6">
@if(is_object($listing->pricingModel))
@if($listing->pricingModel->widget === 'request')
            <div class="form-group mt-2">
              <label>{{ __('Pricing display name') }} <small class="text-muted">{{ __('(optional)') }}</small></label>
              <input type="text" name="price_per_unit_display" id="price_per_unit_display" class="form-control border-0 bord-rad-5" placeholder="{{ __('e.g. per...') }}" />
              <small class="form-text text-muted">
                {{ __('e.g. per week, per kg, per box, per unit') }}
              </small>
            </div>
@else
            <div class="form-group mt-2">
              <label>{{ strtoupper($listing->pricingModel->quantity_label) }}</label>
              <input type="number" name="stock" id="stock" class="form-control" />
@if($listing->pricingModel->widget === 'buy')
              <p class="form-text text-muted small">{{ __('Only applicable if the item does not have variants') }}</p>
@endif
            </div>
@endif
@endif
          </div>
        </div>

        <div class="row">
@if(is_object($listing->pricingModel))
@if($listing->pricingModel->widget === 'book_date')
          <div class="col-sm-6">
            <div class="form-group mt-2">
              <label>{{ __('Minimum rent period') }} <small class="text-muted">({{ _p($listing->pricingModel->duration_name) }})</small></label>
              <input type="text" name="min_duration" id="min_duration" class="form-control" />
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group mt-2">
              <label>{{ __('Maximum rent period') }} <small class="text-muted">({{ _p($listing->pricingModel->duration_name) }})</small></label>
              <input type="number" name="max_duration" id="max_duration" class="form-control" />
            </div>
          </div>
@endif

@if($listing->pricingModel->widget === 'book_time')
          <div class="col-sm-6">
            <div class="form-group mt-2">
              <label>{{ __('Length of') }} {{($listing->pricingModel->duration_name)}} (mins)</label>
              <input type="text" name="session_duration" id="session_duration" class="form-control" />
              <small id="setupTimes" class="form-text text-muted">
                <a href="#setupTimes" data-toggle-target="times_section" ic-get-from="{{ route('account.listings.create.times', $listing) }}" ic-target="#editor" ic-select-from-response="#editor-area-wrapper" ic-replace-target="true">{{ __('Set-up availability') }}</a>
              </small>
            </div>
            <div></div>
          </div>
@endif
@endif
        </div>
      </div>
    </div>
