<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="cedula" type="text" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }} col-sm-6" name="cedula" value="{{ $user->cedula }}" placeholder="Ingrese Número de Cédula" required autofocus>
        @if ($errors->has('cedula'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cedula') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">                          
    <div class="col-md-12 form-inline justify-content-center">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} col-sm-6" name="name" value="{{ $user->name }}" placeholder="Ingrese Nombre Completo" required>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} col-sm-6" name="username" value="{{ $user->username }}" placeholder="Ingrese Usuario" required>
        @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} col-sm-6" name="email" value="{{ $user->email }}" placeholder="Ingrese Correo Electrónico" required>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <select name="tipo" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} col-sm-6">
            <option value="0" @if($user->tipo == 0) selected="selected" @endif >
                -- Seleccione Tipo de Usuario --
            </option>
            <option value="1" @if($user->tipo == 1) selected="selected" @endif >
                Administrador
            </option>
            <option value="2" @if($user->tipo == 2) selected="selected" @endif >
                Dirección Académica
            </option>
            <option value="3" @if($user->tipo == 3) selected="selected" @endif >
                Profesor
            </option>
            <option value="4" @if($user->tipo == 4) selected="selected" @endif >
                Estudiante
            </option>
        </select>
        @if ($errors->has('tipo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tipo') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} col-sm-6" name="password" placeholder="Ingrese Contraseña">
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
    </div>
</div>                       
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <input id="password-confirm" type="password" class="form-control col-sm-6" name="password_confirmation" placeholder="Confirme la contraseña">
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-12 form-inline justify-content-center">
        <button type="submit" rel="tooltip" class="btn btn-info" value="{{ __('Registrar') }}">
            <i class="fas fa-archive"> Registrar</i>                              
        </button>        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                         
        <a href="{{ route('users.index') }}" class="btn btn-danger">                
             <i class="fas fa-expand-arrows-alt"> Cancelar</i>
        </a>
        
    </div>                            
</div> 
  