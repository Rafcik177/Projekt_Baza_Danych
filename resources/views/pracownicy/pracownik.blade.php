@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj dane o pracowniku') }}</div>

                <div class="card-body">
                  
                    
                    @if($ready==1)
                        <?php
                            if($czy_kierownik==1)
                            {
                                $zaznacz_kierownik_tak="checked";
                                $zaznacz_kierownik_nie="";
                            }
                            else
                            {
                                $zaznacz_kierownik_tak="";
                                $zaznacz_kierownik_nie="checked";
                            }
                        ?>
                        <form method="POST" action="{{ route('pracownik') }}">
                        @csrf
                            <label>
                                Imię: <input type="text" name="imie" value="{{ $imie }}">
                            </label></br></br>
                            <label>
                                Nazwisko:  <input type="text" name="nazwisko" value="{{ $nazwisko }}">
                            </label></br></br>
                            <label>
                                Data urodzenia: <input type="date" name="data_urodzenia" value="{{ $data_urodzenia }}">
                            </label></br></br>
                            <label>
                                Stanowisko:  <input type="text" name="stanowisko" value="{{ $stanowisko }}">
                            </label></br></br>
                            <label for="kierownik">Kierownik:</label>
                            <input type="radio" id="tak" name="czykierownik" value="tak" {{ $zaznacz_kierownik_tak }}>
                            <label for="tak">Tak</label>
                            <input type="radio" id="Nie" name="czykierownik" value="Nie" {{ $zaznacz_kierownik_nie }}>
                            <label for="Nie">Nie</label></br></br>
                            <label>
                                Numer wydziału:  <input type="int" name="id_wydzialu" value="{{ $id_wydzialu }}">
                            </label></br></br>
                            
                        <!--<input type="submit" value="Szukaj">-->
                        </form>
                    @endif
                        @if(isset($error))
                         {{$error}}
                        @endif
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
