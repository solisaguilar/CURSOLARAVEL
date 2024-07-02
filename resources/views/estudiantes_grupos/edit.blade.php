@extends('layouts.app')

@section('content')
    <h1>editar estudiante grupo</h1>
    <form action="{{ route('estudiantes_grupos.update', $estudianteGrupo->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="estudiante_id" class="form-label">Estudiante</label>
                <select name="estudiante_id" class="form-control" required>
                    <option value="">Seleccione un estudiante</option>
                    @foreach ($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}" @if($estudiante->id == $estudianteGrupo->estudiante_id) selected @endif>
                        {{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="grupo_id" class="form-label">Grupo</label>
                <select name="grupo_id" class="form-control" required>
                    <option value="">Seleccione un grupo</option>
                    @foreach ($grupos as $grupo)
                    <option value="{{ $grupo->id }}" @if($grupo->id == $estudianteGrupo->grupo_id) selected @endif>
                        {{ $grupo->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Modificar</button>
                <a href="{{ route('estudiantes_grupos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@endsection
