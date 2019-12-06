@extends('layouts.frontend')

@section('highlight')
@include('frontend.partials.sub_header', ['link1' => "AanvraagPurple.png", 'link2' => "VoorraadBlue.png", 'link3' => "BedrijvenPurple.png" ])
@endsection

@section('content')
    <parts-search></parts-search>
    <div class="image-purple purple-background" style="padding: 20px;"> {{-- todo: no inline css (use css class) --}}
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-md-2 order-sm-2">
                <img class="phone-img justify-content-center" src="{{ asset('images/homepage/PhoneIcon.svg') }}" alt="phone" />
            </div>
            <div class="col-md-2 text-mobile-phone-grid order-sm-1" style="text-align: center"> {{-- todo: no inline css (use css class) --}}
                <label class="text-light font22 font-montserrat">
                    Heb je een technische vraag of {{-- todo: translation --}}
                    heb je hulp nodig bij je aanvraag?
                </label>
            </div>
            <div class="col-md-2 order-3 text-mobile-phone-grid-n">
                <label class="font22">Bel 024 - 123 45 67</label> {{-- todo: translation --}}
            </div>
        </div>
    </div>
@endsection
