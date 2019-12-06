@extends('layouts.frontend')

@section('body_class', 'request-page')

@section('highlight')
@include('frontend.partials.sub_header', ['link1' => 'AanvraagPurple.png', 'link2' => 'VoorraadPurple.png', 'link3' => 'BedrijvenBlue.png'])
@endsection

@section('content')
    <div class="container container-position">
      <search-companies></search-companies>
    </div>
    @include('frontend.partials.infoBar')
@endsection
