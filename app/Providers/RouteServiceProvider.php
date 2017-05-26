<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        $router->model('users', 'App\User');
        $router->model('stories', 'App\Story');
        $router->model('volums', 'App\Volum');
        $router->model('sections', 'App\Section');
        $router->model('posters', 'App\Poster');
        $router->model('sketches', 'App\Sketch');
        $router->model('drafts', 'App\Draft');
        $router->model('settings', 'App\Setting');
        $router->model('webtoons', 'App\Webtoon');
        $router->model('multiple_frames', 'App\MultipleFrame');
        $router->model('texts', 'App\Text');
        $router->model('galleries', 'App\Gallery');
        $router->model('scores', 'App\Score');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
