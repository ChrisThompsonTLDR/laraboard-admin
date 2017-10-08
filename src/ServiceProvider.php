<?php

namespace Christhompsontldr\LaraboardAdmin;

use Illuminate\Routing\Router;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    public function boot()
    {
        // publish configs
        $this->publishes([
           realpath(dirname(__DIR__)) . '/config/laraboard-admin.php' => config_path('laraboard-admin.php'),
        ]);

        //  add routes
        if (!$this->app->routesAreCached()) {
            $this->setupRoutes($this->app->router);
        }
        $this->loadViewsFrom(realpath(dirname(__DIR__) . '/resources/views'), config('laraboard-admin.view.hintpath'));
    }

    /**
     * Register the providers that are used
     *
     */
    public function register()
    {
        $this->app->register(\Christhompsontldr\Laraman\ServiceProvider::class);

        //  make the config available even if not published
        $this->mergeConfigFrom(
            realpath(dirname(__DIR__)) . '/config/laraboard-admin.php', 'laraboard-admin'
        );

        //  set everything for laraman to laraboard-admin, except the hintpath
/*        $tmp = config('laraman.view.hintpath');
        config([
            'laraman' => array_replace_recursive(config('laraman'), config('laraboard-admin')),
            'laraman.view.hintpath' => $tmp,
        ]);*/

    }

    /**
     * Define the routes for the package.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => config('laraboard-admin.route.namespace')], function($router)
        {
            require realpath(dirname(__DIR__)) . '/src/routes/web.php';
        });
    }
}