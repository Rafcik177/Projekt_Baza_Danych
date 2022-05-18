@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Szczegóły zamowienia o numerze: ') }} {{$id}}<a style="float:right;" href="{{ route('zamowienia.index') }}">Powrót</a></div>
                
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
                            <td class="text-center">{{$p->nazwa}} </td>
                            <td class="text-center">{{$p->ilosc}}</td>
                            <td class="text-center">{{$p->pojedyncza_cena}} zł</td>
                            <td class="text-center">{{$p->laczna_cena}} zł</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                    
                </table>
                    
                
                    
                    
                        @if(isset($error))
                         {{$error}}
                        @endif
                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
