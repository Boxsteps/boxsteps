@extends('layouts.main')

@section('title')
    {{ trans('role.show.title', ['role' => $role->role]) }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('role.show.role') {{ $role->role }}</div>

                <div class="panel-body">
                    <h4>@lang('role.show.features')</h4>
                    <br>
                    <ul>
                        @foreach ($features as $feature)
                            @if ( $feature->feature_id == null )
                                <li>{{ $feature->feature }}
                                @if ( $feature->childs->first() )
                                    <ul>
                                        @foreach ($feature->childs as $child)
                                            <li>{{ $child->feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <br>
                    <h4>@lang('role.show.users')</h4>
                    <br>
                    <ul>
                        @foreach ($role->users as $user)
                            <li>{{ $user->name }} {{ $user->second_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
