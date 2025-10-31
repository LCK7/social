<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function PHPSTORM_META\type;

class LoginTest extends DuskTestCase
{
    //Realizar las migraciones de BBDD de prueba
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     * 
     * @test
     * @throws \Throwable
     */
    public function registered_users_can_login(): void
    {
        //Creacion de usuario autenticado con el email indicado
        $user = User::factory()->create(['email' => 'marana@continental.edu.pe']);

        $this->browse(function (Browser $browser) {
            //la prueba se realizará dentro de la interfaz de login
            $browser->visit('/login')
                    ->type('email','marana@continental.edu.pe')
                    ->type('password','password')
                    ->press('#login-btn')
                    ->assertAuthenticated();
        });
    }
}
