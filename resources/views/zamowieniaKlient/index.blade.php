@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Przegląd złożonych zamówień') }} <a style="float:right;" href="{{ route('zamowienia.create') }}">Dodaj</a></div>

                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th class="text-center">Lp.</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Data złożenia</th>
                            <th class="text-center">Kwota</th>
                            <th class="text-center">Edytuj</th>
                            <th class="text-center">Anuluj</th>
                            <th class="text-center">Szczegóły</th>
                    </thead>
                    <tbody class="table-primary">
                        @foreach($zamowienia as $zam)
                        <tr class=" border-bottom-0 ">
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td class="text-center">{{$zam->status}}</td>
                            <td class="text-center">{{$zam->data_zlozenia}}</td>
                            <td class="text-center">{{number_format((int)$zam->cena,0,"."," ")}} zł</td>
                            <td class="text-center">
                                @php
                                $nowa=new DateTime();
                                $zamow=new DateTime($zam->data_zlozenia);
                                $zamow->modify('+3 day');
                                @endphp
                                @if($zamow>$nowa)

                                <a href="{{ route('zamowienia.edit', $zam->id_zamowienia) }}">Edytuj</a>
                                @endif

                            </td>
                             <td class="text-center">
                                <form action="{{ route('zamowienia.destroy', $zam->id_zamowienia) }}" method="post" id="delete-form-{{$zam->id_zamowienia}}" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                    if(confirm('Czy na pewno chesz anulować?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$zam->id_zamowienia}}').submit();
                                    } else {
                                        event.preventDefault();
                                        }">
                                    Usuń
                                </a>
                            

                            </td>
                            <td class="text-center"><a href="{{ route('zamowienia.show', $zam->id_zamowienia) }}">Pokaż</a></td>

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