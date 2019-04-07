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
                      <h4 class="card-title">Evaluaciones</h4>
                    </div>                    
                      <a href="{{ route('evaluations.create') }}" class="btn btn-primary" style="float: center;">
                        <i class="fas fa-plus"> Nuevo</i>
                      </a>
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
                            Estudiante
                          </th>                          
                          <th>
                            Estatus Propuesta
                          </th>                          
                          <th style="border: none;" width="10%"></th>
                          <th style="border: none;" width="10%"></th>
                          
                        </tr>
                        </thead>
                        <tbody>
                        	@foreach($evaluations as $evaluation)
                          <tr>
                            <td class="text-center">
                              @foreach($users as $user)
                                @if($user->id == $evaluation->user_id)
                                  {{ $user->name }}
                                @endif
                              @endforeach
                            </td>                            
                            <td class="text-center"> 
                              @if($evaluation->resultado == '1')                           
                                  Aprobado
                              @elseif($evaluation->resultado == '2')
                                  Modificable
                              @elseif($evaluation->resultado == '3')
                                  No Aprobado
                              @endif
                            </td>                            
                            <td style="border: none;" class="text-center">
                              <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-success">
                                <i class="fas fa-pencil-alt"> Editar</i>
                              </a>
                            </td>  
                          </td>
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