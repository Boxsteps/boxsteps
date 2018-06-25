@extends('layouts.error')

@section('title')
    @lang('errors.503.title')
@endsection

@section('content')

    <div class="title">@lang('errors.503.title')</div>
    <div class="content col-md-6">
        <p>
            @lang('errors.503.content')
        </p>
    </div>

@endsection
