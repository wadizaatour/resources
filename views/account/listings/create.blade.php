@extends('layouts.frontend')

@section('body_class', 'page-account')

@section('content')
    <div class="mb-5">
      <div class="container">
        <div class="card border mobile-none no-mobile mb-3">
          @include('account.listings.partials.topbar')
        </div>
        <div class="card border desktop-none mobile-only mb-3">
          @include('account.listings.partials.topbar_mobile')
        </div>
        <h2 class="purple-text-color font-weight-bold mt-4">Onderdeel toevoegen</h2>
      </div>
      <form action="{{ route($form_route, $form_route === 'account.listings.update' ? ['listing' => $listing] : [], false) }}" enctype="multipart/form-data" method="post">
        <div class="container">
          <div class="row mt-2 input-car-position">
@if($loggedInUser->type === 'sell')
            <label class="col-lg-2 mt-2" for="car">@lang('labels.frontend.listings.donorCar')</label>
            <div class="col-lg-2 d-flex justify-content-around radio-position">
              <div data-turbolinks="false">
                <label class="radio" for="donor_car_n">
                  <input type="radio" name="donor_car" checked="checked"  onclick="verifyCar()" id="donor_car_n" value="1" class="validate"{{ $cars === null || $cars->count() === 0 ? ' checked="checked"' : '' }} />
                  <span>@lang('labels.no')</span>
                </label>
              </div>
              <div>
                <label class="radio" for="donor_car_y">
                  <input type="radio" name="donor_car" onclick="verifyCar()" id="donor_car_y" value="2" class="validate" />
                  <span>@lang('labels.yes')</span>
                </label>
              </div>
            </div>
@if($cars !== null && $cars->count() > 0)
            <div class="col-lg-2">
              <select id="car" name="car" class="form-control br-r-4">
@foreach($cars as $car)
                <option value="{{ $car->id }}" {{ $v['car'] === $car->id ? ' selected="selected"' : '' }}>{{ $car->lpn ?? $car->make->name.', '.$car->model->name }}</option>
@endforeach
              </select>
            </div>
@else
            <div class="col-lg-4">
              <div class="font-montserrat-regular">
                <br />
                <a href="{{ route('account.cars.create', [], false) }}" title="Add car" class="btn blue-light-bg bord-rad-5 bt-pos-t-l white-text-color">@lang('labels.account.cars.add_car')</a>
              </div>
            </div>
@endif
          </div>
