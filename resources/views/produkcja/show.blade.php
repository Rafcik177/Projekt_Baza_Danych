@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $maszyna->kategoria }} {{ $maszyna->nazwa }}</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Moc (kW): ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($maszyna->moc) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Ilość miejsc: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($maszyna->ilosc_miejsc) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Maksymalna prędkość (km/h): ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($maszyna->max_predkosc) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Waga (tony): ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($maszyna->waga) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Cena (zł): ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($maszyna->cena) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Czy ukończona: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($maszyna->czy_ukonczona) ? 'Tak' : 'Nie' }}</label>   
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
