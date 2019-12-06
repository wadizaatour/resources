@extends('layouts.frontend')

{{-- yes. layouts.frontend for now (testing purposes). The layouts.backend is setup for VueJS --}}

@section('content')
    <h2>Categories <a href="{{ route('backend.categories.create', [], false) }}" class="btn btn-link btn-xs"><i class="mdi mdi-plus"></i> Add new</a></h2>
    <br />
    @include('alert::bootstrap')
    <table class="table table-sm table-striped table-hover">
      <thead>
        <tr><th class="w-75">Name</th><th class="w-25"></th></tr>
      </thead>
      <tbody>
@foreach($categories as $category)
        <tr>
          <td>{!!  str_repeat("&mdash;", $category['depth']) !!} {{$category['name']}}</td>
          <td>
            <a href="#" ic-target="#main" ic-select-from-response="#main" ic-delete-from="{{ route('backend.categories.destroy', $category['id'], false) }}" ic-confirm="Are you sure?" class="text-muted float-right ml-2"><i class="fa fa-remove"></i></a>
            <a href="/panel/categories/<?= $category['id'] ?>/edit" class=" text-muted float-right"><i class="fa fa-pencil"></i></a>
          </td>
        </tr>
@endforeach
      </tbody>
    </table>
@endsection