@endif
          <account-part-mmt :make="{{ $v['make_id'] }}" :model="{{ $v['model_id'] }}" :type="{{ $v['type_id'] }}"></account-part-mmt>
          <div class="row mt-3" id="build_date">
            <label for="year" class="col-lg-2">@lang('labels.frontend.listings.year')</label>
            <div class="col-lg-4">
              <div class="row d-flex justify-content-between">
                <div class="col-lg-6">
                  <select name="build_year" id="build_year" class="form-control br-r-4">
                    <option value="" selected disabled>-</option>
                  </select>
                </div>
                <div class="col-lg-6 full-width d-flex justify-content-end p-left-6">
                  <select name="build_month" id="build_month" class="form-control br-r-4">
                    <option value="" selected disabled>-</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container mt-5">
          <div class="row mt-3">
            <div class="col-lg-2">
              <label class="mt-1" for="condition">@lang('labels.frontend.listings.state')</label>
            </div>
            <div class="col-lg-4">
              <select id="condition" name="condition" class="form-control br-r-4" required="required">
                <option value="new"{{ $v['condition'] === 'new' ? ' selected="selected"' : '' }}>@lang('labels.account.create.new')</option>
                <option value="used"{{ $v['condition'] === 'used' ? ' selected="selected"' : '' }} selected>@lang('labels.account.create.used')</option>
              </select>
            </div>
            <div class="col-lg-2 d-flex justify-content-end"></div>
            <div class="col-lg-4 mt-2">
              <input type="checkbox" id="aan-auto" name="auto"/>
              <label for="aan-auto">@lang('labels.frontend.listings.to_car')</label>
            </div>
          </div>
          <account-categories :category='{{ $v['category'] }}' :name='{{ $v['name'] }}'></account-categories>
          <div class="row mt-5">
            <div class="col-lg-2">
              <label class="mt-1" for="price_purchase">@lang('labels.account.create.purchase')</label>
            </div>
            <div class="col-lg-4">
              <input type="number" name="price_purchase" id="price_purchase" value="{{ $v['price_purchase'] }}" class="form-control p-left-10 br-r-4" placeholder="&euro; 0.00" />
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
              <label class="mt-1" for="price">@lang('labels.account.create.selling_price')</label>
            </div>
            <div class="col-lg-4 p-left-10">
              <input type="number" name="price" id="price" value="{{ $v['price'] }}" class="form-control br-r-4" placeholder="&euro; 0.00" />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-4">
                  <label for="option">@lang('labels.frontend.listings.options')</label>
                </div>
                <div class="col-lg-6 ml-3">
                  <input type="checkbox" name="vat_sale" id="vat_sale"{{ $v['vat_sale'] === 'on' ? ' checked="checked"' : '' }} class="form-check-input" />
                  <label for="vat_sale">@lang('labels.account.create.sales_tax')</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-4">
                  <label for="website">Website</label>
                </div>
                <div class="col-lg-6 ml-3">
                  <input type="checkbox" name="show_price" id="show_price"{{ $v['show_price'] === 1 ? ' checked="checked"' : '' }} class="form-check-input">
                  <label for="show_price">@lang('labels.account.create.price_on_request')</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row mt-5">
            <div class="col-lg-2">
              <label class="mt-1" for="deposit">Statiegeld</label>
            </div>
            <div class="col-lg-4">
              <input type="text" id="deposit" name="deposit" value="{{ $v['deposit'] }}" class="form-control p-left-10 br-r-4" />
            </div>
          </div>
          <div class="row mt-3">
            <label class="col-lg-2">Verzendkosten</label>
            <div class="col-lg-4">
              <div class="row d-flex justify-content-between">
                <div class="col-lg-6">
                  <input type="text" id="shipping_nl" name="shipping_nl" value="{{ $v['shipping_nl'] }}" placeholder="Nederland" class="form-control p-left-10 br-r-4" />
                </div>
                <div class="col-lg-6 full-width d-flex justify-content-end">
                  <input type="text" id="shipping_foreign" name="shipping_foreign" value="{{ $v['shipping_foreign'] }}" placeholder="Buitenland" class="form-control br-r-4" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-2">
              <label class="mt-1" for="sku">@lang('labels.account.create.article_number')</label>
            </div>
            <div class="col-lg-4">
              <input type="text" id="sku" name="sku" value="{{ $v['sku'] }}" class="form-control p-left-10 br-r-4" />
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
              <label class="mt-1" for="location">@lang('labels.account.create.location')</label>
            </div>
            <div class="col-lg-4 p-left-10">
              <input type="text" name="location" id="location" value="{{ $v['location'] }}" class="form-control br-r-4" />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-2"><label class="mt-1">Garantie</label></div>
            <div class="col-lg-1">
              <input type="number" name="warranty_months" value="{{ $v['warranty_months'] }}" id="warranty_months" class="form-control p-left-10 br-r-4" />
            </div>
            <div class="col-lg-1 d-flex justify-content-end">
              <label class="mt-1" for="warranty_months">Maanden</label>
            </div>
            <div class="col-lg-8 p-left-10">
              <input type="text" name="warranty_comment" value="{{ $v['warranty_comment'] }}" id="warranty_comment" class="form-control br-r-4" placeholder="Toelichting" />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-2">
              <label class="mt-1" for="description">@lang('labels.account.create.description') Website</label>
            </div>
            <div class="col-lg-10 p-left-10">
              <input type="text" name="description" value="{{ $v['description'] }}" id="description" class="form-control br-r-4" required="required" />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-2">
              <label class="mt-1" for="description_internal">@lang('labels.account.create.description') Intern</label>
            </div>
            <div class="col-lg-10 p-left-10">
              <input type="text" name="description_internal" value="{{ $v['description_internal'] }}" id="description_internal" class="form-control br-r-4" />
            </div>
          </div>
