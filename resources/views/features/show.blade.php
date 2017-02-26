@extends('layouts.main')

@section('title')
    {{ trans('feature.show.title', ['feature' => $feature->feature]) }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('feature.show.feature') {{ $feature->feature }}</div>

                <div class="panel-body">
                    <h4>@lang('feature.show.description')</h4>
                    <br>
                    <ul>
                        <li>Icono: <i class="{{ $feature->icon }}"></i></li>
                        <li>Nombre: {{ $feature->feature }}</li>
                        <li>Enlace: {{ $feature->url }}</li>
                    </ul>
                    <br>
                    <h4>@lang('feature.show.role')</h4>
                    <br>
                    <ul>
                        @foreach ($feature->roles as $role)
                            <li>{{ $role->role }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
