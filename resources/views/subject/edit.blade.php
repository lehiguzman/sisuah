@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon text-center">                                          
                        <i class="fa fa-edit fa-3x"></i>
                        <h4 class="card-title">Editar Materia</h4>
                    </div> 
                    <div class="card-body">

                    <p class="card-text">
            
                        {!! Form::model($subject, ['route' => ['subjects.update', $subject->id] , 'method' => 'PUT']) !!}

                        @include('subject.partials.formEdit')

                        {!! Form::close() !!}

                    </p>
                    <br>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection