<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} col-sm-6" name="nombre" value="{{ $research_line->nombre }}" placeholder="Ingrese Titulo de la Linea de Investigación" required autofocus>
        @if ($errors->has('nombre'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="observacion" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-6" name="observacion" value="" placeholder="Ingrese observación">{{ $research_line->observacion }}</textarea>
        @if ($errors->has('observacion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('observacion') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-12 form-inline justify-content-center">
        <button type="submit" rel="tooltip" class="btn btn-info" value="{{ __('Registrar') }}">
            <i class="fas fa-archive"> Registrar</i>                              
        </button>        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                         
        <a href="{{ route('research_lines.index') }}" class="btn btn-danger">                
             <i class="fas fa-expand-arrows-alt"> Cancelar</i>
        </a>        
    </div>                            
</div> 


  