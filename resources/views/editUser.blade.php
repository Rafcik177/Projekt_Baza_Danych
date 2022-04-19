<?php
use Illuminate\Support\Facades\DB;
if(isset($_GET['id_pracownika']))
{
    $id=$_GET['id_pracownika'];
    $users_count = DB::table('pracownicy')
     ->where('id', '=', $id)
     ->count();
     if($users_count>0)
     {
        $user = DB::table('pracownicy')->where('id', $id)->first();
        $imie=$user->imie;
        $nazwisko=$user->nazwisko;
        $data_urodzenia=$user->data_urodzenia;
        $stanowisko=$user->stanowisko;
        $czy_kierownik=$user->czy_kierownik;
        $id_wydzialu=$user->id_wydzialu;
        $ready=1;
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
     }
     else
     {
        $ready=0;
         $error="Nie ma takiego użytkownika";;
     }
     
}
else
{
    $ready=0;
}

?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edytuj dane o pracowniku') }}</div>

                <div class="card-body">
                    
                    @if ($ready==0)
                        
                        <form method="GET" action="{{ route('edytuj') }}">
                        <input type="text" name="id_pracownika" placeholder="Podaj numer pracownika">
                        <input type="submit" value="Szukaj">
                        </form>
                        @if(isset($error))
                         {{$error}}
                        @endif
                    @endif
                    @if($ready==1)
                        <form method="POST" action="">
                            <label>
                                Imię: <input type="text" name="imie" value="<?php echo $imie; ?>">
                            </label></br></br>
                            <label>
                                Nazwisko:  <input type="text" name="nazwisko" value="<?php echo $nazwisko; ?>">
                            </label></br></br>
                            <label>
                                Data urodzenia: <input type="date" name="data_urodzenia" value="<?php echo $data_urodzenia; ?>">
                            </label></br></br>
                            <label>
                                Stanowisko:  <input type="text" name="stanowisko" value="<?php echo $stanowisko; ?>">
                            </label></br></br>
                            <label for="kierownik">Kierownik:</label>
                            <input type="radio" id="tak" name="czykierownik" value="tak" <?php echo $zaznacz_kierownik_tak;?>>
                            <label for="tak">Tak</label>
                            <input type="radio" id="Nie" name="czykierownik" value="Nie" <?php echo $zaznacz_kierownik_nie;?>>
                            <label for="Nie">Nie</label></br></br>
                            <label>
                                Numer wydziału:  <input type="int" name="id_wydzialu" value="<?php echo $id_wydzialu; ?>">
                            </label></br></br>
                            
                        <!--<input type="submit" value="Szukaj">-->
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
