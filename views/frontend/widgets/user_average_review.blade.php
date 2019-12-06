    @include('frontend.components.star_rating', ['rating' => $profile->averageRate()])
    <p class="small mt-0 mb-0 text-muted">{{ $profile->countReviews() }} {{ __('reviews') }}</p><br />
