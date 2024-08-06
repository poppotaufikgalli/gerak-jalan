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
            //$katPeserta = $ctl->GetKategoriPeserta();
            $konfig = $ctl->GetKonfigurasi();
            $view->with('katLomba', $katLomba);
            //$view->with('katPeserta', $katPeserta);
            $view->with('konfig', $konfig);
            /*$navbars = $ctl->GetMenu();
            $tipedokhukums = $ctl->GetTipeDokHukum();
            $links = $ctl->GetLink();
            $jnshukums = $ctl->GetJnsDokHukum();
            $kontens = $ctl->getHal();
            //$visit = $ctl->GetVisits();
            $view->with('navbars', $navbars);
            $view->with('tipedokhukums', $tipedokhukums);
            $view->with('jnshukums', $jnshukums);
            $view->with('links', $links);
            $view->with('kontens', $kontens);
            //$view->with('avisit', $visit);*/

        });
    }
}
