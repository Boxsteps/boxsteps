@extends('layouts.main')

@section('title')
    @lang('messages.title-blank')
@endsection

@section('custom-css')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('messages.blank-title')</div>

                <div class="panel-body">
                    @lang('messages.blank-content')
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
@endsection
