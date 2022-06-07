@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj') }}</div>

                <div class="card-body">
                    <form action="{{ route('pracownicy.update', $pracownicy->id) }}" method="post" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row mb-3">
                            <label for="imie" class="col-md-4 col-form-label text-md-end">{{ __('Imie') }}</label>

                            <div class="col-md-6">
                                <input id="imie" type="text" class="form-control @error('imie') is-invalid @enderror" name="imie" value="{{ $pracownicy->imie }}" required autocomplete="imie" autofocus>

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
                                <input id="nazwisko" type="text" class="form-control @error('nazwisko') is-invalid @enderror" name="nazwisko" value="{{ $pracownicy->nazwisko }}" required autocomplete="nazwisko" autofocus>

                                @error('nazwisko')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="data_urodzenia" class="col-md-4 col-form-label text-md-end">{{ __('Data urodzenia') }}</label>

                            <div class="col-md-6">
                                <input id="data_urodzenia" type="text" class="form-control @error('data_urodzenia') is-invalid @enderror" name="data_urodzenia" value="{{ $pracownicy->data_urodzenia }}" required autocomplete="data_urodzenia" autofocus>

                                @error('data_urodzenia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pesel" class="col-md-4 col-form-label text-md-end">{{ __('Pesel') }}</label>

                            <div class="col-md-6">
                                <input id="pesel" type="text" class="form-control @error('pesel') is-invalid @enderror" name="pesel" value="{{ $pracownicy->pesel }}" required autocomplete="pesel" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $pracownicy->email }}" required autocomplete="email" autofocus>

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
                                <select id="id_wydzialu" name="id_wydzialu" style="width: 100%" class="form-control @error('id_wydzialu') is-invalid @enderror">
                                    <option value='6'<?php if($pracownicy->id_wydzialu == 6) { ?> selected="selected"<?php } ?>>-</option>
                                    <option value='1'<?php if($pracownicy->id_wydzialu == 1) { ?> selected="selected"<?php } ?>>Dział administracji</option>
                                    <option value='2'<?php if($pracownicy->id_wydzialu == 2) { ?> selected="selected"<?php } ?>>Dział zamówień</option>
                                    <option value='3'<?php if($pracownicy->id_wydzialu == 3) { ?> selected="selected"<?php } ?>>Dział HR</option>
                                    <option value="4"<?php if($pracownicy->id_wydzialu == 4) { ?> selected="selected"<?php } ?>>Dział produkcji</option>
                                    <option value='5'<?php if($pracownicy->id_wydzialu == 5) { ?> selected="selected"<?php } ?>>Dział magazyn</option>
                                </select>

                                @error('id_wydzialu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="czy_kierownik" class="col-md-4 col-form-label text-md-end">{{ __('Kierownik?') }}</label>

                            <div class="col-md-6">
                                <select id="czy_kierownik" name="czy_kierownik" style="width: 100%" class="form-control @error('czy_kierownik') is-invalid @enderror">
                                    <option value='0'<?php if($pracownicy->czy_kierownik == 0) { ?> selected="selected"<?php } ?>>NIE</option>
                                    <option value='1'<?php if($pracownicy->czy_kierownik == 1) { ?> selected="selected"<?php } ?>>TAK</option>
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
                                <input id="stanowisko" type="text" class="form-control @error('stanowisko') is-invalid @enderror" name="stanowisko" value="{{ $pracownicy->stanowisko }}" required autocomplete="stanowisko" autofocus>

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
                                <input id="wynagrodzenie_miesieczne" type="text" class="form-control @error('wynagrodzenie_miesieczne') is-invalid @enderror" name="wynagrodzenie_miesieczne" value="{{ $pracownicy->wynagrodzenie_miesieczne }}" required autocomplete="wynagrodzenie_miesieczne" autofocus>

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
                                <input id="lata_pracy" type="text" class="form-control @error('lata_pracy') is-invalid @enderror" name="lata_pracy" value="{{ $pracownicy->lata_pracy }}" required autocomplete="lata_pracy" autofocus>

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
                                <input id="wykorzystany_urlop" type="text" class="form-control @error('wykorzystany_urlop') is-invalid @enderror" name="wykorzystany_urlop" value="{{ $pracownicy->wykorzystany_urlop }}" required autocomplete="wykorzystany_urlop" autofocus>

                                @error('wykorzystany_urlop')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="czy_zwolniony" class="col-md-4 col-form-label text-md-end">{{ __('Zwolniony?') }}</label>

                            <div class="col-md-6">
                                <select id="czy_zwolniony" name="czy_zwolniony" style="width: 100%" class="form-control @error('czy_zwolniony') is-invalid @enderror">
                                    <option value='0'<?php if($pracownicy->czy_zwolniony == 0) { ?> selected="selected"<?php } ?>>NIE</option>
                                    <option value='1'<?php if($pracownicy->czy_zwolniony == 1) { ?> selected="selected"<?php } ?>>TAK</option>
                                </select>

                                @error('czy_zwolniony')
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