@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Historia pracowników') }} </div>
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
                                        <th class="text-center">Id pracownika</th>
                                        <th class="text-center">Data start</th>
                                        <th class="text-center">Data koniec</th>
                                        <th class="text-center">Wydział</th>
                                        <th class="text-center">Stanowisko</th>
                                </thead>
                                <tbody>
                                    @foreach($historia as $his)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{$his->id_pracownika}}</td>
                                        <td class="text-center">{{$his->data_start}}</td>
                                        <td class="text-center">{{$his->data_koniec}}</td>
                                        <td class="text-center">{{$his->wydzial}}</td>
                                        <td class="text-center">{{$his->stanowisko}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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