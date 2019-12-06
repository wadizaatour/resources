@extends('layouts.frontend')

@section('body_class', 'page-account')

@section('content')
    <div class="m-0">
      <div class="mb-1">
        <div class="container container-position-table">
          @include('account.listings.partials.topbar')
          <div class="row d-flex justify-content-end mb-1">
            <div class="col-lg-4 col-md-12 col-sm-5 w-90 text-center">
@if(str_replace(config('app.url'), '', url()->current()) !== route('account.cars.create', [], false))
              <a href="{{ route('account.cars.create', [], false) }}" title="Add car" id="add-car" class="btn blue-light-bg white-text-color font-montserrat-regular">@lang('labels.account.cars.add_car')</a>
@endif
@if(isset($car))
              <a href="{{ route('account.cars.edit', $car, false) }}" title="Edit car" id="edit-car" class="btn blue-light-bg white-text-color font-montserrat-regular">@lang('labels.account.cars.edit_car')</a>
            </div>
            <div class="col-lg-1 col-md-12 col-sm-5 w-90">
@if(str_replace(config('app.url'), '', url()->current()) !== route('account.cars.create', [], false))
              <form action="{{ route('account.cars.destroy', $car, false) }}" method="post">
                <button type="submit" id="del-car" class="btn blue-light-bg white-text-color font-montserrat-regular">Delete</button>
                @method('DELETE')
                @csrf
              </form>
@endif
@endif
            </div>
          </div>

          <div class="row d-flex justify-content-center ml-2">
            <div class="col-lg-8 col-md-12 col-sm-5 w-90">
@if(isset($car))
              <form method="post" action="{{ route('account.cars.update', $car, false) }}">
@else
              <form method="post" action="{{ route('account.cars.store', [], false) }}">
@endif
                <account-car
@if(isset($car))
                  :car="{{ json_encode($car->toArray()) }}"
@endif
                  :makes='{!! json_encode($makes) !!}'
                  :models='{!! json_encode($models) !!}'
                  :types='{!! json_encode($types) !!}'
                  :drives='{!! json_encode($drives) !!}'
                  :fueltypes='{!! json_encode($fueltypes) !!}'
                  mode="{{ $mode }}"
                ></account-car>
                <div class="row">
                  <div class="col-lg">
                    <label class="gray-text-color font-montserrat-regular" for="location">@lang('labels.account.cars.location')</label>
                    <div class="form-group light-gray-background brd3 padding-10">
@if($mode !== 'rr')
                      <input type="text" name="location" id="location" value="{{ isset($car) ? $car->location : '' }}" class="form-control light-gray-background request-input" />
@elseif(isset($car) && trim($car->location) !== '')
                      <span>{{ $car->location }}</span>
@else
                      <span>@lang('labels.account.cars.Unknown')</span>
@endif
                    </div>
                  </div>
                  <div class="col-lg">
                    <label class="gray-text-color font-montserrat-regular" for="km">@lang('labels.account.cars.km_position')</label>
                    <div class="form-group light-gray-background brd3 w-lg-50 padding-10">
@if($mode !== 'rr')
                      <input type="number" name="km" id="km" value="{{ isset($car) ? $car->km : '' }}" class="form-control light-gray-background request-input" />
@elseif(isset($car) && trim($car->km) !== '')
                      <span>{{ $car->km }}</span>
@else
                      <span>@lang('labels.account.cars.Unknown')</span>
@endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <label class="gray-text-color font-montserrat-regular" for="purchase_date">@lang('labels.account.cars.date_of_purchase')</label>
                    <div class="form-group light-gray-background brd3 padding-10">
@if($mode !== 'rr')
                      <input type="date" name="purchase_date" id="purchase_date" value="{{ isset($car) ? $car->purchase_date : '' }}" class="form-control padding-2 light-gray-background w-104 font-montserrat-regular request-input" />
@elseif(isset($car) && trim($car->purchase_date) !== '')
                      <span>{{ $car->purchase_date }}</span>
@else
                      <span>@lang('labels.account.cars.Unknown')</span>
@endif
                    </div>
                  </div>
                  <div class="col-lg-6">
@if($mode !== 'rr')
@if(isset($car)  &&  trim($car->apk) !== '' &&  trim($car->apk_date) !== '')
                    <account-apk-date :car="{{$car}}"></account-apk-date>
@else
                    <account-apk-date></account-apk-date>
@endif
@elseif($car->apk === 1)
                    <label class="gray-text-color font-montserrat-regular">@lang('labels.account.cars.apk_valid_until')</label>
                    <div class="form-group light-gray-background brd3 padding-10">
                      <span>{{ $car->apk_date ?? '' }}</span>
                    </div>
