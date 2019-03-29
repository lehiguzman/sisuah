@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <b>Ver registro de evaluadores</b>
              </div>
              <div class="card-body">   
                <p class="card-text"> 
                @foreach($users as $user)
                  @if($evaluator->user_id == $user->id)
                    <p><strong>Estudiante : </strong>{{ $user->name }}</p>  
                  @endif
                @endforeach    
                @foreach($users as $user)
                  @if($evaluator->asesor_academico == $user->id)
                    <p><strong>Asesor Académico : </strong>{{ $user->name }}</p>  
                  @endif
                @endforeach    
                @foreach($users as $user)
                  @if($evaluator->evaluator_1 == $user->id)
                    <p><strong>Profesor : </strong>{{ $user->name }}</p>  
                  @endif
                @endforeach
                 @foreach($users as $user)
                  @if($evaluator->evaluator_2 == $user->id)
                    <p><strong>Profesor : </strong>{{ $user->name }}</p>  
                  @endif
                @endforeach
                 @foreach($users as $user)
                  @if($evaluator->evaluator_3 == $user->id)
                    <p><strong>Profesor : </strong>{{ $user->name }}</p>  
                  @endif
                @endforeach
                 @foreach($users as $user)
                  @if($evaluator->evaluator_4 == $user->id)
                    <p><strong>Dirección Académica : </strong>{{ $user->name }}</p>  
                  @endif
                @endforeach                
                <p><strong>Observación : </strong>{{ $evaluator->observacion }}</p>                 
                <br>
                    <a href="{{ route('evaluators.index') }}"><button type="button" class="btn btn-primary float-right">Regresar</button></a>
              </div>
            </div>
        </div>
    </div>

@endsection