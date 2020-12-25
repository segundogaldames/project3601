@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Paises') }} </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>País:</th>
                            <td>{{ $country->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $country->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $country->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('countries.edit', $country) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('countries.index') }}" class="btn btn-link">Volver</a>
                        <a href="{{ route('cities.addCity', $country) }}" class="btn btn-primary">Agregar Ciudad</a>
                    </p>
                </div>
            </div>
            <!--lista de usuarios por roles-->
            <div class="card">
                <div class="card-header">Ciudades de {{ $country->nombre }}</div>

                <div class="card-body">
                    @if (isset($cities) && @count($cities))
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre</th>
                            </tr>
                            @foreach ($cities as $city)
                                <tr>
                                    <td><a href="{{ route('cities.show', $city) }}">{{ $city->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay ciudades registradas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
