<div class="row mt-3">
  <div class="col-12 mb-5">
    <h4 class="text-{{ $widget['alignment'] }} ">{{ $widget['title'] }}</h4>
  </div>
</div>
<div class="row mb-3">
@if(count($widget['metadata']))
@foreach($widget['metadata'] as $item)
  <div class="col-sm-{{ 12/count($items) }} col-12 mb-3 text-center">
    <h5 class="truncate">{{ $item['title'] }}</h5>
    <div class="col-10 offset-1 text-center">
      <span class="mdi mdi-{{ $item['icon'] }} text-success" style="font-size: 50px"></span>
      <p>{{ $item['blurb'] }}</p>
@if(array_key_exists('link_text', $item) && trim($item['link_text']) !== '')
      <a href="{{ $item['link'] }}" class="btn btn-primary truncate">{{ $item['link_text'] }}</a>
@endif
    </div>
  </div>
@endforeach
@endif
</div>
