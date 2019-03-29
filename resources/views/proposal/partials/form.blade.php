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
</div>
<div class="form-group row mb-0">
    <div class="col-md-12 form-inline justify-content-center">
        <button type="submit" rel="tooltip" class="btn btn-info" value="{{ __('Registrar') }}">
            <i class="fas fa-archive"> Registrar</i>                              
        </button>        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                         
        <a href="{{ route('sections.index') }}" class="btn btn-danger">                
             <i class="fas fa-expand-arrows-alt"> Cancelar</i>
        </a>
        
    </div>                            
</div> 
  