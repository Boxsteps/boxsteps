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

        $features = $user->role->features()->orderBy('feature_id', 'asc')->orderBy('feature', 'asc')->get();

        $view->with([
            'user' => $user,
            'features' => $features
        ]);
    }
}
