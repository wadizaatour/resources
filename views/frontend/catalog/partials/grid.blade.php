<div>
  <div class="row">
@foreach($listings as $item)
    <div class="col-6 {{ Settings::get('show_search_sidebar') ? 'col-sm-4 col-md-4' : 'col-sm-3 col-md-3' }} mb-3">
      <div class="card">
        <a href="{{ $item->url }}">
@if($item->thumbnail !== '')
          <img class="card-img-top" src="{{ $item->thumbnail }}?w=300&h=255" alt="{{ $item->title }}" />
@elseif(count($item->photos))
          <img class="card-img-top" src="{{ $item->photos[1] }}?w=300&h=255" alt="{{ $item->title }}" />
@endif
        </a>
        <div class="card-body">
          <a href="{{ $item->url }}" class="h6 card-subtitle mb-2 text-dark" style="max-height:40px;display:block;font-style:normal">{{ $item->title }}</a>
          <p class="card-text row mt-0">
            <span class="col-sm-12 text-danger truncate mb-1">{{ $item->price_formatted }}</span>
            <small class="col-sm-12 text-muted truncate">{{ $item->short_address }}</small>
            <small class="col-sm-12 text-muted truncate">{{ $item->user->display_name }}</small>
            {{--<small class="col-sm-6 text-muted text-right">< ? = $item->created_at->diffForHumans() ? ></small>--}}
          </p>
        </div>
      </div>
    </div>
@endforeach
  </div>
  {!! $listings->appends(request()->query())->links() !!}
</div>
