@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $magazyn->nazwa_czesci }}</div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Opis: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($magazyn->opis) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Długość: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($magazyn->dlugosc) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Szerokość: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($magazyn->szerokosc) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Wysokość: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($magazyn->wysokosc) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Waga: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($magazyn->waga) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Ilosc:') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($magazyn->ilosc) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Próg niskiego stanu:') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($magazyn->prog_niskiego_stanu) }}</label>   
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <a href="{{ route('magazyn.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection