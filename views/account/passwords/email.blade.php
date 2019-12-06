@extends('layouts.frontend')

@section('body_class', 'login-page')

@section('content')
    <div class="row">
      <div class="col-md-12 col-lg-5 mx-auto">
          <div class="title col-md-12 ml-1">@lang('labels.user.send_password_link')</div>
          <div class="card-body">
@if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
@endif
            <form method="post" action="{{ route('account.password.email') }}">
              <div class="form-group row">
                <div class="col-md-12 col-form-label">@lang('labels.user.resetPassword')</div>
                <label for="email" class="col-md-12 col-form-label"><br>@lang('validation.attributes.email')</label>
                <div class="col-md-12">
                    {{ Form::pEmail('email', null, ['required']) }}
                </div>
                <div class="col-md-12 col-form-label">@lang('labels.user.resetInfo')</div>
            </div>
              <div class="form-group text-left">
                <button  class="btn btn-primary blueButton">
                  @lang('labels.user.send')
                </button>
              </div>
              @csrf
            </form>
          </div>
        </div>
    </div>
@endsection
