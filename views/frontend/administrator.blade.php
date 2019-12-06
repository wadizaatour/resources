@extends('layouts.frontend')

@section('content')


    <div class="row">
      <div class="col-md-12">
        <p>Accounts<span class="float-right">Totaal aantal accounts (152)</span></p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table id="accounts" class="table table-striped table-bordered bs-select">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Klantnaam</th>
              <th scope="col">Datum aanvraag account</th>
              <th scope="col">Status</th>
              <th scope="col">Verloopdatum</th>
              <th scope="col">Acties</th>
            </tr>
          </thead>
          <tbody>
            <tr>  
                <td scope="row">0125</td>
                <td>Jesper van den Bogaard</td>
                <td>18­02­2019</td>
                <td>
                    <div class="row">
                        <div class="col-md-4 pt-1">
                            <div class="circle green"></div>
                        </div>
                        <div class="col-md-5 p-0">
                            Actief
                        </div>
                    </div>
                </td>
                <td>18­-02-­2020</td>
                <td><i class="fas fa-times"></i><i class="fas fa-edit pl-2"></i><i class="fas fa-ban pl-2"></i></td>
            </tr>
            <tr>
                <td scope="row">0125</td>
                <td>Jesper van den Bogaard</td>
                <td>18­02­2019</td>
                <td>
                    <div class="row">
                        <div class="col-md-4 pt-1">
                            <div class="circle orange"></div>
                        </div>
                        <div class="col-md-5 p-0">
                            Beordelen
                        </div>
                    </div>
                </td>
                <td>18­-02-­2020</td>
                <td><i class="fas fa-times"></i><i class="fas fa-edit pl-2"></i><i class="fas fa-ban pl-2"></i></td>
            </tr>
            <tr>  
                <td scope="row">0125</td>
                <td>Jesper van den Bogaard</td>
                <td>18­02­2019</td>
                <td>
                    <div class="row">
                        <div class="col-md-4 pt-1">
                            <div class="circle red"></div>
                        </div>
                        <div class="col-md-5 p-0">
                            Inactief
                        </div>
                    </div>
                </td>
                <td>18­-02-­2020</td>
                <td><i class="fas fa-times"></i><i class="fas fa-edit pl-2"></i><i class="fas fa-ban pl-2"></i></td>
            </tr>
            <tr>
                <td scope="row">0125</td>
                <td>Jesper van den Bogaard</td>
                <td>18­02­2019</td>
                <td>
                    <div class="row">
                        <div class="col-md-4 pt-1">
                            <div class="circle green"></div>
                        </div>
                        <div class="col-md-5 p-0">
                            Actief
                        </div>
                    </div>
                </td>
                <td>18­-02-­2020</td>
                <td><i class="fas fa-times"></i><i class="fas fa-edit pl-2"></i><i class="fas fa-ban pl-2"></i></td>
            </tr>
            <tr>
                <td scope="row">0125</td>
                <td>Jesper van den Bogaard</td>
                <td>18­02­2019</td>
                <td>
                    <div class="row">
                        <div class="col-md-4 pt-1">
                            <div class="circle green"></div>
                        </div>
                        <div class="col-md-5 p-0">
                            Actief
                        </div>
                    </div>
                </td>
                <td>18­-02-­2020</td>
                <td><i class="fas fa-times"></i><i class="fas fa-edit pl-2"></i><i class="fas fa-ban pl-2"></i></td>
            </tr>
            <tr>
                <td scope="row">0125</td>
                <td>Jesper van den Bogaard</td>
                <td>18­02­2019</td>
                <td>
                    <div class="row">
                        <div class="col-md-4 pt-1">
                            <div class="circle orange"></div>
                        </div>
                        <div class="col-md-5 p-0">
                            Beordelen
                        </div>
                    </div>
                </td>
                <td>18­-02-­2020</td>
                <td><i class="fas fa-times"></i><i class="fas fa-edit pl-2"></i><i class="fas fa-ban pl-2"></i></td>
            </tr>
            <tr>
                <td scope="row">0125</td>
                <td>Jesper van den Bogaard</td>
                <td>18­02­2019</td>
                <td>
                    <div class="row">
                        <div class="col-md-4 pt-1">
                            <div class="circle red"></div>
                        </div>
                        <div class="col-md-5 p-0">
                            Inactief
                        </div>
                    </div>
                </td>
                <td>18­-02-­2020</td>
                <td><i class="fas fa-times"></i><i class="fas fa-edit pl-2"></i><i class="fas fa-ban pl-2"></i></td>
            </tr>
            <tr>
                <td scope="row">0125</td>
                <td>Jesper van den Bogaard</td>
                <td>18­02­2019</td>
                <td>
                    <div class="row">
                        <div class="col-md-4 pt-1">
                            <div class="circle green"></div>
                        </div>
                        <div class="col-md-5 p-0">
                            Actief
                        </div>
                    </div>
                </td>
                <td>18­-02-­2020</td>
                <td><i class="fas fa-times"></i><i class="fas fa-edit pl-2"></i><i class="fas fa-ban pl-2"></i></td>
            </tr>
           
          </tbody>
        </table>
      </div>
    </div>
@endsection
