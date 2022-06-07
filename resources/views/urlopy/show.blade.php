@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <?php $count=0; ?>
                @foreach($pracownicy as $pra)
                <?php if($count==1) break; ?>
                <div class="card-header">{{ __('Urlop pracownika: ')}} {{ $pra->imie }} {{ $pra->nazwisko }} {{ __(', Id: ')}} {{ $pra->id }}</div>
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
                                        <!-- <th class="text-center">Lp.</th>
                                        <th class="text-center">Id pracownika</th> -->
                                        <th class="text-center">Rok</th>
                                        <th class="text-center">Dni wykorzystane</th>
                                        <th class="text-center">Dni max</th>
                                        <th class="text-center">Edytuj</th>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach($urlopy as $url)
                                        <!-- <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{$url->id_pracownika}}</td> -->
                                        <td class="text-center">{{$url->rok}}</td>
                                        <td class="text-center">{{$url->dni_wykorzystane}}</td>
                                        <td class="text-center">{{$url->dni_max}}</td>
                                        <td><a href="{{ route('urlopy.edit', $url->id) }}">Edytuj</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- <a href="{{route('pracownicy.index') }}" class="btn btn-primary col-3">Powrót</a> -->
                            <a href="{{route('urlopy.create') }}" class="btn btn-primary col-3">Dodaj kolejny rok</a>
                            <a href="{{ route('pracownicy.index') }}" class="btn btn-primary col-3">Powrót</a>
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