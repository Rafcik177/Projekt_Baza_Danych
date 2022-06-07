@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header"> <b>{{ __('Lista działów') }} </b></div>
                <div class="row text center">
                    <div class="table-responsive">
                   
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="text-center">Id działu</th>
                                    <th class="text-center">Nazwa działu</th>
                                    <th class="text-center">Lista pracowników</th>
                            </thead>
                            <tbody class="table-primary">
                                @foreach($dzialy as $dzial)
                                <tr class="border-bottom-0">
                                    <td class="text-center">{{$dzial->id}}</td> 
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