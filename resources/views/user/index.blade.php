@extends('layouts.main')

@section('title')
    Listar usuarios
@endsection

@section('custom-css')
@endsection

@section('custom-js-header')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listar usuarios</div>

                <div class="panel-body">
                    <div class="tab-pane active" id="all">

                        <table class="table table-hover members-table middle-align">
                            <thead>
                                <tr>
                                    <th class="hidden-xs hidden-sm"></th>
                                    <th>Nombre y rol</th>
                                    <th class="hidden-xs hidden-sm">Correo electrónico</th>
                                    <th>ID</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="user-image hidden-xs hidden-sm">
                                            <a href="#">
                                                <img src="{{ asset('boxsteps/images/placeholder/user.png') }}" class="img-circle" alt="user-pic" />
                                            </a>
                                        </td>
                                        <td class="user-name">
                                            <a href="{{ url('/user/' . $user->id ) }}" class="name">{{ $user->name }} {{ $user->second_name }}</a>
                                            <span>{{ $user->role->role }}</span>
                                        </td>
                                        <td class="hidden-xs hidden-sm">
                                            <span class="email">{{ $user->email }}</span>
                                        </td>
                                        <td class="user-id">
                                            {{ $user->id }}
                                        </td>
                                        <td class="action-links">

                                            <form role="form" action="{{ url('/user/' . $user->id . '/edit' ) }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="GET">
                                                <button class="btn btn-icon btn-success" title="Editar usuario">
                                                    <i class="fa-pencil"></i>
                                                </button>
                                            </form>

                                            <form role="form" action="{{ url('/user/' . $user->id ) }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-icon btn-red" title="Eliminar usuario">
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
    </div>

@endsection

@section('custom-js-footer')
@endsection
