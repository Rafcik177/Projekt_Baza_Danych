@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Komunikat') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->role=="dzial_magazyn")
                    <span class='text-bold'>
                        @php
                        echo App\Http\Controllers\NiskiStan::stanczesci();
                        @endphp
                    </span>
                    @endif

                    {{ __('Zostałeś poprawnie zalogowany!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
