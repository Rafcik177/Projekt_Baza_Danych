@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $pracownicy->imie }} {{ $pracownicy->nazwisko }}</div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Pesel: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->pesel) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Id wydziału: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->id_wydzialu) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Data urodzenia: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->data_urodzenia) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Stanowisko:') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->stanowisko) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Czy kierownik:') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->czy_kierownik) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Wynagrodzenie miesięczne: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->wynagrodzenie_miesieczne) }}</label>   
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <a href="{{ route('pracownicy.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection