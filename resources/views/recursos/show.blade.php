@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Recursos') }} </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $recurso->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Año Publicación:</th>
                            <td>{{ $recurso->anio_edicion }}</td>
                        </tr>
                        <tr>
                            <th>Tipo:</th>
                            <td>{{ $recurso->recursoTipo->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Casa Publicadora:</th>
                            <td>{{ $recurso->publisher->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Temática:</th>
                            <td>{{ $recurso->tematica->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $recurso->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $recurso->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $recurso->descripcion }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('recursos.edit', $recurso) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('recursos.index') }}" class="btn btn-link">Volver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
