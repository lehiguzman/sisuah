@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <b>Ver Propuesta registrada</b>
              </div>
              <div class="card-body">   
                <p class="card-text">    
                <p><strong>Titulo : </strong>{{ $proposal->titulo }}</p>                  
                <p><strong>Planteamiento de Problema : </strong>{{ $proposal->planteamiento }}</p>                 
                <p><strong>Objetivo general : </strong>{{ $proposal->obj_general }}</p>                 
                <p><strong>Estatus de la Propuesta : </strong>{{ $proposal->status }}</p>
                <br>
                    <a href="{{ route('proposals.index') }}"><button type="button" class="btn btn-primary float-right">Regresar</button></a>
              </div>
            </div>
        </div>
    </div>

@endsection