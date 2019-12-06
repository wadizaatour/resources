<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
  <head>
    <meta charset="utf-8" />
    <title>Backend - {{ config('app.name') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="token" content="{{ csrf_token() }}" />
@if ($stylePath = Html::asset('backend', 'backend.css'))
    <link rel="stylesheet" href="{{ $stylePath }}" />
@endif {{--
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script defer src="//cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script> --}}
    <script defer src="{{ Html::asset('backend', 'backend-vendor.js') }}"></script>
    <script defer src="{{ Html::asset('backend', 'backend.js') }}"></script>
    <script type="application/json" data-settings-selector="settings-json">
      {!! json_encode([
        'locale' => app()->getLocale(),
        'appName' => config('app.name'),
        'homePath' => route('frontend.index', [], false),
        'adminHomePath' => route('backend.index', [], false),
        'adminPathName' => 'backend',
        'editorName' => config('app.editor_name'),
        'editorSiteUrl' => config('app.editor_site_url'),
        'locales' => LaravelLocalization::getSupportedLocales(),
        'user' => $loggedInUser,
        'permissions' => session()->get('permissions'),

        'isImpersonation' => session()->has('admin_user_id') && session()->has('temp_user_id'),
        'usurperName' => session()->get('admin_user_name'),
        'cmsEnabled' => config('cms.enabled')
      ]) !!}
    </script>
    @routes()
  </head>
  <body class="@yield('body_class')">
    @yield('body')

    @stack('scripts')
  </body>
</html>
