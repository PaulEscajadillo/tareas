@extends('tareas.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Actualizar tarea
                </div>
                <div class="float-end">
                    <a href="{{ route('tareas.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('tareas.update', $tarea->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="title" class="col-md-4 col-form-label text-md-end text-start">Code</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $tarea->title }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $tarea->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="expires_at" class="col-md-4 col-form-label text-md-end text-start">Fecha de vencimiento</label>
                        <div class="col-md-6">                          
                          <input type="date" class="form-control" id="expires_at" name="expires_at" required value="{{ $tarea->expires_at }}">
                            @if ($errors->has('expires_at'))
                                <span class="text-danger">{{ $errors->first('expires_at') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">Estado</label>
                        <div class="col-md-6">
                            <select id="status" name="status">
                                <option value="pendiente" {{ ($tarea->status == 'pendiente') ? 'selected' : '' }} >Pendiente</option>
                                <option value="enprogreso" {{ ($tarea->status == 'enprogreso') ? 'selected' : '' }} >En progreso</option>
                                <option value="completada" {{ ($tarea->status == 'completada') ? 'selected' : '' }} >Completada</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>               

                    
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection