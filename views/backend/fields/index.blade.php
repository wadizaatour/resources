@extends('layouts.frontend')

{{-- yes. layouts.frontend for now (testing purposes). The layouts.backend is setup for VueJS --}}

@section('content')
    <h2>Fields &amp; filters <a href="{{ route('backend.fields.create') }}" class="btn btn-link btn-xs"><i class="mdi mdi-plus"></i> Add new</a></h2>
    @include('backend.components.settings_menu')
    @include('alert::bootstrap')

    <table class="table table-sm table-striped">
      <thead class="thead- border-0">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Input type</th>
          <th>Search type</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
@foreach($filters as $i => $filter )
        <tr>
          <th scope="row">{{$i+1}}</th>
          <td>{{ $filter->name }}</td>
          <td>{{ $filter->form_input_type }}</td>
            <td>{{ $filter->search_ui }}</td>
            <td><i class="fa fa-eye{{ $filter->is_hidden ? '-slash text-muted' : ' text-info' }}" aria-hidden="true"></i></td>
            <td><a href="{{ route('backend.fields.edit', $filter->id) }}">edit</a></td>
            <td>
@if(!$filter->is_default)
              <a href="#" ic-target="#main" ic-select-from-response="#main" ic-delete-from="{{ route('backend.fields.destroy', $filter->id) }}" ic-confirm="Are you sure?" class="text-muted  ml-2"><i class="mdi mdi-close"></i></a>
@endif
            </td>
          </tr>
@endforeach
        </tbody>
      </table>
@endsection
