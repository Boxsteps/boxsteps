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
                'blank',
                'dashboard',
                'users.index', 'users.show', 'users.edit', 'auth.register',
                'plans.index', 'plans.create'
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
