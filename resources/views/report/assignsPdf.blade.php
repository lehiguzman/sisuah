<!DOCTYPE html>

<html>

<head>

	<title>Propuestas asignadas</title>
	
</head>

<body>
	<div style="margin-bottom: 20px;">		
		<img src="./img/logo-uah.jpg" style="margin: 15px;">	
		<span style="vertical-align: middle;  font-size: 26px; font-style: oblique;">Universidad Alejandro de Humboldt</span>
	</div>	
	<div align="center" style="margin-bottom: 45px;">		
		<span style="font-size: 26px;"><b>Reporte de Propuestas Asignadas</b></span>
	</div> 	
			<table border="1" width="90%" align="center">
				<tr>
					<th width="25%" align="center"><h3>Estudiante</h3></th>
					<th width="50%" align="center"><h3>Propuesta</h3></th>
					<th width="25%" align="center"><h3>Resultado</h3></th>
				</tr>
				@foreach($proposals as $proposal)				
						<tr>	
						  @foreach($users as $user)			
						  	@if($user->id == $proposal->user_id)						
							<td align="center">{{ $user->name }}</td>
							@endif
						  @endforeach
							<td align="center">{{ $proposal->titulo }}</td>
							<td align="center">
							@foreach($evaluations as $evaluation)
								@if($evaluation->proposal_id == $proposal->id)
									@if($evaluation->resultado == 1) Aprobado 
					 				@elseif($evaluation->resultado == 2) Modificable
					 				@elseif($evaluation->resultado == 3) No Aprobado
					 				@else No evaluado aún @endif									
								@endif								
							@endforeach
							</td>							
						</tr>						
				@endforeach
			</table>   
	 <br>
</body>

</html>