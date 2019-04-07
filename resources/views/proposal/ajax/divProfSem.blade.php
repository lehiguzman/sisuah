<div class="form-group row" id="divSelProfSem">
    <div class="col-md-12 form-inline justify-content-center">
        <select id="profsem_id" name="profsem_id" class="form-control{{ $errors->has('profsem_id') ? ' is-invalid' : '' }} col-sm-3">
            <option value="" disabled selected>
                -- Seleccione Profesor Seminario --
            </option>
            @foreach($users as $user)
                @if($user->tipo == '3')
                    <option value="{{ $user->id }}">{{ $user->name }}</option>            
                @endif
            @endforeach
        </select>
        @if ($errors->has('profsem_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('profsem_id') }}</strong>
            </span>
        @endif
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select id="section_id" name="section_id" class="form-control{{ $errors->has('section_id') ? ' is-invalid' : '' }} col-sm-2">
            <option value="">
                -- Sección --
            </option>
            @foreach($sections as $section)
                <option value="{{ $section->id }}">{{ $section->nombre  }}</option>            
            @endforeach
        </select>
        @if ($errors->has('section_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('section_id') }}</strong>
            </span>
        @endif
    </div>
</div>