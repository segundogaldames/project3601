@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Temáticas') }} </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $tematica->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $tematica->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $tematica->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('tematicas.edit', $tematica) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('tematicas.index') }}" class="btn btn-link">Volver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
