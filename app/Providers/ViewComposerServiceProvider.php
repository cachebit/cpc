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
        $view->with('lastests', Poster::lastest(6));
      });

      view()->composer('partials._lastest_settings', function($view)
      {
        $view->with('lastests', Setting::lastest(6));
      });

      view()->composer('partials._lastest_sketches', function($view)
      {
        $view->with('lastests', Sketch::lastest(6));
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
