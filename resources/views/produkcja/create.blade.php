@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dodaj ciąg produkcyjny') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('produkcja.store') }}" role="form">
                        {{ csrf_field() }}
                       
                        <div class="row mb-3">
                            <label for="id_zamowienia" class="col-md-4 col-form-label text-md-end">{{ __('Numer zamówienia') }}</label>

                            <div class="col-md-6">
                                <input id="id_zamowienia" type="text" class="typeahead form-control @error('id_zamowienia') is-invalid @enderror" name="id_zamowienia" value="{{ old('id_zamowienia') }}" required autocomplete="off" autofocus>
                                <script>
                                    var path = "{{ route('autocomplete_nr_zam') }}";
                                    $('input.typeahead#id_zamowienia').typeahead({
                                        source:  function (query, process) {
                                        return $.get(path, { term: query }, function (data) {
                                                return process(data);
                                            });
                                        }
                                    });
                                </script>

                                <!--
                                <select id="id_zamowienia" class="form-control @error('id_zamowienia') is-invalid @enderror" name="id_zamowienia" value="{{ old('id_zamowienia') }}" required autocomplete="id_zamowienia" autofocus>
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
                            <label for="nazwa_modelu" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa modelu') }}</label>

                            <div class="col-md-6">
                                <input id="nazwa_modelu" type="text" class="form-control @error('nazwa_modelu') is-invalid @enderror" name="nazwa_modelu" value="{{ old('nazwa_modelu') }}" required autocomplete="nazwa_modelu" autofocus>

                                @error('nazwa_modelu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ilosc_docelowa" class="col-md-4 col-form-label text-md-end">{{ __('Docelowa ilość') }}</label>

                            <div class="col-md-6">
                                <input id="ilosc_docelowa" type="text" class="form-control @error('ilosc_docelowa') is-invalid @enderror" name="ilosc_docelowa" value="{{ old('ilosc_docelowa') }}" required autocomplete="ilosc_docelowa" autofocus>

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
                                    {{ __('Dodaj ciąg produkcyjny') }}
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
