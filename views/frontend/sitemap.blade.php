@extends('layouts.frontend')

@section('body_class', 'page-sitemap')

@section('content')
    <div class="container">
      <div class="card m-lg-5 bord-rad-5 page_scroller">
        <div class="m-5 font-montserrat-regular">
          <h2 class="text-center mb-4 font-montserrat purple-text-color">Sitemap</h2>
          <ul>
            <li>
              <ul>
                <li>Home Pagina
                  <ul>
                    <li>
                      <a href="{{ route('frontend.index', [], false) }}" class="blue-light-color" title="Auto-onderdelensite startpagina">Auto-onderdelensite startpagina</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul>
                <li class="mt-2 mb-2">Account
                  <ul class="gray-text-color mt-2">
@if($loggedInUser !== null)
                    <li><a href="{{ route('account.index', [], false) }}" class="blue-light-color" title="Dashboard">Dashboard</a></li>
                    <li><a href="{{ route('account.listings.requests', [], false) }}" class="blue-light-color" title="Mijn aanvragen">Mijn aanvragen</a></li>
                    <li><a href="{{ route('account.settings', [], false) }}" class="blue-light-color" title="Mijn instellingen">Mijn instellingen</a></li>
@else
@if(config('account.can_register'))
                    <li><a href="{{ route('account.register', [], false) }}" class="blue-light-color" title="Registreren">Registreren</a></li>
@endif
                    <li><a href="{{ route('account.login', [], false) }}" class="blue-light-color" title="Inloggen">Inloggen</a></li>
@endif
                  </ul>
                </li>
                <li class="mt-2 mb-2">Auto-onderdelen aanvraag
                  <ul class="gray-text-color mt-2">
                    <li><a href="{{ route('frontend.request', [], false) }}" class="blue-light-color" title="Aanvraag voor auto-onderdelen plaatsen">Aanvraag voor auto-onderdelen plaatsen</a></li>
                    <li class="blue-light-color">Aanvraag informatie voor gebruikers</li>
                    <li class="blue-light-color">Spelregels voor het plaatsen van een auto-onderdelen aanvraag</li>
                    <li class="blue-light-color">Gedragscode voor het plaatsen van een auto-onderdelen aanvraag</li>
                  </ul>
                </li>
                <li class="mt-2 mb-2">Auto-onderdelen voorraad
                  <ul class="gray-text-color mt-2">
                    <li><a href="{{ route('frontend.catalog.search', [], false) }}" class="blue-light-color" title="Auto-onderdelen in de voorraad zoeken">Auto-onderdelen in de voorraad zoeken</a></li>
                    <li class="blue-light-color">Classificatiecodes auto-onderdelen</li>
                    <li class="blue-light-color">Informatie voor gebruikers</li>
                  </ul>
                </li>
                <li><a href="{{ route('frontend.companies.index', [], false) }}" class="blue-light-color" title="Deelnemende bedrijven">Deelnemende bedrijven</a></li> {{-- description, nl: Aangesloten auto-demontage, auto-garage en revisie bedrijven zoeken --}}
                <li><a href="{{ route('frontend.disclaimer', [], false) }}" class="blue-light-color" title="Disclaimer">Disclaimer</a></li>
                <li><a href="{{ route('frontend.privacy', [], false) }}" class="blue-light-color" title="Privacy">Privacy</a></li>
                <li><a href="{{ route('frontend.sitemap', [], false) }}" class="blue-light-color" title="Sitemap">Sitemap</a></li>
                <li><a href="{{ route('frontend.contact', [], false) }}" class="blue-light-color" title="Contact met ons opnemen">Contact</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="text-right mt-2 mb-2 mb-lg-5 mr-lg-5">
        <a href="{{ route('frontend.index') }}" title="@lang('forms.request.homepage')" class="btn blue-light-bg border-0 bord-rad-5 font-montserrat-regular white-text-color">@lang('forms.request.homepage')</a>
      </div>
    </div>
@endsection
