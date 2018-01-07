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
            $data = self::tDashboard();
            return view('dashboard', $data);
        }

        $data = array(
            'role' => null,
            'messages_count' => null,
            'courses_count' => null,
            'plans_count' => null,
            'evaluations_count' => null,
            'events' => collect([])->toJson()
        );

        return view('dashboard', $data);
    }

    /**
     * Show the application dashboard for teacher role.
     *
     * @return \Illuminate\Http\Response
     */
    public function tDashboard()
    {
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

        // Plans collection

        foreach ($plans as $plan) {
            $events->push([
                'title' => trans('evaluation.create.plan') . $plan->id,
                'start' => $plan->start_date->format('Y-m-d h:i:s'),
                'end' => $plan->end_date->format('Y-m-d h:i:s'),
                'url' => url('plans/' . $plan->id)
            ]);
        }

        $events_json->push([
            'events' => $events,
            'color' => trans('dashboard.color.blue'),
            'textColor' => trans('dashboard.color.white')
        ]);

        // Evaluations collection

        $events = collect();

        foreach ($plans as $plan) {
            if ( $plan->evaluation ) {
                $events->push([
                    'title' => trans('evaluation.create.evaluation') . $plan->evaluation->id,
                    'start' => $plan->evaluation->start_date->format('Y-m-d h:i:s'),
                    'end' => $plan->evaluation->end_date->format('Y-m-d h:i:s'),
                    'url' => url('evaluations/' . $plan->evaluation->id)
                ]);

                $evaluations_count++;
            }
        }

        $events_json->push([
            'events' => $events,
            'color' => trans('dashboard.color.purple'),
            'textColor' => trans('dashboard.color.white')
        ]);

        $data = array(
            'role' => $role,
            'messages_count' => $messages_count,
            'courses_count' => $courses->count(),
            'plans_count' => $plans->count(),
            'evaluations_count' => $evaluations_count,
            'events' => $events_json->toJson()
        );

        return $data;
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
