@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action" aria-current="true">
                           Usuarios
                        </a>
                        <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action" aria-current="true">
                           Roles
                        </a>
                    </div>
                </div>
                <div class="card-header">{{ __('Autores') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('authors.index') }}" class="list-group-item list-group-item-action" aria-current="true">
                           Autores
                        </a>
                        <a href="{{ route('nationalities.index') }}" class="list-group-item list-group-item-action" aria-current="true">
                           Nacionalidades
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
