@extends('layouts.main')

@section('title')
    @lang('revision.index.title')
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
                <div class="panel-heading">@lang('revision.index.title')</div>

                <div class="panel-body">

                    <table id="plans" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="70">@lang('revision.index.course')</th>
                                <th>@lang('revision.index.teacher')</th>
                                <th width="200">@lang('revision.index.knowledge')</th>
                                <th width="200">@lang('revision.index.conceptual')</th>
                                <th width="70">@lang('revision.index.condition')</th>
                                <th>@lang('revision.index.date')</th>
                                <th width="100" class="no-sort">@lang('revision.index.options')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $teachers as $teacher )
                                @foreach ( $teacher->courses as $course )
                                    @foreach ( $course->plans as $plan )
                                        <tr>
                                            <td>{{ trans('revision.index.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}</td>
                                            <td>{{ $teacher->name }} {{ $teacher->second_name }}</td>
                                            <td>{{ $plan->conceptual_section->knowledge_area->knowledge_area }}</td>
                                            <td>{{ $plan->conceptual_section->conceptual_section }}</td>
                                            <td>{{ $plan->state->first()->state }}</td>
                                            <td>{{ $plan->start_date->format('d-m-Y') }}</td>
                                            <td class="action-links">
                                                <form role="form" action="{{ url( '/revisions/' . $plan->id ) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="GET">
                                                    <button class="btn btn-icon btn-info" title="@lang('revision.index.title.info')">
                                                        <i class="fa-info"></i>
                                                    </button>
                                                </form>
                                                @if ( $plan->state->first()->id == trans('globals.condition.pending') )
                                                    <form role="form" action="{{ url( '/revisions/' . $plan->id ) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="PUT">
                                                        <button class="btn btn-icon btn-warning" title="@lang('revision.index.title.review')">
                                                            <i class="fa-check"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
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

            $("#plans").dataTable({
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
