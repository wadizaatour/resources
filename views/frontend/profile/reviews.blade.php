@extends('layouts.frontend')

@section('body_class', 'page-profile')

@section('content')
    <div class="container-fluid inner mt-3">
      <div class="row">
        <div class="col-sm-12">
          <a href="{{ url()->previous()  }}"><i class="mdi mdi-chevron-left" aria-hidden="true"></i>{{ __('Back') }}</a>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb bg-transparent  pt-3 pl-0 mb-0">
              <li class="breadcrumb-item small"><a href="{{ route('frontend.index'. [], false) }}" class="">{{__('Home')}}</a></li>
              <li class="breadcrumb-item small"><a href="{{ route('profile', [$profile], false) }}" class="">{{ $profile->display_name }}</a></li>
              <li class="breadcrumb-item active small" aria-current="page">{{ __('Reviews') }}</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 mx-auto">
          @include('frontend.partials.notifications')
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          @include('frontend.profile.partials.sidebar')
        </div>
        <div class="col-sm-9 ">
          <h3 class="h5">{{ __(":name's reviews", ['name' => $profile->display_name]) }}</h3>
          <hr />
          <div class="card mb-5">
            <div class="card-body p-0">
              <div class="infinite-scroll">
@foreach($comments as $comment)
                <div class="border-bottom">
                  <div class="row pb-2 pt-3 pl-3">
                    <div class="col-2 text-center">
                      <img class="rounded-circle img-fluid" style="width: 75px" src="{{ $comment->commenter->avatar }}"/>
                    </div>
                    <div class="col-8">
                      <h6 class="pt-2">{{ $comment->commenter->name }}
                        @include('frontend.components.star_rating', ['rating' => $comment->rating]) }}
                      </h6>
                      <span class="text-muted">{{ $comment->created_at->toFormattedDateString() }}</span>
                      <div class="col-12s mt-2">
                        <p>{{ $comment->comment }}</p>
                      </div>
                    </div>
                  </div>
                </div>
@endforeach
                {!! $comments->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection