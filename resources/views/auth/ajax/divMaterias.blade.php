<div class="form-group row" id="divMaterias">
    <div class="col-md-10 form-inline justify-content-center">         
        {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control', 'placeholder' => '-- Seleccione materia --']) !!}
        @if ($errors->has('subject_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('subject_id') }}</strong>
            </span>
        @endif
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {!! Form::select('section_id', $sections, null, ['class' => 'form-control', 'placeholder' => '-- Seleccione sección --']) !!}
        @if ($errors->has('section_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('section_id') }}</strong>
            </span>
        @endif
    </div>
</div>