@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Lista pracowników') }} </div>
                <div class="row text center">

                    <div class="table-responsive">
                    <style>td {border: 0.5px solid black;}</style>
                        <table class="table table-striped">
                            <thead>
                                <tr class="success">
                                    <th class="text-center">Lp.</th>
                                    <th class="text-center">Imie</th>
                                    <th class="text-center">Nazwisko</th>
                                    <th class="text-center">Pesel</th>
                                    <th class="text-center">Id wydziału</th>
                                    <th class="text-center">Data urodzenia</th>
                                    <th class="text-center">Stanowisko</th>
                                    <th class="text-center">Czy_kierownik</th>
                                    <th class="text-center">Wynagrodzenie miesięczne</th>
                                    <th class="text-center">Edytuj</th>
                                    <th class="text-center">Usuń</th>
                                    <th class="text-center">Pokaż</th>
                            </thead>
                            <tbody>
                                @foreach($pracownicy as $pra)
                                <tr >
                                    <td class="text-center">{{ $loop->index + 1 }}</td> <!-- <td class="text-center"> {{$pra->id}}</td> -->
                                    <td class="text-center">{{$pra->imie}}</td> <!-- <td class="text-center"><a href="{{ route('pracownicy.show', $pra->id) }}">{{ $pra->nazwa_czesci }}</a></td> -->
                                    <td class="text-center">{{$pra->nazwisko}}</td>
                                    <td class="text-center">{{$pra->pesel}}</td>
                                    <td class="text-center">{{$pra->id_wydzialu}}</td>
                                    <td class="text-center">{{$pra->data_urodzenia}}</td>
                                    <td class="text-center">{{$pra->stanowisko}}</td>
                                    <td class="text-center">{{$pra->czy_kierownik}}</td>
                                    <td class="text-center">{{$pra->wynagrodzenie_miesieczne}}</td>
                                    <td><a href="{{ route('pracownicy.edit', $pra->id) }}">Edytuj</a></td>
                                    <td>
                                        <form action="{{ route('pracownicy.destroy', $pra->id) }}" method="post" id="delete-form-{{$pra->id}}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a href="" onclick="
                                    if(confirm('Czy na pewno chesz usunąć?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$pra->id}}').submit();
                                    } else {
                                        event.preventDefault();
                                        }">
                                            Usuń
                                        </a>
                                    </td>
                                    <td class="text-center"><a href="{{ route('pracownicy.show', $pra->id) }}">Pokaż</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('pracownicy.create') }}" class="btn btn-primary col-3">Dodaj nowego pracownika</a>
                    </div>
                   

                    @if(isset($error))
                    {{$error}}
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection