@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj') }}</div>

                <div class="card-body">
                    <form action="{{ route('modele.update', $model->id) }}" method="post" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                         <div class="row mb-3">
                            <label for="nazwa" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa modelu') }}</label>

                            <div class="col-md-6">
                                <input id="nazwa" type="text" class="form-control @error('nazwa') is-invalid @enderror" name="nazwa" value="{{ $model->nazwa }}" required autocomplete="nazwa" autofocus>

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
                                <input id="kategoria" type="text" class="form-control @error('kategoria') is-invalid @enderror" name="kategoria" value="{{ $model->kategoria }}" required autocomplete="kategoria" autofocus>

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
                                <input id="moc" type="text" class="form-control @error('moc') is-invalid @enderror" name="moc" value="{{ $model->moc }}" required autocomplete="moc" autofocus>

                                @error('moc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ilosc_miejsc" class="col-md-4 col-form-label text-md-end">{{ __('Ilo???? miejsc') }}</label>

                            <div class="col-md-6">
                                <input id="ilosc_miejsc" type="text" class="form-control @error('ilosc_miejsc') is-invalid @enderror" name="ilosc_miejsc" value="{{ $model->ilosc_miejsc }}" required autocomplete="ilosc_miejsc" autofocus>

                                @error('ilosc_miejsc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="max_predkosc" class="col-md-4 col-form-label text-md-end">{{ __('Maksymalna pr??dko???? (km/h)') }}</label>

                            <div class="col-md-6">
                                <input id="max_predkosc" type="text" class="form-control @error('max_predkosc') is-invalid @enderror" name="max_predkosc" value="{{ $model->max_predkosc }}" required autocomplete="max_predkosc" autofocus>

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
                                <input id="waga" type="text" class="form-control @error('waga') is-invalid @enderror" name="waga" value="{{ $model->waga }}" required autocomplete="waga" autofocus>

                                @error('waga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cena" class="col-md-4 col-form-label text-md-end">{{ __('Cena (z??)') }}</label>

                            <div class="col-md-6">
                                <input id="cena" type="text" class="form-control @error('cena') is-invalid @enderror" name="cena" value="{{ $model->cena }}" required autocomplete="cena" autofocus>

                                @error('cena')
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
                                <a href="{{ route('modele.index') }}" class="btn btn-primary">Powr??t</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
