<div class="row mt-sm-3">
  <div class="col-9">
    <h4 class="text-{{ $widget['alignment'] }} mb-4">{{ $widget['title'] }}</h4>
  </div>
  <div class="col-3">
    <a href="{{ route(Settings::get('marketplace_index')) }}" class="btn btn-secondary btn-sm float-right">{{__('VIEW ALL')}} <i class="mdi mdi-chevron-right"></i></a>
  </div>
</div>
<div class="row mb-sm-3">
@foreach($items as $item)
  <div class="col-lg-{{ round(12/$config['limit'], 0, 1) }} col-6 col-sm-3 mb-3">
    <div class="card ">
      <div style="position: relative">
        <a href="{{ $item->url }}" class="roundeds  border-top image-wrappers  text-center">
          <img class="card-img-top img-grid-loaders roundeds img-grid" src="{{ $item->thumbnail }}?w=300&h=255" alt="{{ $item->title }}" />
        </a>
      </div>
      <div class="card-body pt-3 pb-4 p-2">
        <a href="{{ $item->url }}" style="max-height:40px;display:block;font-style:normal" class="truncate h6 card-subtitle mb-2 text-dark" >{{ $item->title }}</a>
        <p class="card-text row mt-0">
          <span class="col-sm-12 text-danger truncate mb-1">{{ $item->price_formatted }}</span>
          <small class="col-sm-12 text-muted truncate">{{ $item->short_address }}</small>
          <small class="col-sm-12 text-muted truncate">{{ $item->user->display_name }}</small>
        </p>
      </div>
    </div>
  </div>
@endforeach
</div>
