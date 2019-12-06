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
            @lang('forms.request.description_step_2')
          </p>
          <div class="request-form">
            <div class="row request-form-title d-flex justify-content-center">
              <div class="col-md-4 request-step-1 font-montserrat d-flex align-items-center width-zero-mobile desktop-only">
                <img src="{{ asset('images/Oval1.svg') }}" class="img-fluid" alt="oval" />
                <a href="{{ URL::route('frontend.request') }}" class="width-zero-mobile">@lang('forms.request.step1')</a>
              </div>
              <div class="col-md-4 request-step-2 request-step-active  font-montserrat d-flex align-items-center">
                <img src="{{ asset('images/Oval2Active.svg') }}" class="img-fluid" alt="oval" />
                <a href="{{ URL::route('frontend.request.parts') }}" class="width-zero-mobile">@lang('forms.request.step2')</a>
              </div>
              <div class="col-md-4 request-step-3 font-montserrat d-flex align-items-center white-text-color width-zero-mobile desktop-only">
                <img src="{{ asset('images/Oval3.svg') }}" class="img-fluid" alt="oval" />
                <a class="width-zero-mobile"><message :index="3"></message></a>
              </div>
            </div>
            <div class="arrow-down-2"></div>
            <div class="row request-form-body">
              <div class="col-md-12">
                <h2 class="font-montserrat purple-text-color">@lang('forms.request.bodyTitle2')</h2>
                <form action="{{ route('frontend.request.store', [], false) }}" enctype="multipart/form-data" method="post">
                  <hr />
                  <request-parts></request-parts>
                  <hr class="clearfix w-100 d-md-none" />
                  <div class="d-flex justify-content-center col mt-3">
                    <input type="image" src="{{ asset('images/narstep3.png') }}" alt="Submit" />
                  </div>
                  <input type="hidden" name="s" value="parts" />
                  @csrf
                </form>
                <div class="row pb-4">
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
