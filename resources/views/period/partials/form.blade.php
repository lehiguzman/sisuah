<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="denominacion" type="text" class="form-control{{ $errors->has('denominacion') ? ' is-invalid' : '' }} col-sm-6" name="denominacion" value="{{ old('denominacion') }}" placeholder="Ingrese Denominación del periodo Académico" required autofocus>
        @if ($errors->has('denominacion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('denominacion') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-8 form-inline justify-content-center">        
        {!! Form::selectYear('anio', 2019, date('Y'), null, ['class' => 'form-control', 'placeholder' => '--Seleccione año del Periodo--']) !!}            
        @if ($errors->has('anio'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('anio') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} col-sm-6" name="descripcion" value="{{ old('descripcion') }}" placeholder="Ingrese Descripción"></textarea>
        @if ($errors->has('descripcion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('descripcion') }}</strong>
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
        <a href="{{ route('periods.index') }}" class="btn btn-danger">                
             <i class="fas fa-expand-arrows-alt"> Cancelar</i>
        </a>
        
    </div>                            
</div> 
  