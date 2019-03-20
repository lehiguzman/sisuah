@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <b>Ver Linea de Investigación registrada</b>
              </div>
              <div class="card-body">   
                <p class="card-text">    
                <p><strong>Titulo : </strong>{{ $research_line->nombre }}</p>  
                <p><strong>Observación : </strong>{{ $research_line->observacion }}</p>                 
                <br>
                    <a href="{{ route('research_lines.index') }}"><button type="button" class="btn btn-primary float-right">Regresar</button></a>
              </div>
            </div>
        </div>
    </div>

@endsection