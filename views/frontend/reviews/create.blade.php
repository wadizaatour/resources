@extends('layouts.frontend')

@section('content')
    <div class="container-fluid inner" data-turbolinks="false">
      <div class="row mt-5">
        <div class="col-sm-8 mx-auto">
@if(Settings::get('rating_permission_group') === 'members' || (Settings::get('rating_permission_group') === 'buyer' && $has_ordered === 0))
          <div class="card mt-4 mb-4">
            <form action="{{ route('frontend.reviews.store', ['listing' => $listing, 'slug' => $listing->slug]) }}" method="post">
              <div class="card-header">
                {{ __('Write a review') }}<br />
                <p class="small mt-0 mb-0">{{ __('Your review and profile information will be publicly displayed') }}</p>
              </div>
              <div class="card-body">
                @include('fronten.partials.notifications')
                <div class="row">
                  <div class="col-sm-4">
                    <img src="{{ $listing->thumbnail }}" alt="thumbnail" style="width:150px" /> {{-- todo: no inlnie styles, use css class --}}
                  </div>
                  <div class="col-sm-6">
                    <h6>{{ $listing->title }}</h6>
                    <div id="review-rating"></div>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <textarea name="comment" class="form-control" rows="3" placeholder="{{ __('Write a review for this item. What did you like dislike about it?') }}"></textarea>
                  <small id="emailHelp" class="form-text text-muted">{{ __('Minimum of 5 words') }}</small>
                </div>
              </div>
              <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">{{ __('Post your review') }}</button>
              </div>
              @csrf
            </form>
          </div>
@else
          <div class="alert alert-danger alert-dismissible fade in show" role="alert">
            {{ __('You need to have ordered this item to submit a review!') }}
          </div>
@endif
        </div>
      </div>
    </div>
    @include('frontend.partials.search_bar')
@endsection

{{-- // ??? --}}
@section('navbar')
    <a href="{{ $listing->url }}" class="close-btn" style="position: absolute; top: 20px; right: 20px;"><i class="mdi mdi-close text-muted" style="font-size: 30px;"></i></a>
@endsection
