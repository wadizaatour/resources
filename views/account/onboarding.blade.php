@extends('layouts.frontend')
​
@section('body_class', 'page-account')

@section('content')
    <div class="container mb-5 mt-5">
      <div class="row gray-background bord-rad-5 adjust-ml-0">
        <div class="col-12 request-form-body mr-4">
          <h3 class="request-form-title gray-text-color font-montserrat">@lang('forms.onboarding.title')</h3>
          <form method="post" class="mr-left-22" action="{{ route('account.onboarding', [], false) }}" enctype="multipart/form-data">
@if(auth()->user()->type === 'sell')
            <div class="row d-flex justify-content-center">
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                  <input type="text" name="company_name" value="{{ $v['company_name'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.companyName') *" required />
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                  <input type="text" name="coc_nr" value="{{ $v['coc_nr'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.coc_nr') *" required />
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                  <input type="text" name="vat_nr" value="{{ $v['vat_nr'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.vat_nr') *" required />
                </div>
              </div>
            </div>
            <div class="row d-flex justify-content-between">
              <div class="form-group row ml-2 col-lg-6"> {{-- todo: this is a requirement --}}
                <div class="form-check col form-check-inline align-middle">
                  <input type="checkbox" name="type[]" value="disassembly" id="disassembly" class="form-check-input" />
                  <label for="disassembly" class="form-check-label dashboardFontSize">@lang('forms.onboarding.disassembly')</label>
                </div>
                <div class="form-check col form-check-inline align-middle">
                  <input type="checkbox" name="type[]" value="garage" id="garageCompany" class="form-check-input" />
                  <label for="garageCompany" class="form-check-label dashboardFontSize">@lang('forms.onboarding.garageCompany')</label>
                </div>
                <div class="form-check col form-check-inline align-middle">
                  <input type="checkbox" name="type[]" value="revision" id="revisionCompany" class="form-check-input" />
                  <label for="revisionCompany" class="form-check-label dashboardFontSize">@lang('forms.onboarding.revisionCompany')</label>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 ml-4">
                <div class="form-group">
                  <multi-select></multi-select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <select name="gender" class="form-control white-bg ml-0 request-input" required>
                    <option value="">@lang('forms.onboarding.salutation') *</option>
                    <option value="M"{{ $v['gender'] === 'M' ? ' selected="selected"' : ''}}>Dhr.</option>
                    <option value="F"{{ $v['gender'] === 'F' ? ' selected="selected"' : ''}}>Mvr.</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="first_name" value="{{ $v['first_name'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.firstName') *" required />
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <input type="text" name="last_name" value="{{ $v['last_name'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.lastName') *" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <input type="text" name="street" value="{{ $v['street'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.street') *" required />
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <input type="text" name="building_nr" value="{{ $v['building_nr'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.building_nr') *" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="postal" value="{{ $v['postal'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.postal') *" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="city" value="{{ $v['city'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.city') *" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">{{--
  todo: This should be js dynamic (JSON endpoint at /api/location/states/{cca3};
        where cca3 can be for ex. case-insensitive 'NLD', 'DEU', ...), based on country choice;
        however.. initially it can be static
--}}
                  <select name="state" id="province" class="form-control white-bg ml-0 request-input">
                    <option disabled selected class="gray-text-color">@lang('forms.onboarding.selectProvince')</option>
@if(count($states) > 0)
@foreach($states as $key => $name)
                    <option value="{{ $key }}" {{ $v['state'] === $key ? ' selected="selected"' : ''}}>{{ $name }}</option>
@endforeach
@endif
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
@if(count($countries) > 0)
                  <select name="country" class="form-control white-bg ml-0 request-input">
@foreach($countries as $cca3 => $country)
                    <option value="{{ $cca3 }}" {{ ($cca3 === 'NLD' && $v['country'] === null) || ($v['country'] !==
                        '' && $v['country'] === $cca3) ? ' selected="selected"' : '' }}>{!! $country !!}</option>
@endforeach
                  </select>
@endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="url" name="website" value="{{ $v['website'] }}" class="form-control white-bg  request-input" placeholder="http://www.mijndomein.nl" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="phone" value="{{ $v['phone'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.phone') *" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="mobile" value="{{ $v['mobile'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.mobile')" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="iban" value="{{ $v['iban'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.iban') *" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="account_name" value="{{ $v['account_name'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.accountHolder') *" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="bic" value="{{ $v['bic'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.bic') "/>
                </div>
              </div>
              <div class="col-lg-12 preview-flex">
               <div class="mb-3 ml-4">
                 <span id="upload_image">@lang('forms.onboarding.upload')</span>
               </div>
                <image-upload></image-upload>
              </div>
            </div>
@else
            <div class="d-flex flex-column justify-content-center mb-3 w-lg-50 w-md-75 w-sm-100 mr-24" >
              <div class="mb-2 mr-3">
                <select name="gender" class="form-control white-bg ml-0 request-input" required>
                  <option value=""  disabled >@lang('forms.onboarding.salutation')</option>
                  <option value="M"{{ $v['gender'] === 'M' ? ' selected="selected"' : '' }}>Dhr.</option>
                  <option value="F"{{ $v['gender'] === 'F' ? ' selected="selected"' : '' }}>Mvr.</option>
                </select>
              </div>
              <div class="mb-2 mr-3">
                <input type="text" name="first_name" value="{{ $v['first_name'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.firstName') *" required />
              </div>
              <div class="mb-2 mr-3">
                <input type="text" name="last_name" value="{{ $v['last_name'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.lastName') *" required />
              </div>
               <div class="mb-2 mr-3">
                 <input type="text" name="phone" value="{{ $v['phone'] }}" class="form-control request-input" placeholder="@lang('forms.onboarding.phone') *" required />
               </div>
              <div class="mb-2 mr-3">
                <input type="text" name="company_name" value="{{ $v['company_name'] }}" class="form-control request-input" placeholder="@lang('validation.attributes.company')" />
              </div>
            </div>
@endif {{--
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <select name="language" class="form-control request-input">
                    <option selected="selected" value="">@lang('forms.onboarding.language')</option>
                    <option value="Option1">Option1</option>
                    <option value="Option2">Option2</option>
                  </select>
                </div>
              </div>
              <div class="col-md-8">
                <label class="langLabel">@lang('forms.onboarding.languageLabel')</label>
              </div>
            </div> --}}
            <div class="form-group text-center">
              <div class="form-check form-check-inline align-middle">
                <input type="checkbox" name="terms" id="terms" class="form-check-input" required />
                <terms-condition></terms-condition>{{-- would be nice to show the terms, when they are there, in some modal with js --}}
              </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
              <button class="btn btn-primary blueButton">@lang('buttons.send')</button>
            </div>
            @csrf
          </form>
        </div>
      </div>
    </div>
@endsection
