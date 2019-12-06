@extends('layouts.frontend')

@section('body_class', 'page-subscriptions')

@section('content')
    <div class="bg-light window-height" data-turbolinks="false">
      <div class="container-fluid" id="payment-main-outer">
        <form action="{{ route('frontend.subscriptions.update', [$listing]) }}" method="POST" class="mx-auto payment-form" id="payment-main" style="max-width:480px"> {{-- todo: no inline styles, use css class instead --}}
          <div class="row pt-5">
            <div class="col-12">
              <a href="{{ route('account.listings.create.edit', [$listing]) }}"><small class="text-muted"><i class="fa fa-angle-double-left" aria-hidden="true"></i> {{ __('Back') }}</small></a><br />
              <small class="text-muted">{{ _l($listing->category->name) }}: {{ $listing->title }}</small><br />
              <div class="card" style="width: 100%">
                <div class="card-body">
                  <h5 class="card-title">{{ __('Promote your listing') }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ __('Current plan') }}: {{ $plan->name }} <a href="{{ route('frontend.subscriptions.subscribe', ['listing_id' => $listing->id]) }}" class="card-link small">{{ __('(change)') }}</a></h6>
                  <p class="card-text">{{ __('Select any of the options below to increase the visibility of your ad.') }}</p>
                  @include('frontend.partials.notifications')
                  <table class="table border-top-0">
                   <thead>
                     <tr>
                       <th scope="col" class="border-top-0"></th>
                       <th scope="col" class="border-top-0">{{ __('Option') }}</th>
                       <th scope="col" class="border-top-0"></th>
                     </tr>
                   </thead>
                   <tbody>
@foreach($options as $option)
                     <tr for="plan-{{ $option->key }}">
                       <td scope="rows" class="text-center">
                         <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="options[]" id="option-{{ $option->key }}" value="{{ $option->key }}" @if($option->key === 'listings')checked disabled @endif>
                         </div>
                       </td>
                       <td><label class="mb-0" for="option-{{ $option->key }}">{{ $option->label }}</label><br /><i class="small text-muted">{{ __('Quota: :remainings of :value remaining', ['remainings' => $ability->remainings($option->key), 'value' => $ability->remainings($option->key)]) }}</i></td>
                       <td></td>
                     </tr>
@endforeach
                   </tbody>
                 </table>
              </div>
            </div>
          </div>

          <div class="row pt-3">
            <div class="col-12">
              <button id="checkoutBtn" type="submit" class="btn float-right btn-primary">{{ __('Submit listing') }} <i class="mdi mdi-chevron-right"></i></button>
            </div>
          </div>
          <div class="text-center mt-5 pt-5">
            <a href="{{ route('frontend.subscriptions.subscribe', ['listing_id' => $listing->id]) }}"><small class="text-muted text-center">{{ __('Remember you can always upgrade your plan to increase your quota.') }}</small></a>
          </div>
          <input type="hidden" name="listing_id" value="{{ $listing->id }}" />
          @csrf
        </form>
      </div>
    </div>
@endsection
