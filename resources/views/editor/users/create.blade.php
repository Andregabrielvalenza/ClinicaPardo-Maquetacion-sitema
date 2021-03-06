@extends('layouts.sistema')

@section('content')
        <div class="mainpanel">
            <div class="pageheader">
                <div class="media">
                    <div class="pageicon pull-left">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <div class="media-body">
                        <ul class="breadcrumb">
                            <li><a href="/home"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li><a href="#!">Accesos</a></li>
                            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                        </ul>
                        <h4>Registrar</h4>
                    </div>
                </div><!-- media -->
            </div><!-- pageheader -->

            <div class="contentpanel">

                <div class="row">
                    <div class="col-sm-12 col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <!--<div class="panel-btns">
                                    <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <h4 class="panel-title">Registrar Usuario</h4>
                                <p>Los campos con <code>asterisco(*)</code> son obligatorios</p>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Oppssss!</strong> Por favor corrige los siguientes errores<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div><!-- panel-heading -->

                            <div class="panel-body nopadding">
                                {!! Form::open(array('route' => 'users.store','method'=>'POST','class'=>'form-horizontal form-bordered')) !!}
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nombres y Apellidos <code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('name', null, array('placeholder' => 'Nombres','class' => 'form-control')) !!}

                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Email <code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Password <code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('password', null, array('placeholder' => 'Password','class' => 'form-control')) !!}

                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Confirmar Password <code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('confirm-password', null, array('placeholder' => 'Confirmar Password','class' => 'form-control')) !!}

                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Roles <code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::select('roles[]', $roles,[], array('class' => 'width300','multiple', 'id'=>'roles', 'data-placeholder'=>'Seleccionar roles')) !!}

                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <div class="col-sm-4 control-label">&nbsp;</div>
                                        <div class="col-sm-8"><button type="submit" class="btn btn-success">Registrar</button></div>
                                    </div>

                                {!! Form::close() !!}
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div>
                </div><!-- row -->

            </div><!-- contentpanel -->
        </div>
    </div><!-- mainwrapper -->
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#roles").select2();
        });
    </script>
@endsection