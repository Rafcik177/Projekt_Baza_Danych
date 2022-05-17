@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Przegląd złożonych zamówień') }} <a style="float:right;" href="{{ route('zamowienia.create') }}">Dodaj</a></div>
                
                <table class="table table-striped">
                    <thead>
                        <tr class="success">
                            <th class="text-center">Lp.</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Data złożenia</th>
                            <th class="text-center">Kwota</th>
                            <th class="text-center">Edytuj</th>
                            <th class="text-center">Anuluj</th>
                            <th class="text-center">Pokaż</th>
                    </thead>
                    <tbody>
                    @foreach($zamowienia as $zam)
                        <tr>
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td class="text-center">{{$zam->status}}</td>
                            <td class="text-center">{{$zam->data_zlozenia}}</td>
                            <td class="text-center">{{$zam->cena}} zł</td>
                            <td class="text-center"><a href="{{ route('zamowienia.edit', $zam->id) }}">Edytuj</a></td>
                            <td></td>
                            <td>
                            </td>
                            <td class="text-center"></td>
                        </tr>
                    @endforeach
                    </tbody>
                    
                </table>
                    
                
                    
                    
                        @if(isset($error))
                         {{$error}}
                        @endif
                        <span>
                        {{ $zamowienia->links() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
