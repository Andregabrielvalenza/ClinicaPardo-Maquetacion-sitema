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
                            <li><a href="#!">Programacion</a></li>
                            <li><a href="{{ route('programaciones.index') }}">Programacion</a></li>
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
                                <h4 class="panel-title">Registrar nueva recepción de residuos sólidos</h4>
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
                                {!! Form::open(array('route' => 'programaciones.store','method'=>'POST','class'=>'form-horizontal form-bordered')) !!}
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Fecha<code>(*)</code></label>
                                        <div class="input-group col-sm-8">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            <div class=" bootstrap-timepicker">
                                            {!! Form::text('fecha', null, array('placeholder' => 'Fecha de recepción','class' => 'form-control','required', 'id'=>'fecha','readonly')) !!}
                                            </div>
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Hora<code>(*)</code></label>
                                        <div class="input-group col-sm-8">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                            <div class=" bootstrap-timepicker">
                                                {!! Form::text('hora', '11:30 AM', array('placeholder' => 'Hora de recepción','class' => 'form-control','required', 'id'=>'hora')) !!}

                                            </div>
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Cliente<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::select('cliente_id', array(""=>"Seleccionar cliente")+$clientes,null, array('class' => 'width300', 'id'=>'cliente', 'data-placeholder'=>'Seleccionar Cliente','required')) !!}
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Dirección de recepción <code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::select('sucursal_id', [],null, array('class' => 'width300', 'id'=>'sucursal_id', 'data-placeholder'=>'Seleccionar dirección','required')) !!}

                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Vehiculo a usar<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::select('transporte_id', array(""=>"Seleccionar vehiculo")+$transportes,null, array('class' => 'width300', 'id'=>'transporte', 'data-placeholder'=>'Seleccionar Transporte','required')) !!}
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Conductor responsable<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::select('conductor_id', array(""=>"Seleccionar conductor")+$conductores,null, array('class' => 'width300', 'id'=>'conductor', 'data-placeholder'=>'Seleccionar Conductor','required')) !!}
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
            $("#cliente").select2();
            $("#transporte").select2();
            $("#conductor").select2();
            $("#sucursal_id").select2();
            $('#fecha').datepicker({"dateFormat":"dd-mm-yy"});
            $('#hora').timepicker({ minuteStep: 15});
            $("#cliente").change(function(){
                if ($(this).val()!="") {
                    $('#loader').addClass('is-active')
                    $.ajax({
                        url: "{{ route('admin.sucursales.get_by_cliente') }}?cliente_id=" + $(this).val(),
                        method: 'GET',
                        success: function (data) {
                            console.log(data.html);
                            $('#sucursal_id').html(data.html);
                            $("#sucursal_id").select2();
                            $('#loader').removeClass('is-active')
                        }
                    });
                }
            });
        });
    </script>
@endsection