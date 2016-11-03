@extends('layouts.main')

@section('title')
    @lang('messages.title-blank')
@endsection

@section('custom-css')
    <link rel="stylesheet" href="assets/js/wysihtml5/src/bootstrap-wysihtml5.css">
@endsection

@section('breadcrumbs')
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">@lang('breadcrumbs.plan-index-title')</h1>
            <p class="description">@lang('breadcrumbs.plan-index-description')</p>
        </div>

        <div class="breadcrumb-env">
            <ol class="breadcrumb bc-1">
                <li>
                    <a href="{{ url('/dashboard') }}"><i class="fa-home"></i>@lang('breadcrumbs.home')</a>
                </li>
                <li class="active">
                    <strong>@lang('breadcrumbs.plan-index-title')</strong>
                </li>
            </ol>
        </div>

    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('messages.blank-title')</div>

                <div class="panel-body">
                    @lang('messages.blank-content')
                </div>

                <form role="form" method="post">

    				<div class="form-group">
    					<textarea class="form-control wysihtml5" data-stylesheet-url="assets/js/wysihtml5/lib/css/wysiwyg-color.css" name="area1" id="area1"></textarea>
    				</div>

                    <div class="form-group">
    					<textarea class="form-control wysihtml5" data-stylesheet-url="assets/js/wysihtml5/lib/css/wysiwyg-color.css" name="area_d" id="area_d"></textarea>
    				</div>

    			</form>
            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script src="assets/js/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="assets/js/wysihtml5/src/bootstrap-wysihtml5.js"></script>
@endsection
