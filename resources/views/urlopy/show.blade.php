@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{('ID pracownika: ')}}{{ $urlopy->id_pracownika }}</div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Rok: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($urlopy->rok) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Dni wykorzystane: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($urlopy->dni_wykorzystane) }}</label>   
                        </div>


                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Dni max: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($urlopy->dni_max) }}</label>   
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <a href="{{ route('urlopy.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection