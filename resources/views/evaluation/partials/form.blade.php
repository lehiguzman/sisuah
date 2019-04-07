<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <select id="selPeriod" name="period_id" class="form-control{{ $errors->has('period_id') ? ' is-invalid' : '' }} col-sm-6">
        <option value="" disabled selected>
            Seleccion periodo académico
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
<div id="divSelStu">
    
</div>
<div id="divProposal">
    
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

<script type="text/javascript">
  function prueba(e)
  {             
        var id = e.value;
        
        $.ajax({                    
                    url: '/ajaxProposal',
                    type: 'POST',
                    data:{id:id},
                    dataType: 'html',
                    success:function(data)
                    {
                        console.log(data);                       
                        $('#divProposal').replaceWith(data);                        
                    }                    
                });          
  }
</script>
  