@extends('home')

@section('contenido')	
    <div class="content">
        <div class="container-fluid">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">                   
                  <div class="card-header card-header-icon">
                    <div class="card-icon text-center shadow">                      
                      <i class="fas fa-id-card-alt" style='font-size:64px; color:#41B1A7;'> </i><br>
                      <h4 class="card-title">Lista de Usuarios</h4>
                    </div>   
                  @if(Auth::user()->tipo == 1)                 
                    <a href="{{ route('users.create') }}" class="btn btn-primary" style="float: center;">
                        <i class="fas fa-plus"> Nuevo</i>
                    </a>
                  @endif
                    <div>
                      @if(Session::has('message'))
                        <br>
                        <div class="alert alert-info" role="alert">{{ Session::get('message') }}</div>  
                      @endif
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-primary">
                          <tr align="center">
                          <th>
                            Cedula
                          </th>
                          <th>
                            Nombre
                          </th>
                          <th>
                            Usuario
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Tipo Usuario
                          </th>
                          <th style="border: none;" width="10%"></th>
                          <th style="border: none;" width="10%"></th>
                          <th style="border: none;" width="10%"></th>
                        </tr></thead>
                        <tbody>
                        	@foreach($users as $user)
                          <tr>
                            <td>
                              {{ $user->cedula }}
                            </td>
                            <td>
                              {{ $user->name }}
                            </td>
                            <td>
                              {{ $user->username }}
                            </td>
                            <td>
                              {{ $user->email }}
                            </td> 
                             <td>
                              @if($user->tipo == 0)
                                no definido
                              @elseif($user->tipo == 1)
                                Administrador
                              @elseif($user->tipo == 2)
                                Dirección Académica
                              @elseif($user->tipo == 3)
                                Profesor
                              @elseif($user->tipo == 4)
                                Estudiante
                              @endif
                            </td>  
                             <td style="border: none;" class="text-center">
                                <a href="{{ route('users.show' , $user->id) }}" class="btn btn-info">
                                  <i class="fas fa-eye"> Ver</i>
                                </a>
                            </td> 
                            <td style="border: none;" class="text-center">
                              <a href="{{ route('users.edit' , $user->id) }}" class="btn btn-success">
                                <i class="fas fa-pencil-alt"> Editar</i>
                              </a>
                            </td>  
                          @if(Auth::user()->tipo == 1)
                            <td style="border: none;" class="text-center">
                              {!! Form::open(['route' => ['users.destroy' , $user->id], 'method' => 'DELETE', 'id' => 'formDelete']) !!}
                                <button type="button" class="btn btn-danger" onclick="if(confirm('¿Desea borrar el registro?')) { this.type = 'submit'; }"><i class="fas fa-trash-alt"> Eliminar</i></button>
                              {!! Form::close() !!}
                            </td>   
                          @endif                        
                          </tr>
                          	@endforeach   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection