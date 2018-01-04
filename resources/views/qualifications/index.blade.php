@extends('layouts.main')

@section('title')
    @lang('qualification.index.title')
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('boxsteps/js/datatables/css/datatables.bootstrap.css') }}">
@endsection

@section('messages')
    @if (session('message'))
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">@lang('globals.message.close')</span>
                    </button>
                    {{ session('message') }}<br>{{ session('return') }}
                    @if ( (session('url') != null) && (session('name') != null) )
                        <a href="{{ session('url') }}">{{ session('name') }}</a>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">@lang('qualification.index.title.evaluation')</h3>
                </div>

                <div class="panel-body">

                    <blockquote class="blockquote blockquote-default">
                        <p>
                            {{ trans('qualification.index.course-format', ['grade' => $course->grade, 'section' => $course->section]) }} ·
                            {{ $evaluation->name }} ({{ $evaluation->representative_percentage }}%)<br>
                            {{ $evaluation->plan->conceptual_section->knowledge_area->knowledge_area }} - {{ $evaluation->plan->conceptual_section->conceptual_section }}<br>
                            {{ $evaluation->start_date->format('d-m-Y') }} · {{ $evaluation->start_date->format('h:i A') }} - {{ $evaluation->end_date->format('h:i A') }}
                        </p>
                    </blockquote>
                    <br>

                </div>

                <div class="panel-heading">
                    <h3 class="panel-title">@lang('qualification.index.title')</h3>
                </div>

                <div class="panel-body">

                    <table id="qualifications" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>@lang('qualification.index.dni')</th>
                                <th>@lang('qualification.index.name')</th>
                                <th>@lang('qualification.index.second-name')</th>
                                <th width="250">@lang('qualification.index.email')</th>
                                <th width="100">@lang('qualification.index.qualification')</th>
                                <th width="70" class="no-sort">@lang('qualification.index.options')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $qualifications as $qualification )
                                <tr>
                                    <td>{{ $qualification->dni }}</td>
                                    <td>{{ $qualification->name }}</td>
                                    <td>{{ $qualification->second_name }}</td>
                                    <td>{{ $qualification->email }}</td>
                                    <td>{{ ( $qualification->pivot->qualification ? $qualification->pivot->qualification : trans('qualification.index.null-qualification') ) }}</td>
                                    <td class="action-links">
                                        <form role="form" action="{{ url( '/evaluations/' . $evaluation->id . '/qualifications/' . $qualification->id ) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="GET">
                                            <button class="btn btn-icon btn-purple" title="@lang('qualification.index.title.review')">
                                                <i class="fa-check-square-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script src="{{ asset('boxsteps/js/datatables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('boxsteps/js/datatables/datatables.bootstrap.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {

            $languageURL = "{{ url('boxsteps/js/datatables/lang/spanish.json') }}";

            $("#qualifications").dataTable({
                'paging': false,
                'language': {
                    'url': $languageURL
                },
                'aoColumnDefs' : [{
                    'bSortable': false,
                    'aTargets': ['no-sort']
                }]
            });
        });
    </script>
@endsection
