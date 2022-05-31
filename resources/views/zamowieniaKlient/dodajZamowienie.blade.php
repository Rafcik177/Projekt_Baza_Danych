@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kreator zamówienia') }}</div>
                
                <form method="POST" action="{{ route('zamowienia.store') }}">
                {{ csrf_field() }}
                        {{ method_field('POST') }}
                <div class="d-inline-flex p-2 bd-highlight ">
                    @foreach($modele as $modele)
                    
                    <div class="flex-column p-3 m-2 bd-highlight bg-light">
                        <div class="p-2 text-center " style="font-weight: 600; font-size:20px;">
                        <a href="{{ route('oferta.show', $modele->id) }}" style="text-decoration:none; color:black;">
                                    {{$modele->nazwa}}
                                </a>
                        </div>
                        <div class="p-2 text-center">[Grafika]</div>
                        <div class="p-2 ">Typ: {{$modele->kategoria}}</div>
                        @if($modele->moc!=0)
                        <div class="p-2 ">Moc: {{$modele->moc}}</div>
                        @endif
                        <div class="p-2 ">Max prędkość: {{$modele->max_predkosc}}</div>
                        <div class="p-2 ">Waga: {{$modele->waga}}</div>
                        <div class="p-2 ">Ilość miejsc: {{$modele->ilosc_miejsc}}</div>
                        <div class="p-2 ">Cena: {{number_format((int)$modele->cena,0,"."," ")}} zł</div>
                        <div class="p-2"><input type="hidden" id="pojazd" name="pojazd[]" value="{{$modele->id}}"></div>
                        <div class="p-2 ">Ilość: <input type="number" name="ilosc[]" value="0" min="0" max="10" ></div>
                        
                    </div>

                    @endforeach
                </div>
                    <input type="submit" value="Zamów">
                    </form>
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
