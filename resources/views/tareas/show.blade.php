@extends('tareas.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Información de tarea
                </div>
                <div class="float-end">
                    <a href="{{ route('tareas.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="dni" class="col-md-4 col-form-label text-md-end text-start"><strong>DNI:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $tarea->dni }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="title" class="col-md-4 col-form-label text-md-end text-start"><strong>Título:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $tarea->title }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Descripción:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $tarea->description }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="expires_at" class="col-md-4 col-form-label text-md-end text-start"><strong>Fecha de vencimiento:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $tarea->expires_at }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Estado:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $tarea->status }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection