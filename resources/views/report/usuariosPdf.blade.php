<!DOCTYPE html>

<html>

<head>

	<title>Usuarios</title>
	
</head>

<body>
	<div style="margin-bottom: 20px;">		
		<img src="./img/logo-uah.jpg" style="margin: 15px;">	
		<span style="vertical-align: middle;  font-size: 26px; font-style: oblique;">Universidad Alejandro de Humboldt</span>
	</div>	
	<div align="center" style="margin-bottom: 45px;">		
		<span style="font-size: 26px;"><b>Reporte de Usuarios</b></span>
	</div> 	
			<table border="1" width="90%" align="center">
				<tr>
					<th width="50%" align="center"><h3>Usuario</h3></th>
					<th width="25%" align="center"><h3>Tipo de Usuario</h3></th>
					<th width="25%" align="center"><h3>Usuario desde</h3></th>
				</tr>
				@foreach($users as $user)				
						<tr>							
							<td align="center">{{ $user->name }}</td>
							@if($user->tipo == 1) <td align="center">Administrador</td>	@endif
							@if($user->tipo == 2) <td align="center">Dirección Académica</td> @endif
							@if($user->tipo == 3) <td align="center">Profesor</td> @endif
							@if($user->tipo == 4) <td align="center">Estudiante</td> @endif
							<td align="center">{{ date('d-m-Y', strtotime($user->created_at)) }}</td>	
						</tr>						
				@endforeach
			</table>   
	 <br>
</body>

</html>