@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Paises') }} | <a href="{{ route('countries.create') }}" class="btn-light btn-md">Nuevo País</a></div>

                <div class="card-body">
                    @if (isset($paises) && @count($paises))
                        <table class="table table-hover">
                            @foreach ($paises as $pais)
                                <tr>
                                    <td><a href="{{ route('countries.show', $pais) }}">{{ $pais->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay paises registrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
