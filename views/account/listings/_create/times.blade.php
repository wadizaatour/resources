@extends('layouts.frontend')

@section('body_class', 'page-create')

@section('content')
    <div class="container-fluid inner" style="max-width:360px"> {{-- todo: no inline styles (use css class) --}}
      <div id="editor-area-wrapper" data-turbolinks="false">
        <div id="editor_area" data-turbolinks="false">
          <div class="card">
            <div class="card-header">
              {{ __('Your availability') }}
              <a class="mt-1" data-toggle-target="times_section" href="#"><i class="mdi mdi-close text-muted small float-right" aria-hidden="true"></i></a>
            </div>
            <div class="card-body p-0">
              <div class="row">
                <div class="col-sm-12 mx-auto">
                  @include('frontend.partials.notifications')
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <form method="POST" ic-post-to="{{ url()->current() }}" ic-trigger-on="change" ic-target="#editor_area" ic-select-from-response="#editor_area">
                    <table class="table table-bordered table-sm">
                      <thead>
                        <tr>
                          <th></th>
@for($day=1; $day < 8; ++$day)
                          <th style="width: 12%" class="text-center">{{ date('D', date_modify(new \DateTime('NOW'),'Sunday +'.$day.' days')) }}</th>
@endfor
                        </tr>
                      </thead>
                      <tbody>
@for($hour=0; $hour < 24; ++$hour)
                        <tr>
                          <td>{{ date('H:i', date_modify(new \DateTime('NOW'), $hour.':00')) }}</td>
@for($day=1; $day < 8; ++$day)
                          <td class="cell-activse text-center">
                            <div class="pretty p-default p-round" style="width: 17px; margin: 0 auto;">
                              <input type="checkbox" name="selection[{{ $day }}][{{ $hour }}]" value="1" {{ array_get($slots, $day.'.'.$hour, 0) ? 'checked' : '' }} />
                              <div class="state p-success-o">
                                <label>&nbsp;</label>
                              </div>
                            </div>
                          </td>
@endfor
                        </tr>
@endfor
                      </tbody>
                    </table>
                    @csrf
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection