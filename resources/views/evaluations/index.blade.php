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
                                <th width="280">@lang('evaluation.index.content')</th>
                                <th>@lang('evaluation.index.date')</th>
                                <th>@lang('evaluation.index.time')</th>
                                <th width="121" class="no-sort">@lang('evaluation.index.options')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $courses as $course )
                                @foreach ( $course->evaluations as $evaluation )
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
                                                <form role="form" action="{{ url('/evaluations/' . $evaluation->id ) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-icon btn-red" title="@lang('evaluation.index.title.delete')">
                                                        <i class="fa-remove"></i>
                                                    </button>
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
