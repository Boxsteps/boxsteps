<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\KnowledgeArea;
use App\ConceptualSection;
use App\Condition;
use App\Period;
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
            'period_id' => Period::all()->last()->id
        ]);

        $plan->save();

        $condition = new Condition([
            'state_id' => trans('globals.condition.pending'),
            'plan_id' => Plan::all()->last()->id
        ]);

        $condition->save();

        return self::redirection('plans', trans('plan.create.success'), null, null);
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

        return view('plans.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plan::findOrFail($id);

        $courses = Auth::user()->courses;

        $knowledge_areas = KnowledgeArea::all();

        $plan_knowledge = $plan->conceptual_section->knowledge_area;

        $data = array(
            'plan' => $plan,
            'courses' => $courses,
            'knowledge_areas' => $knowledge_areas,
            'plan_knowledge' => $plan_knowledge
        );

        return view('plans.edit', $data);
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
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $plan = Plan::findOrFail($id);

        $plan->course_id = $request->course;
        $plan->conceptual_section_id = $request->conceptual;
        $plan->start_date = Carbon::createFromFormat( 'd-m-Y h:i A', $request->planification_date . ' ' . $request->time_start );
        $plan->end_date = Carbon::createFromFormat( 'd-m-Y h:i A', $request->planification_date . ' ' . $request->time_end );
        $plan->procedimental_section = $request->procedimental;
        $plan->actitudinal_section = $request->actitudinal;
        $plan->competences = $request->competences;
        $plan->indicators = $request->indicators;
        $plan->teaching_strategy = $request->teaching_strategy;
        $plan->teaching_sequence = $request->teaching_sequence;

        $plan->update();

        return self::redirection('plans/' . $id . '/edit', trans('plan.edit.success'), trans('plan.index.title'), url('plans'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);

        $plan->delete();

        return self::redirection('plans', trans('plan.destroy.success'), null, null);
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
            'time_start' => 'required|date_format:h:i A|before:time_end',
            'time_end' => 'required|date_format:h:i A|after:time_start',
            'procedimental' => 'required',
            'actitudinal' => 'required',
            'competences' => 'required',
            'indicators' => 'required',
            'teaching_strategy' => 'required',
            'teaching_sequence' => 'required'
        ]);
    }

}
