@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$modele->kategoria }} - {{$modele->nazwa }} <a href="{{ url()->previous() }}" style="float:right;">Powrót</a></div>
                <div class="d-inline-flex pt-2 bd-highlight p-3 pb-0">

                    <div class="col-4">
                        <div class="p-3 m-2" style=" background: #033776; color:white; text-align:center;">
                            <h3 class="p-3">{{('Specyfikacja')}}</h3>
                            <div class="p-2 ">Typ: {{$modele->kategoria}}</div>
                            @if($modele->moc!=0)
                            <div class="p-2 ">Moc: {{$modele->moc}} kW</div>
                            @endif
                            <div class="p-2 ">Max prędkość: {{$modele->max_predkosc}} km/h</div>
                            <div class="p-2 ">Waga: {{$modele->waga}} t</div>
                            <div class="p-2 ">Ilość miejsc: {{$modele->ilosc_miejsc}}</div>
                            <div class="p-2 ">Cena: {{number_format((int)$modele->cena,0,"."," ")}} zł</div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="p-3 m-2" style=" background: #bdeaff; height: 300px;">Grafika</div>
                    </div>

                </div>
                <div class="col-12 p-3 pt-0">
                    <div class="p-3 m-2" style=" background: #bdeaff; height: 300px;">OPIS</div>
                </div>
            </div>
            @if(isset($error))
            {{$error}}
            @endif
        </div>
    </div>
</div>
</div>
</div>
@endsection