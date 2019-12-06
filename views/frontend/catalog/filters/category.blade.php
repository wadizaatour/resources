@if(count($level_categories) > 1)
<div>
  <h6 class="mt-0 text-capitalize">@lang('labels.frontend.listings.category')</h6>
  <div class="row" id="category_filter">
    <div class="col-sm-12">
{{-- todo: this is not working as it used to work, maybe we can rewrite it.
@foreach($parent_categories as $parent_category)
      <a data-category="{{ $parent_category->parent_id }}" href="#{{ request()->fullUrlWithQuery(['category' => $parent_category->parent_id]) }}" class="category-link text-capitalize"><i class="icon mdi mdi-chevron-left"></i>{{ _l($parent_category->name) }}</a><br />
@endforeach
--}}
      <ul class="list-unstyled pl-3">
@foreach($level_categories as $level_category)
@if($level_category->parent === null)
        <li><a data-category="{{ $level_category->id }}" href="{{ route('frontend.catalog.arg1', [$level_category->slug]) }}" class="category-link text-capitalize text-{{ ($category_id !== 0 && $category && $level_category->id === $category->id) ? 'primary' : 'muted' }}">{{ _l($level_category->name) }}</a></li>
@else
        <li><a data-category="{{ $level_category->id }}" href="{{ route('frontend.catalog.arg2', [$level_category->parent->slug, $level_category->slug]) }}" class="category-link text-capitalize text-{{ ($category_id !== 0 && $category && $level_category->id === $category->id) ? 'primary' : 'muted' }}">{{ _l($level_category->name) }}</a></li>
@endif
@endforeach
      </ul>
      <input type="hidden" name="category" value="{{ $category_id }}" />
    </div>
  </div>
</div>
<hr />
@endif
