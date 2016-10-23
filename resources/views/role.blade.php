@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Rol de {{ $role->role }}</div>

                <div class="panel-body">
                    <p>Funcionalidades:</p>
                    <ul>
                        @foreach ($role->features as $feature)
                            <li>{{ $feature->feature }}</li>
                        @endforeach
                    </ul>
                    <p>Usuarios:</p>
                    <ul>
                        @foreach ($role->users as $user)
                            <li>{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection