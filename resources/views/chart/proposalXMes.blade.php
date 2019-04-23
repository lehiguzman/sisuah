@extends('home')

@section('contenido')
	 <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4 col-lg-12 breadcrumb">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Propuestas de trabajo de grado por estatus</h1>           
          </div>         
	<div id="Area" style="width: 1500px; height: 500px;"></div>	 
		@areachart('Cantidad', 'Area')	
@endsection