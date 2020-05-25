@extends('layouts.login')

@section('content')
<section>

    <div class="panel panel-signin">
        <div class="panel-body">
            <div class="logo text-center">
                <img src="{{ asset('images/Grupo-717.png') }}" alt="Aspro" width="200px">
            </div>

            <h4 class="text-center mb5" style="margin-top: 20px;">Registrar nueva cuenta</h4>
            <p class="text-center">Completa el siguiente formulario</p>

            <div class="mb30"></div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nombres y Apellidos">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                    </span>
                    @enderror
                </div><!-- input-group -->
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input id="telefono" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus type="text" class="form-control @error('telefono') is-invalid @enderror" pattern="^(\+?( |-|\.)?\d{1,2}( |-|\.)?)?(\(?\d{3}\)?|\d{3})( |-|\.)?(\d{3}( |-|\.)?\d{4})$" title="El formato no coincide debes ingresar el prefijo de tu pais y seguido el numero de telefono." placeholder="Teléfono (Ejemplo: +51895789789)">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                    </span>
                    @enderror
                </div><!-- input-group -->
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    {{ $message }}
                    </span>
                    @enderror
                </div><!-- input-group -->

                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><!-- input-group -->

                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Password" name="password_confirmation" required autocomplete="new-password">
                </div><!-- input-group -->

                <div class="clearfix">
                    <div class="pull-left">
                        <div class="ckbox ckbox-primary mt5">
                            <input type="checkbox" id="agree" value="1" required>
                            <label for="agree">Estoy de acuerdo con los <a href="#!">Terminos y condiciones</a></label>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success">Registrar cuenta <i class="fa fa-angle-right ml5"></i></button>
                    </div>
                </div>
            </form>

        </div><!-- panel-body -->
        <div class="panel-footer">
            <a href="{{ route('login') }}" class="btn btn-primary btn-block">Ya tienes una cuenta? Ingresa aqui</a>
        </div><!-- panel-footer -->

    </div><!-- panel -->

</section>


@endsection
