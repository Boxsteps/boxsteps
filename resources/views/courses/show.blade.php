@extends('layouts.main')

@section('title')
    @lang('course.show.title', ['grade' => $course->grade, 'section' => $course->section])
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('boxsteps/js/datatables/css/datatables.bootstrap.css') }}">
@endsection

@section('custom-js-header')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('course.show.title', ['grade' => $course->grade, 'section' => $course->section])</div>

                <div class="panel-body">

                    <table id="students" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>@lang('course.show.name')</th>
                                <th>@lang('course.show.second_name')</th>
                                <th width="200">@lang('course.show.address')</th>
                                <th>@lang('course.show.dni')</th>
                                <th>@lang('course.show.email')</th>
                                <th>@lang('course.show.phones')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $students as $student )
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->second_name }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->dni }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }} / {{ $student->mobile }}</td>
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

            $("#students").dataTable({
                'language': {
                    'url': $languageURL
                }
            });
        });
    </script>
@endsection
