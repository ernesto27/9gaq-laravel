<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHomeExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Home');
        });
    }


    /**
     *
     * @return void
     */
    public function testDetalleExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/detalle')
                    ->assertSee('Home');
        });
    }

    /**
     *
     * @return void
     */
    public function testRegistroExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/registro')
                    ->assertSee('REGISTRO');
        });
    }
}
