<?php
use Illuminate\Support\Facades\DB;
 
$user = DB::table('users')->where('imie', 'Rafał')->first();
 
//echo $user->email;
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj dane o pracowniku') }}</div>

                <div class="card-body">
                    Tu będzie CRUD pracownika
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
