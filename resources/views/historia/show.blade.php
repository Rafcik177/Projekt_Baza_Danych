@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <?php $count=0; ?>
                @foreach($pracownicy as $pra)
                <?php if($count==1) break; ?>
                <div class="card-header">{{ __('Historia pracownika: ')}} {{ $pra->imie }} {{ $pra->nazwisko }} {{ __(', Id: ')}} {{ $pra->id }}</div>
                <?php $count++; ?>
                @endforeach
                <div class="row text center">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <style>
                                td,
                                th {
                                    border: 1px solid black;
                                }
                            </style>
                            <table class="table table-striped">
                                <thead>
                                    <tr class="success">
                                        <th class="text-center">Lp.</th>
                                        <th class="text-center">Data start</th>
                                        <th class="text-center">Data koniec</th>
                                        <th class="text-center">Wydział</th>
                                        <th class="text-center">Stanowisko</th>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach($historia as $his)
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{$his->data_start}}</td>
                                        <td class="text-center">{{$his->data_koniec}}</td>
                                        <td 
                                        <?php 
                                            if($his->wydzial == 1) { ?> class="text-center">Dział administracji<?php } 
                                            elseif ($his->wydzial == 2) { ?> class="text-center">Dział zamówień<?php }
                                            elseif ($his->wydzial == 3) { ?> class="text-center">Dział HR<?php }
                                            elseif ($his->wydzial == 4) { ?> class="text-center">Dział produkcji<?php }
                                            elseif ($his->wydzial == 5) { ?> class="text-center">Dział magazyn<?php }
                                            elseif ($his->wydzial == 6) { ?> class="text-center">-<?php }
                                        ?> 
                                        </td>
                                        <td class="text-center">{{$his->stanowisko}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{route('pracownicy.index') }}" class="btn btn-primary col-3">Powrót</a>
                        </div>

                        @if(isset($error))
                        {{$error}}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection