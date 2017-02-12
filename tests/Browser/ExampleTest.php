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


    public function testSuccessRegistro()
    {
        
        $this->browse(function (Browser $browser) {
            $faker = \Faker\Factory::create();
            $browser->visit('/users/create')
                    ->type('username', $faker->username)
                    ->type('email', $faker->email)
                    ->type('password', bcrypt('1234'))
                    ->click('.btn-registro')
                    ->assertPathIs('/posts');
        });
    }



    public function testSuccessLogin()
    {
        
        $this->browse(function (Browser $browser) {
           
            $browser->visit('/users/login')
                    ->type('email', 'ernesto@gmail.com')
                    ->type('password','secret')
                    ->click('.btn-login')
                    ->assertPathIs('/posts');
        });
    }

    public function testErrorLogin()
    {
        
        $this->browse(function (Browser $browser) {
           
            $browser->visit('/users/login')
                    ->type('email', 'ernesto@gmail.com')
                    ->type('password','not-valid')
                    ->click('.btn-login')
                    //->assertPathIs('/users/login');
                    ->assertSee('Email o password incorrecto');
        });
    }
}