@foreach([1, 2] as $pn)
          <div class="row mt-3">
            <div class="col-lg-2">
              <label class="mt-1" for="particularitypart_{{ $pn }}">Bijzonderheid {{ $pn }}</label>
            </div>
            <div class="col-lg-10 p-left-10">
              <input type="text" name="particularity_{{ $pn }}" id="particularity_{{ $pn }}" value="{{ $v['particularity_'.$pn] }}" class="form-control br-r-4" />
            </div>
          </div>
@endforeach
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
@foreach([1, 2, 3, 4, 5] as $in)
              <div class="row mt-3">
                <div class="col-lg-2"><label class="mt-1" for="foto-{{ $in }}">Foto {{ $in }}</label></div>
                <div class="col-lg-4 ml-4">
                  <input type="file" name="image{{ $in }}" onchange="preview_image(event)" id="image{{ $in }}" accept="image/*" class="camera-button inputfile" />
                  <label for="image{{ $in }}">
                    <img src="{{ asset('images/cameraIcon.png') }}" alt="Camera icon" class="camera-button-position" />
                  </label>
                </div>
                <div class="col-lg-4 p-left-10">{{-- <input type="text" id="foto-{{ $in }}" name="foto-{{ $in }}" class="form-control br-r-4" /> --}}</div>
              </div>
@endforeach
            </div>
            <div class="col-lg-6"><div class="card-h-w p-2 m-2"><img id="image" class="fit-image" src="#" alt=" " /></div></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-4"><label for="visible">Toon online</label></div>
                <div class="col-lg-8">
                  <input type="checkbox" name="visible" id="visible"{{ $v['visible'] === 'on' ? ' checked="checked"' : '' }} />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container mb-5">
          <div class="row mt-5">
            <div class="col-lg-3">
              <button type="submit" name="save" value="new" class="btn blue-light-bg font-weight-bold text-white border-0 bord-rad-5 p-2">
                Opslaan en nieuwe toevoegen
              </button>
            </div>
            <div class="col-lg-3">
              <button type="submit" name="save" value="close" class="btn blue-light-bg font-weight-bold text-white border-0 bord-rad-5 p-2 pl-3 pr-3">
                Opslaan en sluiten
              </button>
            </div>
          </div>
        </div>
@if($form_route === 'account.listings.update')
        {{ method_field('PATCH') }}
@endif
        @csrf
      </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
      if (typeof preview_image !== 'function') {
        function preview_image(event) {
          let reader = new FileReader();
          reader.onload = function() {
            let output = document.getElementById('image');
            output.src = reader.result;
          }
          reader.readAsDataURL(event.target.files[0]);
        }
      }
      if (typeof verifyCar !== 'function') {
        function verifyCar() {
          let validLpn = document.getElementById('donor_car_y')
          let nonValidLpn = document.getElementById('donor_car_n')
          let year = document.getElementById('build_date')
          let make = document.getElementById('make_id')
          let type = document.getElementById('type_id')
          let model = document.getElementById('model_id')
          let make_label = document.getElementById('make_label')
          let model_label = document.getElementById('model_label')
          let type_label = document.getElementById('type_label')
          let info = [year, make, type, model, make_label, model_label, type_label]
          let carLpn = document.getElementById('car')
          if (validLpn.checked) {
            for (let i = 0; i < info.length; i++) {
              info[i].style.visibility = 'hidden'
            }
            if (carLpn !== null) {
              carLpn.disabled = false
            }
          } else if (nonValidLpn.checked) {
            for (let i = 0; i < info.length; i++) {
              info[i].style.visibility = 'visible'
            }
            if (carLpn !== null) {
              carLpn.disabled = true
            }
          }
        }
      }
    </script>
@endpush
