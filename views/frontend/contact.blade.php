@extends('layouts.frontend')

@section('body_class', 'page-contact')

@section('content')
<div class="container card border-0 bord-rad-5 gray-background mt-4 mb-4">
  <h2 class="text-center mt-5 font-montserrat purple-text-color">Contact</h2>
  <div class="row m-3">
  <!-- <div class="col-md-6">{{--
      todo: how about open streetmap instead (through leaflet.js ?) gmaps is rate limitted, requires payment info and possibly payment. It may be more complete then others tho
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317718.69319292053!2d-0.3817765050863085!3d51.528307984912544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondres%2C+Royaume-Uni!5e0!3m2!1sfr!2sfr!4v1496781964517"
                height="550" frameborder="0" allowfullscreen></iframe> --}}
    </div> -->
    <div class="col-md-12">
      <form action="{{ route('frontend.contact') }}" method="post">
        <div class="row">
          <div class="col-sm-12 mt-4">
            <p class="mb-4 fs-20 font-montserrat-regular gray-text-color">
              @lang('forms.contact.description')
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="name">@lang('validation.attributes.name') *</label>
              {{ Form::pText('name', null, ['required']) }}
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="last_name">@lang('validation.attributes.last_name') *</label>
              {{ Form::pText('lastname', null, ['required']) }}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="phone">@lang('validation.attributes.company_name')</label>
              {{ Form::pText('company', null) }}
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="email">@lang('validation.attributes.email') *</label>
              {{ Form::pEmail('email', null, ['required']) }}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="topic">@lang('validation.attributes.topic') *</label>
              {{ Form::pText('topic', null, ['required']) }}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="message">@lang('validation.attributes.message')</label>
              {{ Form::pTextarea('message', null, ['required', 'rows' => 5]) }}
            </div>
          </div>
        </div>
        @if(array_key_exists('contact', $captcha))
          <div class="form-group">
            <div class="w-50">
              <label class="label">@lang('forms.contact.verify') *</label>
              @include('frontend.partials.captcha', ['id' => 'contact', 'captcha' => $captcha, 'errors' => $errors])
            </div>
          </div>
        @endif
        <div class="form-group">
          <input type="submit" class="btn btn-primary blueButton" value="@lang('buttons.send')" />
        </div>
        @csrf
      </form>
    </div>
  </div>
</div>
@endsection
