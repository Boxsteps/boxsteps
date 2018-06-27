<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\KnowledgeArea;
use App\Role;

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

        if ( trans('globals.coordinator') == Auth::user()->role->id ) {
            $data = self::cDashboard();
            return view('dashboard', $data);
        }

        if ( trans('globals.administrator') == Auth::user()->role->id ) {
            $data = self::aDashboard();
            return view('dashboard', $data);
        }

        $data = array(
            'role' => null,
            'messages_count' => null,
            'courses_count' => null,
            'plans_count' => null,
            'evaluations_count' => null,
            'qualifications' => null,
            'events' => collect([])->toJson(),
            'tiny' => true
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

        // Qualifications collection

        $qualifications = collect([]);
        $qualifications_list = collect([]);

        foreach ($courses->first()->evaluations as $evaluation) {

            $qualifications = collect([]);
            $knowledge_area = $evaluation->plan->conceptual_section->knowledge_area->id;
            foreach ($evaluation->students as $student) {
                $qualifications->push([
                    'qualification' => $student->pivot->qualification
                ]);
            }

            $avg = $qualifications->avg('qualification');

            if ( $avg ) {
                $qualifications_list->push([
                    'knowledge_area' => $knowledge_area,
                    'avg' => $avg
                ]);
            }

        }

        $qualifications = collect([]);
        $qualifications_list = $qualifications_list->groupBy('knowledge_area');

        $qualifications_list->each(function ($item, $key) use ($qualifications) {
            $qualifications->push([
                'name' => KnowledgeArea::findOrFail($key)->knowledge_area,
                'qualification' => number_format(round($item->avg('avg'), 2), 2)
            ]);
        });

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
            'qualifications' => $qualifications,
            'events' => $events_json->toJson(),
            'tiny' => false
        );

        return $data;
    }

    /**
     * Show the application dashboard for coordinator role.
     *
     * @return \Illuminate\Http\Response
     */
    public function cDashboard()
    {
        $role = Auth::user()->role->id;
        $messages = Auth::user()->messages_received;
        $teachers = Auth::user()->teachers;

        $messages_count = 0;
        $evaluations_count = 0;
        $plans_count = 0;
        $courses_count = 0;

        $events = collect();
        $events_json = collect();

        foreach ($messages as $message) {
            if ( $message->pivot->state_id == trans('globals.condition.active') ) {
                $messages_count++;
            }
        }

        // Plans collection

        foreach ($teachers as $teacher) {
            foreach ($teacher->plans as $plan) {
                $events->push([
                    'title' => trans('evaluation.create.plan') . $plan->id . '<br>' . $teacher->name . ' ' . $teacher->second_name,
                    'start' => $plan->start_date->format('Y-m-d h:i:s'),
                    'end' => $plan->end_date->format('Y-m-d h:i:s'),
                    'url' => url('plans/' . $plan->id)
                ]);

                $plans_count++;
            }

            $courses_count = $courses_count + $teacher->courses->count();
        }

        $events_json->push([
            'events' => $events,
            'color' => trans('dashboard.color.blue'),
            'textColor' => trans('dashboard.color.white')
        ]);

        // Evaluations collection

        $events = collect();

        foreach ($teachers as $teacher) {
            foreach ($teacher->plans as $plan) {
                if ( $plan->evaluation ) {
                    $events->push([
                        'title' => trans('evaluation.create.evaluation') . $plan->evaluation->id . '<br>' . $teacher->name . ' ' . $teacher->second_name,
                        'start' => $plan->evaluation->start_date->format('Y-m-d h:i:s'),
                        'end' => $plan->evaluation->end_date->format('Y-m-d h:i:s'),
                        'url' => url('evaluations/' . $plan->evaluation->id)
                    ]);

                    $evaluations_count++;
                }
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
            'courses_count' => $courses_count,
            'plans_count' => $plans_count,
            'evaluations_count' => $evaluations_count,
            'events' => $events_json->toJson(),
            'tiny' => true
        );

        return $data;
    }

    /**
     * Show the application dashboard for administrator role.
     *
     * @return \Illuminate\Http\Response
     */
    public function aDashboard()
    {
        $role = Auth::user()->role->id;
        $messages = Auth::user()->messages_received;
        $teachers = Role::find(trans('globals.teacher'))->users;

        $messages_count = 0;
        $evaluations_count = 0;
        $plans_count = 0;
        $courses_count = 0;

        $events = collect();
        $events_json = collect();

        foreach ($messages as $message) {
            if ( $message->pivot->state_id == trans('globals.condition.active') ) {
                $messages_count++;
            }
        }

        // Plans collection

        foreach ($teachers as $teacher) {
            foreach ($teacher->plans as $plan) {
                $events->push([
                    'title' => trans('evaluation.create.plan') . $plan->id . '<br>' . $teacher->name . ' ' . $teacher->second_name,
                    'start' => $plan->start_date->format('Y-m-d h:i:s'),
                    'end' => $plan->end_date->format('Y-m-d h:i:s'),
                    'url' => url('plans/' . $plan->id)
                ]);

                $plans_count++;
            }

            $courses_count = $courses_count + $teacher->courses->count();
        }

        $events_json->push([
            'events' => $events,
            'color' => trans('dashboard.color.blue'),
            'textColor' => trans('dashboard.color.white')
        ]);

        // Evaluations collection

        $events = collect();

        foreach ($teachers as $teacher) {
            foreach ($teacher->plans as $plan) {
                if ( $plan->evaluation ) {
                    $events->push([
                        'title' => trans('evaluation.create.evaluation') . $plan->evaluation->id . '<br>' . $teacher->name . ' ' . $teacher->second_name,
                        'start' => $plan->evaluation->start_date->format('Y-m-d h:i:s'),
                        'end' => $plan->evaluation->end_date->format('Y-m-d h:i:s'),
                        'url' => url('evaluations/' . $plan->evaluation->id)
                    ]);

                    $evaluations_count++;
                }
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
            'courses_count' => $courses_count,
            'plans_count' => $plans_count,
            'evaluations_count' => $evaluations_count,
            'events' => $events_json->toJson(),
            'tiny' => true
        );

        return $data;
    }

    /**
     * Show the application blank page.
     *
     * @return \Illuminate\Http\Response
     */
    public function newView()
    {
        return view('new');
    }
}
