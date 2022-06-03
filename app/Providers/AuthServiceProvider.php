<?php

namespace App\Providers;

use App\RoleNZTK;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        $this->defineRoleNZTK(name: 'czyAdmin', role: RoleNZTK::ADMINISTRACJA);
        $this->defineRoleNZTK(name: 'czyKlient', role: RoleNZTK::KLIENT);
        $this->defineRoleNZTK(name: 'czyHR', role: RoleNZTK::HR);
        $this->defineRoleNZTK(name: 'czyMagazyn', role: RoleNZTK::MAGAZYN);
        $this->defineRoleNZTK(name: 'czyZamowienia', role: RoleNZTK::ZAMOWIENIA);
        $this->defineRoleNZTK(name: 'czyProdukcja', role: RoleNZTK::PRODUKCJA);
        $this->defineRoleNZTK(name: 'czyPracownik_bez_dzialu', role: RoleNZTK::PRACOWNIK_BEZ_DZIALU);

        $this->defineRoleNZTK(name: 'czyKierownik_Admin', role: RoleNZTK::KIEROWNIK_ADMINISTRACJA);
        $this->defineRoleNZTK(name: 'czyKierownik_HR', role: RoleNZTK::KIEROWNIK_HR);
        $this->defineRoleNZTK(name: 'czyKierownik_Magazyn', role: RoleNZTK::KIEROWNIK_MAGAZYN);
        $this->defineRoleNZTK(name: 'czyKierownik_Zamowienia', role: RoleNZTK::KIEROWNIK_ZAMOWIENIA);
        $this->defineRoleNZTK(name: 'czyKierownik_Produkcja', role: RoleNZTK::KIEROWNIK_PRODUKCJA);
    }

        private function defineRoleNZTK(string $name, string $role): void
        {
            GATE::define($name, function(User $user) use ($role) {
                return $user->role == $role;
            }
        );

        }
       
} 

