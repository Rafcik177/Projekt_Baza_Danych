@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Zamówienia') }} 
                <form class="form-inline my-2 my-lg-0" type="get" action="{{url('/search')}} ">
                    <input class="form-control mr-sm-2" name ="znajdz" type="search" placeholder="Podaj Id zamówienia">
                    <button class="btn btn-outline-succ@ss my-2 my-sm-0" type="submit">Wyszukaj</button>
                </form>
                </div>
                <div class="row text center">
                    <div class="table-responsive">
                        <style>
                            td{border:0.5px solid black;}
                        </style>
                        
                        <table class="table table-striped">
                            <thead>
                                <tr class="bg-warning">
                                    <th class="text-center">Lp.</th>
                                    <th class="text-center">Id Zamówienia</th>
                                    <th class="text-center">Data Złożenia</th>
                                    <th class="text-center">Cena</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Id Zamawiającego</th>
                                    <th class="text-center">Szczegóły Zamówienia</th>
                                    <th class="text-center">Edytuj</th>
                                    
                            </thead>
                            <tbody >
                                @foreach($zamadmin as $za)
                                <tr class="table-warning">
                                    <td class="text-center">{{ $loop->index + 1 }}</td> 
                                    <td class="text-center">{{$za->id_zamowienia}}</td> 
                                    <td class="text-center">{{$za->data_zlozenia}}</td>
                                    <td class="text-center">{{number_format((int)$za->cena,0,"."," ")}} zł</td>
                                    <td 
                                    <?php 
                                    if($za->staty = 1) { ?> class="text-center">Złożono<?php } 
                                    elseif ($za->staty = 2) { ?> class="text-center">Anulowano klient<?php }
                                    elseif ($za->staty = 3) { ?> class="text-center">Anulowano NZTK<?php }
                                    elseif ($za->staty = 4) { ?> class="text-center">Produkcja<?php }
                                    elseif ($za->staty = 5) { ?> class="text-center">Gotowe<?php }
                                    elseif ($za->staty = 6) { ?> class="text-center">Usunięto<?php }
                                    ?> 
                                    </td>
                                    <td class="text-center">{{$za->id_zamawiajacego}}</td>
                                    <td class="text-center"><a href="{{route('zamadmin.show', $za->id_zamowienia) }}">Pokaż</a></td>
                                    <td class="text-center"><a href="{{ route('zamadmin.edit', $za->id_zamowienia) }}">Edytuj</a></td>
                                    
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