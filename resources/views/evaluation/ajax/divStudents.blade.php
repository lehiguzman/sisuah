<div class="form-group row" id="divSelStu">
    <div class="col-md-12 form-inline justify-content-center">
    <select id="student_id" onchange="prueba(this)"  name="student_id" class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }} col-sm-6">
        <option value="" disabled selected>
            Seleccione Estudiante
        </option>
        @foreach($proposals as $proposal)            
            @foreach($evaluators as $evaluator)  
                @if($proposal->user_id == $evaluator->user_id)
                    @foreach($users as $user)
                        @if($user->id == $proposal->user_id)                
                            <option value="{{ $proposal->id }}">
                                {{ $user->name }}
                            </option>
                        @endif
                    @endforeach
                @endif
            @endforeach            
        @endforeach
    </select>
        @if ($errors->has('student_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('student_id') }}</strong>
            </span>
        @endif
    </div>
</div>