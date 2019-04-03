<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <select id="period_id" name="period_id" class="form-control{{ $errors->has('period_id') ? ' is-invalid' : '' }} col-sm-6">
            <option value="0">
                -- Seleccione Periodo Académico --
            </option>
            @foreach($periods as $period)
                <option value="{{ $period->id }}">
                    {{ $period->denominacion }}
                </option>            
            @endforeach
        </select>
        @if ($errors->has('period_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('period_id') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <label for="seminario">¿Cursa actualmente seminario de Grado?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="seminario" id="checksemi" value="SI">
    </div>
</div>
<div id="divSelProfSem">
    
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <label for="sercom">¿Culmino servicio comunitario?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select id="sercom" name="sercom" class="form-control{{ $errors->has('sercom') ? ' is-invalid' : '' }} col-sm-2" onchange="disabledNroHoras(this)">
            <option value="0" disabled selected>
                -- Seleccione --
            </option>
            <option value="si">
                SI
            </option>
            <option value="no">
                NO
            </option>
            <option value="ec">
                EN CURSO
            </option>            
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" class="form-control{{ $errors->has('sercom_horas') ? ' is-invalid' : '' }} col-sm-1" name="sercom_horas" id="sercom_horas" placeholder="Nro de Horas" disabled>
        @if ($errors->has('sercom'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('sercom') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">        
        <select id="research_line_id" name="research_line_id" class="form-control{{ $errors->has('research_line_id') ? ' is-invalid' : '' }} col-sm-5">
            <option value="0" disabled selected>
                -- Seleccione Linea de Investigación--
            </option>
            @foreach($researchs as $research)
                <option value="{{ $research->id }}">
                    {{ $research->nombre }}
                </option> 
            @endforeach                   
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
        @if ($errors->has('research_line_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('research_line_id') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="tiutlo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }} col-sm-6" name="titulo" value="{{ old('titulo') }}" placeholder="Ingrese Titulo de la Propuesta" required autofocus>
        @if ($errors->has('titulo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('titulo') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="planteamiento" class="form-control{{ $errors->has('planteamiento') ? ' is-invalid' : '' }} col-sm-6" name="planteamiento" value="{{ old('planteamiento') }}" placeholder="Ingrese Planteamiento del Problema"></textarea>
        @if ($errors->has('planteamiento'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('planteamiento') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="obj_general" class="form-control{{ $errors->has('obj_general') ? ' is-invalid' : '' }} col-sm-6" name="obj_general" value="{{ old('obj_general') }}" placeholder="Ingrese Objetivo General"></textarea>
        @if ($errors->has('obj_general'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('obj_general') }}</strong>
            </span>
        @endif
    </div>
    <input type="hidden" name="status" value="N">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">                                
            <textarea id="contenido" name="contenido" class="form-control-user form-control{{ $errors->has('contenido') ? ' is-invalid' : '' }} col-sm-5 text-center" placeholder="Ingrese Objetivo Especifico"></textarea>            
            @if ($errors->has('contenido'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('contenido') }}</strong>
                    </span>
            @endif
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-primary btn-user" id="addAsig">
                Agregar
            </button>              
    </div>
</div>
<div class="form-group row">     
    <div class="col p-4"><hr></div>
    <div class="col-auto p-4"><b>Objetivos Especificos</b></div>
    <div class="col p-4"><hr></div>  
    <div id="gridAsig" class="row col-sm-12">
        <table id="tableAsig" class="table table-bordered table-stripe ">
            <tr>
                <th>Objetivo Especifico</th>                
                <th></th>
            </tr> 
            @foreach($specifics as $specific)                    
                    <tr> 
                        <input type="hidden" name="specific_id[]" value="{{ $specific->id }}">            
                        <td>
                            {{ $specific->contenido }}
                        </td>                                         
                        <td class="text-center">                                
                            {!! Form::open(['route' => ['specifics.destroy' , $specific->id], 'method' => 'DELETE', 'id' => 'formDelete']) !!}
                              <button type="button" class="btn btn-danger" onclick="if(confirm('¿Seguro de borrar Contenido?')) 
                                { document.getElementById('formDelete').submit(); }"><i class="fas fa-trash-alt"></i></button>
                            {!! Form::close() !!}                              
                        </td>                       
                    </tr>                 
            @endforeach                  
        </table>    
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-12 form-inline justify-content-center">
        <button type="submit" rel="tooltip" class="btn btn-info" value="{{ __('Registrar') }}">
            <i class="fas fa-archive"> Registrar</i>                              
        </button>        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                         
        <a href="{{ route('proposals.index') }}" class="btn btn-danger">                
             <i class="fas fa-expand-arrows-alt"> Cancelar</i>
        </a>
        
    </div>                            
</div> 
  
<script type="text/javascript">
    function disabledNroHoras(e)
    {        
        if(e.value=="si")
        {
            document.getElementById('sercom_horas').disabled = false;
            document.getElementById('sercom_horas').focus() = true;
        }
        if(e.value=="no")
        {
            document.getElementById('sercom_horas').disabled = true;
            document.getElementById('sercom_horas').value = "";
        }
        if(e.value=="ec")
        {
            document.getElementById('sercom_horas').disabled = false;   
            document.getElementById('sercom_horas').focus() = true;
        }
    }
</script>