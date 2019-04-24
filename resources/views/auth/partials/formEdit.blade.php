<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input type="text" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }} col-sm-6" value="{{ $user->cedula }}" placeholder="Ingrese Número de Cédula" required autofocus @if(Auth::user()->tipo != 1) disabled @endif>
    <input type="hidden" name="cedula" value="{{ $user->cedula }}">     
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
        <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} col-sm-6" value="{{ $user->username }}" placeholder="Ingrese Usuario" required @if(Auth::user()->tipo != 1) disabled @endif>
        <input type="hidden" name="username" value="{{ $user->username }}">     
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
        <input id="tel_movil" type="text" class="form-control{{ $errors->has('tel_movil') ? ' is-invalid' : '' }} col-sm-6" name="tel_movil" value="{{ $user->tel_movil }}" placeholder="Ingrese Teléfono movil">
        @if ($errors->has('tel_movil'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tel_movil') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <input id="tel_local" type="text" class="form-control{{ $errors->has('tel_local') ? ' is-invalid' : '' }} col-sm-6" name="tel_local" value="{{ $user->tel_local }}" placeholder="Ingrese Teléfono local">
        @if ($errors->has('tel_local'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tel_local') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <textarea id="direccion" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }} col-sm-6" name="direccion" placeholder="Ingrese Dirección de Habitación">{{ $user->direccion }}</textarea>
    </div>
</div>
@if(Auth::user()->tipo == '1' or Auth::user()->tipo == '4')
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <select id="nivest" name="nivest" class="form-control{{ $errors->has('nivest') ? ' is-invalid' : '' }} col-sm-6">
            <option value="0">
                -- Seleccione Nivel de Estudio --
            </option>
            <option value="1"  @if($user->nivest == 1) selected="selected" @endif>
                Bachiller
            </option>
            <option value="2"  @if($user->nivest == 2) selected="selected" @endif>
                T.S.U.
            </option>            
        </select>
        @if ($errors->has('nivest'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nivest') }}</strong>
            </span>
        @endif
    </div>
</div>
@endif
<div class="form-group form-inline justify-content-center col-sm-12">    
    <div class="col-sm-4">
        <input class="dropify" type="file" name="avatar" id="avatar" data-height="60" data-default-file="{{ asset('storage/avatar/'.$user->avatar) }}">  
    </div>
</div>
@if(Auth::user()->tipo == 1) 
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
@else
    <input type="hidden" name="tipo" value="{{ $user->tipo }}">     
@endif
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
  