@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj') }}</div>

                <div class="card-body">
                    <form action="{{ route('produkcja.update', $stan->id) }}" method="post" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                         <div class="row mb-3">
                            <label for="id_zamowienia" class="col-md-4 col-form-label text-md-end">{{ __('ID zamówienia') }}</label>

                            <div class="col-md-6">
                                <input id="id_zamowienia" type="text" class="form-control @error('id_zamowienia') is-invalid @enderror" name="id_zamowienia" value="{{ $stan->id_zamowienia }}" required autocomplete="id_zamowienia" autofocus>

                                <!--
                                <select id="id_zamowienia" class="form-control @error('id_zamowienia') is-invalid @enderror" name="id_zamowienia" value="{{ $stan->id_zamowienia }}" required autocomplete="id_zamowienia" autofocus>
                                    <option></option>
                                </select>
                                -->

                                @error('id_zamowienia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_modelu" class="col-md-4 col-form-label text-md-end">{{ __('ID modelu') }}</label>

                            <div class="col-md-6">
                                <input id="id_modelu" type="text" class="form-control @error('id_modelu') is-invalid @enderror" name="id_modelu" value="{{ $stan->id_modelu }}" required autocomplete="id_modelu" autofocus>

                                @error('id_modelu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ilosc_obecna" class="col-md-4 col-form-label text-md-end">{{ __('Obecna ilość') }}</label>

                            <div class="col-md-6">
                                <input id="ilosc_obecna" type="text" class="form-control @error('ilosc_obecna') is-invalid @enderror" name="ilosc_obecna" value="{{ $stan->ilosc_obecna }}" required autocomplete="ilosc_obecna" autofocus>

                                @error('ilosc_obecna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ilosc_docelowa" class="col-md-4 col-form-label text-md-end">{{ __('Docelowa ilość') }}</label>

                            <div class="col-md-6">
                                <input id="ilosc_docelowa" type="text" class="form-control @error('ilosc_docelowa') is-invalid @enderror" name="ilosc_docelowa" value="{{ $stan->ilosc_docelowa }}" required autocomplete="ilosc_docelowa" autofocus>

                                @error('ilosc_docelowa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Zapisz') }}
                                </button>
                                <a href="{{ route('produkcja.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
