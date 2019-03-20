<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form Design One | Fazt</title>
    <link rel="stylesheet" href="{{ asset('css/master.css')}}">
  </head>
  <body>
    <div class="login-box" style="height: 600px;">
        <img src="{{ asset('img/logo.jpg') }}" class="avatar" alt="Avatar Image">        
        <h4 class="card-title ">Registro de Nuevo Usuario</h4> 
            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf                        
                                <input id="cedula" type="text" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ old('cedula') }}" placeholder="Ingrese Número de Cédula" required autofocus>
                                @if ($errors->has('cedula'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                @endif
                           
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} col-sm-6" name="name" value="{{ old('name') }}" placeholder="Ingrese Nombre Completo" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} col-sm-6" name="username" value="{{ old('username') }}" placeholder="Ingrese Usuario" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                         
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} col-sm-6" name="email" value="{{ old('email') }}" placeholder="Ingrese Correo Electrónico" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif  
                            
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} col-sm-6" name="password" placeholder="Ingrese Contraseña" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                         
                                <input id="password-confirm" type="password" class="form-control col-sm-6" name="password_confirmation" placeholder="Confirme la contraseña" required>
                         
                                <input type="submit" value="{{ __('Registrar') }}">                                 
                    </form>
        </div>
            
</body>
</html>

