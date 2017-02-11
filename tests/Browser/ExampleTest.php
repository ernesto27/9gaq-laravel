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
            $browser->visit('/posts')
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
            $browser->visit('/posts/1')
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
