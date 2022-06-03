@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('UWAGA - Niski stan części w nsazynie') }} </div>
                <div class="row text center">
                    <div class="table-responsive">
                        <style>
                            td{border:0.5px solid black;}
                        </style>
                        
                        <table class="table table-striped">
                            <thead>
                                <tr class="bg-danger">
                                    <th class="text-center">Lp.</th>
                                    <th class="text-center">Nazwa części</th>
                                    <th class="text-center">Ilość</th>
                                    <th class="text-center">Próg niskiego stanu</th>
                            </thead>
                            <tbody>
                                @foreach($niskistan as $ns)
                                <tr class="table-danger">
                                    <td class="text-center">{{ $loop->index + 1 }}</td> <!-- <td class="text-center"> {{$ns->id}}</td> -->
                                    <td class="text-center">{{$ns->id_czesci}}</td> 
                                    <td class="text-center">{{$ns->ilosc}}</td>
                                    <td class="text-center">{{$ns->prog_niskiego_stanu}}</td>
                                    
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