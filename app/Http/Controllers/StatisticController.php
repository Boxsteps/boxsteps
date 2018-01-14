<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\KnowledgeArea;
use App\Student;
use App\Course;

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

        $data = array('courses' => $courses);

        return view('statistics.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courseShow($id)
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

            // Verify if evaluations has been qualified (exist)

            if ( $avg ) {

                $deviation = collect([]);
                $qualifications->each(function ($item, $key) use ($deviation, $avg) {
                    $deviation->push([
                        'qualification' => abs($item['qualification'] - $avg)
                    ]);
                });

                $total = $deviation->count();
                $low = round($total*0.05, 0);
                $q1 = round($total*0.25, 0);
                $q3 = round($total*0.75, 0);
                $high = round($total*0.95, 0) - 1;

                $deviation = $deviation->sum('qualification') / $total;
                $qualifications_list->push([
                    'knowledge_area' => $knowledge_area,
                    'avg' => $avg,
                    'deviation' => $deviation,
                    'median' => $qualifications->median('qualification'),
                    'low' => $qualifications->sortBy('qualification')->slice($low, 1)->first()['qualification'],
                    'q1' => $qualifications->sortBy('qualification')->slice($q1, 1)->first()['qualification'],
                    'q3' => $qualifications->sortBy('qualification')->slice($q3, 1)->first()['qualification'],
                    'high' => $qualifications->sortBy('qualification')->slice($high, 1)->first()['qualification']
                ]);

            }
        }

        $percentile = collect([]);
        $qualifications = collect([]);
        $qualifications_list = $qualifications_list->groupBy('knowledge_area');

        $qualifications_list->each(function ($item, $key) use ($qualifications, $percentile) {
            $qualifications->push([
                'id' => 'g' . $key,
                'name' => KnowledgeArea::findOrFail($key)->knowledge_area,
                'tooltip' => [
                    'pointFormat' => '<br/><span style="color:{point.color}">&#9679;</span> {series.name}<br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.avg') . ' <b>{point.y}</b><br/>'
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
            $percentile->push([
                'id' => 'p' . $key,
                'name' => KnowledgeArea::findOrFail($key)->knowledge_area,
                'tooltip' => [
                    'pointFormat' => '<br/><span style="color:{point.color}">&#9679;</span> {series.name}<br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.high') . ' <b>{point.high}</b><br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.q3') . ' <b>{point.q3}</b><br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.median') . ' <b>{point.median}</b><br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.q1') . ' <b>{point.q1}</b><br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.low') . ' <b>{point.low}</b>'

                ],
                'data' => [
                    [
                        'median' => $item->avg('median'),
                        'low' => $item->avg('low'),
                        'q1' => $item->avg('q1'),
                        'q3' => $item->avg('q3'),
                        'high' => $item->avg('high')
                    ]
                ]
            ]);
        });

        $qualifications_list = collect([
            'titleAvg' => trans('statistic.course.chart.avg.title'),
            'titleBox' => trans('statistic.course.chart.box.title'),
            'subtitle' => trans('statistic.course.course') . trans('statistic.course.course-format', ['grade' => $course->grade, 'section' => $course->section]),
            'xAxis' => trans('statistic.course.chart.xaxis'),
            'yAxis' => trans('statistic.course.chart.yaxis'),
            'data' => $qualifications,
            'percentile' => $percentile
        ]);

        $data = array(
            'group_qualifications' => $qualifications_list->toJson()
        );

        return view('statistics.course', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentShow($id)
    {
        $student = Student::findOrFail($id);

        $qualifications = collect([]);
        $qualifications_list = collect([]);

        foreach ($student->evaluations as $evaluation) {
            $knowledge_area = $evaluation->plan->conceptual_section->knowledge_area->id;
            $qualifications->push([
                'knowledge_area' => $knowledge_area,
                'qualification' => $evaluation->pivot->qualification
            ]);
        }

        $qualifications = $qualifications->groupBy('knowledge_area');

        $qualifications->each(function ($item, $key) use ($qualifications_list) {

            $avg = $item->avg('qualification');

            if ( $avg ) {

                $deviation = collect([]);
                $item->each(function ($item, $key) use ($deviation, $avg) {
                    $deviation->push([
                        'qualification' => abs($item['qualification'] - $avg)
                    ]);
                });

                $total = $deviation->count();
                $low = round($total*0.05, 0);
                $q1 = round($total*0.25, 0);
                $q3 = round($total*0.75, 0);
                $high = round($total*0.95, 0) - 1;

                $deviation = $deviation->sum('qualification') / $total;

                $qualifications_list->push([
                    'knowledge_area' => $key,
                    'avg' => $avg,
                    'deviation' => $deviation,
                    'median' => (float) $item->median('qualification'),
                    'low' => (float) $item->sortBy('qualification')->slice($low, 1)->first()['qualification'],
                    'q1' => (float) $item->sortBy('qualification')->slice($q1, 1)->first()['qualification'],
                    'q3' => (float) $item->sortBy('qualification')->slice($q3, 1)->first()['qualification'],
                    'high' => (float) $item->sortBy('qualification')->slice($high, 1)->first()['qualification']
                ]);

            }

        });

        $percentile = collect([]);
        $qualifications = collect([]);

        $qualifications_list->each(function ($item, $key) use ($qualifications, $percentile) {
            $qualifications->push([
                'id' => 'g' . $key,
                'name' => KnowledgeArea::findOrFail($item['knowledge_area'])->knowledge_area,
                'tooltip' => [
                    'pointFormat' => '<br/><span style="color:{point.color}">&#9679;</span> {series.name}<br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.avg') . ' <b>{point.y}</b><br/>'
                ],
                'data' => [$item['avg']]
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
                        'low' => $item['avg'] - $item['deviation'],
                        'high' => $item['avg'] + $item['deviation']
                    ]
                ]
            ]);
            $percentile->push([
                'id' => 'p' . $key,
                'name' => KnowledgeArea::findOrFail($item['knowledge_area'])->knowledge_area,
                'tooltip' => [
                    'pointFormat' => '<br/><span style="color:{point.color}">&#9679;</span> {series.name}<br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.high') . ' <b>{point.high}</b><br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.q3') . ' <b>{point.q3}</b><br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.median') . ' <b>{point.median}</b><br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.q1') . ' <b>{point.q1}</b><br/>' .
                                     '<span style="color: transparent">&#9679;</span> ' . trans('statistic.course.chart.format.low') . ' <b>{point.low}</b>'

                ],
                'data' => [
                    [
                        'median' => $item['median'],
                        'low' => $item['low'],
                        'q1' => $item['q1'],
                        'q3' => $item['q3'],
                        'high' => $item['high']
                    ]
                ]
            ]);
        });

        $qualifications_list = collect([
            'titleAvg' => trans('statistic.course.chart.avg.title'),
            'titleBox' => trans('statistic.course.chart.box.title'),
            'subtitle' => $student->name . ' ' . $student->second_name . ' / ' .
                          trans('statistic.student.dni') . $student->dni . ' / ' .
                          $student->email,
            'xAxis' => trans('statistic.course.chart.xaxis'),
            'yAxis' => trans('statistic.course.chart.yaxis'),
            'data' => $qualifications,
            'percentile' => $percentile
        ]);

        $data = array(
            'student_qualifications' => $qualifications_list->toJson()
        );

        return view('statistics.student', $data);
    }
}
