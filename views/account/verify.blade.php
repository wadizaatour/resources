@extends('layouts.frontend')

@section('body_class', 'login-page')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card bord-rad-5 m-5">
            <div class="card-header gray-text-color font-montserrat">@lang('forms.registration.verify')</div>
            <div class="card-body">
@if (session('resent'))
              <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
              </div>
@endif
            <p class="gray-text-color font-montserrat-regular"> @lang('forms.registration.validation')
            </p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
