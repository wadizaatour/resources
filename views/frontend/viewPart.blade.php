@extends('layouts.frontend')

@section('content')


    <div class="row">
      <div class="col-md-12">
        <h2>Voorbumper Renault Clio Estate 2018</h2>
      </div>
    </div>

    <div class="row pt-2 pb-5">
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12">
            <img src="https:/via.placeholder.com/300" class="img-fluid">
          </div>
        </div>  
        <div class="row pt-4">
          <div class="col-md-4">
            <img src="https:/via.placeholder.com/100" class="img-fluid">
          </div>
          <div class="col-md-4">
            <img src="https:/via.placeholder.com/100" class="img-fluid">
          </div>
        </div>      
      </div>
      <div class="col-md-7">
        <div class="row">
            <div class="col">
                <p>€ 365,00</p>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col">
                <p class="m-0">@lang('labels.frontend.titles.carBrand'): Renault</p>
            </div>
            <div class="col">
                <p class="m-0">@lang('labels.frontend.titles.articleNumber'): 1455874224</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="m-0">@lang('labels.frontend.titles.model'): Clio</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="m-0">@lang('forms.request.performance'): Estate</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="m-0">@lang('forms.request.constructionYear'): 2018</p>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col">
                <p class="m-0">Nette voorbumper... ziet er nog helemaal mooi uit als nieuw. Mag verkocht worden voor een mooie prijs.</p>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col bordered">
                <h5>@lang('labels.frontend.titles.dataProvider'):</h5>
                <p class="m-0">Autobedrijf Janssen<br>
                                Roggeweg 30D<br>
                                6534AJ Nijmegen<br>
                                +31 (0) 24 30 10 049<br>
                                info@janssennijmegen.nl
                </p>
            </div>
        </div>
        <div class="row pt-3 align-items-center">
            <div class="col-md-4">
                <img src="https:/via.placeholder.com/150x100" class="img-fluid">
            </div>
            <div class="col-md-4">
                <p>Donorvoertuig</p>
            </div>
        </div>
      </div>
    </div>
@endsection



