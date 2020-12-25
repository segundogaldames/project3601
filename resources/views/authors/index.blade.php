@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Autores') }} | <a href="{{ route('nationalities.index') }}" class="btn-light">Nacionalidades</a></div>

                <div class="card-body">
                    @if (isset($authors) && @count($authors))
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Nacionalidad</th>
                            </tr>
                            @foreach ($authors as $author)
                                <tr>
                                    <td><a href="{{ route('authors.show', $author) }}">{{ $author->nombre }}</a></td>
                                    <td>{{ $author->email }}</td>
                                    <td><a href="{{ route('nationalities.show', $author->nationality_id) }}">{{ $author->nationality->nombre }}</a></td>
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
