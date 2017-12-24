<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ConceptualSection;
use App\Plan;

use App\Http\Requests;

class RevisionController extends Controller
{
    /**
     * Create a new user controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(trans('globals.role.coordinator'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Auth::user()->teachers;

        $data = array('teachers' => $teachers);

        return view('revisions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::findOrFail($id);

        $conceptual = ConceptualSection::findOrFail($plan->conceptual_section_id);

        $data = array(
            'plan' => $plan,
            'conceptual' => $conceptual->conceptual_section,
            'knowledge' => $conceptual->knowledge_area->knowledge_area
        );

        return view('revisions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);

        $condition = $plan->condition;

        $condition->state_id = trans('globals.condition.approved');

        $condition->update();

        return self::redirection('revisions', trans('revision.approve.success'), null, null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
