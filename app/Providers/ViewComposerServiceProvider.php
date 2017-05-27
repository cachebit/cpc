<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\User;
use App\Draft;
use App\Poster;
use App\Setting;
use App\Sketch;
use App\Story;
use App\Section;
use App\Gallery;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('partials._lastest_posters', function($view)
      {
        $view->with('lastests', Poster::lastest(4));
      });

      view()->composer('partials._lastest_settings', function($view)
      {
        $view->with('lastests', Setting::lastest(4));
      });

      view()->composer('partials._lastest_sketches', function($view)
      {
        $view->with('lastests', Sketch::lastest(4));
      });

      view()->composer('partials._promote_contents', function($view)
      {
        $view->with('promotes', Story::lastest(1));
      });

      view()->composer('partials._promote_posters', function($view)
      {
        $view->with('promotes', Poster::lastest(6));
      });

      view()->composer('partials._promote_settings', function($view)
      {
        $view->with('promotes', Setting::lastest(6));
      });

      view()->composer('partials._promote_sketches', function($view)
      {
        $view->with('promotes', Sketch::lastest(6));
      });

      view()->composer('partials._top_users', function($view)
      {
        $view->with('users', User::lastest(6));
      });

      view()->composer('partials._lastest_users', function($view)
      {
        $view->with('users', User::lastest(12));
      });

      view()->composer('partials._hot_users', function($view)
      {
        $view->with('users', User::lastest(6));
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
}
