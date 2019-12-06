@extends('layouts.frontend')

@section('highlight')
  @include('frontend.partials.sub_header', ['link1' => 'AanvraagPurple.png', 'link2' => 'VoorraadBlue.png', 'link3' => 'BedrijvenPurple.png'])
@endsection

@section('content')
    <div class="container">
      <br />
      <h1 class="mb-4 gray-text-color font-montserrat gray-color">@lang('labels.frontend.catalogue.title')</h1>
      <div class="row ipad-none-display">
        <div class="col-md-9">
          <p class="font-montserrat-regular gray-text-color">
            @lang('labels.frontend.catalogue.description')
          </p>
          <div class="carparts-form">
            <div class="row">
              <div class="col-4 pr-0">
                <div class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-find-link active gray-text-color font-montserrat" id="v-pills-licence-plate-tab" data-toggle="pill" href="#v-pills-licence-plate" role="tab" aria-controls="v-pills-licence-plate" aria-selected="true">@lang('labels.frontend.catalogue.licensePlate')</a>
                  <a class="nav-find-link gray-text-color font-montserrat" id="v-pills-merk-tab" data-toggle="pill" href="#v-pills-merk" role="tab" aria-controls="v-pills-merk" aria-selected="false">@lang('labels.frontend.catalogue.brand')</a>
                  <a class="nav-find-link gray-text-color font-montserrat" id="v-pills-article-num-tab" data-toggle="pill" href="#v-pills-article-num" role="tab" aria-controls="v-pills-article-num" aria-selected="false">@lang('labels.frontend.catalogue.articleNumber')</a>
                </div>
              </div>
              <div class="col-8 tabContent">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-licence-plate" role="tabpanel" aria-labelledby="v-pills-licence-plate-tab">
                    <label class="gray-text-color font-montserrat">@lang('labels.frontend.catalogue.enterTheLicensePlate')</label>
                    {{-- plate && button --}}
                    <form action="{{ route('frontend.car.lp', [], false) }}" method="post">
                      <div class="row">
                        <div class="col-8">
@if(session()->has('lpn'))
                          <input name="q" class="plate-input-parts img-input" value="{{ session()->get('lpn')['i'] }}" required="required" />
@else
                          <input name="q" maxlength="8" class="plate-input-parts img-input" required="required" />
@endif
                        </div>
                        <div class="col-4">
                          <input type="image" id="blueButton1" src="{{ asset('images/blueButton.png') }}" alt="@lang('labels.frontend.catalogue.findResults')" />
                        </div>
                      </div>
@if(isset($lpn) && count($lpn))
                      <div class="row"> {{-- appearantly; class 'request-form-body' garbles the 12 column (medium) grid here; using 2+9 (11) instead --}}
                        <div class="col-md-9 request-form-body">
                          <label class="font-montserrat lightgray-text-color"> {{ $lpn['c']->merk }}<br /></label>
                          <label class="font-montserrat-regular lightgray-text-color"> {{ $lpn['c']->handelsbenaming }}</label>
                        </div>
                      </div>
@else
                      <div class="mt-4">
                        <label class="font-montserrat-regular lightgray-text-color">@lang('labels.frontend.catalogue.fill')</label>
                      </div>
@endif
                      <input type="hidden" name="ht" value="2" />
                      @csrf
                    </form>
                  </div>
                  <div class="tab-pane h-25" id="v-pills-merk" role="tabpanel" aria-labelledby="v-pills-merk-tab">
                    <div class="d-flex justify-content-center">
                      <label class="gray-text-color font-montserrat mt-2 ml-2 mb-3 text-center">@lang('labels.frontend.catalogue.selectcarbrand')</label>
                    </div>
                    <form action="{{ route('frontend.catalog.mmt', [], false) }}" method="post">
                      <div class="card-body row d-flex justify-content-center">
                        <make-model></make-model>
                      </div>
                      <div class="d-flex justify-content-center mb-3">
                        <button type="submit" class="btn btn-primary blue-search-button font-montserrat-regular">
                          @lang('labels.frontend.listings.search')
                        </button>
                      </div>
                      @csrf
                    </form>
                  </div>
                  <div class="tab-pane fade" id="v-pills-article-num" role="tabpanel" aria-labelledby="v-pills-article-num-tab">
                    <form action="{{ route('frontend.catalog', [], false) }}" method="get">
                      <label class="gray-text-color font-montserrat-regular" for="sku">
                        @lang('labels.frontend.catalogue.articleNumber')
                      </label>
                      <div class="row">
                        <div class="col-8">
                          <input type="text" id="sku" name="q" required="required" class="form-control input" />
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary blue-search-button font-montserrat-regular">
                            @lang('labels.frontend.catalogue.search')
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="accordion" class="mobile-only">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link gray-text-color font-montserrat" data-toggle="collapse"
                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                @lang('labels.frontend.catalogue.licensePlate')
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <div class="row d-flex justify-content-center justify-content-xs-center">
                <div class="col-xs-2 col-sm-6 ml-4">
@if(session()->has('lpn'))
                  <input name="lpn" class="plate-input-parts img-input" value="{{ session()->get('lpn')['i'] }}" required="required" />
@else
                  <input name="lpn" maxlength="8" class="plate-input-parts img-input" required="required" />
@endif
                </div>
                <div class="col-xs-2 col-sm-4 d-flex justify-content-center">
                  <a href="{{ route('frontend.catalog', [], false) }}" title="find results">
                    <img src="{{ asset('images/blueButton.png') }}" alt="button" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed gray-text-color font-montserrat" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                @lang('labels.frontend.catalogue.brand')
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="d-flex justify-content-center">
              <label class="gray-text-color font-montserrat mt-2 ml-2 mb-3 text-center">
                @lang('labels.frontend.catalogue.selectcarbrand')
              </label>
            </div>
            <div class="card-body row d-flex justify-content-center">
           <make-model></make-model>
            </div>
            <div class="d-flex justify-content-center mb-3">
              <label class="gray-text-color font-montserrat-regular text-center">
                @lang('labels.frontend.catalogue.selectBrandModel')
              </label>
            </div>
            <div class="d-flex justify-content-center mb-3">
              <button type="submit" class="btn btn-primary blue-search-button font-montserrat-regular">
                @lang('labels.frontend.catalogue.search')
              </button>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed gray-text-color font-montserrat" data-toggle="collapse"
                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                @lang('labels.frontend.catalogue.search')
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              <label class="gray-text-color font-montserrat-regular">@lang('labels.frontend.catalogue.articleNumber')</label>
              <div class="row">
                <div class="col-8">
                  <input id="artikelnummer" required="required" name="Artikelnummer" type="text" class="form-control input" />
                </div>
                <div class="col-4 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary blue-search-button font-montserrat-regular">
                    @lang('labels.frontend.catalogue.search')
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('frontend.partials.infoBar')
@endsection
