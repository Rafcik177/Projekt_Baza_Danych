@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Panel administracyjny</h3>
            <div class="card">
                <div class="card-header">{{ __('Przejdź do działu') }}</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td class="col-6">
                                <a href="{{route('magazyn.index') }}" class="btn btn-primary col-12">
                                    Magazyn
                                </a>
                            </td>
                            <td class="col-6">
                                <a href="{{route('pracownicy.index') }}" class="btn btn-primary col-12">
                                    Dział HR
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6">
                                <a href="{{route('produkcja.index') }}" class="btn btn-primary col-12">
                                    Produkcja
                                </a>
                            </td>
                            <td class="col-6">
                                <a class="btn btn-secondary col-12"> <!-- href="{{route('zamowienia.index') }}" -->
                                    Zamówienia
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
