@extends('layouts.frontend')

@section('body_class', 'page-subscriptions')

@section('highlight')
    <div class="bg-light window-height" data-turbolinks="false">
      <div class="container-fluid" id="payment-main-outer">
        <form method="post" class="mx-auto payment-form" id="payment-main" style="max-width:960px"> {{-- todo: no inline styles, use css class --}}
          <div class="row mt-3 pt-5">
            <div class="col-12 text-center">
              <h2>@lang('subscriptions.subscribe_to_plan')</h2>
@if($listing)
              <a href="{{ route('account.listings.create.edit', ['listing' => $listing], false) }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i> {{ __('Back to listing') }}</a>
@else
              <a href="{{ route('account.listings', [], false) }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i>@lang('listings.back_to_my')</a>
@endif
              @include('frontend.partials.notifications')

              <div class="card-deck mt-5 mb-3 text-center">
@foreach($plans as $plan)
                <div class="card mb-4 box-shadow @if($selected_plan->id === $plan->id) bg-light @endif">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{ $plan->name }}</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{ format_money($plan->price, Settings::get('currency')) }} <small class="text-muted">/{{ $plan->interval }}</small></h1>
                    <span style="visibility: {{ $plan->id === $selected_plan->id ? 'visibility' : 'hidden' }}" class="badge badge-success">{{ __('active') }}</span>
                  </div>
                  <ul class="list-group list-group-flush">
@foreach($plan->features->sortBy('sort_order') as $feature)
                    <li class="list-group-item">{{ $feature->value }} {{ $options[$feature->code] }}</li>
@endforeach
                  </ul>
                  <div class="card-body card-footer">
@if(!$next_plan && $plan->id === $selected_plan->id)
                    <button type="button" disabled class=" btn btn-lg btn-block btn-secondary disabled">
                      {{ __('Renews in :days days', ['days' => $days_remaining]) }}
                    </button>
@elseif(is_object($next_plan) && $plan->id === $next_plan->id)
                    <button type="button" disabled class=" btn btn-lg btn-block btn-secondary disabled">
                      {{ __('Starts in :days days', ['days' => $days_remaining]) }}
                    </button>
@else
                    {{-- _self.stripe_btn($selected_plan, $plan, $_context) --}} {{-- Twig macro, todo --}}
@endif
                  </div>
                </div>
@endforeach
              </div>
            </div>
          </div>
          <input type="hidden" name="plan_id" value="0" />
          @csrf
        </form>
@if($listing && $selected_plan && $selected_plan->price <= 0)
        <div class="row mt-3 pt-5">
              <div class="col-12  text-center">
                <a href="{{ route('frontend.listing.fee.payment', ['listing' => $listing], false) }}">{{ __('Not a business/trader? Use pay per listing payments instead.') }}</a>
              </div>
            </div>
@endif

          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
    <script>
      $(document).on('click', '.checkout-btn', function(e) {
        e.preventDefault();
        $(".payment-form input[name='plan_id']").val($(this).data('plan'));
        handler.open({
          email: "{{ $user->email }}",
          name: "{{ Settings::get('site_title') }} {{ __('subscription') }}",
          description: $(this).data('description'),
          zipCode: true,
          panelLabel: "{{ __('Subscribe') }}",
          currency: '{{ Settings::get('currency') }}',
          amount: parseFloat($(this).data('amount')).toFixed(2)
        });
      });
      window.addEventListener('popstate', function() {
        handler.close();
      });
    </script>
@endpush

{{-- seems like functions.. (Twig macro) todo
{% macro stripe_btn(selected_plan, plan, me) %}
    {% set route_name = (me.subscribed_user)?'frontend.subscriptions.stripe.switch':'frontend.subscriptions.stripe.subscribe' %}
    <form action="{{ route($route_name) }}" method="POST">
      <input type="hidden" name="plan_id" value="{{ $plan->id }}" />
{% if me.user.membership_stripe_subscription and me.current_gateway == 'stripe' %}
      <button type="submit" name="new_plan" value="{{ $plan->id }}"
        class="btn btn-lg btn-block btn-outline-primary">
        {{ __('Subscribe') }}
      </button>
{% elseif not me.current_gateway %}
      <button type="button"
        data-plan="{{ $plan->id }}"
        data-amount="{{ $plan->price*100 }}"
        data-name="{{ Settings::get('site_title') }}"
        data-description="{{ $plan->name }}"
        class="checkout-btn btn btn-lg btn-block btn-outline-primary">
        {{ __('Subscribe By Card') }}
      </button>
{%  endif %}
      @csrf
    </form>
{% endmacro %}

{% macro paypal_btn(selected_plan, plan, me) %}
    {% set route_name = (me.subscribed_user)?'frontend.subscriptions.paypal.switch':'frontend.subscriptions.paypal.subscribe' %}
    <form action="{{ route($route_name) }}" method="POST">
      <input type="hidden" name="plan_id" value="{{ $plan->id }}" />
{% if me.user.membership_paypal_subscription and me.current_gateway == 'paypal' %}
      <button type="submit" name="new_plan" value="{{ $plan->id }}" class="btn btn-lg btn-block btn-outline-primary">
        {{ __('Subscribe') }}
      </button>
{% elseif not me.current_gateway %}
      <a href="{{ route('frontend.subscriptions.paypal.redirect', ['plan_id' => $plan->id]) }}" class="btn paypal-btn mt-3 border-0" style="background: transparent; cursor:pointer;">
        <img src="/images/checkout/PP_logo_h_100x26.png" alt="PayPal" />
      </a>
{%  endif %}
      @csrf
    </form>
{% endmacro %}
--}}
