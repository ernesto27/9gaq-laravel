<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

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
                    ->assertSee('Latest');
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
                    ->assertSee('Latest');
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
                    ->assertSee('Email o password incorrecto');
        });
    }


    public function testSuccessUpload()
    {
        
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/posts/create')
                    ->type('title', "some test title")
                    ->attach('file', __DIR__.'/images/image.jpg')
                    ->click('.btn-upload')
                    ->assertSee('Success upload');
        });
    }


    public function testErrorUpload()
    {

    }


    public function testSuccessComment()
    {
        $this->browse(function(Browser $browser){
            $browser->loginAs(User::find(1))
                    ->visit('/posts/1')
                    ->type('comment', 'this is a test comment')
                    ->click('.btn-comment')
                    ->assertSee('Comment added!');
        });
    }

    public function testErrorComment()
    {
        $this->browse(function(Browser $browser){
            $browser->loginAs(User::find(1))
                    ->visit('/posts/1')
                    ->click('.btn-comment')
                    ->assertSee('Error');
        });
    }


    public function testErrorUpdateProfileImage()
    {
        $this->browse(function(Browser $browser){
            $browser->loginAs(User::find(1))
                    ->visit('/users/1/edit')
                    ->click('.btn-update')
                    ->assertSee('Error');
        });
    }

    public function testSuccessUpdateProfileImage()
    {
        $this->browse(function(Browser $browser){
            $browser->loginAs(User::find(1))
                    ->visit('/users/1/edit')
                    ->attach('file', __DIR__.'/images/image.jpg')
                    ->click('.btn-update')
                    ->assertSee('El avatar se guardo correctamente');
        });
    }

}














