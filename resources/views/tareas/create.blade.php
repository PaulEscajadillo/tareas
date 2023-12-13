@extends('tareas.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Agregar nueva tarea
                </div>
                <div class="float-end">
                    <a href="{{ route('tareas.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('tareas.store') }}" method="post">
                    @csrf
                    <input id="dni" name="dni" type="hidden" value="{{ auth()->user()->dni }}">
                    <div class="mb-3 row">
                        <label for="title" class="col-md-4 col-form-label text-md-end text-start">Título</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <!--<div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Descripción</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>-->

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="expires_at" class="col-md-4 col-form-label text-md-end text-start">Fecha de vencimiento</label>
                        <div class="col-md-6">
                          <!--<input type="date" class="form-control @error('expires_at') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}">-->
                          
                          <input type="date" class="form-control" id="expires_at" name="expires_at" required value="{{ old('expires_at') }}">
                            @if ($errors->has('expires_at'))
                                <span class="text-danger">{{ $errors->first('expires_at') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">Estado</label>
                        <div class="col-md-6">
                          <!--<input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">-->
                            <select id="status" name="status">
                                <option value="pendiente">Pendiente</option>
                                <option value="enprogreso">En progreso</option>
                                <option value="completada">Completada</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>

                    
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Agregar Tarea">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection