@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <b>Ver periodo académico registrado</b>
              </div>
              <div class="card-body">   
                <p class="card-text">    
                <p><strong>Denominación : </strong>{{ $period->denominacion }}</p>  
                <p><strong>Año : </strong>{{ $period->anio }}</p> 
                <p><strong>Descripción: </strong>{{ $period->descripcion }}</p>                 
                <br>
                    <a href="{{ route('periods.index') }}"><button type="button" class="btn btn-primary float-right">Regresar</button></a>
              </div>
            </div>
        </div>
    </div>

@endsection