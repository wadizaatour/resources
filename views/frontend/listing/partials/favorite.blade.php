
{{--  @if(auth()->check())--}}
{{--    <div class="d-flex justify-content-center ml-5">--}}
{{--    <button id="star-listing" type="button" class="btn w-75 blue-light-bg position-button-mobile bord-rad-5 btn-block white-text-color font-montserrat-regular mt-3" ic-get-from="{{ route('frontend.listing.star', [$listing, $listing->slug], false) }}" ic-target="#star-listing" ic-replace-target="true">--}}
{{--      @if($listing->isFavorited())--}}
{{--        <span class="text-left mr-1 text-danger font-montserrat-regular"></span> {{ __('Remove from favorites') }}--}}
{{--      @else--}}
{{--        <span class="text-left mr-1 text-danger font-montserrat-regular"></span> {{ __('Save to favorites') }}--}}
{{--      @endif--}}
{{--    </button>--}}
{{--    </div>--}}
{{--  @else--}}
{{--    <div class="card gray-background mt-3 border-0 w-120">--}}
{{--    <a href="{{ route('account.login', [], false) }}" class="btn btn-secondary w-75 ml-5 mb-2 mt-3 btn-block pop font-montserrat-regular" data-width="300"><span class="text-left font-montserrat-regular"></span> {{ __('Save to favorites') }}</a >--}}
{{--    <div class="webui-popover-content mt-4 text-center">--}}
{{--      <p class="h6 font-montserrat-regular gray-text-color">{{ __('Like this listing?') }}</p>--}}
{{--      <p class="font-montserrat-regular gray-text-color">{{ __('Sign in to save it to your favorites.') }}</p>--}}
{{--      <hr />--}}
{{--      <a href="{{ route('account.login', [], false) }}" class="btn btn-link text-danger text-center font-montserrat text-uppercase pl-0 mb-2">{{ __('Sign in') }}</a>--}}
{{--    </div>--}}
{{--  @endif--}}
{{--</div>--}}
