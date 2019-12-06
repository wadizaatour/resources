@extends('layouts.frontend')

@section('title', __('labels.frontend.titles.disclaimer'))
@section('body_class', 'page-disclaimer')

@section('content')
   <div class="container">
     <div class="card bord-rad-5 m-lg-5 page_scroller">
       <div class="m-5">
         <h2 class="text-center font-montserrat purple-text-color mb-4">Disclaimer</h2>
         <p class="font-montserrat-regular gray-text-color">
           AutoOnderdelenSite is een online platform voor het vinden van de juiste koper/verkoper van gebruikte auto-
           onderdelen. Wij hebben uitsluitend een bemiddelende functie en zijn geen partij bij een eventuele
           overeenkomst tussen de koper en verkoper. Wij aanvaarden geen enkele aansprakelijkheid, uit welken hoofde
           dan ook. Dit geldt onder andere doch niet uitsluitend voor de juistheid van de informatie, de levering, de
           leveringstermijn, prijzen en garantievoorwaarden van onderdelen, aangeboden door op ons platform
           aangesloten auto-demontagebedrijven.
           De garantie- en leveringsvoorwaarden, alsmede verzendkosten kunnen per onderdeel en per bedrijf
           verschillen. De prijzen van de aangeboden auto-onderdelen kunnen sterk van elkaar verschillen. Wij adviseren
           u hiernaar vooraf te informeren bij de verkoper.
         </p>
       </div>
     </div>
     <div class="text-right mt-2 mb-2 mb-lg-5 mr-lg-5">
       <a href="{{ route('frontend.index') }}" title="@lang('forms.request.homepage')" class="btn blue-light-bg border-0 bord-rad-5 font-montserrat-regular white-text-color">@lang('forms.request.homepage')</a>
     </div>
   </div>
@endsection
