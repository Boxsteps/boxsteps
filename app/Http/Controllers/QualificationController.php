<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Evaluation;
use Validator;

class QualificationController extends Controller
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
    public function index($evaluationId)
    {
        $evaluation = Evaluation::findOrFail($evaluationId);

        if ( $evaluation->plan->user->first()->id != Auth::user()->id ) {
            abort(403);
        }

        $evaluation_scales = $evaluation->evaluation_type->evaluation_scales;
        $evaluation_scales_count = count($evaluation_scales);

        $course = $evaluation->course;

        // Create a list of students id on the course

        $students = $evaluation->course->students->pluck('id')->all();

        // Sync students list with course list

        $evaluation->students()->syncWithoutDetaching($students);

        $qualifications = $evaluation->students;

        $data = array(
            'course' => $course,
            'evaluation' => $evaluation,
            'evaluation_scales' => $evaluation_scales,
            'evaluation_scales_count' => $evaluation_scales_count,
            'qualifications' => $qualifications
        );

        return view('qualifications.index', $data);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($evaluationId, $studentId)
    {
        $evaluation = Evaluation::findOrFail($evaluationId);

        if ( $evaluation->plan->user->first()->id != Auth::user()->id ) {
            abort(403);
        }

        $evaluation_type = $evaluation->evaluation_type;
        $evaluation_scales = $evaluation->evaluation_type->evaluation_scales;
        $evaluation_scales_count = count($evaluation_scales);

        $student = $evaluation->students->find($studentId);

        if ( !$student ) { abort(404); }

        $data = array(
            'evaluation' => $evaluation,
            'evaluation_type' => $evaluation_type,
            'evaluation_scales' => $evaluation_scales,
            'evaluation_scales_count' => $evaluation_scales_count,
            'student' => $student
        );

        return view('qualifications.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($evaluationId, $studentId, Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $evaluation = Evaluation::findOrFail($evaluationId);

        $evaluation->students()->syncWithoutDetaching([$studentId => ['qualification' => $request->qualification]]);

        return self::redirection('evaluations/' . $evaluationId . '/qualifications/' . $studentId . '/edit', trans('qualification.edit.success'), trans('qualification.index.title'), url('evaluations/' . $evaluationId . '/qualifications'));
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
            'qualification' => 'required|integer|between:' . $data['minimum_qualification'] . ',' . $data['maximum_qualification']
        ]);
    }
}
