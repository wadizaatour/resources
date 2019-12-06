@extends('layouts.frontend')

@section('body_class', 'request-page')

@section('highlight')
@include('frontend.partials.sub_header', ['link1' => 'AanvraagBlue.png', 'link2' => 'VoorraadPurple.png', 'link3' => 'BedrijvenPurple.png'])
@endsection

@section('content')
  <div class="container container-position">
    <div class="row">
      <div class="col-lg-9 col-md-12">
        <h2 class="mb-4 gray-text-color font-montserrat mt-3">@lang('forms.request.bodyTitle1')</h2>
        <p class="gray-text-color font-montserrat-thin font-weight-bold">
          @lang('forms.request.description_step_3')
        </p>
        <div class="request-form">
          <div class="row request-form-title">
            <div class="col-md-4 request-step-1 font-montserrat width-zero-mobile text-white d-flex align-items-center desktop-only">
              <img src="{{ asset('images/Oval1.svg') }}" alt="oval" class="img-fluid" />
              <a href="{{ URL::route('frontend.request') }}" class="width-zero-mobile">@lang('forms.request.step1')</a>
            </div>
            <div class="col-md-4 request-step-2 font-montserrat width-zero-mobile text-white d-flex align-items-center desktop-only">
              <img src="{{ asset('images/Oval2.svg') }}" alt="oval" class="img-fluid" />
              <a href="{{ URL::route('frontend.request.parts') }}" class="width-zero-mobile">@lang('forms.request.step2')</a>
            </div>
            <div class="col-md-4 request-step-3 request-step-active font-montserrat text-white border-zero-mobile d-flex align-items-center">
              <img src="{{ asset('images/Oval3Active.svg') }}" alt="oval" class="img-fluid" />
              <a href="{{ URL::route('frontend.request.contact') }}" class="width-zero-mobile">@lang('forms.request.step3')</a>
            </div>
          </div>
          <div class="arrow-down-3"></div>
          <div class="row request-form-body">
            <div class="col-md-12">
              <h2 class="font-montserrat title-position-mobile purple-text-color">@lang('forms.request.bodyTitle3')</h2>
              <p class="pt-2 gray-text-color font-montserrat-regular">@lang('forms.request.subtitle3')</p>
              <form action="{{ route('frontend.request.store', [], false) }}" method="post">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="gray-text-color font-montserrat-regular" for="first_name">@lang('validation.attributes.first_name') *</label>
                      <input type="text" name="first_name" id="first_name" required value="{{ $v['first_name'] }}" class="form-control light-gray-background request-input" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="gray-text-color font-montserrat-regular" for="last_name">@lang('validation.attributes.last_name') * </label>
                      <input type="text" name="last_name" id="last_name" required value="{{ $v['last_name'] }}" class="form-control light-gray-background request-input" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="gray-text-color font-montserrat-regular" for="email">@lang('forms.request.email') *</label>
                      <input type="email" name="email" id="email" required value="{{ $v['email'] }}" class="form-control light-gray-background request-input" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6"> </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="gray-text-color font-montserrat-regular" for="email_confirmation">@lang('forms.request.confirmEmail') *</label>
                      <input type="email" name="email_confirmation" required id="email_confirmation" value="{{ $v['email_confirmation'] }}" class="form-control light-gray-background request-input" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div><label class="gray-text-color font-montserrat-regular" for="street">@lang('forms.onboarding.address')</label></div>
                    <div class="form-group light-gray-background">
                      <input type="text" name="street" id="street" value="{{ $v['street'] }}" class="form-control light-gray-background request-input" />
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="gray-text-color font-montserrat-regular" for="building_nr">@lang('forms.onboarding.building_nr') </label>
                      <input type="text" name="building_nr" id="building_nr" value="{{ $v['building_nr'] }}" class="form-control light-gray-background request-input" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="gray-text-color font-montserrat-regular" for="phone">@lang('forms.request.phone') *</label>
                      <input type="text" name="phone" id="phone" required value="{{ $v['phone'] }}" class="form-control light-gray-background request-input" />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="gray-text-color font-montserrat-regular" for="mobile">@lang('forms.request.mobile') </label>
                      <input type="text" name="mobile" id="mobile" value="{{ $v['mobile'] }}" class="form-control light-gray-background request-input" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="gray-text-color font-montserrat-regular" for="postal">@lang('forms.request.postcode') </label>
                          <input type="text" name="postal" id="postal" value="{{ $v['postal'] }}" class="form-control light-gray-background request-input" />
                        </div>
                      </div>
                      <div class="col-md-8 ml-0">
                        <div class="form-group">
                          <label class="gray-text-color font-montserrat-regular" for="city-contact">@lang('forms.request.place') </label>
                          <input type="text" name="city" id="city-contact" value="{{ $v['city'] }}" class="form-control light-gray-background request-input" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div><label class="gray-text-color font-montserrat-regular"  for="country-contact{">@lang('forms.request.country') *</label></div>
                        <div class="form-group light-gray-background brd3 land-position-mobile">
