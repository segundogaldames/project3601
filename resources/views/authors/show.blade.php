@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Autores') }} </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $author->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>
                                @if ($author->email==NULL)
                                    No registrado
                                @else
                                    {{ $author->email }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nacionalidad:</th>
                            <td>{{ $author->nationality->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $author->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $author->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('nationalities.index') }}" class="btn btn-link">Nacionalidades</a>
                        <a href="{{ route('authors.index') }}" class="btn btn-link">Autores</a>
                    </p>
                </div>
            </div>
            <!--lista de usuarios por roles-->
            <div class="card">
                <div class="card-header">Recursos creados por {{ $author->nombre }}</div>

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
                                    <td>{{ $recurso->recurso }}</td>
                                    <td>{{ $recurso->anio_edicion }}</td>
                                    <td>{{ $recurso->editorial }}</td>
                                    <td>{{ $recurso->tipo }}</td>
                                    <td>{{ $recurso->tematica }}</td>
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
