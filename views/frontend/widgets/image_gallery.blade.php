<div class="row mt-1 mt-sm-5">
  <div class="col-12 mb-0 mb-sm-5">
    <h4 class="text-{{ $widget['alignment'] }} ">{{ $widget['title'] }}</h4>
  </div>
</div>
<div class="row mb-1 mb-sm-5">
@if(count($widget->metadata))
@foreach($widget->metadata as $item)
  <div class="col-{{ $item['columns'] }} mb-4 text-center">
    <a href="{{ $item['link'] }}" style="height:100%"><img class="img-fluid" style="object-fit:cover;height:100%;width:100%" src="{{ $item['image'] }}" /></a>
  </div>
@endforeach
@endif
</div>
