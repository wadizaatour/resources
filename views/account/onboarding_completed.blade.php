@extends('layouts.frontend')
​
@section('body_class', 'page-account')

@section('content')
  <div class="container mb-5 mt-5">
    <div class="row gray-background bord-rad-5 adjust-ml-0">
      <div class="col-12 request-form-body mr-4">
        <h3 class="request-form-title gray-text-color font-montserrat">@lang('forms.onboarding.title')</h3>
        @lang('forms.onboarding.creation_finished') @lang('forms.onboarding.review_and_activate')
      </div>
    </div>
  </div>
@endsection
