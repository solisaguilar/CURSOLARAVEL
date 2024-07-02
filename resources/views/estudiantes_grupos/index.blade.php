@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success fade show" id="success-message"
         data-bs-dismiss="alert" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <h1>Lista de estudiantes grupos</h1>

    <form action="{{ route('estudiantes_grupos.index') }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <label for="estudiante_id" class="form-label">Estudiante</label>
                <select name="estudiante_id" class="form-control">
                    <option value="">Seleccione un estudiante</option>
                    @foreach ($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('estudiantes_grupos.create') }}" class="btn btn-secondary">Ir a crear</a>
            </div>

        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Grupo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantesGrupos as $estudianteGrupo)
                <tr>
                    <td>{{ $estudianteGrupo->docente->nombre }} {{ $estudianteGrupo->docente->apellido }}</td>
                    <td>{{ $estudianteGrupo->grupo->nombre }}</td>
                    <td>
                        <table>
                            <td>
                                <a href="{{ route('estudiantes_grupos.edit', $estudianteGrupo->id) }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <a href="{{ route('estudiantes_grupos.show', $estudianteGrupo->id) }}" class="btn btn-info">Ver</a>
                            </td>
                            <td>
                                <a href="{{ route('estudiantes_grupos.delete', $estudianteGrupo->id) }}" class="btn btn-danger">Eliminar</a>
                            </td>
                        </table>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-12">
            {{ $estudiantesGrupos->links() }}
        </div>
    </div>
@endsection
