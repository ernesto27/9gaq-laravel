<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $request = app(\Illuminate\Http\Request::class);
        View::share('categories', \App\Category::all());
        View::share('request', $request);

        DB::listen(function ($query) {
            //

            //var_dump($query->sql); echo "<br>";
            // $query->bindings
            // $query->time
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
