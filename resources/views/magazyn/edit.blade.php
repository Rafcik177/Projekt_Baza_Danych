@extends('layouts.app')

@section('content')
<h3>Edytuj</h3>
    <form action="{{ route('magazyn.update', $magazyn->nazwa_czesci) }}" method="post" role="form" class="form-horizontal">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <label for="nazwa_czesci">Nazwa Części </label>
    <input type="text" name="nazwa_czesci" value="{{ $magazyn->nazwa_czesci }}">
    <label for="opis">Opis </label>
    <input type="text" name="opis" value="{{ $magazyn->opis }}">
    <label for="dlugosc">Długość </label>
    <input type="text" name="dlugosc" value="{{ $magazyn->dlugosc }}">
    <label for="szerokosc">Szerokość </label>
    <input type="text" name="szerokosc" value="{{ $magazyn->szerokosc }}">
    <label for="wysokosc">Wysokość </label>
    <input type="text" name="wysokosc" value="{{ $magazyn->wysokosc }}">
    <label for="waga">Waga </label>
    <input type="text" name="waga" value="{{ $magazyn->waga }}">
    <label for="ilosc">Ilość </label>
    <input type="text" name="ilosc" value="{{ $magazyn->ilosc }}">
    <label for="prog_niskiego_stanu">Prog niskiego stanu </label>
    <input type="text" name="prog_niskiego_stanu" value="{{ $magazyn->prog_niskiego_stanu }}">
<button type="submit" class="btn btn-success">Zapisz</button>
<a href="{{ route('magazyn.index') }}" class="btn btn-primary">Powrót</a>
<form>
@endsection