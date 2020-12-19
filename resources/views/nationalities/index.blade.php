@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                <div class="card-header">{{ __('Nacionalidades') }} | <a href="{{ route('nationalities.create') }}" class="btn-light btn-md">Nueva Nacionalidad</a></div>

                <div class="card-body">
                    @if (isset($nationalities) && @count($nationalities))
                        <table class="table table-hover">
                            @foreach ($nationalities as $nationality)
                                <tr>
                                    <td><a href="{{ route('nationalities.show', $nationality) }}">{{ $nationality->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay nacionalidades registradas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
