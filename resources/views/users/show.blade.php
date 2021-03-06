@extends('layouts.main')

@section('title')
    @lang('user.show.title')
@endsection

@section('custom-css')
    <style type="text/css">
        .form-control[disabled] {
            background-color: #fff;
        }
    </style>
@stop

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-headerless">
                <div class="panel-body">

                    <div class="member-form-add-header">
                        <div class="row">
                            <div class="col-md-10 col-sm-8">

                                <div class="user-img">
                                    <img src="{{ asset('boxsteps/images/placeholder/user-big.png') }}" class="img-circle" alt="user-pic" />
                                </div>
                                <div class="user-name">
                                    <a href="#">{{ $user->name }} {{ $user->second_name }}</a>
                                    <span>{{ $user->role->role }}</span>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="member-form-inputs">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label" for="name">@lang('user.show.name')</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" disabled="disabled" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label" for="second_name">@lang('user.show.second.name')</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="second_name" id="second_name" value="{{ $user->second_name }}" disabled="disabled" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label" for="email">@lang('user.show.email')</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" disabled="disabled" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <label class="control-label" for="role">@lang('user.show.role')</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="role" id="role" value="{{ $user->role->role }}" disabled="disabled" />
                            </div>
                        </div>

                        <div class="row"><div class="col-sm-3"></div></div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
