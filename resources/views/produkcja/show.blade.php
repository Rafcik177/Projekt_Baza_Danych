@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informacje o stanie produkcji</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Numer zamówienia: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($stan->id_zamowienia) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa modelu maszyny: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($stan->id_modelu) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Obecna ilość: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($stan->ilosc_obecna) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Docelowa ilość: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($stan->ilosc_docelowa) }}</label>   
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('produkcja.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection
