<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Course;
use App\KnowledgeArea;

class StatisticController extends Controller
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

        $qualifications = collect([]);
        $qualifications_list = collect([]);
        $course_name = '';

        foreach ($courses as $course) {
            $course_name = trans('statistic.index.course') . trans('statistic.index.course-format', ['grade' => $course->grade, 'section' => $course->section]);
            foreach ($course->evaluations as $evaluation) {
                $qualifications = collect([]);
                $knowledge_area = $evaluation->plan->conceptual_section->knowledge_area->knowledge_area;
                foreach ($evaluation->students as $student) {
                    $qualifications->push([
                        'qualification' => $student->pivot->qualification
                    ]);
                }

                // Verify if evaluations has been qualified (exist)
                if ( $qualifications->avg('qualification') ) {
                    $qualifications_list->push([
                        'knowledge_area' => $knowledge_area,
                        'qualification' => $qualifications->avg('qualification')
                    ]);
                }
            }
        }

        $qualifications = collect([]);
        $qualifications_list = $qualifications_list->groupBy('knowledge_area');

        $qualifications_list->each(function ($item, $key) use ($qualifications) {
            $qualifications->push([
                'name' => $key,
                'data' => [$item->avg('qualification')]
            ]);
        });

        $qualifications_list = collect([
            'title' => trans('statistic.index.group-qualifications.title'),
            'subtitle' => $course_name,
            'xAxis' => trans('statistic.index.group-qualifications.xaxis'),
            'yAxis' => trans('statistic.index.group-qualifications.yaxis'),
            'data' => $qualifications
        ]);

        $data = array(
            'qualifications_list_chart_data' => $qualifications_list->toJson()
        );

        return view('statistics.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function groupShow($id)
    {
        $course = Course::findOrFail($id);

        $qualifications = collect([]);
        $qualifications_list = collect([]);

        foreach ($course->evaluations as $evaluation) {

            $qualifications = collect([]);
            $knowledge_area = $evaluation->plan->conceptual_section->knowledge_area->id;
            foreach ($evaluation->students as $student) {
                $qualifications->push([
                    'qualification' => $student->pivot->qualification
                ]);
            }

            $avg = $qualifications->avg('qualification');

            $deviation = collect([]);
            $qualifications->each(function ($item, $key) use ($deviation, $avg) {
                $deviation->push([
                    'qualification' => abs($item['qualification'] - $avg)
                ]);
            });

            // Verify if evaluations has been qualified (exist)
            if ( $avg ) {
                $deviation = $deviation->sum('qualification') / $deviation->count();
                $qualifications_list->push([
                    'knowledge_area' => $knowledge_area,
                    'avg' => $avg,
                    'deviation' => $deviation
                ]);
            }
        }

        $qualifications = collect([]);
        $qualifications_list = $qualifications_list->groupBy('knowledge_area');

        $qualifications_list->each(function ($item, $key) use ($qualifications) {
            $qualifications->push([
                'id' => 'g' . $key,
                'name' => KnowledgeArea::findOrFail($key)->knowledge_area,
                'tooltip' => [
                    'pointFormat' => '<br/><span style="color:{point.color}">&#9679;</span> {series.name}: <b>{point.y}</b><br/>'
                ],
                'data' => [$item->avg('avg')]
            ]);
            $qualifications->push([
                'type' => 'errorbar',
                'name' => 'Desviación',
                'linkedTo' => 'g' . $key,
                'tooltip' => [
                    'pointFormat' => '<span style="color: transparent">&#9679;</span> {series.name}: <b>{point.high} - {point.low}</b><br/>',
                ],
                'data' => [
                    [
                        'low' => $item->avg('avg') - $item->avg('deviation'),
                        'high' => $item->avg('avg') + $item->avg('deviation')
                    ]
                ]
            ]);
        });

        $qualifications_list = collect([
            'title' => trans('statistic.index.group-qualifications.title'),
            'subtitle' => trans('statistic.index.course') . trans('statistic.index.course-format', ['grade' => $course->grade, 'section' => $course->section]),
            'xAxis' => trans('statistic.index.group-qualifications.xaxis'),
            'yAxis' => trans('statistic.index.group-qualifications.yaxis'),
            'data' => $qualifications
        ]);

        $data = array(
            'qualifications_list_chart_data' => $qualifications_list->toJson()
        );

        return view('statistics.index', $data);
    }
}
