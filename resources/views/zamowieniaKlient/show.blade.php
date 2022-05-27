@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Szczegóły zamowienia o numerze: ') }}{{$id}} <a style="float:right;" href="{{ route('zamowienia.index') }}">Powrót</a></div>
                <div class="card-header">Zamawiający:</div>
                <table class="table ">
                    <tbody>
                        <tr class="success">
                            <td class="text-center">Imię: {{$kupujacy->imie}} </td>
                            <td class="text-center">E-mail: {{$kupujacy->email}}</td> 
                            <tr>  
                            </tr>
                            <td class="text-center">Nazwisko: {{$kupujacy->nazwisko}}</td>
                            <td class="text-center">Firma: {{$kupujacy->firma}}</td>
                        </tr>
                    </tbody>
                </table>
            </div></br>
            <div class="card">
                <div class="card-header">Wybrane modele:</div>
                <table class="table table-striped">
                    <thead>
                        <tr class="success">
                            <th class="text-center">Model</th>
                            <th class="text-center">Ilość</th>
                            <th class="text-center">Cena modelu</th>
                            <th class="text-center">Łączna cena</th>
                    </thead>
                    <tbody>
                        @foreach($pokaz as $p)
                        <tr>
                            <td class="text-center">{{$p->nazwa_modelu}} </td>
                            <td class="text-center">{{$p->ilosc}}</td>
                            <td class="text-center">{{number_format((int)$p->cena_pojedyncza,0,"."," ")}} zł</td>
                            <td class="text-center">{{number_format((int)$p->laczna_cena,0,"."," ")}} zł</td>   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div></br>
            <div class="card">
                @foreach($glowne as $g)
                <table class="table table-striped">
                    <div class="card-header">Razem:</div>
                    <tbody>
                        <td class="text-center">Łączna cena: {{number_format((int)$laczna_cena,0,"."," ")}} zł</td>
                        <td class="text-center">Status: {{$g->status}}</td>
                        <td class="text-center">Data złożenia: {{$g->data_zlozenia}}</td>
                    </tbody>
                </table>

                @endforeach


                @if(isset($error))
                {{$error}}
                @endif
            </div>
        </div>
    </div>
</div>

@endsection