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
                        <li><a href="#!">Data Interna</a></li>
                        <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                    </ul>
                    <h4>Editar</h4>
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
                            <h4 class="panel-title">Editar Cliente</h4>
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
                            {!! Form::model($cliente, ['method' => 'PATCH','route' => ['clientes.update', $cliente->id], 'class'=>'form-horizontal form-bordered']) !!}
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Razon Social<code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::text('razon_social', null, array('placeholder' => 'Razon Social','class' => 'form-control','required')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nombre Comercial</label>
                                <div class="col-sm-8">
                                    {!! Form::text('nombre_comercial', null, array('placeholder' => 'Nombre Comercial','class' => 'form-control')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">RUC/DNI <code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::text('ruc', null, array('placeholder' => 'RUC/DNI','class' => 'form-control','required','maxlength'=>'11','minlength'=>'8')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Residuos que genera <code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::select('residuos[]', $residuos,$clienteResiduos, array('class' => 'width300','multiple', 'required', 'id'=>'residuos', 'data-placeholder'=>'Seleccionar residuos')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <div class="col-sm-4 control-label">&nbsp;</div>
                                <div class="col-sm-8"><button type="submit" class="btn btn-success">Actualizar</button></div>
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
            $("#residuos").select2();
        });
    </script>
@endsection