@extends('layouts.frontend')

@section('body_class', 'page-profile')

@section('content')
    <div class="container-fluid inner mt-3">
      <div class="row">
        <div class="col-sm-12">
          <a href="{{ url()->previous() }}"><i class="mdi mdi-chevron-left" aria-hidden="true"></i>{{ __('Back') }}</a>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb bg-transparent  pt-3 pl-0 mb-0">
              <li class="breadcrumb-item small"><a href="{{ route('frontend.index') }}">{{ __('Home') }}</a></li>
              <li class="breadcrumb-item active small" aria-current="page">{{ $profile->display_name }}</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 mx-auto">
          @include('frontend.partials.notifications')
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          @include('frontend.profile.partials.sidebar')
        </div>
        <div class="col-sm-9">
          @include('frontend.profile.partials.listings')
          @widget('profileReviews', ['user' => $profile->id, 'limit' => Settings::get('rating_profile_limit')])
        </div>
      </div>
    </div>
@endsection
