@extends('layouts.app')

@section('content')
    <div class="row text center">
        <div class="col-lg-6 center">
            <h3>Spis części</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="success">
                            <th class="text-center">Nazwa części<th>
                            <th class="text-center">Opis<th>
                            <th class="text-center">Długość<th>
                            <th class="text-center">Szerokość<th>
                            <th class="text-center">Wysokość<th>
                            <th class="text-center">Waga<th>
                            <th class="text-center">Ilość<th>
                            <th class="text-center">Próg niskiego stanu<th>
                    </thead>
                    <tbody>
                        @foreach($magazyn as $magazy)
                        <tr>
                            <td class="text-center">{{$magazy->nazwa_czesci}}</td>
                            <td class="text-center">{{$magazy->opis}}</td>
                            <td class="text-center">{{$magazy->dlugosc}}</td>
                            <td class="text-center">{{$magazy->szerokosc}}</td>
                            <td class="text-center">{{$magazy->wysokosc}}</td>
                            <td class="text-center">{{$magazy->waga}}</td>
                            <td class="text-center">{{$magazy->ilosc}}</td>
                            <td class="text-center">{{$magazy->prog_niskiego_stanu}}</td>
                            <!-- <td><a href="{{ route('magazyn.edit', $magazy->nazwa_czesci) }}">Edytuj</a></td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{route('magazyn.create') }}" class="btn btn-primary">Dodaj część</a>
        </div>
    </div>
@endsection