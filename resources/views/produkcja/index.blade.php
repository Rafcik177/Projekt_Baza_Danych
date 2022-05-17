@extends('layouts.app')

@section('content')

    <div class="row text center">
        <div class="col-lg-11 center">
            <h3>Spis części</h3>
            <div class="table-responsive">
            <style> td, th { border: 1px solid black; } </style>
                <table class="table table-striped">
                    <thead>
                        <tr class="success">
                            <th class="text-center">L.p.</th>
                            <th class="text-center">Nazwa maszyny</th>
                            <th class="text-center">Kategoria</th>
                            <th class="text-center">Moc (kW)</th>
                            <th class="text-center">Ilość miejsc</th>
                            <th class="text-center">Maksymalna prędkość (km/h)</th>
                            <th class="text-center">Waga (tony)</th>
                            <th class="text-center">Cena (zł)</th>
                    </thead>
                    <tbody>
                    @foreach($maszyna as $m)
                        <tr>
                            <td class="text-center">{{ $loop->index + 1 }}</td> <!-- <td class="text-center"> {{$m->id}}</td> -->
                            <td class="text-center">{{$m->nazwa}}</td>
                            <td class="text-center">{{$m->kategoria}}</td>
                            <td class="text-center">{{$m->moc}}</td>
                            <td class="text-center">{{$m->ilosc_miejsc}}</td>
                            <td class="text-center">{{$m->max_predkosc}}</td>
                            <td class="text-center">{{$m->waga}}</td>
                            <td class="text-center">{{$m->cena}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
            <!-- {{route('magazyn.create') }} -->
            <a href="" class="btn btn-primary">Dodaj nową maszynę</a>
        </div>
    </div>

@endsection
