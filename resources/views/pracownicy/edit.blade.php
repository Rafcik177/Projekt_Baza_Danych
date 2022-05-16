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
                            <label for="id_wydzialu" class="col-md-4 col-form-label text-md-end">{{ __('Id wydziału') }}</label>

                            <div class="col-md-6">
                                <input id="id_wydzialu" type="text" class="form-control @error('id_wydzialu') is-invalid @enderror" name="id_wydzialu" value="{{ $pracownicy->id_wydzialu }}" required autocomplete="id_wydzialu" autofocus>

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
                                <input id="data_urodzenia" type="text" class="form-control @error('data_urodzenia') is-invalid @enderror" name="data_urodzenia" value="{{ $pracownicy->data_urodzenia }}" required autocomplete="data_urodzenia" autofocus>

                                @error('data_urodzenia')
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
                            <label for="czy_kierownik" class="col-md-4 col-form-label text-md-end">{{ __('Czy kierownik') }}</label>

                            <div class="col-md-6">
                                <input id="czy_kierownik" type="text" class="form-control @error('czy_kierownik') is-invalid @enderror" name="czy_kierownik" value="{{ $pracownicy->czy_kierownik }}" required autocomplete="czy_kierownik" autofocus>

                                @error('czy_kierownik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="wynagrodzenie_miesieczne" class="col-md-4 col-form-label text-md-end">{{ __('Wynagrodzenie miesięczne') }}</label>

                            <div class="col-md-6">
                                <input id="wynagrodzenie_miesieczne" type="text" class="form-control @error('wynagrodzenie_miesieczne') is-invalid @enderror" name="wynagrodzenie_miesieczne" value="{{ $pracownicy->wynagrodzenie_miesieczne }}" required autocomplete="wynagrodzenie_miesieczne" autofocus>

                                @error('wynagrodzenie_miesieczne')
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