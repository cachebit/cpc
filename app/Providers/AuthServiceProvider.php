<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\User;
use App\Draft;
use App\MultipleFrame;
use App\Poster;
use App\Section;
use App\Setting;
use App\Sketch;
use App\Story;
use App\Text;
use App\Volum;
use App\Webtoon;
use App\Gallery;
use App\Score;
use App\Up;
use App\Policies\UserPolicy;
use App\Policies\ContentPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Draft::class => UserPolicy::class,
        MultipleFrame::class => UserPolicy::class,
        Poster::class => UserPolicy::class,
        Section::class => UserPolicy::class,
        Setting::class => UserPolicy::class,
        Sketch::class => UserPolicy::class,
        Story::class => UserPolicy::class,
        Text::class => UserPolicy::class,
        Volum::class => UserPolicy::class,
        Webtoon::class => UserPolicy::class,
        Gallery::class => UserPolicy::class,
        Score::class => UserPolicy::class,
        Up::class => UserPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
