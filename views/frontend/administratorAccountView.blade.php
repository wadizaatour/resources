@extends('layouts.frontend')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <h3>Account Jesper van den Bogaard</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Jesper van den Bogaard<br>Jesper's autohandel</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Roggeweg 30D<br>
                    6534AJ<br>
                    Nijmegen<br>
                    Gelderland<br>
                    Nederland
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>024­3010049<br>06­41896569</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>info@jespersautohandel.nl<br>www.jespersautohandel.nl</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>KvK: 02541254<br>BTW: NL55541428455B01</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Branche: autohandel</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="edit" value="yes">
                        <label class="form-check-label" for="edit">Bewerk bedrijfsgegevens</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sell_parts" value="yes">
                        <label class="form-check-label" for="sell_parts">Ik wil onderdelen verkopen</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {{ Form::select('address', ['test' => 'Test'], null, ['placeholder' => 'Type abonnement', 'class' => 'form-control request-input']) }}
                    <label for="address">Momenteel: onbeperkt plaatsen € 199 p/m</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 ">
                <button class="btn btn-success w-100">Goedkeuren</button>
            </div>
            <div class="col-md-5">
                <button class="btn btn-success w-100">Account deblokkeren</button>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-md-5">
                <button class="btn btn-danger w-100">Afkeuren</button>
            </div>
            <div class="col-md-5">
                <button class="btn btn-danger w-100">Account blokkeren</button>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-md-5">
                <button class="btn btn-secondary w-100">Account opslaan</button>
            </div>
        </div>
    </div>

</div>

@endsection