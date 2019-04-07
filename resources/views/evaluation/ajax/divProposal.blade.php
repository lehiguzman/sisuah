<div class="form-group row" id="divProposal">
    <div class="col-md-10 form-inline pl-auto" style="padding-left: 425px; ">   <br> 	
    		<b>Titulo de la Propuesta: &nbsp;</b>
    		{{ $proposal->titulo }}    	
    </div>
</div>
<div class="form-group row" id="divProposal">
    <div class="col-md-9 form-inline pl-auto text-justify" style="padding-left: 425px;">    	
    		<b>Planteamiento del Problema: &nbsp; </b>
    		{{ $proposal->planteamiento }}    	
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
    <div class="col-md-9 form-inline pl-auto text-justify" style="padding-left: 415px;">                    
        <select id="resultado" name="resultado" class="form-control{{ $errors->has('resultado') ? ' is-invalid' : '' }} col-sm-6">
        <option value="" disabled selected>
            Seleccione evaluación
        </option>
        <option value="1">
            Aprobado
        </option>
        <option value="2">
            Modificable
        </option>
        <option value="3">
            No Aprobado
        </option>
    </select>    
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="observacion" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-6" name="observacion" value="{{ old('observacion') }}" placeholder="Ingrese Observación de la Propuesta"></textarea>
        @if ($errors->has('observacion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('observacion') }}</strong>
            </span>
        @endif
    </div>
</div>

