<?php

namespace Christhompsontldr\LaraboardAdmin;

use Illuminate\Routing\Router;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    public function boot()
    {
        // publish configs
        $this->publishes([
           realpath(dirname(__DIR__)) . '/config/laraboard.php' => config_path('laraboard.php'),
        ]);

        $this->loadViewsFrom(realpath(__DIR__ . '/resources/views'), config('laraboard.view.hintpath'));

        if (!$this->app->routesAreCached()) {
            $this->setupRoutes($this->app->router);
        }

        //  create the commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Christhompsontldr\Laraboard\Commands\AddTrait::class,
                \Christhompsontldr\Laraboard\Commands\Migrations::class,
                \Christhompsontldr\Laraboard\Commands\Setup::class,
            ]);
        }
    }

    /**
    * Register the providers that are used
    *
    */
    public function register()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();

        $loader->alias('Laratrust', \Laratrust\LaratrustFacade::class);
        $loader->alias('Form',      \Collective\Html\FormFacade::class);
        $loader->alias('Html',      \Collective\Html\HtmlFacade::class);
        $loader->alias('Markdown',  \BrianFaust\Parsedown\Facades\Parsedown::class);

        $this->app->register(\Christhompsontldr\Laraman\ServiceProvider::class);

        //  make the config available even if not published
        $this->mergeConfigFrom(
            realpath(dirname(__DIR__)) . '/config/laraboard-admin.php', 'laraboard-admin'
        );

        //  no laraman configured, do it ourselves
        if (!config('laraman')) {
            //  make the config available even if not published
            $this->mergeConfigFrom(
                realpath(dirname(__DIR__)) . '/config/laraboard-admin.php', 'laraman'
            );
        }
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