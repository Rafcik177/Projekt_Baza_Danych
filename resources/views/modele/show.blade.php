@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $model->kategoria }} {{ $model->nazwa }}: parametry</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Moc (kW): ') }}</label>
                        <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($model->moc) }}</label>   
                    </div>

                    <div class="row mb-3">
                        <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Ilość miejsc: ') }}</label>
                        <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($model->ilosc_miejsc) }}</label>   
                    </div>

                    <div class="row mb-3">
                        <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Maksymalna prędkość (km/h): ') }}</label>
                        <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($model->max_predkosc) }}</label>   
                    </div>

                    <div class="row mb-3">
                        <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Waga (tony): ') }}</label>
                        <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($model->waga) }}</label>   
                    </div>

                    <div class="row mb-3">
                        <label for="opis" class="col-md-4 col-form-label text-md-end">{{ __('Cena (zł): ') }}</label>
                        <label for="opis" class="col-md-4 col-form-label text-md-start">{{ __($model->cena) }}</label>   
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('modele.index') }}" class="btn btn-primary">Powrót</a>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div>        
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $model->kategoria }} {{ $model->nazwa }}: spis części</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr class="success">
                                <th class="text-center">L.p.</th>
                                <th class="text-center">Nazwa części</th>
                                <th class="text-center">Potrzebna ilość</th>
                                <th class="text-center">Usuń</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($czesci as $cz)
                            <tr class="success">
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="text-center">
                                    <a href="{{ route('magazyn.show', $cz->id) }}">{{$cz->nazwa_czesci}}</a>
                                </td>
                                <td class="text-center">{{$cz->ilosc_do_wykonania}}</td>
                                <td class="text-center">
                                    <form action="{{ route('spisyczesci.destroy', $cz->id) }}" method="post" id="delete-form-{{$cz->id}}" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="" onclick="
                                    if(confirm('Czy na pewno chesz usunąć?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$cz->id}}').submit();
                                    } else {
                                        event.preventDefault();
                                    }">
                                        Usuń
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('spisyczesci.edit', $model->id) }}" class="btn btn-primary col-3">{{__('Edytuj spis części dla tej maszyny')}}</a>
                </div><!-- end card-body -->
            </div>
        </div>
    </div><!-- end row justify-content-center -->
</div><!-- end container -->
@endsection
