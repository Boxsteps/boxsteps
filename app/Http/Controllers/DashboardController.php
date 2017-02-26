<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('start');
    }

    /**
     * Show the application start.
     *
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
        return view('start');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the application blank page.
     *
     * @return \Illuminate\Http\Response
     */
    public function newview()
    {
        return view('new');
    }
}