@if(count($countries) > 0)
                          <select name="country" id="country-contact{" required class="form-control country-contact light-gray-background request-input">
@foreach($countries as $cca3 => $country)
                            <option value="{{ $cca3 }}" {{ ($cca3 === 'NLD' && trim($v['country']) === '') || ($v['country'] !== '' && $v['country'] === $cca3) ? ' selected="selected"' : '' }}>{!! $country !!}</option>
@endforeach
                          </select>
@endif
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="gray-text-color font-montserrat-regular" for="state-contact">@lang('forms.request.province')</label>
                          <select name="state" id="state-contact" class="form-control light-gray-background ml-0 request-input">
                            <option value="">-</option>
@if(count($states) > 0)
@foreach($states as $key => $state)
                            <option value="{{ $key }}" {{ $v['state'] === $key ? ' selected="selected"' : ''}}>{{ $state }}</option>
@endforeach
@endif
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="gray-text-color font-montserrat-regular" for="message">@lang('forms.request.comment')</label>
                    <textarea name="message" id="message" rows="4" cols="50" class="form-control light-gray-background request-input">{{ $v['message'] }}</textarea>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-6">
                    <label class="gray-text-color font-montserrat-regular">@lang('forms.request.reciveVia')</label>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input type="checkbox" name="response_phone" id="r-phone" value="phone" class="form-check-input" />
                        <label class="form-check-label gray-text-color font-montserrat-regular" for="r-phone">@lang('forms.request.phone')</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="checkbox" checked="checked" name="response_email" id="r-email" value="email" class="form-check-input" />
                        <label class="form-check-label gray-text-color font-montserrat-regular" for="r-email">@lang('forms.request.email')</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="gray-text-color font-montserrat-regular">@lang('forms.request.sendCopy')</label>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input type="checkbox" id="send_copy" name="send_copy" value="yes" class="form-check-input" />
                        <label class="form-check-label gray-text-color font-montserrat-regular" for="send_copy">@lang('forms.request.sendMeCopy')</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="gray-text-color font-montserrat-regular">@lang('forms.request.workInAutoIndustry')</label>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input type="radio" name="workInAutoIndustry" id="workInAutoIndustry1" value="yes" class="form-check-input" />
                        <label class="form-check-label gray-text-color font-montserrat-regular" for="workInAutoIndustry1">@lang('forms.request.yes')</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="radio" name="workInAutoIndustry" id="workInAutoIndustry2" checked="checked" value="no" class="form-check-input" />
                        <label class="form-check-label gray-text-color font-montserrat-regular" for="workInAutoIndustry2">@lang('forms.request.no')</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
@if(!auth()->check())
                    <label class="gray-text-color font-montserrat-regular">@lang('forms.request.createAccount')</label>
                    <div><request-contact-account></request-contact-account></div>
@endif
                  </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                  <input type="image" src="{{ asset('images/submitSteps.png') }}" alt="Submit"/>
                </div>
                <input type="hidden" name="s" value="contact" />
                @csrf
              </form>
              <div class="row mb-4">
                <div class="col-md-9">
                  <small class="gray-text-color font-montserrat-regular">* @lang('forms.request.requiredFields')</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('frontend.partials.infoBar')
@endsection
