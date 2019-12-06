@extends('layouts.frontend')

@section('body_class', 'page-listing')
@section('highlight')
  @include('frontend.partials.sub_header', ['link1' => 'AanvraagPurple.png', 'link2' => 'VoorraadBlue.png', 'link3' => 'BedrijvenPurple.png'])
@endsection
@section('content')
  <div class="container mt-3">

<div class="d-flex justify-content-between">
<div class="">
  @include('frontend.partials.notifications')
  <h1 class="font-montserrat">{{$listing->category->name}}</h1>
  @if($listing->pricing_model_id === 3)
    <span class="lightgray-text-color font-montserrat-regular mb-3">{{ $listing->title }}</span>
  @endif
</div>
  <div class="float-right mt-2">
    <a  onclick="goBack()" class="blue-light-color download2 font-montserrat"><span class="blue-light-color">@lang('labels.frontend.listings.goback')</span></a>
  </div>
</div>


        @include('frontend.partials.notifications')
        <div class="mb-3 mt-2" style="display: inline-flex">
@if($loggedInUser !== null && $listing->user !== null && ($listing->user->id === $loggedInUser->id || $loggedInUser->can('edit listing')))
@if($listing->user->id === $loggedInUser->id)
@if($listing->pricing_model_id === 1)
          <div class="mr-2">
            <a class="btn blue-light-bg white-text-color font-montserrat-regular" href="{{ route('account.listings.edit', [$listing], false) }}">@lang('labels.frontend.listings.edit')</a>
          </div>
              <div>
                <form action="{{ route('account.listings.destroy', [$listing], false) }}" method="post">
                  <button type="submit" class="btn red-background white-text-color bord-rad-5 font-montserrat-regular">@lang('labels.frontend.listings.delete_button_part')</button>
                  @method('DELETE')
                  @csrf
                </form>
              </div>
@else
                <div>
                  <a href="{{ route('frontend.listing.signoff', [$listing, $listing->slug], false) }}" class="btn red-background white-text-color bord-rad-5 font-montserrat-regular">@lang('labels.frontend.listings.delete_button_request')</a>
                  <span class="pl-3">Afmeldcode: {{ Hashids::encode($listing->part->id) }}</span>
              </div>
@endif
            @endif
          @endif
        </div>

  <div class="row mt-3">
    <div class="col-lg-7">


      @include('frontend.listing.partials.overview')
@if(Settings::get('rating_listing_page'))
      {!! asyncWidget('ListingReviews', ['listing' => $listing->id, 'limit' => Settings::get('rating_listing_limit')]) !!}
@endif
    </div>
    <div class="col-lg-4">
      @include('frontend.listing.partials.sidebar')
    </div>
  </div>
@if($listing->part !== null)
  @include('frontend.listing.partials.contact')
@endif
</div>
@endsection
<script>
    function goBack() {
        window.history.go(-1);
    }
</script>
