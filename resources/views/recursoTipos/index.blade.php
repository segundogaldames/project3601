@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Tipo Recursos') }} | <a href="{{ route('recursoTipos.create') }}" class="btn-light btn-md">Nuevo Tipo Recurso</a></div>

                <div class="card-body">
                    @if (isset($tipos) && @count($tipos))
                        <table class="table table-hover">
                            @foreach ($tipos as $tipo)
                                <tr>
                                    <td><a href="{{ route('recursoTipos.show', $tipo) }}">{{ $tipo->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay tipos de recursos registrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
