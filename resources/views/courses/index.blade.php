@extends('layouts.main')

@section('title')
    @lang('course.index.title')
@endsection

@section('custom-css')
@endsection

@section('custom-js-header')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('course.index.title')</div>

                <div class="panel-body">

                    @foreach ( $courses as $course )
                    
                        <div class="col-sm-4 col-sm-offset-4">

                            <a href="{{ url('courses/' . $course->id) }}">
                                <div class="xe-widget xe-counter xe-counter-blue">
                                    <div class="xe-icon">
                                        <i class="linecons-user"></i>
                                    </div>
                                    <div class="xe-label">
                                        <strong class="num">
                                            {{ $course->students->count() }} {{ trans_choice('course.index.students', $course->students->count()) }}
                                        </strong>
                                        <span>{{ trans('course.index.course', ['grade' => $course->grade, 'section' => $course->section]) }}</span>
                                    </div>
                                </div>
                            </a>

                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script src="{{ asset('boxsteps/js/xenon/xenon-widgets.js') }}"></script>
@endsection
