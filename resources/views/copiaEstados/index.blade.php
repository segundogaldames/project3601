@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Estados Copia') }} | <a href="{{ route('copiaEstados.create') }}" class="btn-light">Nuevo Estado Copia</a></div>

                <div class="card-body">
                    @if (isset($estados) && @count($estados))
                        <table class="table table-hover">
                            @foreach ($estados as $estado)
                                <tr>
                                    <td><a href="{{ route('copiaEstados.show', $estado) }}">{{ $estado->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay estados de copia registrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
