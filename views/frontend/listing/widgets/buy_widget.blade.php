    <div class="card" id="form-selector">
      <form id="form-widget" method="get" class="checkout-form" ic-get-from="{{ url()->current() }}" ic-target="#form-selector" ic-select-from-response="#form-selector" ic-replace-target="false" ic-trigger-on="change" ic-push-url="true" ic-indicator=".widget-indicator">
        <div class="card-body">
          <div class="row ">
            <div class="col-sm-12">
              <div class="row ">
                <div class="col-6">
                  <h4 class="mb-0">{{ format_money($total, $listing->currency) }} <i class="widget-indicator fa fa-circle-o-notch p-1 fa-spin float-right" style="display:none"></i></h4>
                </div>
                <div class="col-6 text-right">
@if(!auth()->check())
                  <a href="#" class="btn btn-sm btn-outline-info pop" data-width="300">{{ __('Ask question') }}</a>
                  <div class="webui-popover-content">
                    <p class="h6">{{ __('Have a question?') }}</p>
                    <p>{{ __('Please sign in to contact the seller.') }}</p>
                    <hr />
                    <a href="{{ route('account.login', [], false) }}" class="btn btn-link text-danger font-weight-bold text-uppercase pl-0">{{ __('Sign in') }}</a>
                  </div>
@endif
                </div>
              </div>
@if($listing->variant_options)
@foreach($listing->variant_options as $variation => $name)
              <div class="row mt-3">
                <div class="col-sm-12">{{ _l($name) }}</div>
                <div class="col-sm-12">
                  <select name="variant[{{ $name }}]" class="form-control form-control-sm" required="required">
                    <option value="">{{ __(' - Select - ') }}</option>
@foreach($variation as $vk => $vn)
                    <option value="{{ $vk }}">{{ $vn }}</option>
@endforeach
                  </select>
                  {{-- input_get('variant.'.$name) --}}
                </div>
              </div>
@endforeach
@endif

@if($listing->stock > 1)
              <div class="row mt-3">
                <div class="col-sm-12">
                  {{ __('Quantity') }}
                </div>
                <div class="col-sm-4">
                  <select name="quantity" required="required" class="form-control form-control-sm">
                    <option value=""></option>
                  </select> {{-- todo: array_combine(range(1, $listing->stock), range(1, $listing->stock)) --}}
                </div>
              </div>
@else
              <input type="hidden" name="quantity" value="1" />
@endif

@if($listing->shipping_options !== null && count($listing->shipping_options) > 0)
              <div class="row mt-3 mb-3">
                <div class="col-sm-12">
                  <label class="small text-muted">{{ __('Shipping') }}</label>
@foreach($listing->shipping_options as $k => $shipping_option)
                  <div class="form-check">
                    <input class="form-check-input" required id="shipping_option_{{ $shipping_option->id }}" {{ ($request()->get('shipping_option') === $shipping_option->id) ? 'checked=checked ' : '' }}name="shipping_option" type="radio" value="{{ $shipping_option->id }}">
                    <label class="form-check-label" for="shipping_option_{{ $shipping_option->id }}">
                      {{ $shipping_option->name }} <span class="text-muted">({{ format_money($shipping_option->price, $listing->currency) }})</span>
                    </label>
                  </div>
@endforeach
                </div>
              </div>
@endif

@if($listing->additional_options !== null && count($listing->additional_options) > 0)
              <div class="row mt-3 mb-3">
                <div class="col-sm-12">
                  <label class="small text-muted">{{ __('Additional options') }}</label>
@foreach($listing->additional_options as $k => $additional_option)
                  <div class="form-check">
                    <input class="form-check-input" id="additional_option_{{ $additional_option->id }}" {{ (request()->has('additional_option.'.$additional_option->id)) ? 'checked=checked ' : '' }}name="additional_option[{{ $additional_option->id }}]" type="checkbox" value="1">
                    <label class="form-check-label" for="additional_option_{{ $additional_option->id }}">
                      {{ $additional_option->name }} <span class="text-muted">({{ format_money($additional_option->price, $listing->currency) }})</span>
                    </label>
                  </div>
@endforeach
                </div>
              </div>
@endif

@if($error)
              <p class="mb-1 mt-1 p-3 text-muted text-center">{{ $error }}</p>
@endif

              <hr />
@foreach($price_items as $item)
              <div class="row">
                <div class="col-sm-8 mt-1">
                  <span>{{ $item['label'] }}</span>
                </div>
                <div class="col-sm-4 mt-1 text-right">
                  <span>{{ format_money($item['price'], $listing->currency) }}</span>
                </div>
              </div>
@endforeach
            </div>
          </div>
        </div>

        <div class="card-footer text-center">
@if($listing->user->can_accept_payments)
@if(!auth()->check())
          <a href="{{ route('account.login', ['action' => 'checkout'], false) }}" class="btn btn-primary btn-block pop" data-width="300" data-placement="top">{{ __('Buy now') }} <i class="mdi mdi-chevron-right" aria-hidden="true"></i></a>
          <div class="webui-popover-content">
            <p class="h6">{{ __('Want to checkout?') }}</p>
            <p>{{ __('Sign in to make a payment.') }}</p>
            <hr />
            <a href="{{ route('account.login', [], false) }}" class="btn btn-link text-danger font-weight-bold text-uppercase pl-0">{{ __('Sign in') }}</a>
          </div>
@endif
@else
@if(!auth()->check())
          <a href="{{ route('account.login', ['action' => 'checkout'], false) }}" class="btn btn-primary btn-block pop"><i class="mdi mdi-share mr-1" ></i> {{ __('Buy now') }} <i class="mdi mdi-chevron-right" aria-hidden="true"></i></a >
          <div class="webui-popover-content">
            <p class="h6">{{ __('Want to checkout?') }}</p>
            <p>{{ __('Sign in to make a payment.') }}</p>
            <hr />
            <a href="{{ route('account.login', [], false) }}" class="btn btn-link text-danger font-weight-bold text-uppercase pl-0">{{ __('Sign in') }}</a>
          </div>
@endif
          <p class="small text-muted text-center mb-0">{{ __('This sends a message to the seller.') }}</p>
@endif
        </div>
      </form>

@push('scripts')
      <script>
        $('.pop').webuiPopover();
@if($listing->user->can_accept_payments)
        let total = '{{ $total }}';
        let billingAddress =  Boolean({{ $listing->pricingModel->requires_billing_address }});
        let shippingAddress =  Boolean({{ $listing->pricingModel->requires_shipping_address }});
@endif
      </script>
    </div>
@endpush
