@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Autor para') }} {{ $authorRecurso->recurso->nombre }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('authorRecursos.update', $authorRecurso) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Autor') }}</label>

                            <div class="col-md-6">
                                <select id="author" name="author" class="form-control @error('author') is-invalid @enderror" required autocomplete="author">
                                    <option value="{{ $authorRecurso->author_id }}">{{ $authorRecurso->author->nombre }}</option>
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

                        <div class="form-group row">
                            <label for="recurso" class="col-md-4 col-form-label text-md-right">{{ __('Recurso') }}</label>

                            <div class="col-md-6">
                                <select id="recurso" name="recurso" class="form-control @error('recurso') is-invalid @enderror" required autocomplete="recurso">
                                    <option value="{{ $authorRecurso->recurso_id }}">{{ $authorRecurso->recurso->nombre }}</option>
                                    @foreach ($recursos as $recurso)
                                        <option value="{{ $recurso->id }}">{{ $recurso->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('recurso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                                <a href="{{ route('recursos.show', $authorRecurso->recurso_id) }}" class="btn btn-link">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
