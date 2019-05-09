<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <select id="period_id" name="period_id" class="form-control{{ $errors->has('period_id') ? ' is-invalid' : '' }} col-sm-6">
            <option value="" disabled selected>
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
    <input type="hidden" name="status" value="R">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="proposal_id" value="">    
</div>
<div class="form-group row">
    <div class="col p-4"><hr></div>
    <div class="col-auto p-4 text-center"><b>Objetivos Especificos</b></div>
    <div class="col p-4"><hr></div>
    <div class="col-md-12 form-inline justify-content-center">                                
            <textarea id="contenido" name="contenido" class="form-control-user form-control{{ $errors->has('contenido') ? ' is-invalid' : '' }} col-sm-5 text-center" placeholder="Ingrese Objetivo Especifico"></textarea>            
            @if ($errors->has('contenido'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('contenido') }}</strong>
                    </span>
            @endif
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary btn-user" id="addAsig">
                Agregar
            </button>              
    </div>
</div>
<div class="form-group row">     
    <div id="gridAsig" class="row col-md-12"> 
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-12 form-inline justify-content-center">
        <button type="submit" name="botonRegistrar" rel="tooltip" class="btn btn-info" value="{{ __('Registrar') }}">
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