@extends('layouts.main')

@section('title')
    @lang('user.index.title')
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
                <div class="panel-heading">@lang('user.index.title')</div>

                <div class="panel-body">
                    <table class="table table-hover members-table middle-align">
                        <thead>
                            <tr>
                                <th class="hidden-xs hidden-sm"></th>
                                <th>@lang('user.index.name.rol')</th>
                                <th class="hidden-xs hidden-sm">@lang('user.index.email')</th>
                                <th>@lang('user.index.id')</th>
                                <th>@lang('user.index.options')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="user-image hidden-xs hidden-sm">
                                        <a href="{{ url('/users/' . $user->id ) }}">
                                            <img src="{{ asset('boxsteps/images/placeholder/user.png') }}" class="img-circle" alt="user-pic" />
                                        </a>
                                    </td>
                                    <td class="user-name">
                                        <a href="{{ url('/users/' . $user->id ) }}" class="name">{{ $user->name }} {{ $user->second_name }}</a>
                                        <span>{{ $user->role->role }}</span>
                                    </td>
                                    <td class="hidden-xs hidden-sm">
                                        <span class="email">{{ $user->email }}</span>
                                    </td>
                                    <td class="user-id">
                                        {{ $user->id }}
                                    </td>
                                    <td class="action-links">
                                        <form role="form" action="{{ url('/users/' . $user->id . '/edit' ) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="GET">
                                            <button class="btn btn-icon btn-success" title="@lang('user.index.title.edit')">
                                                <i class="fa-pencil"></i>
                                            </button>
                                        </form>
                                        <form role="form" action="{{ url('/users/' . $user->id ) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="button" class="btn btn-icon btn-red" role="button" title="@lang('user.index.title.delete')" data-toggle="modal" data-target="#user-delete-{{ $user->id }}">
                                                <i class="fa-remove"></i>
                                            </button>
                                            <div class="modal fade" id="user-delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="user-delete-label-{{ $user->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="@lang('user.destroy.question.close')"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="user-delete-label-{{ $user->id }}">@lang('user.destroy.question')</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            @lang('user.index.name.rol'): <b>{{ $user->name }} {{ $user->second_name }} - {{ $user->role->role }}</b><br>
                                                            @lang('user.index.email'): <b>{{ $user->email }}</b><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">@lang('user.destroy.question.close')</button>
                                                            <button type="submit" class="btn btn-danger">@lang('user.index.title.delete')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
