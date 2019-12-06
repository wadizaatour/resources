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
    <div>
      <account-requests mode="requests"></account-requests>
    </div>
  </div>
@endsection
