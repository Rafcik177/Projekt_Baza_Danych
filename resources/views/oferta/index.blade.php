@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Oferta NZTK') }}</div>
                <div class="d-inline-flex pt-2 bd-highlight ">
                    @foreach($modele as $mod)
                    <div class="flex-column col-4 p-2 ">
                        <div class="col-12 p-2 bd-highlight bg-light">
                            <a href="{{ route('oferta.show', $mod->id) }}" style="text-decoration:none;">
                            
                                <div class="p-2 text-center">[Grafika]</div>
                                <div class="p-2 text-center" style="font-weight: 500; color: white; font-size:20px; background: #033776;">{{$mod->nazwa}} <i class="fa-solid fa-circle-arrow-right "></i></div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
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