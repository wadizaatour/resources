<div class="row">
  <div class="col-sm-12 mb-5">
    <div class="card border-0 gray-background" >
      <div class="card-header gray-background">
        <div class="row text-center mt-3">
          <div class="col-sm-12">
            <a href="">
              <img src="{{ $profile->avatar }}" style="width:90px;position:absolute;top:5px;left:0;right:0;margin-left:auto;margin-right:auto" class="img-fluid img-thumbnail rounded-circle" />
            </a>
            <br /><br />
          </div>
        </div>
      </div>
      <div class="card-body border-0 gray-background">
        <div class="col-sm-12 text-center">
          <h3 class="mb-0 mt-5 h6 truncate">
            <strong>{{ $profile->display_name }}</strong>
          </h3>{{--
              <p class="mt-0 mb-0">{{ $profile->city }}, {{ $profile->country }}</p> todo --}}
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-sm-12 mx-auto text-center">
            <p class="small mb-3 text-muted">{{ __('Joined') }} {{ $profile->created_at->format('F Y') }}</p>
            @include('frontend.components.star_rating', ['rating' => $profile->averageRate()])
            <p class="small mt-0 mb-0 text-muted">{{ $profile->countReviews() }} {{ __('reviews') }}</p><br />
            <p class="text-muted">{{ count($profile->listings) }} @lang('listings.listings')</p>
          </div>
        </div>
        @if($profile->bio)
          <div class="row mt-3 mb-3">
            <div class="col-sm-12 mx-auto text-center">
              <p class="small mb-3 text-muted">{{ $profile->bio }}</p>
            </div>
          </div>
        @endif
      </div>
      <div class="card-footer border-0 gray-background">
        <div class="row">
          <div class="col-sm-12 mx-auto text-center">
            @if(!auth()->check())
              <a href="{{ route('account.login', [], false) }}" class="btn btn-primary btn-block pop"><i class="mdi mdi-share mr-1" ></i> {{ __('Contact seller') }}</a >
              <div class="webui-popover-content">
                <p class="h6">{{ __('Want to contact the seller?') }}</p>
                <p>{{ __('Sign in to send a message.') }}</p>
                <hr />
                <a href="{{ route('account.login', [], false) }}" class="btn btn-link text-danger font-weight-bold text-uppercase pl-0">{{ __('Sign in') }}</a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

