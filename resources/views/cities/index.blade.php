@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Ciudades') }}</div>

                <div class="card-body">
                    @if (isset($cities) && @count($cities))
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre</th>
                                <th>País</th>
                            </tr>
                            @foreach ($cities as $city)
                                <tr>
                                    <td><a href="{{ route('cities.show', $city) }}">{{ $city->nombre }}</a></td>
                                    <td><a href="{{ route('countries.show', $city->country_id) }}">{{ $city->country->nombre }}</a></td>
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
