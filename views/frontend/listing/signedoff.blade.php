@extends('layouts.frontend')

@section('body_class', 'request-page')

@section('highlight')
@include('frontend.partials.sub_header', ['link1' => 'AanvraagPurple.png', 'link2' => 'VoorraadPurple.png', 'link3' => 'BedrijvenPurple.png'])
@endsection

@section('content')
    <div class="container sm-ml-container">
      <div class="row m-4">
        <div class="col-lg-8 col-sm-6 d-flex flex-column">
          <div><h4 class="gray-text-color font-montserrat">Jouw auto-onderdelen aanvraag afmelden</h4></div>
          <div class="gray-text-color font-weight-bold font-montserrat-thin">
            <p>Na het plaatsen van een aanvraag voor auto-onderdelen ontvang
              je altijd een referentienummer en een afmeldcode van ons. Hiermee kun je op deze pagina jouw
              aanvraag afmelden.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 d-flex flex-column" style="text-align:right">
          <div class="mt-2 mb-2">
            <a href="">
              <img
                src="{{asset('images/PlaatsAanvraag.png')}}"
                alt="button"
                title="moreInfo"
              />
            </a>
          </div>
        </div>
      </div>
      <div class="row w-50" style="margin-left:25px">
        <div class="col-1">
          <img src="{{asset('images/CheckIcon.png')}}" alt="Check" />
        </div>
        <div class="col-9 d-flex align-items-center ml-2">
          <h4 class="blue-light-color" style="font-weight: bolder">Je aanvraag is afgemeld</h4>
        </div>
      </div>
{{-- disabled untill we receive info about how to process this feedback
      <div style="margin-left:42px" class="mt-4">
        <h4 class="gray-text-color font-montserrat">Aankopen geslaagd?</h4>
      </div>
      <div class="gray-background w-75 d-flex align-content-center mt-2" style="margin-left:35px">
        <div class="m-4 d-flex flex-column">
          <div>
            <h6 class="font-weight-bolder font-montserrat-thin">Door jou gevraagde onderdeel: <strong>Buitenspiegel Links</strong></h6>
          </div>
          <div class="row">
            <div class="col-1">
              <input type="checkbox" name="through_here" id="through_here" />
            </div>
            <div class="col-11">
              <h6 class="gray-text-color font-montserrat-thin font-weight-bold">
                <label for="through_here">
                  Ja, ik heb dit onderdeel gekocht via AutoOnderdelenSite
                </label>
              </h6>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label for="prijs">
                @lang('labels.frontend.request.price')
              </label>
              <input type="text" name="prijs" id="prijs" class="form-control white-bg request-input" />
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <label for="bedrijf">@lang('labels.frontend.request.company')</label>
              <input type="text" name="bedrijf" id="bedrijf" class="form-control white-bg request-input" />
            </div>
            <div class="col-4">
              <label for="score">@lang('labels.frontend.request.score')</label>
              <select name="score" id="score" class="form-control white-bg request-input">
                <option value="" selected disabled>-</option>
                <option value="1">★</option>
                <option value="2">★★</option>
                <option value="3">★★★</option>
                <option value="4">★★★★</option>
                <option value="5">★★★★★</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div style="margin-left:40px" class="mt-5">
        <a href="" id="test">
          <img src="{{asset('images/Versturen.png')}}" alt="Versturen" class="sm-w-buttom" />
        </a>
      </div>
--}}
    </div>
    @include('frontend.partials.infoBar')
@endsection
