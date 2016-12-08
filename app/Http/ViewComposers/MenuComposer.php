<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;

class MenuComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = Auth::user();

        if( is_null($user) ) {
            return abort(404);
        }

        $features = $user->role->features()->orderBy('feature_id', 'asc')->orderBy('feature', 'asc')->get();

        $view->with([
            'auth_user' => $user,
            'auth_features' => $features
        ]);
    }
}
