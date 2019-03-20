<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} col-sm-6" name="nombre" value="{{ $subject->nombre }}" placeholder="Ingrese nombre de la Materia" required autofocus>
        @if ($errors->has('nombre'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} col-sm-6" name="descripcion" value="{{ old('descripcion') }}" placeholder="Ingrese Descripción">{{ $subject->descripcion }}</textarea>
        @if ($errors->has('descripcion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('descripcion') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="observacion" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-6" name="observacion" placeholder="Ingrese Observación">{{ $subject->observacion }}</textarea>
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
        <a href="{{ route('subjects.index') }}" class="btn btn-danger">                
             <i class="fas fa-expand-arrows-alt"> Cancelar</i>
        </a>        
    </div>                            
</div> 
  