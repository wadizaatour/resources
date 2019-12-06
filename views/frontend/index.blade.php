@extends('layouts.frontend')

@section('body_class', 'page-index')

@section('highlight')
{{-- Image Background Section--}}
  <div class="bg-image image-position"></div>
{{-- Plate Section--}}
  <div class="container-fluid bannerPlate banner-plate-position mobile-plate-position">
    <form action="{{ route('frontend.car.lp', [], false) }}" method="post">
{{-- Header plate --}}
      <div class="card text-center card-borders">
        <div class="card-header title-card-header">
          <h3 class="font-montserrat text-white float-left">@lang('labels.frontend.home.enterPlate')</h3>
        </div>
{{-- Body plate --}}
        <div class="card-body">
          <label class="sub-header">@lang('labels.frontend.home.doYouHavePlate')</label>
          <hr class="clearfix w-100 d-md-none" />
{{-- plate && button --}}
          <div class="row m-1">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6" style="display: flex">
          <div class="eu-logo-plate">
            <img src="{{ asset('images/EULogo.png') }}" alt="EU" />
          </div>
          <div class="">
            @if(session()->has('lpn.i'))
              <input name="q" class="input-plate" value="{{ session()->get('lpn.i') }}" />
            @else
              <input name="q" maxlength="8" class="input-plate" />
            @endif
          </div>
        </div>
            <div class="col-lg-4 col-md-4  col-sm-4 col-xs-6 button-div">
              <button class="btn homepage-button">
                @lang('labels.frontend.home.requestButton')
                <i class="arrow"> </i>
              </button>
            </div>
          </div>
          <div class="container">
            <request-makes></request-makes>
          </div>
          <br class="mobile-only" />
          <hr class="clearfix w-100 d-md-none" />
          <div class="d-flex flex-column justify-content-start mobile-hide-margin left-text-align">
            <div class="p-2">
              <label class="desktop-none ipad-flipped-none label-homepage-mobile">@lang('labels.frontend.home.orToGo')</label>
            </div>
            <div class="p-2">
              <button class="trapezoidNewMobile mobile-only">
                @lang('labels.frontend.home.partsStock')
                <img class="arrow-position rotate-arrow" src="{{ asset('images/homepage/arrow_down.svg') }}" alt="arrow down" />
              </button>
            </div>
            <div class="p-2">
              <button class="trapezoidNewMobile mobile-only">
                @lang('labels.frontend.home.participatingCompanies')
                <img class="arrow-position rotate-arrow" src="{{ asset('images/homepage/arrow_down.svg') }}" alt="arrow down" />
              </button>
            </div>
          </div>
        </div>
      </div>
      {{-- Mobile Menu Section --}}
      {{-- Trapezoid Buttons section --}}
      <div class="container trap-new-mobile">
        <div class="segmented-control">
          <input name="ht" id="ht1" class="sc-label trap-new-mobile lpntab" type="radio" value="1" checked="checked" />
          <label for="ht1"> </label>
          <input name="ht" id="ht2" class="sc-label trap-new-mobile lpntab" type="radio" value="2"  />
          <label for="ht2"> </label>
          <input name="ht" id="ht3" class="sc-label trap-new-mobile" type="radio" value="3" />
          <label for="ht3"> </label>
        </div>
      </div>
      <label class="trap-new trap-new-mobile font-montserrat" id="auto" for="ht1">
        @lang('labels.frontend.home.partRequest')
      </label>
      <label class="trap-new trap-new-mobile font-montserrat" for="ht2">
        <a id="trap" href="{{ route('frontend.catalog.search') }}">@lang('labels.frontend.home.partsStock')</a>
      </label>
      <label class="trap-new trap-new-mobile font-montserrat" id="link1">
        <a id="trap" href="{{ route('frontend.companies.index', [], false) }}">@lang('labels.frontend.home.participatingCompanies')</a>
      </label>
      @csrf
    </form>
  </div>
  {{-- 3 Wheels Section--}}

  <div class="purple-background wheels-margin-mobile">
    <div class="container">
    <div class="row mb-2">
      <div class="col-lg-4 col-md-4">
        <img class="wheel-img" src="{{ asset('images/homepage/piston.svg') }}" alt="wheel" />
        <label class="text-light wheel-txt mashine-semi-bold">@lang('labels.frontend.home.piston')</label>
      </div>
      <div class="col-lg-4 col-md-4 disp-none">
        <img class="wheel-img" src="{{ asset('images/homepage/iconfinder_account.svg') }}" alt="wheel" />
        <label class="text-light wheel-txt mashine-semi-bold">@lang('labels.frontend.home.profile')</label>
      </div>
      <div class="col-lg-4 col-md-4 disp-none">
        <img class="wheel-img" src="{{ asset('images/homepage/sports-car.svg') }}" alt="wheel" />
        <label  class="text-light wheel-txt mashine-semi-bold ">@lang('labels.frontend.home.car')</label>
      </div>
    </div>
  </div>
