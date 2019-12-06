@extends('layouts.frontend')

@section('body_class', 'request-page')


@section('highlight')
@include('frontend.partials.sub_header', ['link1' => 'AanvraagPurple.png', 'link2' => 'VoorraadPurple.png', 'link3' => 'BedrijvenPurple.png'])
@endsection

@section('content')
  <div class="container sm-ml-container">
    <div class="row m-4">
      <div class="col-lg-8 col-sm-6 d-flex flex-column"> {{-- todo: lots of translations.. --}}
        <div><h4 class="gray-text-color font-montserrat">Jouw auto-onderdelen aanvraag afmelden</h4></div>
        <div class="gray-text-color font-weight-bold font-montserrat-thin">
          <p>
            Na het plaatsen van een aanvraag voor auto-onderdelen ontvang je altijd een referentienummer en een
            afmeldcode van ons. Hiermee kun je op deze pagina jouw aanvraag afmelden.
          </p>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 d-flex flex-column text-right">
        <div class="mt-2 mb-2">
          <a href="{{ route('frontend.request', [], false) }}" title="">
            <img src="{{ asset('images/PlaatsAanvraag.png') }}" alt="button" />
          </a>
        </div>
      </div>
    </div>
    <form action="{{ route('frontend.listing.signoff', [$listing, $listing->slug], false) }}" method="post">
      <div class="row m-4 w-lg-50 w-sm-100">
        <div class="col-lg-6 col-sm col-md-5 d-flex flex-column">
          <label class="font-montserrat-regular gray-text-color">Aanvraagnummer</label>
          R{{ $listing->id }}
        </div>
        <div class="col-lg-6 col-sm col-md-5 d-flex flex-column">
          <label class="font-montserrat-regular gray-text-color" for="signoff_code">Afmeldcode *</label>
          <input type="text" name="signoff_code" id="signoff_code" class="form-group w-lg-75 w-sm-100 lg-w-input" />
        </div>
      </div>
      <div style="margin-left:40px">
        <input type="image" src="{{ asset('images/AanvraagAfmelden.png') }}" alt="Afmelden" class="sm-w-buttom" />
      </div>
      @csrf
    </form>
    <div class="m-5">
      <label class="gray-text-color font-weight-bold font-montserrat-thin">* veld is verplicht</label>
    </div>
  </div>

  {{-- todo: this should've been a blade include.. --}}
  <div class="image-purple purple-background" style="padding:20px">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-2 order-sm-2">
        <img class="phone-img justify-content-center" src="{{ asset('images/homepage/PhoneIcon.svg') }}" alt="Phone" />
      </div>
      <div class="col-md-2 text-mobile-phone-grid order-sm-1" style="text-align:center">
        <label class="text-light font22 font-montserrat">
          Heb je een technische vraag of
          heb je hulp nodig bij je aanvraag?
        </label>
      </div>
      <div class="col-md-2 order-3 text-mobile-phone-grid-n">
        <label class="font22">Bel 024 - 123 45 67</label>
      </div>
    </div>
  </div>
@endsection
