
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj dane o pracowniku') }}</div>

                <div class="card-body">
                  
                    
                        
                        <form method="POST" action="{{ route('pracownik') }}">
                        @csrf
                        <input type="text" name="id_pracownika" placeholder="Podaj numer pracownika">
                        <input type="submit" value="Szukaj">
                        </form>
                        @if(isset($error))
                         {{$error}}
                        @endif
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
