@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Recurso') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('recursos.update', $recurso) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $recurso->nombre }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="anio" class="col-md-4 col-form-label text-md-right">{{ __('Año Publicación') }}</label>

                            <div class="col-md-6">
                                <input id="anio" type="number" class="form-control @error('anio') is-invalid @enderror" name="anio" value="{{ $recurso->anio_edicion }}" required autocomplete="nombre" autofocus>

                                @error('anio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Recurso') }}</label>

                            <div class="col-md-6">
                                <select id="tipo" name="tipo" class="form-control @error('tipo') is-invalid @enderror" required autocomplete="tipo">
                                    <option value="{{ $recurso->recurso_tipo_id }}">{{ $recurso->recursoTipo->nombre }}</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publisher" class="col-md-4 col-form-label text-md-right">{{ __('Casa Publicadora') }}</label>

                            <div class="col-md-6">
                                <select id="publisher" name="publisher" class="form-control @error('publisher') is-invalid @enderror" required autocomplete="publisher">
                                    <option value="{{ $recurso->publisher_id }}">{{ $recurso->publisher->nombre }}</option>
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}">{{ $publisher->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('publisher')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tematica" class="col-md-4 col-form-label text-md-right">{{ __('Temática') }}</label>

                            <div class="col-md-6">
                                <select id="tematica" name="tematica" class="form-control @error('tematica') is-invalid @enderror" required autocomplete="tematica">
                                    <option value="{{ $recurso->tematica_id }}">{{ $recurso->tematica->nombre }}</option>
                                    @foreach ($tematicas as $tematica)
                                        <option value="{{ $tematica->id }}">{{ $tematica->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('tematica')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion del recurso') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required autocomplete="direccion" autofocus style="resize: none" rows="6">{{ $recurso->descripcion }}</textarea>

                                @error('descripcion')
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
                                <a href="{{ route('recursos.index') }}" class="btn btn-link">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
