@extends('layouts.frontend')

@section('body_class', 'page-account')

@section('content')
    <div class="container mb-5">
      <div class="row m-lg-5">
        <div class="col-lg-6 col-md-6 col-sm-5">
          <h1 class="font-montserrat purple-text-color">@lang('labels.account.titles.hello') {{ $loggedInUser->first_name }}, </h1>
          <h2 class="font-montserrat-regular purple-text-color"> @lang('labels.account.titles.dashboard')</h2>
          <p class="font-montserrat-thin font-weight-bolder gray-text-color">
            @lang('labels.frontend.titles.welcome')
          </p>
        </div>
      </div>
      <div class="row m-lg-5 position-cards-mobile">
        <div class="col-lg-4 col-md-4">
          <div class="card">
            <a href="{{ route($loggedInUser->type === 'free' ? 'account.listings.requests' : 'account.listings.index', [], false) }}" title="@lang('labels.account.titles.myrequest')">
              <div class="card-body h-197">
                <h5 class="card-title font-montserrat purple-text-color">@lang('labels.account.titles.myrequest')</h5>
                <p class="card-text font-size-13 font-montserrat-regular gray-text-color">
                  @lang('labels.frontend.titles.block_1')
                </p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="card h-197">
            <a href="{{ route('account.settings', [], false) }}">
              <div class="card-body mb-3">
                <h5 class="card-title font-montserrat purple-text-color">@lang('labels.account.titles.mysettings')</h5>
                <p class="card-text font-size-13 font-montserrat-regular gray-text-color">
                  @lang('labels.frontend.titles.block_2')
                </p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="card h-197">
            <a href="{{ route('account.logout', [], false) }}">
              <div class="card-body">
                <h5 class="card-title  font-montserrat purple-text-color">@lang('labels.user.logout')</h5>
                <p class="card-text font-size-13 font-montserrat-regular gray-text-color">
                  @lang('labels.frontend.titles.block_3')
                </p>
              </div>
            </a>
          </div>
        </div>
      </div> {{--
      <div class="row m-5">
        { {-- If account is paid show below tile. --} }
        <div class="col-4">
          <div class="card" style="width: 18rem;">
            <a href="#">
              <div class="card-body">
                <h5 class="card-title  font-montserrat purple-text-color">Beheer</h5> { {-- todo: translation--} }
                <p class="card-text font-montserrat-thin font-weight-bolder gray-text-color">With supporting text below as a natural lead-in to additional content.</p>
              </div>
            </a>
          </div>
        </div>
        { {-- If account is systemadministrator show these tile we need to add route to sytem administrator backend --} }
        <div class="col-4">
          <div class="card" style="width:18rem">
            <a href="#">
              <div class="card-body">
                <h5 class="card-title  font-montserrat purple-text-color">Systeembeheer</h5> { {-- todo: translation--} }
                <p class="card-text font-montserrat-thin font-weight-bolder gray-text-color">With supporting text below as a natural lead-in to additional content.</p>
              </div>
            </a>
          </div>
        </div>
      </div> --}}
    </div>
@endsection
