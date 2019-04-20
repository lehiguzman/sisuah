@extends('home')

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="card">
  			<div class="card-header">
  				<div class="card-icon text-center">                      
                    <img src="{{ asset('img/icons/baseline-perm_contact_calendar-24px.svg')}}" width="50px" height="50px"> <br>
                    	<h4 class="card-title ">Reporte de Propuestas Asignadas</h4>
                </div> 
  				<div class="card-body">   
  			{!! Form::open(['url' => '/assignPdf', 'target' => '_blank']) !!}
    		<p class="card-text">
				<div class="form-group row">    
    				<div class="col-md-12 form-inline justify-content-center">   
        				<select id="period_id" name="period_id" class="form-control{{ $errors->has('period_id') ? ' is-invalid' : '' }} col-sm-4">
            				<option value="" disabled selected>-- Seleccione Periodo Académico --</option>            				
            				    @foreach($periods as $period)					        
					                <option value="{{ $period->id }}">{{ $period->denominacion }}</option>					        
					            @endforeach					        
				        </select>    
						        @if ($errors->has('period_id'))
						            <span class="invalid-feedback" role="alert">
						                <strong>{{ $errors->first('period_id') }}</strong>
						            </span>
						        @endif
    				</div>
				</div>
			</p>
					<div class="form-group row mb-0">
		    			<div class="col-md-12 form-inline justify-content-center">
		        			<button type="submit" rel="tooltip" class="btn btn-info" value="{{ __('Registrar') }}">
		            			<i class="fas fa-archive"> Generar</i>                              
		        			</button>        
		        					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                         
		        			<a href="{{ url('/home') }}" class="btn btn-danger">                
		             			<i class="fas fa-expand-arrows-alt"> Cancelar</i>
		        			</a>        
		    			</div>                            
					</div>
			{!! Form::close() !!}     		
		  		</div>  
			</div>
		</div>
	</div>
</div>
@endsection