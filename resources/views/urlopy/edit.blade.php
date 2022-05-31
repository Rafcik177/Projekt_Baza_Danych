@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj') }}</div>

                <div class="card-body">
                    <form action="{{ route('urlopy.update', $urlopy->id) }}" method="post" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row mb-3">
                            <label for="id_pracownika" class="col-md-4 col-form-label text-md-end">{{ __('ID pracownika') }}</label>

                            <div class="col-md-6">
                                <input id="id_pracownika" type="text" class="form-control @error('id_pracownika') is-invalid @enderror" name="id_pracownika" value="{{ $urlopy->id_pracownika }}" required autocomplete="id_pracownika" autofocus>

                                @error('id_pracownika')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="rok" class="col-md-4 col-form-label text-md-end">{{ __('Rok') }}</label>

                            <div class="col-md-6">
                                <input id="rok" type="text" class="form-control @error('rok') is-invalid @enderror" name="rok" value="{{ $urlopy->rok }}" required autocomplete="rok" autofocus>

                                @error('rok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="dni_wykorzystane" class="col-md-4 col-form-label text-md-end">{{ __('Dni wykorzystane') }}</label>

                            <div class="col-md-6">
                                <input id="dni_wykorzystane" type="text" class="form-control @error('dni_wykorzystane') is-invalid @enderror" name="dni_wykorzystane" value="{{ $urlopy->dni_wykorzystane }}" required autocomplete="dni_wykorzystane" autofocus>

                                @error('dni_wykorzystane')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="dni_max" class="col-md-4 col-form-label text-md-end">{{ __('Dni max') }}</label>

                            <div class="col-md-6">
                                <input id="dni_max" type="text" class="form-control @error('dni_max') is-invalid @enderror" name="dni_max" value="{{ $urlopy->dni_max }}" required autocomplete="dni_max" autofocus>

                                @error('dni_max')
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
                                <a href="{{ route('urlopy.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection