@extends('layouts.main')

@section('title')
    @lang('evaluation.index.title')
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
                <div class="panel-heading">@lang('evaluation.index.title')</div>

                <div class="panel-body">

                    <table id="evaluations" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="70">@lang('evaluation.index.course')</th>
                                <th width="100">@lang('evaluation.index.name')</th>
                                <th width="80">@lang('evaluation.index.percentage')</th>
                                <th width="200">@lang('evaluation.index.content')</th>
                                <th>@lang('evaluation.index.date')</th>
                                <th>@lang('evaluation.index.time')</th>
                                <th width="121" class="no-sort">@lang('evaluation.index.options')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $courses as $course )
                                @foreach ( $course->evaluations->sortByDesc('created_at') as $evaluation )
                                    <tr>
                                        <td>{{ trans('evaluation.index.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}</td>
                                        <td>{{ $evaluation->name }}</td>
                                        <td>{{ $evaluation->representative_percentage }}%</td>
                                        <td>{{ $evaluation->plan->conceptual_section->knowledge_area->knowledge_area }}<br>{{ $evaluation->plan->conceptual_section->conceptual_section }}</td>
                                        <td>{{ $evaluation->start_date->format('d-m-Y') }}</td>
                                        <td>{{ $evaluation->start_date->format('h:i A') }} - {{ $evaluation->end_date->format('h:i A') }}</td>
                                        <td class="action-links">
                                            <form role="form" action="{{ url('/evaluations/' . $evaluation->id ) }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="GET">
                                                <button class="btn btn-icon btn-info" title="@lang('evaluation.index.title.info')">
                                                    <i class="fa-info"></i>
                                                </button>
                                            </form>
                                            @if ( $actual_date->lt($evaluation->start_date) )
                                                <form role="form" action="{{ url('/evaluations/' . $evaluation->id . '/edit' ) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="GET">
                                                    <button class="btn btn-icon btn-success" title="@lang('evaluation.index.title.edit')">
                                                        <i class="fa-pencil"></i>
                                                    </button>
                                                </form>
                                                <form class="form-inline" action="{{ url('/evaluations/' . $evaluation->id ) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="button" class="btn btn-icon btn-red" role="button" title="@lang('evaluation.index.title.delete')" data-toggle="modal" data-target="#evaluation-delete-{{ $evaluation->id }}">
                                                        <i class="fa-remove"></i>
                                                    </button>
                                                    <div class="modal fade" id="evaluation-delete-{{ $evaluation->id }}" tabindex="-1" role="dialog" aria-labelledby="evaluation-delete-label-{{ $evaluation->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang('evaluation.destroy.question.close')"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="evaluation-delete-label-{{ $evaluation->id }}">@lang('evaluation.destroy.question')</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @lang('evaluation.index.name'): <b>{{ $evaluation->name }}</b><br>
                                                                    @lang('evaluation.index.course'): <b>{{ trans('evaluation.index.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}</b><br>
                                                                    @lang('evaluation.index.content'): <b>{{ $evaluation->plan->conceptual_section->knowledge_area->knowledge_area }} - {{ $evaluation->plan->conceptual_section->conceptual_section }}</b><br>
                                                                    @lang('evaluation.index.percentage'): <b>{{ $evaluation->representative_percentage }}%</b><br>
                                                                    @lang('evaluation.index.date'): <b>{{ $evaluation->start_date->format('d-m-Y') }}</b><br>
                                                                    @lang('evaluation.index.time'): <b>{{ $evaluation->start_date->format('h:i A') }} - {{ $evaluation->end_date->format('h:i A') }}</b><br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal">@lang('evaluation.destroy.question.close')</button>
                                                                    <button type="submit" class="btn btn-danger">@lang('evaluation.index.title.delete')</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @else
                                                <form role="form" action="{{ url( '/evaluations/' . $evaluation->id . '/qualifications' ) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="GET">
                                                    <button class="btn btn-icon btn-purple" title="@lang('evaluation.index.title.review')">
                                                        <i class="fa-check-square-o"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
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

            $("#evaluations").dataTable({
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
