@extends('layouts.frontend')

@section('body_class', 'page-catalog')

@section('highlight')
  @include('frontend.partials.sub_header', ['link1' => 'AanvraagPurple.png', 'link2' => 'VoorraadBlue.png', 'link3' => 'BedrijvenPurple.png'])
@endsection

@section('content')
    <div id="bg">
{{--
@if($lpn !== false)
@if(!array_key_exists('make', $params) || (array_key_exists('make', $params) && $params['make'] === str_slug($lpn['c']->merk)))
@if(!array_key_exists('model', $params) || (array_key_exists('model', $params) && strpos($params['make'], str_slug($lpn['c']->handelsbenaming)) === 0))
@if($lpn['i'] !== false)
      <div class="pt-3 pb-3 mb-4 border-right-0 border-right-0 border-left-0 border-top-0 bg-light">
        <div class="container-fluid bg-light">
          <div class="pt-3 pb-3">
            <h3 class="gray-text-color font-montserrat">
              @lang('labels.frontend.catalogue.searchby') {{ $lpn['i'] }}
            </h3>
          </div>
          <div class="row">
            <div class="col-8 flex-column d-flex">
              <div class="gray-text-color font-montserrat">
                <h5>{{ $lpn['c']->merk }} {{ $lpn['c']->handelsbenaming }}</h5>
              </div>
              <div class="gray-text-color font-weight-bold font-montserrat-thin">
                {{ date('d-m-Y', strtotime($lpn['c']->datum_eerste_toelating)) }}, {{ ucfirst($lpn['c']->inrichting) }}, {{ $lpn['c']->cilinderinhoud }}cc
              </div>
            </div>
          </div>
        </div>
      </div>
@endif
@endif
@endif
@endif
--}}
      @include('frontend.partials.search_bar')
      <div class="container-fluid pt-0 pb-5" id="listings">
        <a class="btn btn-link pl-0 pb-0 btn-sm small {{ Settings::get('show_search_sidebar') ? 'd-sm-none' : 'd-none' }}" data-toggle="collapse" href="#collapseFilters" role="button" aria-expanded="false" aria-controls="collapseFilters">
          {{ __('Toggle filters') }}
        </a>
        <div class="row pt-2">
          <div class="col-12 col-sm-4  col-md-3 collapse show dont-collapse-sm {{ Settings::get('show_search_sidebar') ? '' : 'd-none' }}" id="collapseFilters">
            <div class="card" style="border-radius: 5px">
              <div id="filter" class="card-header height-80 title-align purple-background">
                <h4 class="title-align form-control-plaintext font-montserrat text-light white-text-color">Filter</h4>
              </div>
              <div class="card-body">
                <form class="auto_submit_item" action="{{ route(Settings::get('marketplace_index')) }}" method="get" id="search-sidebar">
                  <input type="hidden" name="q" value="{{ request()->input('q') }}" />
                  <input type="hidden" name="view" value="{{ $view }}" />
                  <input type="hidden" name="sort" />
                  <div class="border-top-0 border-left-0 border-bottom-0 border-right-0 rounded-0">
                    <div id="clear-filters">
@if($is_filtered)
                      <div class=" pl-0 pr-0 pb-2">
                        <div class="row">
                          <div class="col-sm-12">
                            <a href="{{ route(Settings::get('marketplace_index')) }}" class="btn btn-block font-montserrat-regular btn-secondary">@lang('labels.frontend.filters.clear')</a>
                          </div>
                        </div>
                      </div>
@endif
                    </div>
@foreach($facets as $facet)
{{-- Twig version: include 'browse.filters.'~facet.search_ui ignore missing --}}
                    @include('frontend.catalog.filters.'.$facet->search_ui)
@endforeach
                    <div>
                      <button type="submit" class="btn blue-light-bg bord-rad-5 btn-block white-text-color font-montserrat-regular">@lang('labels.frontend.filters.update')</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="{{ Settings::get('show_search_sidebar') ? 'col-12 col-sm-8 col-md-9' : 'col-sm-12' }} card bord-rad-5" id="listing_results">
            <div class="row" id="listing_results_bar">
              <div class="col-sm-12">
                <div class="card card-body border-0 rounded-bottom p-0 border-right" id="listHeader">
                  <div class=" bg-lights pt-0">
                    <div class="row mb-3 card-header purple-background bord-rad-5 bord-rad-buttom-0 border-bottom-0">
                      <div class="col-md-6 d-none d-md-block">
@if($listings->total())
                        <h4 class="title-align form-control-plaintext mb-0 font-montserrat white-text-color">
<?php $number = 0; ?>
@foreach($listings as $key => $item)
@if($item->is_published === 1)
      <span class="displayNone">  {{  $number++ }}</span>
@endif
@endforeach
  <span class="font-montserrat">{{  $number }} </span>
                          @lang('labels.frontend.listings.results')</h4>

@endif
                      </div>

                      <div class="col-md-6 ml-auto mt-2">
                        <form method="get" action="{{ request()->fullUrlWithQuery([]) }}" id="sort-form" accept-charset="utf-8" class="form-vertical float-sm-right">
                          <div class="input-group input-group-sm mb-0">
                            <div class="input-group input-group-sm mb-0">
                              <div class="input-group-prepend">
@if(Settings::get('show_grid'))
                                <a href="{{ request()->fullUrlWithQuery(['view' => 'grid']) }}" class="btn white-text-color font-montserrat-regular {{ $view === 'grid' ? 'active' : '' }}"><i class="fa fa-th mr-2" aria-hidden="true"></i>@lang('labels.frontend.listings.grid')</a>
@endif
@if(Settings::get('show_list'))
                                <a href="{{ request()->fullUrlWithQuery(['view' => 'list']) }}" class="btn white-text-color font-montserrat-regular ml-2 {{ $view === 'list' ? 'active' : '' }}"><i class="fa fa-bars mr-2" aria-hidden="true"></i>@lang('labels.frontend.listings.list')</a>
@endif
                              </div>
{{--                              <select name="sort" id="sort" class="border-left-0 ml-4 form-control form-control-sm max-width-160">--}}
{{--                                <option value="date">@lang('labels.frontend.listings.recent')</option>--}}
{{--                                <option value="price_lowest_first">@lang('labels.frontend.listings.low_high')</option>--}}
{{--                                <option value="price_highest_first">@lang('labels.frontend.listings.high_low')</option>--}}
{{--                              </select>--}}
                            </div>
                          </div>
                          @csrf
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
@if($listings->total() === 0)
                  <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert">@lang('listings.no_results')</div>
                  </div>
@endif
                  <div class="col-sm-12">
@if($view === 'list')
                    @include('frontend.catalog.partials.list')
@else
                    @include('frontend.catalog.partials.grid')
@endif
                  </div>
                </div>
                <div id="indicator">
                  <div class="loader">{{ __('Loading...') }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
    <script>
      if (typeof params === 'undefined') {
        let params = null;
      }
      if (typeof view === 'undefined') {
        let view = '';
      }
      params = {!! json_encode($params) !!};
      view = '{{ $view }}';
    </script>
@endpush
