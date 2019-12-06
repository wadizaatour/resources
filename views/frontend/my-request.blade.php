@extends('layouts.frontend')

@section('title', __('forms.request.title'))
@section('body_class', 'request-page')

@section('highlight')
@include('frontend.partials.sub_header', ['link1' => "AanvraagPurple.png", 'link2' => "VoorraadBlue.png", 'link3' => "BedrijvenPurple.png" ])
@endsection


@section('content')
    <div class="container container-position">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mt-lg-5" style="border-radius: 5px">
                    <div class="card-header  purple-background"
                         style="border-top-left-radius: 5px; border-top-right-radius: 5px">
                        <h4 class="title-align font-montserrat text-light" style="color: white">Filter</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="gray-text-color font-weight-bold font-montserrat-regular mt-2 mb-2"><h5>
                                    AANVRAGEN</h5></div>
                            <div class="form-check form-check-inline mt-1 mb-1">
                                <input class="form-check-input" type="checkbox" id="ala" value="actieve"/>
                                <label class="form-check-label gray-text-color font-weight-bold font-montserrat-thin"
                                       for="ala" style="font-size: 14px">Allen actieve aanvragen</label>
                            </div>
                        </div>
                        <div  class="gray-text-color font-weight-bold  font-montserrat-regular mt-5 mb-4">
                            <h5>ZOEKEN</h5>
                        </div>
                        <div class=" mt-4 mb-4">
                            <input class="form-group" type="text" id="zok" name="zoeken"/>
                        </div>
                        <div class=" mt-5 mb-5">
                            <a href="">
                                <img
                                    src="{{asset('images/Zoeken.png')}}"
                                    alt="button"
                                    title="moreInfo"
                                />
                            </a>
                        </div>
                       </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card mt-lg-5" style="border-radius: 5px">
                    <div class="card-header  purple-background"
                         style="border-top-left-radius: 5px; border-top-right-radius: 5px">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="title-align font-montserrat text-light mt-1" style="color: white">1.078 resultaten</h4>
                            </div>
                            <div class="col-md-6 row mt-1">
                                <div class="col-4"><label class="text-light font-montserrat-regular mt-2"
                                                          for="sort">sorteer op</label></div>
                                <div class="col-8 form-group  light-gray-background brd3">

                                    <select class="form-control light-gray-background request-input" name="mark">
                                        <option selected="selected" value="prijs" class="font-montserrat-regular gray-text-color">prijs</option>
                                        <option value="peugeot">Peugeot</option>
                                        <option value="fiat">Fiat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <my-request></my-request>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="image-purple purple-background" style="padding: 20px;">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-md-2 order-sm-2">
                <img class="phone-img justify-content-center" src="{{ asset('images/homepage/PhoneIcon.svg') }}"/>
            </div>
            <div class="col-md-2 text-mobile-phone-grid order-sm-1" style="text-align: center">
                <label class="text-light font22 font-montserrat">
                    Heb je een technische vraag of
                    heb je hulp nodig bij je aanvraag?
                </label>
            </div>
            <div class="col-md-2 order-3 text-mobile-phone-grid-n">
                <label class="font22">Bel 024 - 123 45 67</label>
            </div>
        </div>
    </div>
@endsection
