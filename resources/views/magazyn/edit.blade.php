@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj') }}</div>

                <div class="card-body">
                    <form action="{{ route('magazyn.update', $magazyn->id) }}" method="post" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row mb-3">
                            <label for="id_czesci" class="col-md-4 col-form-label text-md-end">{{ __('(Usunąć możliwość edycji numeru id - zmiana nazwy części to jest w spisie czesci do modelu) Id części') }}</label>

                            <div class="col-md-6">
                                <input id="id_czesci" type="text" class="form-control @error('id_czesci') is-invalid @enderror" name="id_czesci" value="{{ $magazyn->id_czesci }}" required autocomplete="id_czesci" autofocus>

                                @error('id_czesci')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Opis') }}</label>

                            <div class="col-md-6">
                                <input id="opis" type="text" class="form-control @error('opis') is-invalid @enderror" name="opis" value="{{ $magazyn->opis }}" required autocomplete="opis" autofocus>

                                @error('opis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="dlugosc" class="col-md-4 col-form-label text-md-end">{{ __('Długość (m)') }}</label>

                            <div class="col-md-6">
                                <input id="dlugosc" type="text" class="form-control @error('dlugosc') is-invalid @enderror" name="dlugosc" value="{{ $magazyn->dlugosc }}" required autocomplete="dlugosc" autofocus>

                                @error('dlugosc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="szerokosc" class="col-md-4 col-form-label text-md-end">{{ __('Szerokość (m)') }}</label>

                            <div class="col-md-6">
                                <input id="szerokosc" type="text" class="form-control @error('szerokosc') is-invalid @enderror" name="szerokosc" value="{{ $magazyn->szerokosc }}" required autocomplete="szerokosc" autofocus>

                                @error('szerokosc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="wysokosc" class="col-md-4 col-form-label text-md-end">{{ __('Wysokość (m)') }}</label>

                            <div class="col-md-6">
                                <input id="wysokosc" type="text" class="form-control @error('wysokosc') is-invalid @enderror" name="wysokosc" value="{{ $magazyn->wysokosc }}" required autocomplete="wysokosc" autofocus>

                                @error('wysokosc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="waga" class="col-md-4 col-form-label text-md-end">{{ __('Waga (kg)') }}</label>

                            <div class="col-md-6">
                                <input id="waga" type="text" class="form-control @error('waga') is-invalid @enderror" name="waga" value="{{ $magazyn->waga }}" required autocomplete="waga" autofocus>

                                @error('waga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="ilosc" class="col-md-4 col-form-label text-md-end">{{ __('Ilość') }}</label>

                            <div class="col-md-6">
                                <input id="ilosc" type="text" class="form-control @error('ilosc') is-invalid @enderror" name="ilosc" value="{{ $magazyn->ilosc }}" required autocomplete="ilosc" autofocus>

                                @error('ilosc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="prog_niskiego_stanu" class="col-md-4 col-form-label text-md-end">{{ __('Próg niskiego stanu') }}</label>

                            <div class="col-md-6">
                                <input id="prog_niskiego_stanu" type="text" class="form-control @error('prog_niskiego_stanu') is-invalid @enderror" name="prog_niskiego_stanu" value="{{ $magazyn->prog_niskiego_stanu }}" required autocomplete="prog_niskiego_stanu" autofocus>

                                @error('prog_niskiego_stanu')
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
                                <a href="{{ route('magazyn.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection