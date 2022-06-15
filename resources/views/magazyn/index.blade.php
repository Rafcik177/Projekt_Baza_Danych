@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header"><b>{{ __('Spis części') }}</b> <a style="float:right;" href="{{route('magazyn.create') }}" class="btn btn-primary col-3">Dodaj nową część</a> </div>
                <div class="row text center">
                    <div class="table-responsive">
                    
                        <table class="table table-striped">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="text-center">Lp.</th>
                                    <th class="text-center">Id części</th>
                                    <th class="text-center">Opis</th>
                                    <th class="text-center">Długość (m)</th>
                                    <th class="text-center">Szerokość (m)</th>
                                    <th class="text-center">Wysokość (m)</th>
                                    <th class="text-center">Waga (kg)</th>
                                    <th class="text-center">Ilość</th>
                                    <th class="text-center">Próg niskiego stanu</th>
                                    <th class="text-center">Edytuj</th>
                                    <th class="text-center">Usuń</th>
                                    <th class="text-center">Pokaż</th>
                            </thead>
                            <tbody class="table-primary">
                                @foreach($magazyn as $mag)
                                <tr class="border-bottom-0">
                                    <td class="text-center">{{ $loop->index + 1 }}</td> 
                                    <td class="text-center">{{$mag->id_czesci}}</td> 
                                    <td class="text-center">{{$mag->opis}}</td>
                                    <td class="text-center">{{$mag->dlugosc}}</td>
                                    <td class="text-center">{{$mag->szerokosc}}</td>
                                    <td class="text-center">{{$mag->wysokosc}}</td>
                                    <td class="text-center">{{$mag->waga}}</td>
                                    <td class="text-center">{{$mag->ilosc}}</td>
                                    <td class="text-center">{{$mag->prog_niskiego_stanu}}</td>
                                    <td><a href="{{ route('magazyn.edit', $mag->id) }}">Edytuj</a></td>
                                    <td>
                                        <form action="{{ route('magazyn.destroy', $mag->id) }}" method="post" id="delete-form-{{$mag->id}}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a href="" onclick="
                                    if(confirm('Czy na pewno chesz usunąć?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$mag->id}}').submit();
                                    } else {
                                        event.preventDefault();
                                        }">
                                            Usuń
                                        </a>
                                    </td>
                                    <td class="text-center"><a href="{{ route('magazyn.show', $mag->id) }}">Pokaż</a></td>
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