<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

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
    public function dashboard()
    {
        if ( trans('globals.teacher') == Auth::user()->role->id ) {

            $role = Auth::user()->role->id;
            $plans = Auth::user()->plans;
            $courses = Auth::user()->courses;
            $messages = Auth::user()->messages_received;

            $messages_count = 0;
            $evaluations_count = 0;

            $events = collect();
            $events_json = collect();

            foreach ($messages as $message) {
                if ( $message->pivot->state_id == trans('globals.condition.active') ) {
                    $messages_count++;
                }
            }

            foreach ($plans as $plan) {
                $events->push([
                    'title' => trans('evaluation.create.plan') . $plan->id,
                    'start' => $plan->start_date->format('Y-m-d h:i:s'),
                    'end' => $plan->end_date->format('Y-m-d h:i:s'),
                    'url' => url('plans/' . $plan->id)
                ]);

                if ( $plan->evaluation ) {
                    $evaluations_count++;
                }
            }

            $events_json->push([
                'events' => $events,
                'color' => '#40bbea',
                'textColor' => '#fff'
            ]);

            $data = array(
                'role' => $role,
                'messages_count' => $messages_count,
                'courses_count' => $courses->count(),
                'plans_count' => $plans->count(),
                'evaluations_count' => $evaluations_count,
                'events' => $events_json->toJson()
            );

            return view('dashboard', $data);

        }

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
