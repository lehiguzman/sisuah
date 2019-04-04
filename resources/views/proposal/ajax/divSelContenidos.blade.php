<div id="gridAsig" class="table table-bordered table-stripe">
     <table id="tableAsig" class="table table-bordered table-stripe">
        <tr>
        <th>Contenido</th>    
        <th></th>
        </tr>   
        @foreach($specifics as $specific)             
                 <tr> 
                    <input type="hidden" name="specific_id[]" value="{{ $specific->id }}">           
                    <td>
                        {{ $specific->contenido }}
                    </td>                    
                    <td class="text-center">                    
                      {!! Form::open(['route' => ['specifics.destroy' , $specific->id], 'method' => 'DELETE', 'id' => 'formDelete']) !!}
                        <button type="button" class="btn btn-danger" onclick="if(confirm('¿Seguro de borrar Contenido?')) 
                          { this.type = 'submit' }"><i class="fas fa-trash-alt"></i></button>
                      {!! Form::close() !!}  
                    </td>                 
                </tr>             
        @endforeach                       
    </table>        
</div> 
