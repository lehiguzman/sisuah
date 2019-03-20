@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <b>Ver usuario registrado</b>
              </div>
              <div class="card-body">   
                <p class="card-text">    
                <p><strong>Cedula : </strong>{{ $user->cedula }}</p>  
                <p><strong>Nombre completo : </strong>{{ $user->name }}</p> 
                <p><strong>Usuario: </strong>{{ $user->username }}</p>
                <p><strong>Correo : </strong>{{ $user->email }}</p>
                <p><strong>Tipo de usuario : </strong>
                  @if($user->tipo == 1)  
                    Administrador
                  @elseif($user->tipo == 2)  
                    Dirección Académica
                  @elseif($user->tipo == 3)
                    Profesor
                  @elseif($user->tipo == 4)
                    Estudiante
                  @else($user->tipo == 0)
                    No definido
                  @endif
                  </p>    
                </p>
                <br>
                    <a href="{{ route('users.index') }}"><button type="button" class="btn btn-primary float-right">Regresar</button></a>
              </div>
            </div>
        </div>
    </div>

@endsection