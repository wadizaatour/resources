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
        <p class="gray-text-color font-montserrat-thin font-weight-bold">
          @lang('forms.request.description_step_1')
        </p>
        <div class="request-form">
          <div class="row request-form-title">
            <div class="col-md-4 request-step-1 request-step-active font-montserrat border-zero-mobile d-flex align-items-center">
              <img src="{{ asset('images/Oval1Active.svg') }}" alt="oval" class="img-fluid" />
              <a href="{{ url()->route('frontend.request') }}" class="width-zero-mobile">@lang('forms.request.step1')</a>
            </div>
            <div class="col-md-4 request-step-2 width-zero-mobile d-flex align-items-center desktop-only">
              <img src="{{ asset('images/Oval2.svg') }}" alt="oval" class="img-fluid desktop-only" />
              <label class="desktop-only font-montserrat ">@lang('labels.frontend.request.step2')</label>
            </div>
            <div class="col-md-4 request-step-3 width-zero-mobile d-flex align-items-center desktop-only">
              <img src="{{ asset('images/Oval3.svg') }}" alt="oval" class="img-fluid desktop-only" />
              <label class="desktop-only font-montserrat ">@lang('labels.frontend.request.step3')</label>
            </div>
          </div>
          <div class="arrow-down-1"></div>
          <div class="row request-form-body">
            <div class="col-md-12 grid-position-mobile">
              <div class="d-flex justify-content-lg-start title-position-mobile">
                <h2 class="font-montserrat purple-text-color">@lang('forms.request.Vehicledata')</h2>
              </div>
              <p class="pt-2 gray-text-color text-center-mobile font-montserrat-regular">@lang('forms.request.subtitle1')</p>
              <form method="post" action="{{ route('frontend.request.store', [], false) }}">
                <request-car :make="{!! (int)$make !!}"></request-car>
                <div class="d-flex justify-content-center col mt-3">
                  <input type="image" src="{{ asset('images/narstep.png') }}" alt="Submit" />
                </div>
                <input type="hidden" name="s" value="car" />
                @csrf
              </form>
              <div class="row pb-4">
                <div class="col-md-9 gray-text-color font-montserrat-regular font-weight-bold">
                  <small>* @lang('forms.request.requiredFields')</small>
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
