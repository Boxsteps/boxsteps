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
                'users.index', 'users.show', 'users.edit', 'auth.register',
                'plans.index', 'plans.show', 'plans.create', 'plans.edit',
                'messages.index', 'messages.show',
                'roles.index', 'roles.show',
                'features.index', 'features.show',
                'courses.index', 'courses.show',
            ], 'App\Http\ViewComposers\MenuComposer'
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
