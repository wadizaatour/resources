@if(count($comments) > 0)
    <a href="{{ route('frontend.reviews.index', [$listing, $listing->slug]) }}" class="d-sm-none small text-muted"><i class="fa fa-angle-right" aria-hidden="true"></i> {{ __('Read reviews') }}</a>
@endif
    <div class="card d-none d-sm-block">
      <div class="card-header">
        {{ __('Customer reviews') }}
      </div>
      <div class="card-body">
@if(count($comments) > 0)
        <h6 class="mt-0">{{ __('Average customer rating') }}</h6>
        @include('fronten.components.star_rating', ['rating' => $listing->averageRate()]) {{ $listing->averageRate() }}
        <span class="ml-3">({{ __(':count reviews', ['count' => $comment_count]) }})</span><br /><br />
        <a href="{{ route('frontend.reviews.create', [$listing, $listing->slug]) }}" class="btn btn-outline-primary"><i class="mdi mdi-plus"></i> {{ __('Add your own review') }}</a><br /><br />
        <strong class="text-muted">{{ __('Showing most recent reviews') }}</strong>
        <a href="{{ route('frontend.reviews.index', [$listing, $listing->slug]) }}">({{ __('see all reviews') }})</a>
        <hr class="mt-0 pt-0" />
@endif
@if(count($comments) === 0)
        <strong>{{ __('There are no customer reviews yet.') }}</strong><br/><br/>
        <a href="{{ route('fronten.reviews.create', [$listing, $listing->slug]) }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> {{ __('Be the first to write a review') }}</a>
@else
@foreach($comments as $comment)
        <div class="row mb-5">
          <div class="col-8">
            <h6 class="pt-0">{{ $comment->commenter->display_name }}</h6>
            @include('frontend.components.star_rating', ['rating' => $comment->rating]) }}
          </div>
          <div class="col-12 mt-2">
            <p class="mb-0">{{ $comment->comment }}</p>
            <span class="small text-muted">{{ __('Published') }} {{ $comment->created_at->toFormattedDateString() }}</span>
          </div>
        </div>
@endforeach
@endif
      </div>
    </div>
