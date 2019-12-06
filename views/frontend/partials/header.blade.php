      <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand nav-margin">@lang('labels.frontend.help.question')</a>
@if(!auth()->check() || (auth()->check() && $loggedInUser->onboarded === 1))
        <button class="navbar-toggler color-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">{{--
            <li class="nav-item active">
@if (count(config('laravellocalization.supportedLocales')) > 1)
              <div class="nav-item ">
                <a href="#" class="nav-link dropdown-toggle " id="dropdown01" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <img class="langImg" src="{{ asset('images/header/VlagNL.svg') }}"/>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  @include('partials.locales')
                </div>
              </div>
            </li>
@endif
            <li class="nav-item">
              <img class="langImg" src="{{ asset('images/header/VlagNL.svg') }}"/>
            </li> --}}
@guest
            <li>
              <img class="accImg" src="{{ asset('images/header/Account.svg') }}" alt="Account" />
            </li>
            <li>
              <div class="acc">
                <a class="nav-link login" href="{{ route('account.login', [], false) }}">@lang('labels.user.loginHeader')</a>
@if(config('account.can_register'))
                <a class="nav-link register" href="{{ route('account.register', [], false) }}">@lang('labels.user.registerHeader')</a>
@endif
              </div>
            </li>
@else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="row name-position">
                  <div class="col-1 col-sm-1 col-md-1 mr-3">
                    <span class="font-montserrat-regular white-text-color">{{ $loggedInUser->address()->first() !== null ? $loggedInUser->first_name : 'New user' }}</span>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 ml-2 mt-1 user-arrow"></div>
                </div>
              </a>
              <div class="dropdown-menu font-montserrat-regular text-center" aria-labelledby="navbarDropdownMenuLink">
@can('access backend')
                <a class="dropdown-item" href="{{ route('backend.index', [], false) }}" data-turbolinks="false">@lang('labels.user.backend')</a>
                <hr />
@endcan
                <a class="dropdown-item" href="{{ route('account.index', [], false) }}">@lang('labels.user.dashboard')</a>
                <hr />
                <a class="dropdown-item" href="{{ route('account.settings', [], false) }}">@lang('labels.user.settings')</a>
                <hr />
                <a class="dropdown-item mb-2" href="{{ route('account.logout', [], false) }}" data-turbolinks="false">@lang('labels.user.logout')</a>
              </div>
            </li>
@endif
          </ul>
        </div>
@endif
      </nav>
      <div class="row">
        <a href="{{ route('frontend.index', [], false) }}" class="logoImg" title="Home">
          <img src="{{ asset('images/header/carparts-logo.svg') }}" alt="Logo" class="logoImg" />
        </a>
      </div>
