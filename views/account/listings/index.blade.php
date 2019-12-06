@extends('layouts.frontend')

@section('body_class', 'page-account')

@section('content')
    <div class="container" data-turbolinks="false">
      <div class="card border mobile-none no-mobile mb-3">
        @include('account.listings.partials.topbar')
      </div>
      <div class="card border desktop-none mobile-only mb-3">
        @include('account.listings.partials.topbar_mobile')
      </div>
      <div class="mb-3 mt-3">
        <div class="w-28">
          <a href="{{ route($route_create, [], false) }}" title="@lang('labels.frontend.listings.addCarPart')" class="btn btn-sm btn-plus btn-outline-secondary">
            @lang('labels.frontend.listings.addCarPart')
          </a>
        </div>
@if($listings->count())
@if(auth()->user()->type === 'sell')
        <account-parts></account-parts>
@else
        <table class="table table-sm border-top-0">
          <thead class="thead-light">
            <tr>
              <th scope="col">{{ __('Title') }}</th>
              <th scope="col" class="d-none d-sm-block">{{ __('Date Created') }}</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
@foreach($listings as $listing)
            <tr>
              <td><a href="{{ route('frontend.listing.show', [$listing, $listing->slug], false) }}" class="text-dark">{{ str_limit($listing->title, 40) }}</a></td>
              <td class="d-none d-sm-block">{{ $listing->created_at->toFormattedDateString() }}</td>
              <td class="text-right"><a href="{{ route('account.listings.edit', $listing, false) }}">{{ __('edit') }} &nbsp;<i class="mdi mdi-chevron-double-right"></i></a></td>
            </tr>
@endforeach
          </tbody>
        </table>
        {!! $listings->links() !!}
@endif
@else
        <div class="card light-gray-background border-0 bord-rad-5 mt-2 mb-4" id="empty-listings">
          <div class="m-lg-5 text-center">
            <h4 class="font-montserrat-regular gray-text-color">@lang('labels.frontend.listings.no_listings')</h4>
          </div>
        </div>
@endif
      </div>
    </div>
@endsection
