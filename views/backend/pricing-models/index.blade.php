@extends('layouts.frontend')

{{-- yes. layouts.frontend for now (testing purposes). The layouts.backend is setup for VueJS --}}

@section('content')
	<h2>Pricing models <a href="{{ route('backend.pricing-models.create', [], false) }}" class="btn btn-link btn-xs"><i class="mdi mdi-plus"></i> Add new</a></h2>
	@include('backend.components.settings_menu')
    @include('alert::bootstrap')
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
@foreach($pricing_models as $i => $pricing_model)
        <tr>
          <th scope="row">{{ $i+1 }}</th>
          <td>{{ $pricing_model->name }}</td>
          <td><a href="{{ route('backend.pricing-models.edit', $pricing_model->id, false) }}">edit</a></td>
        </tr>
@endforeach
      </tbody>
    </table>

@endsection
