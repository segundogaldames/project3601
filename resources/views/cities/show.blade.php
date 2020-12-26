@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Ciudades') }} </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Ciudad:</th>
                            <td>{{ $city->nombre }}</td>
                        </tr>
                        <tr>
                            <th>País:</th>
                            <td>{{ $city->country->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $city->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $city->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('cities.edit', $city) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('cities.index') }}" class="btn btn-link">Ciudades</a>
                        <a href="{{ route('countries.index') }}" class="btn btn-link">Paises</a>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Casas Publicadoras de ') }} {{ $city->nombre }}</div>

                <div class="card-body">
                    @if (isset($publishers) && @count($publishers))
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre</th>
                                <th>Dirección</th>
                            </tr>
                            @foreach ($publishers as $publisher)
                                <tr>
                                    <td><a href="{{ route('publishers.show', $publisher) }}">{{ $publisher->nombre }}</a></td>
                                    <td>
                                        @if ($publisher->direccion==NULL)
                                           No informada
                                        @else
                                            {{ $publisher->direccion }}
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay casas publicadoras registradas</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
