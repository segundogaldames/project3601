@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Casas Publicadoras') }} </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $publisher->nombre }}</td>
                        </tr>
                         <tr>
                            <th>Dirección:</th>
                            <td>{{ $publisher->direccion }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad:</th>
                            <td>{{ $publisher->city->nombre }}</td>
                        </tr>
                        <tr>
                            <th>País:</th>
                            <td>{{ $publisher->city->country->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $publisher->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $publisher->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('publishers.index') }}" class="btn btn-link">Volver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
