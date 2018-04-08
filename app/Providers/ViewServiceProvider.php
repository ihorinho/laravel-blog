<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            $view->with('routeClass', $this->getRouteClass());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function getRouteClass()
    {
        $action = app('request')->route()->getAction();

        if (empty($action["as"])) {
            return 'cms-page';
        }

        return str_replace('.', '-', $action["as"]) . "-page";
    }
}