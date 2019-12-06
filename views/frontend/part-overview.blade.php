@extends('layouts.frontend')

@section('title', __('forms.request.title'))
@section('body_class', 'request-page')

@section('highlight')
@include('frontend.partials.sub_header', ['link1' => "AanvraagPurple.png", 'link2' => "VoorraadBlue.png", 'link3' => "BedrijvenPurple.png" ])
@endsection


@section('content')
    <div class="container container-position">
        <car-details></car-details>
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
                                    Conditie</h5></div>
                            <div class="form-check form-check-inline mt-1 mb-1">
                                <input class="form-check-input" type="checkbox" id="gb1" value="Gebruikt"/>
                                <label class="form-check-label gray-text-color font-weight-bold font-montserrat-thin"
                                       for="gb1">Gebruikt</label>
                            </div>
                            <div class="form-check form-check-inline mt-1 mb-1">
                                <input class="form-check-input" type="checkbox" id="nw" value="garagebusiness"/>
                                <label class="form-check-label gray-text-color font-weight-bold font-montserrat-thin"
                                       for="nw">Nieuw</label>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="gray-text-color font-weight-bold font-montserrat-regular mt-5 mb-2"><h5>
                                    Media</h5></div>
                            <div class="form-check form-check-inline mt-1 mb-1">
                                <input class="form-check-input" type="checkbox" id="f1" value="Met"/>
                                <label class="form-check-label gray-text-color font-weight-bold font-montserrat-thin"
                                       for="f1">Met foto</label>
                            </div>
                            <div class="form-check form-check-inline mt-1 mb-1">
                                <input class="form-check-input" type="checkbox" id="f2" value="Zonder"/>
                                <label class="form-check-label gray-text-color font-weight-bold font-montserrat-thin"
                                       for="f2">Zonder foto</label>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="gray-text-color font-weight-bold font-montserrat-regular mt-5 mb-2"><h5>
                                    Prijs</h5></div>
                            <div class="row">
                                <div class="form-group col mr-1">

                                    <input class="form-control light-gray-background  request-input" name="min"
                                           type="number" placeholder="0 &euro;"/>
                                </div>
                                <div class="form-group col">

                                    <div class="form-group light-gray-background">
                                        <input class="form-control light-gray-background  request-input" name="max"
                                               type="number" placeholder="0 &euro;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-check-inline mt-1 mb-1 mr-5">
                                <input type="range" name="quantity" min="1" max="10">
                            </div>
                        </div>

                        <div class="d-flex flex-column">
                            <div class="gray-text-color font-weight-bold font-montserrat-regular mt-5 mb-2"><h5>
                                    Bouwjaar</h5></div>


                            <div class="row ml-3">
                                <div class="col font-montserrat-thin font-weight-bold mr-2">
                                    1987
                                </div>
                                <div class="col font-montserrat-thin font-weight-bold ml-2">
                                    2017
                                </div>
                            </div>
                        </div>


                        <div class="form-check form-check-inline mt-1 mb-1  mr-5">
                            <input type="range" name="quantity" min="1" max="10">
                        </div>


                        <div class="d-flex flex-column">
                            <div class="gray-text-color font-weight-bold font-montserrat-regular mt-5 mb-2"><h5>
                                    Garantie</h5></div>
                            <div class="row  ml-3">
                                <div class="form-group col">
                                    <div class="col font-montserrat-thin font-weight-bold">
                                        0
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <div class="col font-montserrat-thin font-weight-bold">
                                        12
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-check-inline mt-1 mb-1  mr-5">
                                <input type="range" name="quantity" min="1" max="10">
                            </div>
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
                    <search-parts></search-parts>
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
