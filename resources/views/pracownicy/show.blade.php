@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $pracownicy->imie }} {{ $pracownicy->nazwisko }}</div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Data urodzenia: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->data_urodzenia) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Pesel: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->pesel) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Email: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->email) }}</label> 
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Wydział: ') }}</label>
                            <label for="opis" 
                                <?php 
                                if($pracownicy->id_wydzialu == 1) { ?> class="col-md-4 col-form-label text-md-start">Dział administracji<?php }
                                elseif($pracownicy->id_wydzialu == 2) { ?> class="col-md-4 col-form-label text-md-start">Dział zamówień<?php }
                                elseif($pracownicy->id_wydzialu == 3) { ?> class="col-md-4 col-form-label text-md-start">Dział HR<?php }
                                elseif($pracownicy->id_wydzialu == 4) { ?> class="col-md-4 col-form-label text-md-start">Dział produkcji<?php }
                                elseif($pracownicy->id_wydzialu == 5) { ?> class="col-md-4 col-form-label text-md-start">Dział magazyn<?php }
                                elseif($pracownicy->id_wydzialu == 6) { ?> class="col-md-4 col-form-label text-md-start">-<?php }  
                                ?> 
                            </label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Kierownik?') }}</label>
                            <label for="opis" 
                                <?php 
                                if($pracownicy->czy_kierownik == 0) { ?> class="col-md-4 col-form-label text-md-start">NIE<?php }
                                elseif($pracownicy->czy_kierownik == 1) { ?> class="col-md-4 col-form-label text-md-start">TAK<?php } 
                                ?> 
                            </label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Stanowisko:') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->stanowisko) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Data urodzenia: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->data_urodzenia) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Wynagrodzenie miesięczne: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->wynagrodzenie_miesieczne) }} zł</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Lata pracy: ') }}</label>
                            <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($pracownicy->lata_pracy) }}</label>   
                        </div>

                        <div class="row mb-3">
                            <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Zwolniony?') }}</label>
                            <label for="opis" 
                                <?php 
                                if($pracownicy->czy_zwolniony == 0) { ?> class="col-md-4 col-form-label text-md-start">NIE<?php }
                                elseif($pracownicy->czy_zwolniony == 1) { ?> class="col-md-4 col-form-label text-md-start">TAK<?php } 
                                ?> 
                            </label>   
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