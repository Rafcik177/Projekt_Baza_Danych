@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Przegląd złożonych zamówień') }}</div>
                
                <table class="table table-striped">
                    <thead>
                        <tr class="success">
                            <th class="text-center">Lp.</th>
                            <th class="text-center">Id_modelu</th>
                            <th class="text-center">Ilość</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Data złożenia</th>
                            <th class="text-center">Kwota</th>
                            <th class="text-center">Edytuj</th>
                            <th class="text-center">Usuń</th>
                            <th class="text-center">Pokaż</th>
                    </thead>
                    <tbody>
                    @foreach($zamowienia as $zam)
                        <tr>
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td class="text-center">{{$zam->id_modelu}}</td> 
                            <td class="text-center">{{$zam->ilosc}}</td>
                            <td class="text-center">{{$zam->status}}</td>
                            <td class="text-center">{{$zam->data_zlozenia}}</td>
                            <td class="text-center">{{$zam->cena}}</td>
                            <td></td>
                            <td>
                            </td>
                            <td class="text-center"></td>
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
