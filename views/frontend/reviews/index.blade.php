@extends('layouts.frontend')

@section('content')
    <div class="container-fluid inner mt-3">
      <div class="row">
        <div class="col-sm-12">
          <a href="{{ route('frontend.listing', [$listing, $listing->slug]) }}"><i class="mdi mdi-chevron-left" aria-hidden="true"></i>{{ __('Back') }}</a>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb bg-transparent pt-3 pl-0 mb-0">
              <li class="breadcrumb-item small"><a href="{{ route('frontend.index') }}" class="text-muted">{{ __('Home') }}</a></li>
@foreach($breadcrumbs as $breadcrumb)
              <li class="breadcrumb-item small"><a
                href="{{ route(Settings::get('marketplace_index'), ['category' => $breadcrumb->id]) }}"
                class="text-muted">{{ $breadcrumb->name }}</a></li>
@endforeach
              <li class="breadcrumb-item active small" aria-current="page"><a
                href="{{ route(Settings::get('marketplace_index'), ['category' => $listing->category->id]) }}"
                class="text-muted">{{ $listing->category->name }}</a></li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-8">
          <h1 class="h3 mt-0 pb-2">{{ $listing->title }}</h1>
          <h2 class="h6">{{ __('Customer Reviews') }}</h2>
@if(count($comments) === 0)
          <strong>{{ __('There are no customer reviews yet.') }}</strong><br/><br/>
          <a href="{{ route('reviews.create', [$listing, $listing->slug]) }}" class="btn btn-primary"><i class="mdi mdi-plus"></i>
            {{ __('Be the first to write a review') }}</a>
@else
          <a href="{{ route('reviews.create', [$listing, $listing->slug]) }}" class="btn btn-outline-primary"><i class="mdi mdi-plus"></i>
            {{ __('Add your own review') }}</a>
          <hr />
@foreach($comments as $comment)
          <div class="row mb-5">
            <div class="col-8">
              <h6 class="pt-0">{{ $comment->commenter->display_name }}</h6>
              @include('frontend.components.star_rating', ['rating' => $comment->rating])
            </div>
            <div class="col-12 mt-2">
              <p class="mb-0">{{ $comment->comment }}</p>
              <span class="small text-muted">{{ __('Published') }} {{ $comment->created_at->toFormattedDateString() }}</span>
            </div>
          </div>
@endforeach
          {{ $comments->links() }}
@endif
        </div>
        <div class="col-sm-4">
          @include('frontend.listing.partials.sidebar')
        </div>
      </div>
    </div>
@endsection
