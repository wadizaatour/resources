    <div class="card mb-5">
      <div class="card-header">
        {{ __(':name\'s reviews', ['name' => $profile->display_name]) }} @if(count($comments) > 0)<a href="{{ url()->current() }}/reviews" class="small">{{ __('(view all)') }}</a>@endif
      </div>
      <div class="card-body p-0" style="min-height: 200px">
@if(count($comments) === 0)
        <div class="col-12 mt-4 mb-5">
          <p class="pb-0">{{ __('There are no reviews for this user yet') }}</p>
        </div>
@foreach($comments as $comment)
        <div class="border-bottom">
          <div class="row pb-2 pt-3 pl-3">
            <div class="col-2 text-center">
              <img class="rounded-circle img-fluid" style="width: 75px" src="{{ $comment->commenter->avatar }}"/>
            </div>
            <div class="col-8">
              <h6 class="pt-2">{{ $comment->commenter->name }}
                @include('frontend.components.star_rating', ['rating' => $comment->rating])
              </h6>
              <span class="text-muted">{{ $comment->created_at->toFormattedDateString() }}</span>
              <div class="col-12s mt-2">
                <p>{{ $comment->comment }}</p>
              </div>
            </div>
          </div>
        </div>
@endforeach
@endif
      </div>
    </div>
