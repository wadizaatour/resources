@extends('layouts.frontend')

@section('body_class', 'page-subscriptions')

@section('content')
      <div class="bg-light window-height" >
        <div class="container-fluid" id="payment-main-outer">
          <form class="mx-auto payment-form" id="payment-main" style="max-width: 960px;">
            <input type="hidden" name="listing_id" value="{{ $listing->id }}" />
            <input type="hidden" name="listing_fee" value="{{ $amount }}" />
            <div class="row pt-5">
              <div class="col-12">
                <small class="text-muted">{{ _l($listing->category->name) }}: {{ $listing->title }}</small><br />
                <div id="payment-content">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="inboxModal">{{ __('Listing options') }}</h5>
                    </div>
                    <div class="modal-body" style="min-height: 400px">
                      <table class="table border-top-0">
                        <thead>
                          <tr>
                            <th scope="col" class="border-top-0"></th>
                            <th scope="col" class="border-top-0"></th>
                            <th scope="col" class="border-top-0">{{ __('Category') }}</th>
                            <th scope="col" class="border-top-0">{{ __('Photos') }}</th>
                            <th scope="col" class="border-top-0">{{ __('Duration') }}</th>
                            <th scope="col" class="border-top-0">{{ __('Price') }}</th>
                          </tr>
                        </thead>
                        <tbody>
@foreach($plans as $plan)
                          <tr for="plan-{{ $plan->id }}">
                            <td scope="rows" class="text-center">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="listing_plan_id" id="plan-{{ $plan->id }}" value="{{ $plan->id }}" @if($loop->first)checked@endif data-price="{{ $plan->price }}">
                              </div>
                            </td>
                            <td ><label for="plan-{{ $plan->id }}">{{ $plan->name }} @if($plan->featured)<span class="text-muted font-italic mt-0 font-weight-normal">({{ _l('Featured') }})</span>@endif</label>
                              <p class="text-muted mb-0">{{ _l( $plan->description) }}</p>
                            </td>
                            <td>{{ $plan->category->name ?:__('Any') }}</td>
                            <td>{{ $plan->images }} {{ _p('photo', $plan->images) }}</td>
                            <td>{{ $plan->duration_units }} {{ $plan->duration_period }} {{ __('advert') }}</td>
                            <td>{{ format_money($plan->price, Settings::get('currency')) }}</td>
                          </tr>
@endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="col-12">
                      <button id="checkoutBtn" class="btn float-right btn-primary">{{ __('Checkout') }} <i class="mdi mdi-chevron-right"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @csrf
          </form>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
    <script>
      function process_internal_payment(){
        HoldOn.open({
          theme: 'sk-falding-circle',
          message: '{{ __('Please wait...') }}',
          backgroundColor: '#000',
          textColor: 'white'
        });
        let params = {};
        $.each($('.payment-form').serializeArray(), function () {
          params[this.name] = this.value;
        });

        $.ajax({
          type: 'POST',
          url: '{{ route('frontend.listing.fee.internal_payment', $listing) }}',
          data: params,
          success: function (result) {
            console.log('result', result);
            window.location.href = result.url;
          },
          error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);
            //alert('some error');
            HoldOn.close();
            alertify.alert(errorThrown);
          },
          dataType: 'json'
        });
      }

      function popup(e){
        // Open Checkout with further options:
        handler.open({
          email: "{{ $user->email }}",
          name: "{{ __('Payment for') }} {{ $listing->getRouteKey() }}",
          description: '{{ $listing->title }}',
          zipCode: true,
          currency: '{{ Settings::get('currency') }}',
          amount: (parseFloat($('input[name="listing_fee"]').val()) * 100).toFixed(2)
        });
        e.preventDefault();
      }

      // Close Checkout on page navigation:
      window.addEventListener('popstate', function() {
        handler.close();
      });
    </script>
@endpush
