@extends('layouts.frontend')

@section('body_class', 'request-page')


@section('highlight')
@include('frontend.partials.sub_header', ['link1' => 'AanvraagBlue.png', 'link2' => 'VoorraadPurple.png', 'link3' => 'BedrijvenPurple.png'])
@endsection

@section('content')
  <div class="container container-position">
    <div class="row">
      <div class="col-md-12 col-lg-9">
        <div class="d-flex justify-content-sm-center justify-content-lg-start">
          <h2 class="mb-4 gray-text-color font-montserrat mt-3">@lang('forms.request.bodyTitle1')</h2>
        </div>
        <div class="request-form">
          <div class="row request-form-title">
            <div id="confirm-request" class="col-md-12 request-step-1 request-step-active font-montserrat border-zero-mobile d-flex align-items-center">
              <img src="{{ asset('images/OvalConfirmation.svg') }}" alt="oval" class="img-fluid" />
              <label class="width-zero-mobile font-montserrat">@lang('forms.request.lastStep')</label>
            </div>
          </div>
          <div class="arrow-down-1"></div>
          <div class="row request-form-body">
            <div class="col-md-12 grid-position-mobile">
              <div class="d-flex justify-content-lg-start title-position-mobile">
                <h2 class="font-montserrat purple-text-color">@lang('forms.request.thanks')</h2>
              </div>
              <p class="pt-2 gray-text-color text-center-mobile font-montserrat-regular">@lang('forms.request.stepConfirmation')</p>
                <div class="mt-4 mb-4 d-flex flex-row-reverse">
                  <a href="{{ route('frontend.index') }}" title="@lang('forms.request.homepage')" class="btn blue-light-bg border-0 bord-rad-5 font-montserrat-regular white-text-color">@lang('forms.request.homepage')</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('frontend.partials.infoBar')
@endsection
