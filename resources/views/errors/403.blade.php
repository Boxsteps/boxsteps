@extends('layouts.error')

@section('title')
    @lang('errors.403.title')
@endsection

@section('content')

    <div class="title">@lang('errors.403.title')</div>
    <div class="content col-md-6">
        <p>
            @lang('errors.403.content')
        </p>
    </div>

@endsection
