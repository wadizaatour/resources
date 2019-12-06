@extends('layouts.frontend')

@section('body_class', 'page-listing')

@section('content')
    <div class="container-fluid inner mt-3">
      <div class="row">
        <div class="col-sm-12">
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb bg-transparent pt-3 pl-0 mb-0">
              <li class="breadcrumb-item small">
                <a href="{{ route('account.listing.index') }}" class="text-muted">{{ __('Listings') }}</a>
              </li>
@foreach($breadcrumbs as $breadcrumb)
              <li class="breadcrumb-item small">
                <a href="{{ route(Settings::get('marketplace_index'), ['category' => $breadcrumb->id], false) }}" class="text-muted">{{ _l($breadcrumb->name) }}</a>
              </li>
@endforeach
              <li class="breadcrumb-item active small" aria-current="page">
                <a href="{{ route(Settings::get('marketplace_index'), ['category' => $listing->category->id], false) }}" class="text-muted">{{ _l($listing->category->name) }}</a>
              </li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row" id="listing-panel">
        <div class="col-sm-12 mx-auto">
          @include('frontend.partials.notifications')
          <h1 class="h3 mt-0 pb-2">{{ $listing->title }}</h1>
@if(auth()->check() && ($listing->user_id === $loggedInUser->id || $loggedInUser->can('edit listing')))
          <div class="mb-3">
            <strong class="badge badge-info">{{ $listing->is_published ? __('Published') : __('Unpublished') }}</strong>
@if($loggedInUser->type === 'sell')
            <a class="badge badge-secondary" href="{{ route('account.listing.edit', $listing) }}">{{ __('Edit listing') }}</a>
@endif
@if($loggedInUser->can('disable listing'))
            <a data-turbolinks="false" ic-indicator="#listing-panel-indicator" class="badge badge-secondary" id="spotlight-listing" ic-get-from="{{ route('frontend.listing.spotlight', [$listing, $listing->slug]) }}" ic-target="#spotlight-listing" ic-select-from-response="#spotlight-listing" href="#">{{ $listing->spotlight ?__('Remove from spotlight') : __('Add to spotlight' )}}</a>
            <a data-turbolinks="false" ic-indicator="#listing-panel-indicator" class="badge badge-{{ $listing->is_verified ? 'secondary' : 'danger' }}" id="verify-listing" ic-get-from="{{ route('frontend.listing.verify', [$listing, $listing->slug]) }}" ic-target="#listing-panel" ic-select-from-response="#listing-panel" href="#">{{ $listing->is_verified ? __('Disable listing') : __('Approve listing') }}</a>
@endif
            <i id="listing-panel-indicator" class="fa fa-spinner fa-spin" style="display: none"></i>
          </div>
@endif
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-sm-8">
          @include('frontend.listing.partials.overview')
@if(Settings::get('rating_listing_page'))
          {!! asyncWidget('ListingReviews', ['listing' => $listing->id, 'limit' => Settings::get('rating_listing_limit')]) !!}
@endif
        </div>
        <div class="col-sm-4">
          @include('account.listing.partials.sidebar')
        </div>
      </div>
    </div>
@endsection
