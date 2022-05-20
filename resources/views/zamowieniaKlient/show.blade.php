@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Szczegóły zamowienia o numerze: ') }}{{$id}} <a style="float:right;" href="{{ route('zamowienia.index') }}">Powrót</a></div>
               
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
                            <td class="text-center">{{number_format((int)$p->pojedyncza_cena,0,"."," ")}} zł</td>
                            <td class="text-center">{{number_format((int)$p->laczna_cena,0,"."," ")}} zł</td>
                            <td></td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                    
                </table>
                
                @foreach($glowne as $g)
                <table class="table table-striped">
                <div class="card-header">Razem:</div>
                    <tbody>
                            <td class="text-center">Łączna cena: {{number_format((int)$g->cena,0,"."," ")}} zł</td>
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
</div>
@endsection
