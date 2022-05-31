@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Lista działów') }} </div>
                <div class="row text center">

                    <div class="table-responsive">
                    <style>td {border: 0.5px solid black;}</style>
                        <table class="table table-striped">
                            <thead>
                                <tr class="success">
                                    <th class="text-center">Lp.</th>
                                    <th class="text-center">Nazwa działu</th>
                            </thead>
                            <tbody>
                                @foreach($dzialy as $dzial)
                                <tr >
                                    <td class="text-center">{{ $loop->index + 1 }}</td> 
                                    <td class="text-center">{{$dzial->nazwa}}</td>
                                    <td class="text-center"><a href="{{ route('dzialy.show', $dzial->id) }}">Lista pracowników</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   

                    @if(isset($error))
                    {{$error}}
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection