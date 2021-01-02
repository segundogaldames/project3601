@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Temáticas') }} | <a href="{{ route('tematicas.create') }}" class="btn-light btn-md">Nueva Temática</a></div>

                <div class="card-body">
                    @if (isset($tematicas) && @count($tematicas))
                        <table class="table table-hover">
                            @foreach ($tematicas as $tematica)
                                <tr>
                                    <td><a href="{{ route('tematicas.show', $tematica) }}">{{ $tematica->nombre }}</a></td>
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
