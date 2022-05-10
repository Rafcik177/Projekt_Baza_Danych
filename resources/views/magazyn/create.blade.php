@extends('layouts.app')

@section('content')
<h3>Dodaj część</h3>
    <form action="{{ route('magazyn.store') }}" method="post" role="form" class="form-horizontal">
    {{ csrf_field() }}
    <label for="nazwa_czesci">Nazwa Części </label>
    <input type="text" name="nazwa_czesci">
    <label for="opis">Opis </label>
    <input type="text" name="opis">
    <label for="dlugosc">Długość </label>
    <input type="text" name="dlugosc">
    <label for="szerokosc">Szerokość </label>
    <input type="text" name="szerokosc">
    <label for="wysokosc">Wysokość </label>
    <input type="text" name="wysokosc">
    <label for="waga">Waga </label>
    <input type="text" name="waga">
    <label for="ilosc">Ilość </label>
    <input type="text" name="ilosc">
    <label for="prog_niskiego_stanu">Próg niskiego stanu </label>
    <input type="text" name="prog_niskiego_stanu">
<button type="submit" class="btn btn-success">Zapisz</button>
<a href="{{ route('magazyn.index') }}" class="btn btn-primary">Powrót</a>
<form>
@endsection