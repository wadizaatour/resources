@extends('layouts.frontend')

@section('highlight')
  @include('frontend.partials.sub_header', ['link1' => 'AanvraagPurple.png', 'link2' => 'VoorraadPurple.png', 'link3' => 'BedrijvenBlue.png'])
@endsection

@section('content')
    <div class="container">
      <div class="d-flex flex-row justify-content-between mt-4">
        <div class="gray-text-color font-montserrat"><h2>{{ $company->name }}</h2></div>
        <div><a href="{{ route('frontend.companies.index', [], false) }}" class="font-montserrat-regular blue-light-color download2">@lang('labels.frontend.companies.back')</a></div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 col-sm-9 col-md-7 gray-text-color font-montserrat-thin text-left">
@if(trim($company->public_introduction) !== '')
          <p>{{ $company->public_introduction }}</p>
@endif
          <p>@lang('labels.frontend.companies.more_info') <a href="{{ $company->website }}" title="{{ $company->name }}" target="_blank" class="text-black-50 font-weight-bold">{{ $company->website }}</a></p> {{-- todo: translation --}}
        </div>
        <div class="col-lg-5 col-sm-3 col-md-4 ml-lg-0 w-mobile-3 gray-background">
          <div class="d-flex mt-4 flex-column">
            <div class="p-2 gray-text-color font-montserrat mt-3"><h5>{{ $company->name }}</h5></div>
@if($company->logo !== null)
            <div class="p-2 mb-2">
              <img src="{{ Storage::url($company->logo) }}" class="logo-company" alt="Logo" />
            </div>
@endif {{-- else placeholder? --}}
            <div class="p-2 gray-text-color font-montserrat-thin font-weight-bold w-50 mt-2">
              {{ $company->address->street }} {{ $company->address->building_nr }}<br />
              {{ $company->address->postal }} {{ $company->address->city }} {{ $company->address->state ?? '' }}
            </div>
            <div class="p-2 gray-text-color font-montserrat-thin font-weight-bold"><a href="{{ $company->website }}" title="{{ $company->name }}" target="_blank" class="text-black-50 font-weight-bold">{{ $company->website }}</a></div>
@if(trim($company->address->phone) !== '') {{-- todo: also, check setting for this company --}}
            <div class="p-2 gray-text-color font-montserrat-regular">@lang('labels.frontend.companies.contact_via')</div>
   <div class="pb-5">
     <i class="fa fa-phone p-2" aria-hidden="true">
      <span class="ml-3">{{ $company->address->phone }}
      </span>
     </i>
     @if(count($company->users) > 0)
     <i class="fa fa-id-card-o p-2" aria-hidden="true">
      <span class="ml-2">

 {{ $company->users->first()->email }}

      </span></i>
     @endif
   </div>
@endif
          </div>
        </div>
      </div>
    </div>
@include('frontend.partials.infoBar')
@endsection
