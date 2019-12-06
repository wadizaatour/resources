@extends('layouts.frontend')

@section('body_class', 'page-account')

@section('content')
  <div class="row">
    <div class="col-12">
      Under construction.<br />

      <h3 class="font-montserrat gray-text-color text-center">Car details</h3>
      <div class="card bord-rad-5 white-bg border-0">
        <div class="m-4 font-montserrat-regular gray-text-color">
          <strong class="purple-text-color">{{ $listing->part->car->make->name }} {{ $listing->part->car->model->name }} {{ $listing->part->car->type->name }}</strong><br />
@if(trim($listing->part->car->chassis_nr) !== '')
          Chassis nr.: {{ $listing->part->car->chassis_nr }}<br />
@endif
          Construction: {{ date('F', strtotime('2019-'.$listing->part->car->month.'-01')) }} {{ $listing->part->car->year }}<br />
          Doors: {{ $listing->part->car->doors }}<br />
          Drive: {{ $listing->part->car->drive }}<br />
          Fuel type: {{ $listing->part->car->fuel->name }}<br />
          Power: {{ $listing->part->car->power }} KWh<br />
        </div>
      </div>
      <br />

      <h3 class="font-montserrat gray-text-color text-center mb-3">Requested part details</h3>
      <br /><br />
      <div class="card bord-rad-5 white-bg border-0 font-montserrat-regular gray-text-color">
        <table class="table border-0">
          <thead class="border-0">
            <tr class="border-0">
              <td class="border-0">@lang('validation.attributes.image')</td>
              <td class="border-0">@lang('labels.frontend.titles.category')</td>
              <td class="border-0">SKU</td>
              <td class="border-0">@lang('labels.frontend.titles.description')</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{-- $listing->photos[1] / Storage::url('requestparts/'.$listing->id.'/[thumbimgname]')--}}
                <img src="{{ $listing->photos[1] }}" width="120px" height="90px" alt="Part image" />
              </td>
              <td>{{ $listing->category->parent->name }}: {{ $listing->category->name }}</td>
              <td>{{ $listing->part->sku }}</td>
              <td>{{ $listing->part->description }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <br />
    </div>
  </div>
@endsection
