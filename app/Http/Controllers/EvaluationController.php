<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\ConceptualSection;
use App\EvaluationType;
use App\Evaluation;
use App\Condition;
use App\Plan;
use Validator;

class EvaluationController extends Controller
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

        $actual_date = Carbon::now();

        $data = array(
            'courses' => $courses,
            'actual_date' => $actual_date
        );

        return view('evaluations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans = Auth::user()->plans;

        $evaluation_type = EvaluationType::all();

        $data = array(
            'plans' => $plans,
            'evaluation_type' => $evaluation_type
        );

        return view('evaluations.create', $data);
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

        $plan = Plan::findOrFail($request->get('evaluation_content'));

        $evaluation = new Evaluation([
            'name' => $request->get('evaluation_name'),
            'representative_percentage' => $request->get('percentage'),
            'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', $request->get('evaluation_date') . ' ' . $request->get('time_start') ),
            'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', $request->get('evaluation_date') . ' ' . $request->get('time_end') ),
            'course_id' => $plan->course_id,
            'evaluation_type_id' => $request->get('evaluation_type'),
            'plan_id' => $request->get('evaluation_content')
        ]);

        $evaluation->save();

        return self::redirection('evaluations', trans('evaluation.create.success'), null, null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluation = Evaluation::findOrFail($id);

        if ( $evaluation->plan->user->first()->id != Auth::user()->id ) {
            if ( trans('globals.teacher') == Auth::user()->role->id ) {
                abort(403);
            }
        }

        $plan = Plan::findOrFail($evaluation->plan_id);

        $user = $plan->user->first();

        $conceptual = ConceptualSection::findOrFail($plan->conceptual_section_id);

        $evaluation_type = EvaluationType::findOrFail($evaluation->evaluation_type_id);

        $data = array(
            'evaluation' => $evaluation,
            'teacher' => $user,
            'conceptual' => $conceptual->conceptual_section,
            'knowledge' => $conceptual->knowledge_area->knowledge_area,
            'evaluation_type' => $evaluation_type
        );

        return view('evaluations.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluation = Evaluation::findOrFail($id);

        if ( Carbon::now()->gt($evaluation->start_date) ||
             $evaluation->plan->user->first()->id != Auth::user()->id ) {
            abort(403);
        }

        $plans = Auth::user()->plans;

        $evaluation_type = EvaluationType::all();

        $data = array(
            'evaluation' => $evaluation,
            'plans' => $plans,
            'evaluation_type' => $evaluation_type
        );

        return view('evaluations.edit', $data);
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

        $evaluation = Evaluation::findOrFail($id);

        $plan = Plan::findOrFail($request->evaluation_content);

        $evaluation->name = $request->evaluation_name;
        $evaluation->representative_percentage = $request->percentage;
        $evaluation->start_date = Carbon::createFromFormat( 'd-m-Y h:i A', $request->evaluation_date . ' ' . $request->time_start );
        $evaluation->end_date = Carbon::createFromFormat( 'd-m-Y h:i A', $request->evaluation_date . ' ' . $request->time_end );
        $evaluation->course_id = $plan->course_id;
        $evaluation->evaluation_type_id = $request->evaluation_type;
        $evaluation->plan_id = $request->evaluation_content;

        $evaluation->update();

        return self::redirection('evaluations/' . $id . '/edit', trans('evaluation.edit.success'), trans('evaluation.index.title'), url('evaluations'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evaluation = Evaluation::findOrFail($id);

        if ( Carbon::now()->gt($evaluation->start_date) ||
             $evaluation->plan->user->first()->id != Auth::user()->id ) {
            abort(403);
        }

        $evaluation->delete();

        return self::redirection('evaluations', trans('evaluation.destroy.success'), null, null);
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
            'evaluation_name' => 'required',
            'evaluation_content' => 'required',
            'evaluation_type' => 'required',
            'percentage' => 'required|integer|between:0,100',
            'evaluation_date' => 'required',
            'time_start' => 'required|date_format:h:i A|before:time_end',
            'time_end' => 'required|date_format:h:i A|after:time_start',
        ]);
    }
}
