<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form Design One | Fazt</title>
    <link rel="stylesheet" href="{{ asset('css/master.css')}}">
  </head>
  <body>

    <div class="login-box">
      <img src="{{ asset('img/logo.jpg') }}" class="avatar" alt="Avatar Image">
      <h1>Iniciar sesión</h1>
       <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
         @csrf
       
         <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" placeholder="Ingrese Usuario o Email" required autofocus>
            @if ($errors->has('login'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('login') }}</strong>
                </span>
            @endif
       
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Ingrese Contraseña" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif                    
        <input type="submit" value="Login">
        <!--<a href="{{ route('password.request') }}"">¿No recuerda su contraseña?</a><br>-->
        <!-- <a href="{{ route('register') }}">Crear cuenta</a> -->
      </form>
    </div>
  </body>
</html>
