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
                                            <button class="btn btn-icon btn-red" title="@lang('user.index.title.delete')">
                                                <i class="fa-remove"></i>
                                            </button>
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
