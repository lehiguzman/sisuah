<div class="form-group row">    
    <div class="col-md-12 form-inline justify-content-center">   
        <select id="user_id" name="user_id" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }} col-sm-4">
            <option value="0">
                -- Seleccione Estudiante  --
            </option>
            @foreach($users as $user)
                @if($user->tipo == '4')
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>    
        @if ($errors->has('user_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('user_id') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">    
    <div class="col-md-12 form-inline justify-content-center">   
        <select id="asesor_academico" name="asesor_academico" class="form-control{{ $errors->has('asesor_academico') ? ' is-invalid' : '' }} col-sm-4">
            <option value="0">
                -- Seleccione Asesor académico  --
            </option>
            @foreach($users as $user)
                @if($user->tipo == '3')
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>    
        @if ($errors->has('asesor_academico'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('asesor_academico') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">    
    <div class="col-md-12 form-inline justify-content-center">   
        <select id="evaluator_1" name="evaluator_1" class="form-control{{ $errors->has('evaluator_1') ? ' is-invalid' : '' }} col-sm-4">
            <option value="0">
                -- Seleccione Profesor evaluador  --
            </option>
            @foreach($users as $user)
                @if($user->tipo == '3')
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>    
        @if ($errors->has('evaluator_1'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('evaluator_1') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">    
        <select id="evaluator_2" name="evaluator_2" class="form-control{{ $errors->has('evaluator_2') ? ' is-invalid' : '' }} col-sm-4">
            <option value="0">
                -- Seleccione Profesor evaluador --
            </option>
            @foreach($users as $user)
                @if($user->tipo == '3')
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>    
        @if ($errors->has('evaluator_2'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('evaluator_2') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">    
        <select id="evaluator_3" name="evaluator_3" class="form-control{{ $errors->has('evaluator_3') ? ' is-invalid' : '' }} col-sm-4">
            <option value="0">
                -- Seleccione Profesor evaluador --
            </option>
            @foreach($users as $user)
                @if($user->tipo == '3')
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>    
        @if ($errors->has('evaluator_3'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('evaluator_3') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">    
        <select id="evaluator_4" name="evaluator_4" class="form-control{{ $errors->has('evaluator_4') ? ' is-invalid' : '' }} col-sm-4">
            <option value="0">
                -- Dirección académica --
            </option>
            @foreach($users as $user)
                @if($user->tipo == '2')
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>    
        @if ($errors->has('evaluator_4'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('evaluator_4') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="observacion" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-6" name="observacion" value="{{ old('observacion') }}" placeholder="Ingrese Observación"></textarea>
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
        <a href="{{ route('evaluators.index') }}" class="btn btn-danger">                
             <i class="fas fa-expand-arrows-alt"> Cancelar</i>
        </a>
        
    </div>                            
</div> 
  