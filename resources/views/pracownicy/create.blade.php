@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dodaj pracownika') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pracownicy.store') }}" role="form">
                        {{ csrf_field() }}

                        <div class="row mb-3">
                            <label for="imie" class="col-md-4 col-form-label text-md-end">{{ __('Imie') }}</label>

                            <div class="col-md-6">
                                <input id="imie" type="text" class="form-control @error('imie') is-invalid @enderror" name="imie" value="{{ old('imie') }}" required autocomplete="imie" autofocus>

                                @error('imie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="nazwisko" class="col-md-4 col-form-label text-md-end">{{ __('Nazwisko') }}</label>

                            <div class="col-md-6">
                                <input id="nazwisko" type="text" class="form-control @error('nazwisko') is-invalid @enderror" name="nazwisko" value="{{ old('nazwisko') }}" required autocomplete="nazwisko" autofocus>

                                @error('nazwisko')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="pesel" class="col-md-4 col-form-label text-md-end">{{ __('Pesel') }}</label>

                            <div class="col-md-6">
                                <input id="pesel" type="text" class="form-control @error('pesel') is-invalid @enderror" name="pesel" value="{{ old('pesel') }}" required autocomplete="pesel" autofocus>

                                @error('pesel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_wydzialu" class="col-md-4 col-form-label text-md-end">{{ __('Wydział') }}</label>

                            <div class="col-md-6">
                                <select id="id_wydzialu" name="id_wydzialu" class="form-control @error('id_wydzialu') is-invalid @enderror">
                                    <option value='6'>-</option>
                                    <option value='1'>Dział administracji</option>
                                    <option value='2'>Dział zamówień</option>
                                    <option value='3'>Dział HR</option>
                                    <option value='4'>Dział produkcji</option>
                                    <option value='5'>Dział magazyn</option>
                                </select>

                                @error('id_wydzialu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="data_urodzenia" class="col-md-4 col-form-label text-md-end">{{ __('Data urodzenia') }}</label>

                            <div class="col-md-6">
                                <input id="data_urodzenia" type="date" class="form-control @error('data_urodzenia') is-invalid @enderror" name="data_urodzenia" value="{{ old('data_urodzenia') }}" required autocomplete="data_urodzenia" autofocus>

                                @error('data_urodzenia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="czy_kierownik" class="col-md-4 col-form-label text-md-end">{{ __('Kierownik?') }}</label>

                            <div class="col-md-6">
                                <select id="czy_kierownik" name="czy_kierownik" class="form-control @error('czy_kierownik') is-invalid @enderror">
                                    <option value='0'>NIE</option>
                                    <option value='1'>TAK</option>
                                </select>

                                @error('czy_kierownik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stanowisko" class="col-md-4 col-form-label text-md-end">{{ __('Stanowisko') }}</label>

                            <div class="col-md-6">
                                <input id="stanowisko" type="text" class="form-control @error('stanowisko') is-invalid @enderror" name="stanowisko" value="{{ old('stanowisko') }}" required autocomplete="stanowisko" autofocus>

                                @error('stanowisko')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="wynagrodzenie_miesieczne" class="col-md-4 col-form-label text-md-end">{{ __('Wynagrodzenie miesięczne (zł)') }}</label>

                            <div class="col-md-6">
                                <input id="wynagrodzenie_miesieczne" type="text" class="form-control @error('wynagrodzenie_miesieczne') is-invalid @enderror" name="wynagrodzenie_miesieczne" value="{{ old('wynagrodzenie_miesieczne') }}" required autocomplete="wynagrodzenie_miesieczne" autofocus>

                                @error('wynagrodzenie_miesieczne')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lata_pracy" class="col-md-4 col-form-label text-md-end">{{ __('Lata pracy') }}</label>

                            <div class="col-md-6">
                                <input id="lata_pracy" type="text" class="form-control @error('lata_pracy') is-invalid @enderror" name="lata_pracy" value="{{ old('lata_pracy') }}" required autocomplete="lata_pracy" autofocus>

                                @error('lata_pracy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="wykorzystany_urlop" class="col-md-4 col-form-label text-md-end">{{ __('Wykorzystane w roku zatrudnienia dni urlopu') }}</label>

                            <div class="col-md-6">
                                <input id="wykorzystany_urlop" type="text" class="form-control @error('wykorzystany_urlop') is-invalid @enderror" name="wykorzystany_urlop" value="{{ old('wykorzystanu_urlop') }}" required autocomplete="wykorzystany_urlop" autofocus>

                                @error('wykorzystany_urlop')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Dodaj pracownika') }}
                                </button>
                                <a href="{{ route('pracownicy.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection