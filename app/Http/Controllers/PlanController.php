<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\KnowledgeArea;
use App\Plan;
use Validator;

class PlanController extends Controller
{
    /**
     * Create a new user controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Auth::user()->courses;

        $data = array('courses' => $courses);

        return view('plans.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Auth::user()->courses;
        $knowledge_areas = KnowledgeArea::all();

        $data = array('knowledge_areas' => $knowledge_areas, 'courses' => $courses);

        return view('plans.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $plan = new Plan([
            'course_id' => $request->get('course'),
            'conceptual_section_id' => $request->get('conceptual'),
            'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', $request->get('planification_date') . ' ' . $request->get('time_start') ),
            'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', $request->get('planification_date') . ' ' . $request->get('time_end') ),
            'procedimental_section' => $request->get('procedimental'),
            'actitudinal_section' => $request->get('actitudinal'),
            'competences' => $request->get('competences'),
            'indicators' => $request->get('indicators'),
            'teaching_strategy' => $request->get('teaching_strategy'),
            'teaching_sequence' => $request->get('teaching_sequence'),
            'period_id' => 1
        ]);

        $plan->save();
        return redirect('/plans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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

    /**
     * Get a validator for an incoming store/update request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'course' => 'required',
            'knowledge' => 'required',
            'conceptual' => 'required',
            'planification_date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'procedimental' => 'required',
            'actitudinal' => 'required',
            'competences' => 'required',
            'indicators' => 'required',
            'teaching_strategy' => 'required',
            'teaching_sequence' => 'required'
        ]);
    }

}
