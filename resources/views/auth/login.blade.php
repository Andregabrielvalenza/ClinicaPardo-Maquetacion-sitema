@extends('layouts.login')

@section('content')
<section>

    <div class="panel panel-signin">
        <div class="panel-body">
            <div class="logo text-center">
                <img src="{{ asset('images/Grupo-717.png') }}" alt="Aspro" width="200px">
            </div>

            <h4 class="text-center mb5" style="margin-top: 20px;">Ya estas registrado?</h4>
            <p class="text-center">ingresa a tu cuenta</p>

            <div class="mb30"></div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div><!-- input-group -->

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><!-- input-group -->
                @if (Route::has('password.request'))
                    <div style="text-align:right;">
                    <a href="{{ route('password.request') }}" style="font-size: 11px;">Olvidaste tu contraseña?</a>
                    </div>
                @endif

                <div class="clearfix" style="margin-top:1rem;">
                    <div class="pull-left">
                        <div class="ckbox ckbox-primary mt10">
                            <input type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                            <label for="rememberMe">Recordar</label>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success">Ingresar <i class="fa fa-angle-right ml5"></i></button>
                        <a class="btn btn-primary" href="{{ route('social.auth','facebook') }}"><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-danger" href="#!"><i class="fa  fa-google-plus"></i></a>
                    </div>
                </div>
            </form>

        </div><!-- panel-body -->
        <div class="panel-footer">
            <a href="{{ route('register') }}" class="btn btn-primary btn-block">No tienes una cuenta? Registrate ahora</a>
        </div><!-- panel-footer -->

    </div><!-- panel -->

</section>

@endsection
