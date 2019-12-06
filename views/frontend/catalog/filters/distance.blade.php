@if(Settings::get('enable_geo_search') === '1')
    <div>
      <h6 class="mt-0 text-capitalize">{{ _l($facet->name) }}</h6>
      <div class="row">
        <div class="col-sm-12">
@php
$distance_unit = 'mile';
$distance_unit_plural = 'miles';
if (Settings::get('distance_unit') === 'km') {
    $distance_unit = 'km';
    $distance_unit_plural = 'km';
}
@endphp
          <select name="distance" class="form-control distance">
            <option value="-1"{{ request()->input('distance') === '-1' ? ' selected="selected"' : '' }}>{{ __('Anywhere') }}</option>
            <option value="0">{{ __('This area only') }}</option>
            <option value="1">+ 1 {{ $distance_unit }}</option>
            <option value="3">+ 3 {{ $distance_unit_plural }}</option>
            <option value="5">+ 5 {{ $distance_unit_plural }}</option>
            <option value="10">+ 10 {{ $distance_unit_plural }}</option>
            <option value="15">+ 15 {{ $distance_unit_plural }}</option>
            <option value="30">+ 30 {{ $distance_unit_plural }}</option>
            <option value="50">+ 50 {{ $distance_unit_plural }}</option>
            <option value="75">+ 75 {{ $distance_unit_plural }}</option>
            <option value="100">+ 100 {{ $distance_unit_plural }}</option>
          </select>
        </div>
      </div>
    </div>
    <hr />
@endif
