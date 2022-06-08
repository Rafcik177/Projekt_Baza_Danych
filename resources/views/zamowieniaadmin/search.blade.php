@extends('zamowieniaadmin.index')

@section('content')

</div>
<div class="row text center">
    <div class="table-responsive">
        <style>
            td{border:0.5px solid black;}
        </style>
        
        <table class="table table-striped">
            <thead>
                <tr class="bg-warning">
                    <th class="text-center">Lp.</th>
                    <th class="text-center">Id Zamówienia</th>
                    <th class="text-center">Data Złożenia</th>
                    <th class="text-center">Cena</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Id Zamawiającego</th>
                    <th class="text-center">Szczegóły Zamówienia</th>
                    
            </thead>
            <tbody >
                @foreach($xd as $xd)
                <tr class="table-warning">
                    <td class="text-center">{{ $loop->index + 1 }}</td> 
                    <td class="text-center">{{$xd->id_zamowienia}}</td> 
                    <td class="text-center">{{$xd->data_zlozenia}}</td>
                    
                    <td class="text-center">{{$xd->status}}</td>
                    <td class="text-center">{{$xd->id_zamawiajacego}}</td>

                    <td class="text-center"><a href="{{route('zamadmin.show', $xd->id_zamowienia) }}">Pokaż</a></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

</div>
@endsection