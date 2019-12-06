@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.search_bar')
    <div class="bg-light window-height" >
      <div class="container-fluid" id="inbox-main-outer">
        <div class="mx-auto pt-5" id="inbox-main" style="max-width:576px">
          <div class="row pt-5">
            <div class="col-12">
              <h3>File a report</h3>
              <h6><small>Listing: {{ $listing->title }}</small></h6><br />
              <form method="post" action="{{ route('frontend.listing.report', [$listing]) }}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Reason for report</label>
                  <select name="reason" class="form-control">
@if(Settings::get('listings.moderate.report_types'))
@foreach(Settings::get('listings.moderate.report_types') as $report_type)
                    <option>{{ $report_type->value }}</option>
@endforeach
@endif
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Detailed description</label>
                  <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                @csrf()
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
