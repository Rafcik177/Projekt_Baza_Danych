@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header"> <b>{{ __('Urlopy') }}</b> </div>
                <div class="row text center">
                    <div class="table-responsive">
                    <style>td {border: 0.5px solid black;}</style>
                        <table class="table table-striped">
                            <thead>
                                <tr class="success">
                                    <th class="text-center">Lp.</th>
                                    <th class="text-center">ID Pracownika</th>
                                    <th class="text-center">Rok</th>
                                    <th class="text-center">Dni_wykorzystane</th>
                                    <th class="text-center">Dni_max</th>
                                    <th class="text-center">Edytuj</th>
                                    <th class="text-center">Usuń</th>
                                    <!-- <th class="text-center">Pokaż</th> -->
                            </thead>
                            <tbody>
                                @foreach($urlopy as $urlop)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td> 
                                    <td class="text-center">{{$urlop->id_pracownika}}</td> 
                                    <td class="text-center">{{$urlop->rok}}</td>
                                    <td class="text-center">{{$urlop->dni_wykorzystane}}</td>
                                    <td class="text-center">{{$urlop->dni_max}}</td>
                                    <td><a href="{{ route('urlopy.edit', $urlop->id) }}">Edytuj</a></td>
                                    <td>
                                        <form action="{{ route('urlopy.destroy', $urlop->id) }}" method="post" id="delete-form-{{$urlop->id}}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a href="" onclick="
                                    if(confirm('Czy na pewno chesz usunąć?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$urlop->id}}').submit();
                                    } else {
                                        event.preventDefault();
                                        }">
                                            Usuń
                                        </a>
                                    </td>
                                    <!--- <td class="text-center"><a href="{{ route('urlopy.show', $urlop->id) }}">Pokaż</a></td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('urlopy.create') }}" class="btn btn-primary col-3">Dodaj informacje</a>
                    </div>

                </div>

                @if(isset($error))
                {{$error}}
                @endif

            </div>
        </div>
    </div>
    @endsection