@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Tipo Recursos') }} </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Tipo Recurso:</th>
                            <td>{{ $recursoTipo->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $recursoTipo->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $recursoTipo->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('recursoTipos.edit', $recursoTipo) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('recursoTipos.index') }}" class="btn btn-link">Volver</a>
                    </p>
                </div>
            </div>
            <!--lista de usuarios por roles-->
            <div class="card">
                <div class="card-header">Recursos Tipo {{ $recursoTipo->nombre }}</div>

                <div class="card-body">
                    @if (isset($recursos) && @count($recursos))
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre</th>
                                <th>Año de Publicación</th>
                                <th>Casa Publicadora</th>
                                <th>Temática</th>
                            </tr>
                            @foreach ($recursos as $recurso)
                                <tr>
                                    <td><a href="{{ route('recursos.show', $recurso) }}">{{ $recurso->nombre }}</a></td>
                                    <td>{{ $recurso->anio_edicion }}</td>
                                    <td><a href="{{ route('publishers.show', $recurso->publisher_id) }}">{{ $recurso->publisher->nombre }}</a></td>                                    <td><a href="{{ route('tematicas.show', $recurso->tematica_id) }}">{{ $recurso->tematica->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay recursos asociados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