</div>

@endsection

@section('content')
    <div class="container">
      <div class="row">
    <div class="col-lg-8 col-md-12">
      <h2 class="gray-text-color flex-mobile font-montserrat">@lang('labels.frontend.home.requestLastPart')</h2>
      <div id="showgrid column grid-position-mb"> {{-- todo: Using the same data just for testing --}}
        @foreach($listings->chunk(3) as $row)
          <div class="row flex-mobile">
            @foreach($row as $listing)
              <div class="card mb-3 car-grid">
                <div class="card-header header-text-position">
                  <label class="a-underline font-montserrat">{{ $listing->part->car->make->name }}</label><br />
                </div>
                <div class="card-body">
                  <label class="text-position-grid font-montserrat-regular">
                    {{ $listing->part->car->model->name }}<br />
                    {{ $listing->category->name }}{{-- yeah. at some point near the deadline, categories became names... --}}
                  </label>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>

        <div class="col-lg-4 col-md-6 position-ipad-grid">

            <h2 class="font-montserrat flex-mobile gray-text-color font-23">
              @lang('labels.frontend.home.autoPartsSite')
              <label class="blue-light-color">8.9</label>
            </h2>

          <div class="card gray-background border-0">
            <div class="card-body">

              <div class="text-center font-montserrat-regular">
                John Doe
              </div>
              <div class="text-center font-montserrat-regular gray-text-color">
                @lang('labels.frontend.home.3weeksAgo')
              </div>
              <br />
              <div class="text-center">
                <p class="font-montserrat-regular m-3 gray-text-color">
                  @lang('labels.frontend.home.description')
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('frontend.partials.infoBar')
    <div class="container">
      <div class="sub-header-2 ipad-flipped-title">
        <label>@lang('labels.frontend.home.mostSearched')</label>
      </div>
      <div class="row">
        <div class="col-xl-8">
          <ul id ="limheight">
@foreach(array_rand($makes, 15) as $make)
            <li class="card a-underline font-montserrat">
              <a href="{{ route('frontend.catalog.make', str_slug($makes[$make]), false) }}" class="centred"> {{  $makes[$make] }}</a>
            </li>
@endforeach
          </ul>
        </div>
        <hr class="clearfix w-100 d-md-none" />
        <div class="cadre col-xl-4 mb-4 col-md-6 ml-xl-0 ml-sm-1 ps-cadre">
          <div class="d-flex justify-content-center mt-2">
            <label class="title-purple-grid font-machine">
              @lang('labels.frontend.home.inBrief')<br />
              @lang('labels.frontend.home.ourBenefits'):
            </label>
          </div>
          <hr class="blueHr" />
          <div class="justify-content-center ml-2">
            <div class="row">
              <div class="col-3">
                <img class="mb-2 width-img" src="{{ asset('images/homepage/1.png') }}" alt="number One" />
              </div>
              <div class="col-8">
                <label class="align-items-center ft-size text-grid-purple font-montserrat-regular">@lang('labels.frontend.home.piston') </label>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-3">
                <img class="mb-2 width-img" src="{{ asset('images/homepage/2.png') }}" alt="number One" />
              </div>
              <div class="col-9">
                <label class="align-items-center ft-size text-grid-purple font-montserrat-regular">@lang('labels.frontend.home.profile') </label>
              </div>
            </div>
            <div class="row mt-3 mb-2">
              <div class="col-3">
                <img class="mb-2 width-img" src="{{ asset('images/homepage/3.png') }}" alt="number One" />
              </div>
              <div class="col-8 mt-2">
                <label class="align-items-center ft-size text-grid-purple font-montserrat-regular">@lang('labels.frontend.home.car') </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
