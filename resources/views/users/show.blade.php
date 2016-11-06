@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Datos del usuario</div>

                <div class="panel-body">
                    <p>Nombre: {{ $user->name }}</p>
                    <p>Apellido: {{ $user->second_name }}</p>
                    <p>Correo electrónico: {{ $user->email }}</p>
                    <p>Rol: {{ $user->role->role }}</p>
                    <p>Funcionalidades:</p>
                    <ul>
                        @foreach ($user->role->features as $feature)
                            <li>{{ $feature->feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
