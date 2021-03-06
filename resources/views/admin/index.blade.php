@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Panel administracyjny</h3>
            <div class="card">
                <div class="card-header">{{ __('Zarządzaj') }}</div>

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
                                <a href="{{route('modele.index') }}" class="btn btn-primary col-12">
                                    Modele
                                </a>
                            </td>
                            <td class="col-6">
                                <a href="{{route('produkcja.index') }}" class="btn btn-primary col-12">
                                    Produkcja
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6">
                                <a href="{{url('zamadmin')}}" class="btn btn-primary col-12">
                                    Zamówienia
                                </a>
                            </td>
                            <td class="col-0">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
