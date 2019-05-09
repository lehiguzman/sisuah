<!DOCTYPE html>

<html>

<head>

	<title>Propuesta</title>	
	<style type="text/css">
		footer {
                position: fixed; 
                bottom: 30px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
            }
	</style>
</head>

<body>
	<div style="margin-bottom: 20px;">			
		<img src="./img/logo-report.jpg" style="margin: 15px;">	
		<span style="vertical-align: middle;  font-size: 26px; font-style: oblique;">Universidad Alejandro de Humboldt</span>		
	</div>	
	<div align="center" style="margin-bottom: 45px;">		
		<span style="font-size: 18px;">PROPUESTA DE TRABAJO DE GRADO</span>
	</div> 	
	<div>		
		<span style="margin-right: 350px"><b>Fecha:</b> {{ date('d/m/Y') }}</span>
		<b>Periodo Académico: </b>{{ $period->denominacion }}
	</div>	<br><br><br>
	<div>		
		<span><b>NOMBRE Y APELLIDO DEL ESTUDIANTE: </b></span>
			{{ $user->name }}
	</div> <br>
	<div>		
		<span style="margin-right: 40px"><b>CEDULA DE IDENTIDAD: </b> {{ $user->cedula }}</span><b> CORREO ELECTRÓNICO: </b>{{ $user->email }}
	</div> <br>
	@if($profsem)
		<div>		
			<span style="margin-right: 150px">PROFESOR DE SEMINARIO: {{ $profsem->name }} </span> SECCIÓN: {{ $section->nombre }}
		</div> <br>
	@endif
	<div>		
		<span>GRADO DE INSTRUCCIÓN : @if($user->nivest == 1) Bachiller @elseif($user->nivest == 2) TSU @endif</span>
	</div> <br>		
	<div>		
		<span>LINEA DE INVESTIGACIÓN : {{ $investigacion->nombre }}</span>
	</div> <br> <br>
	<div>		
		<span><b>PROPUESTA DE TITULO DE INVESTIGACIÓN</b></span>
	</div> <br>	
	<div>		
		<span style="margin-left: 20px; text-transform: uppercase;">{{ $proposal->titulo }}</span>
	</div> <br><br>
	<div>		
		<span><b>PLANTEAMIENTO DEL PROBLEMA</b></span>
	</div> <br>	
	<div align="justify">		
		<span style="margin-left: 20px; font-size: 16px; line-height: 25px;">{{ $proposal->planteamiento }}</span>
	</div> <br><br>
	<div>		
		<span><b>OBJETIVO GENERAL</b></span>
	</div> <br>	
	<div align="justify">		
		<p style="text-indent: 2em; font-size: 16px; line-height: 25px;">{{ $proposal->obj_general }}</p>
	</div> <br><br>
	<div>		
		<span><b>OBJETIVO ESPECIFICOS</b></span>
	</div> <br>	
	@foreach($specifics as $specific)
		<div style="margin-left: 20px;" align="justify">		
			<li><p style="font-size: 16px; line-height: 25px;">{{ $specific->contenido }}</p></li>
		</div>
	@endforeach
	<br><br>
	<div>		
		<span><b>EVALUACIÓN</b></span>
	</div> <br>
	<div style="margin-left: 20px;" align="justify">				
			<span style="line-height: 25px;">ASESOR ACADÉMICO ASIGNADO : {{ $asesor_academico->name }}</span> <br>
			@if($section)
			<span>SECCIÓN ASIGNADA : {{ $section->nombre }}</span>			
			@endif
	</div>	<br><br>
	<div style="margin-left: 20px;" align="justify">
		<table border="1" style=" border-collapse: collapse; line-height: 30px"  width="100%">
			<tr>
				<th align="center" width="25%">Evaluador</th>
				<th align="center" width="25%">Resultado</th>
				<th align="center" width="50%">Observación</th>
			</tr>
			@foreach($evaluations as $evaluation)
			<tr>				
				@foreach($users as $user)
					@if($evaluation->prof_id == $user->id)
						<td align="center">{{ $user->name }}</td>
					@endif
				@endforeach
				<td align="center">
					 @if($evaluation->resultado == 1) Aprobado 
					 @elseif($evaluation->resultado == 2) Modificable
					 @elseif($evaluation->resultado == 3) No Aprobado
					 @else No evaluado aún @endif
				</td>
				<td align="center">
					{{ $evaluation->observacion }}
				</td>
			</tr>	
			@endforeach
		</table>
	</div> <br><br>
	<footer>
		<table width="100%">
			<tr>
				<td width="50%" align="center">
					____________________________
				</td>
				<td width="50%" align="center">
					____________________________
				</td>
			</tr>
			<tr>
				<td width="50%" align="center">
					<b>Prof. : </b>@if($profsem) {{ $profsem->name }} {{ $profsem->lastname}} @endif
				</td>
				<td width="50%" align="center">
					<b>Estudiante : </b> {{ $user->name }} {{ $user->lastname}}
				</td>
			</tr>
		</table>
	</footer>
</body>

</html>