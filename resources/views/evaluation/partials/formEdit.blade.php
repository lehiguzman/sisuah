<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        Periodo: &nbsp;
        @foreach($periods as $period)   
            @if($period->id == $evaluation->period_id)
                <b>            
                    {{ $period->denominacion }}
                </b>
            @endif
        @endforeach
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        Estudiante: &nbsp;
        @foreach($users as $user)   
            @if($user->id == $evaluation->user_id)
                <b>            
                    {{ $user->name }}
                </b>
            @endif
        @endforeach
    </div>
</div>
<div class="form-group row" id="divProposal">
    <div class="col-md-9 form-inline pl-auto text-justify" style="padding-left: 425px;">        
            <b>Objetivo General: &nbsp; </b>
            {{ $proposal->obj_general }}        
    </div>
    <input type="hidden" name="proposal_id" id="proposal_id" value="{{ $proposal->id }}">    
    <input type="hidden" name="user_id" id="user_id" value="{{ $proposal->user_id }}">    
    <input type="hidden" name="prof_id" id="prof_id" value="{{ Auth::user()->id }}">    
</div>
<div class="form-group row">
    <div class="col p-4"><hr></div>
    <div class="col-auto p-4 text-center"><b>Objetivos Especificos</b></div>
    <div class="col p-4"><hr></div>  
</div>
<div class="form-group row" id="divProposal">
    <div class="col-md-9 form-inline pl-auto text-justify" style="padding-left: 425px;">            
            @foreach($specifics as $specific)
                <li>{{ $specific->contenido }}</li>
            @endforeach
    </div>
</div>
<div class="form-group row">
    <div class="col-md-9 form-inline pl-auto text-justify" style="padding-left: 425px;">                    
        <select id="resultado" name="resultado" class="form-control{{ $errors->has('resultado') ? ' is-invalid' : '' }} col-sm-6">
        <option value="" disabled selected>
            Seleccione evaluación
        </option>
        <option value="1" @if($evaluation->resultado == '1') selected @endif>
            Aprobado
        </option>
        <option value="2" @if($evaluation->resultado == '2') selected @endif>
            Modificable
        </option>
        <option value="3" @if($evaluation->resultado == '3') selected @endif>
            No Aprobado
        </option>
    </select>    
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="observacion" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-6" name="observacion" placeholder="Ingrese Observación de la Propuesta">{{ $evaluation->observacion }}</textarea>
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
        <a href="{{ route('evaluations.index') }}" class="btn btn-danger">                
             <i class="fas fa-expand-arrows-alt"> Cancelar</i>
        </a>        
    </div>                            
</div> 
  