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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
