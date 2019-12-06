@extends('layouts.frontend')

{{-- yes. layouts.frontend for now (testing purposes). The layouts.backend is setup for VueJS --}}

@section('content')
    <h2>Ratings &amp; Reviews</h2>
{{-- @role('admin') --}}
    <ul class="nav nav- mb-4">
      <li class="nav-item {{-- active(['backend.ratings.index']) --}}">
        <a class="nav-link pl-0" href="{{route('backend.ratings.index')}}">Settings</a>
      </li>
      <li class="nav-item {{-- active(['backend.ratings.comments']) --}}">
        <a class="nav-link pl-0" href="{{route('backend.ratings.comments')}}">Comments</a>
      </li>
    </ul>
{{-- @endrole --}}

    <div class="row mb-5 pb-5">
      <div class="col-sm-10">
        @include('alert::bootstrap')
        <br />
        {!! form($form)  !!}
      </div>
    </div>
@endsection
