<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function redirection($redirection, $message, $name, $url)
    {
        if( ($name == null) && ($url == null) )
        {
            return redirect($redirection)
                ->with('message', $message);
        }
        return redirect($redirection)
            ->with('message', $message)
            ->with('return', trans('globals.return'))
            ->with('name', $name)
            ->with('url', $url);
    }
}
