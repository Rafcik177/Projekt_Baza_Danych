@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj spis części dla modelu ') }} {{ $model->nazwa }}</div>

                <div class="card-body">
                    <form action="{{ route('spisyczesci.store') }}" method="post" role="form">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="row mb-3">
                            <label for="nazwa_czesci" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa części') }}</label>

                            <div class="col-md-6">
                                <input id="nazwa_czesci" type="text" class="form-control @error('nazwa_czesci') is-invalid @enderror" name="nazwa_czesci" value="" required autocomplete="nazwa_czesci" autofocus>

                                @error('nazwa_czesci')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ilosc_do_wykonania" class="col-md-4 col-form-label text-md-end">{{ __('Potrzebna ilość') }}</label>

                            <div class="col-md-6">
                                <input id="ilosc_do_wykonania" type="text" class="form-control @error('ilosc_do_wykonania') is-invalid @enderror" name="ilosc_do_wykonania" value="" required autocomplete="ilosc_do_wykonania" autofocus>

                                @error('ilosc_do_wykonania')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input name="id_modelu" value="{{ $model->id }}" type="text" hidden>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Dodaj pozycję do spisu') }}
                                </button>
                                <a href="{{ route('modele.show', $model->id) }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
