@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nuevo Autor para') }} {{ $recurso->nombre }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('authorRecursos.setAuthor', $recurso) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Autor') }}</label>

                            <div class="col-md-6">
                                <select id="author" name="author" class="form-control @error('author') is-invalid @enderror" required autocomplete="author">
                                    <option value="">Seleccione...</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                                <a href="{{ route('recursos.show', $recurso) }}" class="btn btn-link">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
