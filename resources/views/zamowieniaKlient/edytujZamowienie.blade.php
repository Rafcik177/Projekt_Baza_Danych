@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj') }}</div>

                <div class="card-body">
                    <form action="{{ route('zamowienia.update', $id) }}" method="post" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        @foreach($edycja as $e)
                        <div class="col-md-12 mt-4" style="text-align: center; font-weight:600;"> {{$e->nazwa}} </div>
                        <div class="row mb-3 " >
                            
                            <label for="ilosc" class="col-md-6 col-form-label text-md-end">{{ __('Ilość') }}</label>
                             
                            <div class="col-md-6">
                                <input id="ilosc" type="number"  name="ilosc[]" value="{{$e->ilosc}}" min="0" max="10">
                                </br>Zmień <input id="zmien" type="checkbox"  name="zmien[]" value="{{$e->id}}" min="0" max="10">
                                
                                @error('ilosc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        @endforeach

                        


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Zapisz') }}
                                </button>
                                <a href="{{ route('zamowienia.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection