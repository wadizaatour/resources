@extends('layouts.frontend')

{{-- yes. layouts.frontend for now (testing purposes). The layouts.backend is setup for VueJS --}}

@section('content')
    <h2>Homepage Widgets <a href="{{ route('backend.homepage.create', ['lang' => $selected_lang], false) }}" class="btn btn-link btn-xs"><i class="mdi mdi-plus"></i> Add widget</a></h2>
    <p>Your home page is made up of widgets. Add a widget or edit a widget to change the appearance.</p>
    @include('alert::bootstrap')
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
      <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang(app('laravellocalization')->getSupportedLocales()[$selected_lang]['name'])
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <a class="dropdown-item" href="?locale={{ $localeCode }}">{{ $properties['native'] }}</a>
@endforeach
        </div>
      </div>
    </div>
    <br /><br />
    <table class="table table-sm table-striped">
      <thead class="thead- border-0">
        <tr><th>Title</th><th>Widget Type</th><th></th></tr>
      </thead>
      <tbody>
@foreach($widgets as $widget )
        <tr>
          <td>{{ $widget->title }} {{ $widget->is_hidden ? '(hidden)' : '' }}</td>
          <td>{{ $form_ui[$widget->type] }}</td>
          <td>
            <a href="#" ic-target="#main" ic-select-from-response="#main" ic-delete-from="{{ route('backend.homepage.destroy', $widget, false) }}" ic-confirm="Are you sure?" class="text-muted float-right ml-2"><i class="fa fa-remove"></i></a>
            <a href="{{ route('backend.homepage.edit', $widget->id, false) }}" class="text-muted float-right"><i class="fa fa-pencil"></i></a>
          </td>
        </tr>
@endforeach
      </tbody>
    </table>
@endsection
