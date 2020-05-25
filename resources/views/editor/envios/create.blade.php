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
                            <li><a href="#!">Envios</a></li>
                            <li><a href="{{ route('envios.index') }}">Envios</a></li>
                        </ul>
                        <h4>Procesar Envío</h4>
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
                                <h4 class="panel-title">Procesar nuevo envío</h4>
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
                                {!! Form::open(array('route' => 'envios.store','method'=>'POST','class'=>'form-horizontal form-bordered')) !!}
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Fecha<code>(*)</code></label>
                                        <div class="input-group col-sm-8">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            <div class=" bootstrap-timepicker">
                                            {!! Form::hidden('vehiculo', $vehiculo, array('class' => 'form-control')) !!}
                                            {!! Form::hidden('carga', $carga, array('class' => 'form-control')) !!}
                                            {!! Form::text('fecha', null, array('placeholder' => 'Fecha de recepción','class' => 'form-control','required', 'id'=>'fecha','readonly')) !!}
                                            </div>
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
    <div id="loader" class="loader loader-default " data-text="Actualizando"></div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#fecha').datepicker({"dateFormat":"dd-mm-yy"});
        });
    </script>
@endsection