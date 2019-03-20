@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <b>Ver materia registrado</b>
              </div>
              <div class="card-body">   
                <p class="card-text">    
                <p><strong>Nombre : </strong>{{ $subject->nombre }}</p>  
                <p><strong>Descripción : </strong>{{ $subject->descripcion }}</p> 
                <p><strong>Observación : </strong>{{ $subject->observacion }}</p>                 
                <br>
                    <a href="{{ route('subjects.index') }}"><button type="button" class="btn btn-primary float-right">Regresar</button></a>
              </div>
            </div>
        </div>
    </div>

@endsection