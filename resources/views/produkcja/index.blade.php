@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Stany produkcji') }} </div>
                <div class="row text center">
                    <div class="table-responsive">
                    <style>td {border: 0.5px solid black;}</style>
                        <table class="table table-striped">
                            <thead>
                                <tr class="success">
                                    <th class="text-center">L.p.</th>
                                    <th class="text-center">Numer zamówienia</th>
                                    <th class="text-center">Nazwa modelu maszyny</th>
                                    <th class="text-center">Obecna ilość</th>
                                    <th class="text-center">Docelowa ilość</th>
                                    <th class="text-center">Edytuj</th>
                                    <th class="text-center">Usuń</th>
                                    <th class="text-center">Pokaż</th>
                            </thead>
                            <tbody>
                                @foreach($stan as $s)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('zamadmin.show', $s->id_zamowienia) }}">{{ $zam_numer[$loop->index] }}</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('modele.show', $s->id_modelu) }}">{{ $model_nazwa[$loop->index] }}</a>
                                    <td class="text-center">{{$s->ilosc_obecna}}</td>
                                    <td class="text-center">{{$s->ilosc_docelowa}}</td>
                                    <td><a href="{{ route('produkcja.edit', $s->id) }}">Edytuj</a></td>
                                    <td>
                                        <form action="{{ route('produkcja.destroy', $s->id) }}" method="post" id="delete-form-{{$s->id}}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a href="" onclick="
                                    if(confirm('Czy na pewno chesz usunąć?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$s->id}}').submit();
                                    } else {
                                        event.preventDefault();
                                        }">
                                            Usuń
                                        </a>
                                    </td>
                                    <td class="text-center"><a href="{{ route('produkcja.show', $s->id) }}">Pokaż</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('produkcja.create') }}" class="btn btn-primary col-3">Dodaj nowy ciąg produkcyjny</a>
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
