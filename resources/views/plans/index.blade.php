@extends('layouts.main')

@section('title')
    @lang('plan.index.title')
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
                <div class="panel-heading">@lang('plan.index.title')</div>

                <div class="panel-body">

                    <table id="plans" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="70">@lang('plan.index.course')</th>
                                <th width="150">@lang('plan.index.knowledge')</th>
                                <th width="150">@lang('plan.index.conceptual')</th>
                                <th width="70">@lang('plan.index.condition')</th>
                                <th>@lang('plan.index.date')</th>
                                <th>@lang('plan.index.time')</th>
                                <th width="121" class="no-sort">@lang('plan.index.options')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $courses as $course )
                                @foreach ( $course->plans->sortByDesc('created_at') as $plan )
                                    <tr>
                                        <td>{{ trans('plan.index.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}</td>
                                        <td>{{ $plan->conceptual_section->knowledge_area->knowledge_area }}</td>
                                        <td>{{ $plan->conceptual_section->conceptual_section }}</td>
                                        <td>{{ $plan->state->first()->state }}</td>
                                        <td>{{ $plan->start_date->format('d-m-Y') }}</td>
                                        <td>{{ $plan->start_date->format('h:i A') }} - {{ $plan->end_date->format('h:i A') }}</td>
                                        <td class="action-links">
                                            <form role="form" action="{{ url('/plans/' . $plan->id ) }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="GET">
                                                <button class="btn btn-icon btn-info" title="@lang('plan.index.title.info')">
                                                    <i class="fa-info"></i>
                                                </button>
                                            </form>
                                            @if ( $plan->state->first()->id == trans('globals.condition.approved') )
                                                <form role="form" action="{{ url( '/plans/' . $plan->id . '/evaluation' ) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="GET">
                                                    <button class="btn btn-icon btn-purple" title="@lang('plan.index.title.review')">
                                                        <i class="fa-check-square-o"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            @if ( $plan->state->first()->id == trans('globals.condition.pending') )
                                                <form role="form" action="{{ url('/plans/' . $plan->id . '/edit' ) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="GET">
                                                    <button class="btn btn-icon btn-success" title="@lang('plan.index.title.edit')">
                                                        <i class="fa-pencil"></i>
                                                    </button>
                                                </form>
                                                <form role="form" action="{{ url('/plans/' . $plan->id ) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="button" class="btn btn-icon btn-red" role="button" title="@lang('plan.index.title.delete')" data-toggle="modal" data-target="#plan-delete-{{ $plan->id }}">
                                                        <i class="fa-remove"></i>
                                                    </button>
                                                    <div class="modal fade" id="plan-delete-{{ $plan->id }}" tabindex="-1" role="dialog" aria-labelledby="plan-delete-label-{{ $plan->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang('plan.destroy.question.close')"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="plan-delete-label-{{ $plan->id }}">@lang('plan.destroy.question')</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @lang('plan.index.course'): <b>{{ trans('plan.index.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}</b><br>
                                                                    @lang('plan.index.knowledge'): <b>{{ $plan->conceptual_section->knowledge_area->knowledge_area }}</b><br>
                                                                    @lang('plan.index.conceptual'): <b>{{ $plan->conceptual_section->conceptual_section }}</b><br>
                                                                    @lang('plan.index.condition'): <b>{{ $plan->state->first()->state }}</b><br>
                                                                    @lang('plan.index.date'): <b>{{ $plan->start_date->format('d-m-Y') }}</b><br>
                                                                    @lang('plan.index.time'): <b>{{ $plan->start_date->format('h:i A') }} - {{ $plan->end_date->format('h:i A') }}</b><br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal">@lang('plan.destroy.question.close')</button>
                                                                    <button type="submit" class="btn btn-danger">@lang('plan.index.title.delete')</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