@endif
                  </div>
                </div>
                <div class="fields row">
                  <ul class="col-lg-6">
{{--
            $table->string('coating_nr')->nullable();
            $table->string('color')->nullable();
            $table->string('engine_code')->nullable();
            $table->string('gearbox_type')->nullable();
            $table->string('gearbox_code')->nullable();
            $table->string('ktype')->nullable();
--}}
                    <li>
                      <label class="gray-text-color font-montserrat-regular" for="color">@lang('labels.account.cars.color')</label>
                      <input type="text" name="color" id="color" value="{{ isset($car) ? $car->color : '' }}" class="form-control padding-2 light-gray-background font-montserrat-regular request-input" />
                    </li>
                    <li>
                      <label class="gray-text-color font-montserrat-regular" for="coating_nr">@lang('labels.account.cars.coating_nr')</label>
                      <input type="text" name="coating_nr" id="coating_nr" value="{{ isset($car) ? $car->coating_nr : '' }}" class="form-control padding-2 light-gray-background font-montserrat-regular request-input" />
                    </li>
                    <li>
                      <label class="gray-text-color font-montserrat-regular" for="engine_code">@lang('labels.account.cars.engine_code')</label>
                      <input type="text" name="engine_code" id="engine_code" value="{{ isset($car) ? $car->engine_code : '' }}" class="form-control padding-2 light-gray-background font-montserrat-regular request-input" />
                    </li>
                  </ul>
                  <ul class="col-lg-6">
                    <li>
                      <label class="gray-text-color font-montserrat-regular" for="ktype">@lang('labels.account.cars.ktype')</label>
                      <input type="text" name="ktype" id="ktype" value="{{ isset($car) ? $car->ktype : '' }}" class="form-control padding-2 light-gray-background font-montserrat-regular request-input" />
                    </li>
                    <li>
                      <label class="gray-text-color font-montserrat-regular" for="gearbox_type">@lang('labels.account.cars.gearbox_type')</label>
                      <div class="form-group light-gray-background brd3">
                        <select
                          name="gearbox_type"
                          id="gearbox_type"
                          class="form-control light-gray-background request-input"
                        >
                          <option value=""{{ isset($car) && $car->gearbox_type === '' ? ' selected="selected"' : '' }}>-</option>
                          <option value="4"{{ isset($car) && $car->gearbox_type === '4' ? ' selected="selected"' : '' }}>@lang('forms.request.gear_val_1')</option>
                          <option value="5"{{ isset($car) && $car->gearbox_type === '5' ? ' selected="selected"' : '' }}>@lang('forms.request.gear_val_2')</option>
                          <option value="6"{{ isset($car) && $car->gearbox_type === '6' ? ' selected="selected"' : '' }}>@lang('forms.request.gear_val_3')</option>
                          <option value="Automaat Overdrive"{{ isset($car) && $car->gearbox_type === 'Automaat Overdrive' ? ' selected="selected"' : '' }}>@lang('forms.request.gear_val_4')</option>
                          <option value="DSG"{{ isset($car) && $car->gearbox_type === 'DSG' ? ' selected="selected"' : '' }}>@lang('forms.request.gear_val_5')</option>
                          <option value="Semi Automaat"{{ isset($car) && $car->gearbox_type === 'Semi Automaat' ? ' selected="selected"' : '' }}>
                            @lang('forms.request.gear_val_6')
                          </option>
                        </select>
                      </div>
                    </li>
                    <li>
                      <label class="gray-text-color font-montserrat-regular" for="gearbox_code">@lang('labels.account.cars.gearbox_code')</label>
                      <input type="text" name="gearbox_code" id="gearbox_code" value="{{ isset($car) ? $car->gearbox_code : '' }}" class="form-control padding-2 light-gray-background font-montserrat-regular request-input" />
                    </li>
                  </ul>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <label class="gray-text-color font-montserrat-regular" for="remark">@lang('validation.attributes.description')</label>
                    <div class="form-group light-gray-background brd3 w-lg-50 padding-10">
@if($mode !== 'rr')
                      <textarea name="remark" id="remark" class="form-control light-gray-background padding-10 request-input">{{ isset($car) ? $car->remark : '' }}</textarea>
@elseif(isset($car) && trim($car->remark) !== '')
                      <span>{{ $car->remark }}</span>
@else
                      <span>@lang('labels.account.cars.none')</span>
@endif
                    </div>
                  </div>
                </div>
@if($mode !== 'rr')
                <div class="row">
                  <div class="col-lg text-right">
                    <button type="submit" name="save" id="save" class="btn blue-light-bg font-montserrat-regular padding-10 white-text-color bord-rad-5 mb-2 mr-4">@lang('labels.account.cars.save_car')</button>
                  </div>
                </div>
@endif
                <input type="hidden" name="m" value="{{ $mode }}" />
@if(isset($car))
                {{ method_field('PATCH') }}
@endif
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
