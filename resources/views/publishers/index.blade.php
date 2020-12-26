@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Casas Publicadoras') }} | <a href="{{ route('publishers.create') }}" class="btn-light btn-md">Nueva Casa Publicadora</a></div>

                <div class="card-body">
                    @if (isset($publishers) && @count($publishers))
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre</th>
                                <th>Ciudad</th>
                            </tr>
                            @foreach ($publishers as $publisher)
                                <tr>
                                    <td><a href="{{ route('publishers.show', $publisher) }}">{{ $publisher->nombre }}</a></td>
                                    <td><a href="{{ route('cities.show', $publisher->city_id) }}">{{ $publisher->city->nombre }}</a></td>
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
