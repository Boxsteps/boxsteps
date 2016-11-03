@extends('layouts.error')

@section('title')
    @lang('errors.404.title')
@endsection

@section('content')
    
    <div class="title">@lang('errors.404.title')</div>
    <div class="content col-md-6">
        <p>
            @lang('errors.404.content')
        </p>
    </div>

@endsection
