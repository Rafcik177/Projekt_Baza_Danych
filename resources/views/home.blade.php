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

                        @if (Auth::user()->role == 'dzial_magazyn' )
                            @php
                                $liczba = App\Http\Controllers\NiskiStan::stanczesci();
                            @endphp

                            @if ($liczba != 0)
                                <div class='text-bold' style="font-size: 26px">
                                    Uwaga - zanotowano niski stan części w magazynie!!! <br>
                                    <a href="{{url('niskistan')}}">Kliknij by wejść w stan magazynowy !</a>
                                </div>
                            @endif
                        @endif

                        @if (Auth::user()->role == 'admin' )
                            @php
                                $liczba = App\Http\Controllers\ZamAdminController::zamowieniaadmin();
                            @endphp

                            @if ($liczba != 0)
                                <div class='text-bold' style="font-size: 26px">
                                    Sprawdź otrzymane zamówienia! <br>
                                    <a href="{{url('zamadmin')}}">Kliknij by wejść w zamówienia !</a>
                                </div>

                                @if (Auth::user()->role == 'admin' )
                                    <div id="app">
                                       @include('flash-message')
                                       
                                        @yield('content')
                                    </div>
                                 @endif
                                
                                
                            

                            @endif
                        @endif


                        {{ __('Zostałeś poprawnie zalogowany!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
