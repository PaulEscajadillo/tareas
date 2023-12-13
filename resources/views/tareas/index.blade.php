@extends('tareas.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Tareas</div>
            <div class="card-body">
                @if (Auth::check())
                <a href="{{ route('tareas.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Agregar nueva tarea</a>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th></th>
                        <th scope="col">DNI</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de vencimiento</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($tareas as $tarea)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $tarea->dni }}</td>
                            <td>{{ $tarea->title }}</td>
                            <td>{{ $tarea->description }}</td>
                            <td>{{ $tarea->expires_at}}</td>
                            <td>{{ $tarea->status }}</td>
                            <td>
                                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                    @if (Auth::check())
                                    @if (Auth::user()->dni == $tarea->dni)
                                    <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar esta tarea?');"><i class="bi bi-trash"></i> Delete</button>
                                    @endif
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No hay tareas</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $tareas->links() }}

            </div>
        </div>
    </div>    