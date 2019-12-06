@extends('layouts.frontend')

@section('body_class', 'page-about')

@section('content')
  <div class="container">
    <div class="card bord-rad-5 m-lg-5 page_scroller">
      <div class="m-5">
        <h2 class="text-center font-montserrat purple-text-color mb-4">Over Ons</h2>
        <p class="font-montserrat-regular gray-text-color">
          Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh.
          Vivamus suscipit tortor eget felis porttitor volutpat. Nulla porttitor accumsan tincidunt.
          Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in
          faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel
          , ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.
          Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat,
          accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
        </p>
      </div>
    </div>
    <div class="text-right mt-2 mb-2 mb-lg-5 mr-lg-5">
      <a href="{{ route('frontend.index') }}" title="@lang('forms.request.homepage')" class="btn blue-light-bg border-0 bord-rad-5 font-montserrat-regular white-text-color">@lang('forms.request.homepage')</a>
    </div>
  </div>
@endsection
