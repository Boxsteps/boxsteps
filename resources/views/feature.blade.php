@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Funcionalidad de {{ $feature->feature }}</div>

                <div class="panel-body">
                    <p>Rol que posee dicha funcionalidad:</p>
                    <ul>
                        @foreach ($feature->roles as $role)
                            <li>{{ $role->role }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
