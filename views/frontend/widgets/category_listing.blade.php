<div class="row mb-0">
  <div class="col-12">
    <h4 class="text-{{ $widget['alignment'] }} pb-5">{{ $widget['title'] }}</h4>
  </div>
</div>
<div class="row mt-0">
  <div class="col-12">
    <div class="pl-sm-5 pr-sm-5">
      <div class="row">
@foreach($categories as $category)
@if(count($category['categories']))
        <div class="col-sm-3 col-6 mb-5">
          <a href="{{ route(Settings::get('marketplace_index'), ['category' => $category], false) }}"><h6 class="text-muted">{{ _l($category['name']) }}</h6></a>
@foreach($category['categories'] as $child_category)
          <a href="{{ route(Settings::get('marketplace_index'), ['category' => $child_category['id']], false) }}">{{ _l($child_category['name']) }}</a>
          <br />
@endforeach
        </div>
@endif
@endforeach
      </div>
    </div>
  </div>
</div>
