@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Nacionalidades') }} </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nacionalidad:</th>
                            <td>{{ $nationality->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $nationality->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $nationality->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('nationalities.edit', $nationality) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('nationalities.index') }}" class="btn btn-link">Volver</a>
                        <a href="{{ route('authors.addAuthor', $nationality) }}" class="btn btn-primary">Agregar Autor</a>
                    </p>
                </div>
            </div>
            <!--lista de usuarios por roles-->
            <div class="card">
                <div class="card-header">Autores {{ $nationality->nombre }}</div>

                <div class="card-body">
                    @if (isset($authors) && @count($authors))
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                            </tr>
                            @foreach ($authors as $author)
                                <tr>
                                    <td><a href="{{ route('authors.show', $author) }}">{{ $author->nombre }}</a></td>
                                    <td>{{ $author->email }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay autores registrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
