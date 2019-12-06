@extends('layouts.frontend')

@section('body_class', 'page-account')

@section('content')
  <div class="container">
    <div class="card border mobile-none no-mobile mb-3">
      @include('account.listings.partials.topbar')
    </div>
    <div class="card border desktop-none mobile-only mb-3">
      @include('account.listings.partials.topbar_mobile')
    </div>
@if($cars->count())
    <div class="mt-1">
        <a href="{{ route('account.cars.create', [], false) }}" title="Add car" id="add_cars" class="btn btn-sm btn-plus btn-outline-secondary">@lang('labels.frontend.listings.add')</a>
    </div>
    <div class="mt-1">
      <account-cars></account-cars>
    </div>
@else
    <div class="card light-gray-background border-0 bord-rad-5 center-margin w-50 mb-5">
      <div class="m-5">
        <div class="text-center">
          <h4 class="font-montserrat-regular gray-text-color">@lang('labels.account.cars.no_car')</h4>
        </div>
        <div class="text-center mt-5 font-montserrat-regular">
          <a href="{{ route('account.cars.create', [], false) }}" title="Add car" class="btn blue-light-bg bord-rad-5 white-text-color">@lang('labels.account.cars.add_car')</a>
        </div>
      </div>
    </div>
@endif
  </div>
@endsection
