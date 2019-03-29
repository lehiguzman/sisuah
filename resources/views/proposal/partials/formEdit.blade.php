<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }} col-sm-6" name="titulo" placeholder="Ingrese Titulo de la Propuesta" value="{{ $proposal->titulo }}" required autofocus>
        @if ($errors->has('titulo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('titulo') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="planteamiento" class="form-control{{ $errors->has('planteamiento') ? ' is-invalid' : '' }} col-sm-6" name="planteamiento"  placeholder="Ingrese Planteamiento del Problema">{{ $proposal->planteamiento }}</textarea>
        @if ($errors->has('planteamiento'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('planteamiento') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="obj_general" class="form-control{{ $errors->has('obj_general') ? ' is-invalid' : '' }} col-sm-6" name="obj_general" placeholder="Ingrese Objetivo General">{{ $proposal->obj_general }}</textarea>
        @if ($errors->has('obj_general'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('obj_general') }}</strong>
            </span>
        @endif
    </div>
    <input type="hidden" name="status" value="{{ $proposal->status }}">
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