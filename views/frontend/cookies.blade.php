@extends('layouts.frontend')

@section('title', __('labels.frontend.titles.disclaimer'))
@section('body_class', 'page-disclaimer')

@section('content')
  <div class="container">
    <div class="card bord-rad-5 m-lg-5 page_scroller">
      <div class="m-5">
        <h2 class="text-center font-montserrat purple-text-color mb-4">Cookies</h2>
        <h5 class="font-montserrat">COOKIEVERKLARING</h5>
        <p class="gray-text-color">
          Op onze website maken wij gebruik van cookies. Dit doen wij om een zo optimaal mogelijke
          dienstverlening via onze website mogelijk te maken. Cookies zorgen voor gebruiksgemak
          voor jou en een beter inzicht in jouw surfgedrag op onze website.
        </p>
        <h5 class="font-montserrat">Wat zijn cookies?</h5>
        <p class="gray-text-color">
          Cookies zijn eenvoudige kleine bestandjes die met pagina’s van deze website worden
          meegestuurd en door jouw browser op de harde schijf van jouw apparaat worden
          opgeslagen, zodat wij jou kunnen herkennen als je de volgende keer onze website bezoekt.
        </p>
        <h5 class="font-montserrat">Cookiemelding</h5>
        <p class="gray-text-color">
          Wanneer je onze website voor het eerst bezoekt tonen wij een melding met uitleg over de
          cookies. Hierin kun je ook aangeven voor welke cookies je toestemming geeft. Als je daarna
          gebruik maakt van onze website, nemen wij aan dat je geen bezwaar heeft tegen de cookies
          die onze website op de harde schijf van jouw apparaat plaatst.
        </p>
        <h5 class="font-montserrat">Soorten cookies</h5>
        <p class="gray-text-color">
          Op onze website maken wij gebruik van analytische, functionele en advertising cookies van
          derde partijen. Hieronder geven wij uitleg hierover.
        </p>
        <h5 class="font-montserrat">Analytische cookies</h5>
        <p class="gray-text-color">
          Analytische cookies verzamelen informatie over jouw websitebezoek, welke delen van de
          website je bezoekt, hoe lang je op de website blijft en wat jouw surfgedrag op onze website
          is. De gegevens zijn geanonimiseerd en worden niet gebruikt voor andere doeleinden dan
          waarvoor deze cookies zijn geplaatst..
        </p>
        <h5 class="font-montserrat-regular line_text">Google Analytics</h5>
        <p class="gray-text-color">
          Op onze website maken wij doorgaans gebruik van Google Analytics. Dit doen wij om bij te
          kunnen houden hoe gebruikers de website gebruiken. Voor dit doel worden cookies
          geplaatst. Deze informatie wordt overgebracht naar door Google beheerde servers.
          <br />
          <br />
          Google gebruikt deze informatie om bij te houden hoe de website wordt gebruikt en om
          rapporten over de website aan ons te kunnen verstrekken. De maximale bewaartermijn van
          de cookies die middels deze dienst worden gebruikt is 26 maanden. Dit betekent dat na
          afloop van deze termijn de gegevens niet meer kunnen worden uitgelezen. De verwerking
          van jouw gegevens via Google Analytics is gebaseerd op ons gerechtvaardigde belang om
          algemene statistieken over onze website te verkrijgen en de dienstverlening te verbeteren.
          <br />
          <br />
          Lees voor meer informatie het <a href="https://policies.google.com/privacy?hl=nl" class="blue-light-color">privacybeleid van Google.</a>{{-- link to google privacy--}}
        </p>
        <h5 class="font-montserrat">Functionele cookies</h5>
        <p class="gray-text-color">
          Functionele cookies onthouden de voorkeuren van de gebruiker op onze website. Wij
          spreken van “functionele cookies” om aan te geven dat het cookie een functionele rol
          binnen een site moet spelen. Hierbij kan men denken aan een winkelwagentje, een login
          onthouden of vastleggen dat een ander cookie wel of niet mag worden gezet.
        </p>
        <h5 class="font-montserrat">Advertentie cookies</h5>
        <p class="gray-text-color">
          Ook kunnen wij gebruikmaken van advertentie cookies. Advertentie cookies zijn
          zogenoemde third party cookies om op maat gemaakte advertenties voor relevante partijen
          te tonen. Een bekende speler hierin is Google Ads. Ook Facebook retargeting pixels vallen
          binnen de werkingssfeer van advertentie cookies.
        </p>
        <h5 class="font-montserrat">Bewaartermijnen en verwijdering van cookies</h5>
        <p class="gray-text-color">
          De meeste cookies hebben een houdbaarheidsdatum. Dat betekent dat ze na verloop van
          tijd automatisch aflopen en geen gegevens over jouw sitebezoek meer registreren. Je kunt
          er ook voor kiezen de cookies handmatig te verwijderen voordat de houdbaarheidsdatum is
          verstreken. Dit kan ertoe leiden dat sommige functies van onze website op jouw PC niet of in
          beperkte mate functioneert..
        </p>
        <h5 class="font-montserrat">Vragen? Zo bereikt je ons</h5>
        <p class="gray-text-color">
          Heeft u opmerkingen, suggesties of klachten omtrent dit cookiebeleid? Dan kun je contact
          met ons opnemen via het contactformulier op de website.
          <br />
          <br />
          Nijmegen, september 2019
        </p>
      </div>
    </div>
    <div class="text-right mt-2 mb-2 mb-lg-5 mr-lg-5">
      <a href="{{ route('frontend.index') }}" title="@lang('forms.request.homepage')" class="btn blue-light-bg border-0 bord-rad-5 font-montserrat-regular white-text-color">@lang('forms.request.homepage')</a>
    </div>
  </div>
@endsection
