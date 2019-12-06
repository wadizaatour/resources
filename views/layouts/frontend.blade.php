<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="token" content="{{ csrf_token() }}" />
    {!! SEOMeta::generate() !!} {{--
@if (count(config('laravellocalization.supportedLocales')) > 1)
    @include('partials.alternates')
@endif --}}
@if ($stylePath = Html::asset('frontend', 'frontend.css'))
    <link rel="stylesheet" href="{{ $stylePath }}" />
@endif
    <script defer src="{{ Html::asset('frontend', 'frontend-vendor.js') }}"></script>
    <script defer src="{{ Html::asset('frontend', 'frontend.js') }}"></script>
    <script type="application/json" data-settings-selector="settings-json">
      {!! json_encode([
        'cookieconsent' => [
          'message' => __('labels.cookieconsent.message'),
          'dismiss' => __('labels.cookieconsent.dismiss'),
        ],
        'locales' => LaravelLocalization::getSupportedLocales()
      ]) !!}
    </script>
@if(auth()->check())
    @routes('account')
@else
    @routes('frontend')
@endif
  </head>
  <body class="@yield('body_class')">
    <div id="app">
      @include('partials.logged-as')
@include('frontend.partials.header')
@hasSection('highlight')
      <section class="highlight">
        @yield('highlight')
      </section>
@endif

@if(Breadcrumbs::exists() && !request()->routeIs('frontend.index'))
      <section class="nav-breadcrumb navbar">
        <div class="container">
          {!! Breadcrumbs::render() !!}
        </div>
      </section>
@endif

      @include('partials.messages')
      <div class="content">
        @yield('content')
      </div>

{{--  @include('frontend.partials.modals')
@if(!request()->routeIs('frontend.index'))
 <div class="row purple-background-margin">
   <div class=" offset-lg-2 col-lg-3  col-md-2 m-auto">
       <label class="text-light font22">
       Heb je een technische vraag of heb je hulp nodig bij je aanvraag?
       </label>
   </div>
   <div class=" col-lg-2 offset-lg-1 col-md-2">
       <img class="phone-img" src="{{ asset('images/homepage/PhoneIcon.svg') }}">
   </div>
   <div class="col-lg-3 col-md-2 m-auto">
   <label class="text-light font22">Bel 024 - 123 45 67</label>
   </div>
 </div>
@endif --}}
@include('frontend.partials.footer')
    </div>
    <script type="text/javascript">
      function brandsExpander() {
        let x = document.getElementById('myDIV');
        if (x.style.display === 'none') {
          x.style.display = 'block';
        } else {
          x.style.display = 'none';
        }
      }
    </script>
@stack('scripts')
  </body>
</html>
