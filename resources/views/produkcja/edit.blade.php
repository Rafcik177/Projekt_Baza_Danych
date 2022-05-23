@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj') }}</div>

                <div class="card-body">
                    <form action="{{ route('produkcja.update', $maszyna->id) }}" method="post" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                         <div class="row mb-3">
                            <label for="nazwa" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa maszyny') }}</label>

                            <div class="col-md-6">
                                <input id="nazwa" type="text" class="form-control @error('nazwa') is-invalid @enderror" name="nazwa" value="{{ $maszyna->nazwa }}" required autocomplete="nazwa" autofocus>

                                @error('nazwa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kategoria" class="col-md-4 col-form-label text-md-end">{{ __('Kategoria') }}</label>

                            <div class="col-md-6">
                                <input id="kategoria" type="text" class="form-control @error('kategoria') is-invalid @enderror" name="kategoria" value="{{ $maszyna->kategoria }}" required autocomplete="kategoria" autofocus>

                                @error('kategoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="moc" class="col-md-4 col-form-label text-md-end">{{ __('Moc (kW)') }}</label>

                            <div class="col-md-6">
                                <input id="moc" type="text" class="form-control @error('moc') is-invalid @enderror" name="moc" value="{{ $maszyna->moc }}" required autocomplete="moc" autofocus>

                                @error('moc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ilosc_miejsc" class="col-md-4 col-form-label text-md-end">{{ __('Ilość miejsc') }}</label>

                            <div class="col-md-6">
                                <input id="ilosc_miejsc" type="text" class="form-control @error('ilosc_miejsc') is-invalid @enderror" name="ilosc_miejsc" value="{{ $maszyna->ilosc_miejsc }}" required autocomplete="ilosc_miejsc" autofocus>

                                @error('ilosc_miejsc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="max_predkosc" class="col-md-4 col-form-label text-md-end">{{ __('Maksymalna prędkość (km/h)') }}</label>

                            <div class="col-md-6">
                                <input id="max_predkosc" type="text" class="form-control @error('max_predkosc') is-invalid @enderror" name="max_predkosc" value="{{ $maszyna->max_predkosc }}" required autocomplete="max_predkosc" autofocus>

                                @error('max_predkosc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="waga" class="col-md-4 col-form-label text-md-end">{{ __('Waga (tony)') }}</label>

                            <div class="col-md-6">
                                <input id="waga" type="text" class="form-control @error('waga') is-invalid @enderror" name="waga" value="{{ $maszyna->waga }}" required autocomplete="waga" autofocus>

                                @error('waga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cena" class="col-md-4 col-form-label text-md-end">{{ __('Cena (zł)') }}</label>

                            <div class="col-md-6">
                                <input id="cena" type="text" class="form-control @error('cena') is-invalid @enderror" name="cena" value="{{ $maszyna->cena }}" required autocomplete="cena" autofocus>

                                @error('cena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="czy_ukonczona" class="col-md-4 col-form-label text-md-end">{{ __('Czy ukończona?') }}</label>

                            <div class="col-md-6">
                                <select id="czy_ukonczona" class="form-control @error('czy_ukonczona') is-invalid @enderror" name="czy_ukonczona" value="{{ $maszyna->czy_ukonczona }}" required autocomplete="czy_ukonczona" autofocus>
                                    <option value="0">Nie</option>
                                    <option value="1">Tak</option>
                                </select>
                                <!--<input id="czy_ukonczona" type="text" class="form-control @error('czy_ukonczona') is-invalid @enderror" name="czy_ukonczona" value="{{ $maszyna->czy_ukonczona }}" required autocomplete="czy_ukonczona" autofocus>-->

                                @error('czy_ukonczona')
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
                                <a href="{{ route('produkcja.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
