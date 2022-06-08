@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj') }}</div>

                <div class="card-body">
                    <form action="{{ route('zamadmin.update', $zamadmin->id) }}" method="post" role="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row mb-3">
                            <label for="staty" class="col-md-4 col-form-label text-md-end">{{ __('staty') }}</label>

                            <div class="col-md-6">
                                <select id="staty" name="staty" style="width: 100%" class="form-control @error('staty') is-invalid @enderror">
                                    <option value='6'<?php if($zamadmin->staty == 6) { ?> selected="selected"<?php } ?>>Usunięto</option>
                                    <option value='1'<?php if($zamadmin->staty == 1) { ?> selected="selected"<?php } ?>>Złożono</option>
                                    <option value='2'<?php if($zamadmin->staty == 2) { ?> selected="selected"<?php } ?>>Anulowano Klient</option>
                                    <option value='3'<?php if($zamadmin->staty == 3) { ?> selected="selected"<?php } ?>>Anulowano NZTK</option>
                                    <option value="4"<?php if($zamadmin->staty == 4) { ?> selected="selected"<?php } ?>>Produkcja</option>
                                    <option value='5'<?php if($zamadmin->staty == 5) { ?> selected="selected"<?php } ?>>Gotowe</option>
                                </select>

                                @error('staty')
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
                                <a href="{{ route('zamowieniaadmin.index') }}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection