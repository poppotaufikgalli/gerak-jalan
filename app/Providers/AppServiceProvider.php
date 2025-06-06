<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Http\Controllers\Controller;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        View::composer('*', function($view)
        {
            $ctl = new Controller;
            $katLomba = $ctl->GetKategoriLomba();
            $konfig = $ctl->GetKonfigurasi();
            $view->with('katLomba', $katLomba);
            $view->with('konfig', $konfig);
        });
    }
}
