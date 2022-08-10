<?php

namespace App\Providers;

use App\Models\Backend\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer("theme.back.aside", function ($view) {
            $rol_id = session()->get('rol_id');// tomamos el rol del ususario que está logueado;
            $menuP = cache()->tags('Menu')->rememberForever("MenuTutoBlog .$rol_id", function () {
                return Menu::getMenu(true);
            });
            $view->with('menuPrincipal', $menuP);
        });
    }
}
