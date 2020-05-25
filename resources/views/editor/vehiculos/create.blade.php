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
                            <li><a href="#!">Residuos Sólidos</a></li>
                            <li><a href="{{ route('vehiculos.index') }}">Vehiculos de transporte</a></li>
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
                                <h4 class="panel-title">Registrar Vehiculo de transporte</h4>
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
                                {!! Form::open(array('route' => 'vehiculos.store','method'=>'POST','class'=>'form-horizontal form-bordered')) !!}
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Placa<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('placa', null, array('placeholder' => 'Nro. Placa','class' => 'form-control','required')) !!}

                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Tipo de vehiculo<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('tipo_vehiculo', null, array('placeholder' => 'Ejem. Furgon','class' => 'form-control','required')) !!}

                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Cod. Configuracion Vehicular<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('codigo_configuracion_vehicular', null, array('placeholder' => 'Cod. Configuracion Vehicular','class' => 'form-control','required')) !!}

                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Carga total<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('carga', null, array('placeholder' => '4.7','class' => 'form-control','required')) !!}
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Unidad de carga<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::select('unidad_carga', array(""=>"Seleccionar unidad","TM"=>"TM","L"=>"L"),null, array('class' => 'width300', 'id'=>'unidad', 'data-placeholder'=>'Seleccionar Unidad','required')) !!}
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Marca<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('marca', null, array('placeholder' => 'Marca','class' => 'form-control','required')) !!}
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Modelo<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('modelo', null, array('placeholder' => 'Modelo','class' => 'form-control','required')) !!}
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ruta del vehiculo<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::select('ruta', array(""=>"Seleccionar ruta","Dentro de Cusco"=>"Dentro de Cusco","Fuera de Cusco"=>"Fuera de Cusco"),null, array('class' => 'width300', 'id'=>'ruta', 'data-placeholder'=>'Seleccionar Ruta','required')) !!}
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Conductor responsable<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::select('conductor_id', array(""=>"Seleccionar conductor")+$conductores,null, array('class' => 'width300', 'id'=>'conductor', 'data-placeholder'=>'Seleccionar Conductor','required')) !!}
                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Residuos que lleva<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::select('residuos[]', $residuos,[], array('class' => 'width300','multiple', 'required', 'id'=>'residuos', 'data-placeholder'=>'Seleccionar residuos')) !!}
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
            $("#unidad").select2();
            $("#ruta").select2();
            $("#conductor").select2();
            $("#residuos").select2();
        });
    </script>
@endsection