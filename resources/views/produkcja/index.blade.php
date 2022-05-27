@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Spis modeli') }} </div>
                <div class="row text center">
                    <div class="table-responsive">
                    <style>td {border: 0.5px solid black;}</style>
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
                                    <th class="text-center">Czy ukończona?</th>
                                    <th class="text-center">Edytuj</th>
                                    <th class="text-center">Usuń</th>
                                    <th class="text-center">Pokaż</th>
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
                                    <td class="text-center">{{$m->czy_ukonczona ? 'Tak' : 'Nie'}}</td>
                                    <td><a href="{{ route('produkcja.edit', $m->id) }}">Edytuj</a></td>
                                    <td>
                                        <form action="{{ route('produkcja.destroy', $m->id) }}" method="post" id="delete-form-{{$m->id}}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a href="" onclick="
                                    if(confirm('Czy na pewno chesz usunąć?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$m->id}}').submit();
                                    } else {
                                        event.preventDefault();
                                        }">
                                            Usuń
                                        </a>
                                    </td>
                                    <td class="text-center"><a href="{{ route('produkcja.show', $m->id) }}">Pokaż</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('produkcja.create') }}" class="btn btn-primary col-3">Dodaj nową maszynę</a>
                    </div>

                </div>
            </div>




            @if(isset($error))
            {{$error}}
            @endif

        </div>
    </div>
</div>
@endsection