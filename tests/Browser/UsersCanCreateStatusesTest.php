<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UsersCanCreateStatusesTest extends DuskTestCase
{
    //Metodo para migrar la BBDD antes de iniciar la prueba de navegabilidad
    use DatabaseMigrations;
    
    //Primera prueba de Navegador

    /**
     * A Dusk test example.
     * 
     * @test
     * @throws \Throwable
     */
    public function users_can_create_statuses() //Prueba para validad si los usuarios pueden crear estados
    {
        
        //Creacion de usuario autenticado
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user){ //dentro del navegador relacionado al usuario
            $browser->loginAs($user) // verificar que el usuario este logueado
                    ->visit('/') // al visitar la URL "/" (URL principal)
                    ->type('body', 'Mi primer estado publicado')//evaluará si existe un INPUT de nombre "BODY" -> <input name="body"> y que su contenido sea:
                    ->press('#create-status') //para validar la existencia de un boton cn el nombre create_status
                    ->screenshot('create-status') //capturar salida
                    ->assertSee('Mi primer estado publicado'); // para evaluar que ve en la pantalla el estado creado
        });
    }
}
