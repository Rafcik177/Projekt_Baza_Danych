@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Zamówienia') }} </div>
                <div class="row text center">
                    <div class="table-responsive">
                        <style>
                            td{border:0.5px solid black;}
                        </style>
                        
                        <table class="table table-striped">
                            <thead>
                                <tr class="bg-suces">
                                    <th class="text-center">Lp.</th>
                                    <th class="text-center">Id Zamówienia</th>
                                    <th class="text-center">Data Złożenia</th>
                                    <th class="text-center">Cena</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Id Zamawiającego</th>
                                    <th class="text-center">Szczegóły Zamówienia</th>
                                    
                            </thead>
                            <tbody >
                                @foreach($zamadmin as $za)
                                <tr class="table-succes">
                                    <td class="text-center">{{ $loop->index + 1 }}</td> 
                                    <td class="text-center">{{$za->id_zamowienia}}</td> 
                                    <td class="text-center">{{$za->data_zlozenia}}</td>
                                    <td class="text-center">{{number_format((int)$za->cena,0,"."," ")}} zł</td>
                                    <td class="text-center">{{$za->status}}</td>
                                    <td class="text-center">{{$za->id_zamawiajacego}}</td>

                                    <td class="text-center"><a href="{{route('zamadmin.show', $za->id_zamowienia) }}">Pokaż</a></td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>

                </div>

                @if(isset($error))
                {{$error}}
                @endif

            </div>
        </div>
    </div>
    @endsection