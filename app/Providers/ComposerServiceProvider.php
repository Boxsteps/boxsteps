<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('es');
        view()->composer(
            [
                'new', 'dashboard',
                'courses.index', 'courses.show',
                'evaluations.index', 'evaluations.show', 'evaluations.create', 'evaluations.edit',
                'features.index', 'features.show',
                'messages.index', 'messages.show',
                'plans.index', 'plans.show', 'plans.create', 'plans.edit', 'plans.evaluation',
                'qualifications.index',
                'revisions.index', 'revisions.show',
                'roles.index', 'roles.show',
                'users.index', 'users.show', 'users.edit', 'auth.register',
            ],
            'App\Http\ViewComposers\MenuComposer'
        );
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
