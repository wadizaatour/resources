@if($true)
    <a class="nav-link text-s  btn btn-secondary" href="{{ route('frontend.listingfee.index') }}">{{ __('Post a listing') }}</a>
@else
    <a class="nav-link text-s  btn btn-secondary" href="{{ route('account.listings.create.index') }}" data-toggle="modal" data-target="#postModal">{{ __('Post a listing') }}</a>
@endif
