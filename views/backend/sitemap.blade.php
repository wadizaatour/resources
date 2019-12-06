@extends('layouts.frontend')

{{-- yes. layouts.frontend for now (testing purposes). The layouts.backend is setup for VueJS --}}

@section('content')
    <h2>Sitemap settings</h2>
    <div class="row mb-5 pb-5">
      <div class="col-sm-10">
        @include('alert::bootstrap')
        <br />
        <h4>Your XML sitemap</h4>
        <p>You can find your XML sitemap here <a href="{{-- todo, decide on implementation; route('frontend.sitemap') --}}" target="_blank">XML Sitemap</a></p>
        <p class="font-italic">Note: You do not need to generate your sitemap</p>
        <br />
        <form action="{{ route('backend.sitemap.store', [], false) }}" method="get">
          <h4>Entries per sitemap</h4>
          <p>Please enter the number of entries per sitemap. (defaults to 100)</p>
          <input type="number" name="sitemap_entries" value="{{ Settings::get('sitemap_entries', 0, 100) }}" class="form-control" /><br />
          <h4>Caching</h4>
          <p>Please enter the number minutes to cache the sitemap for. (defaults to 60)</p>
          <input type="number" name="sitemap_cache" value="{{ Settings::get('sitemap_cache', 0, 60) }}" class="form-control" /><br />
          <button type="submit" class="btn btn-primary">Save settings</button>
          @csrf
        </form>
      </div>
    </div>
@endsection
