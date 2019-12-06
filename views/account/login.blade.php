@extends('layouts.frontend')

@section('body_class', 'page-account')

@section('content')
    <div class="row">
      <div class="col-md-12 col-lg-4 mx-auto">
        <div class="form-group row pb-10">
          <p class="title col-md-12">@lang('labels.user.login')</p>
        </div>
        <form method="post" action="{{ route('account.login.attempt', [], false) }}">
          <div class="form-group request-input row">
            <label for="email" class="col-md-12 col-form-label">@lang('validation.attributes.email') *</label>
            <div class="col-md-12">
              <input type="email" name="email" id="email" value="{{ old('email') }}" required="required" class="{{ $errors->has('email') ? 'is-invalid ' : '' }}form-control input" />
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-12 col-form-label">@lang('validation.attributes.password') *</label>
            <div class="col-md-12">
              <input id="password" required="required" name="password" type="password" class="{{ $errors->has('password') ? 'is-invalid ' : '' }}form-control input" />
            </div>
          </div>
@if(array_key_exists('login', $captcha))
          <div class="form-group row">
            <div class="col">
              @include('frontend.partials.captcha', ['id' => 'login', 'captcha' => $captcha, 'errors' => $errors])
            </div>
          </div>
@endif
          <div class="form-group row">
            <div class="col-md-8 text-right">
              <a class="btn btn-link font-montserrat-regular" href="{{ route('account.password.request') }}">
                @lang('labels.user.password_forgot')
              </a>
            </div>
            <div class="col-md-4">
              <button  class="btn btn-primary blueButton">@lang('labels.user.login')</button>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">* @lang('labels.fields_required')</label>
            </div>
          </div>
          @csrf
        </form>
      </div>
    </div>
@endsection
