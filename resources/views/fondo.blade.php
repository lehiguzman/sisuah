@extends('home')

@section('contenido')

	<div id="pop_divDonut" style="width: 1000px; height: 500px;"></div>	 
		@donutchart('Status', 'pop_divDonut')	


	<div id="pop_divArea" style="width: 1000px; height: 500px;"></div>	 
		@areachart('Cantidad', 'pop_divArea')	

@endsection