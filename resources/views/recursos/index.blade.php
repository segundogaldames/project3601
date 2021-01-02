@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Recursos') }} | <a href="{{ route('recursos.create') }}" class="btn-light btn-md">Nuevo Recurso</a></div>

                <div class="card-body">
                    @if (isset($recursos) && @count($recursos))
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre</th>
                                <th>Año de Publicación</th>
                                <th>Casa Publicadora</th>
                                <th>Tipo</th>
                                <th>Temática</th>
                            </tr>
                            @foreach ($recursos as $recurso)
                                <tr>
                                    <td><a href="{{ route('recursos.show', $recurso) }}">{{ $recurso->nombre }}</a></td>
                                    <td>{{ $recurso->anio_edicion }}</td>
                                    <td><a href="{{ route('publishers.show', $recurso->publisher_id) }}">{{ $recurso->publisher->nombre }}</a></td>
                                    <td>{{ $recurso->recursoTipo->nombre }}</td>
                                    <td><a href="{{ route('tematicas.show', $recurso->tematica_id) }}">{{ $recurso->tematica->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay recursos registrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
