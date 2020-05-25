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
                        <h4>Registrar Sucursal</h4>
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
                                <h4 class="panel-title">Registrar Sucursal - {{$cliente->razon_social}}</h4>
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
                                {!! Form::open(array('route' => 'sucursales.store','method'=>'POST','class'=>'form-horizontal form-bordered')) !!}
                                <div class="well well-sm text-center"><b>DATOS GENERALES</b></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Dirección<code>(*)</code></label>
                                    <div class="col-sm-8">
                                        {!! Form::hidden('cliente_id', $cliente->id, array('placeholder' => 'Cliente','class' => 'form-control')) !!}
                                        {!! Form::text('direccion', null, array('placeholder' => 'Direccion','class' => 'form-control','required')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Referencia</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('referencia_direccion', null, array('placeholder' => 'Cerca al estadio Garcilaso','class' => 'form-control')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Número<code>(*)</code></label>
                                    <div class="col-sm-8">
                                        {!! Form::text('numero', null, array('placeholder' => '513 o S/N','class' => 'form-control','required')) !!}
                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Teléfono</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('telefono', null, array('placeholder' => '984675432 o 084654321','class' => 'form-control')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-8">
                                        {!! Form::email('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Departamento <code>(*)</code></label>
                                    <div class="col-sm-8">
                                        {!! Form::select('departamento', array(""=>"Seleccionar Departamento")+$departamentos,[], array('class' => 'width300', 'id'=>'departamento', 'data-placeholder'=>'Seleccionar departamento','required')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Provincia <code>(*)</code></label>
                                    <div class="col-sm-8">
                                        {!! Form::select('provincia', [],[], array('class' => 'width300', 'id'=>'provincia', 'data-placeholder'=>'Seleccionar provincia','required')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Distrito <code>(*)</code></label>
                                    <div class="col-sm-8">
                                        {!! Form::select('distrito_id', [],[], array('class' => 'width300', 'id'=>'distrito', 'data-placeholder'=>'Seleccionar distrito','required')) !!}

                                    </div>
                                </div><!-- form-group -->


                                <div class="well well-sm text-center"><b>DATOS REPRESENTANTE LEGAL</b></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nombres y Apellidos<code>(*)</code></label>
                                    <div class="col-sm-8">
                                        {!! Form::text('nombres_representante_legal', null, array('placeholder' => 'Juan Perex Sanchez','class' => 'form-control','required')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Teléfono</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('telefono_representante_legal', null, array('placeholder' => '984675432 o 084654321','class' => 'form-control')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-8">
                                        {!! Form::email('email_representante_legal', null, array('placeholder' => 'email','class' => 'form-control')) !!}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">DNI</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('dni_representante_legal', null, array('placeholder' => 'DNI','class' => 'form-control','maxlength'=>'8','minlength'=>'8')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="well well-sm text-center"><b>1) DATOS RESPONSABLE TÉCNICO</b></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nombres y Apellidos</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('nombres_responsable_tecnico', null, array('placeholder' => 'Juan Perex Sanchez','class' => 'form-control','required')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Teléfono</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('telefono_responsable_tecnico', null, array('placeholder' => '984675432 o 084654321','class' => 'form-control')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-8">
                                        {!! Form::email('email_responsable_tecnico', null, array('placeholder' => 'email','class' => 'form-control')) !!}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">DNI</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('dni_responsable_tecnico', null, array('placeholder' => 'DNI','class' => 'form-control','maxlength'=>'8','minlength'=>'5','required')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="well well-sm text-center"><b>2) DATOS RESPONSABLE TÉCNICO</b></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nombres y Apellidos</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('nombres_responsable_tecnico_2', null, array('placeholder' => 'Juan Perex Sanchez','class' => 'form-control')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Teléfono</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('telefono_responsable_tecnico_2', null, array('placeholder' => '984675432 o 084654321','class' => 'form-control')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-8">
                                        {!! Form::email('email_responsable_tecnico_2', null, array('placeholder' => 'email','class' => 'form-control')) !!}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">DNI/CIP</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('dni_responsable_tecnico_2', null, array('placeholder' => 'DNI/CIP','class' => 'form-control','maxlength'=>'8','minlength'=>'5')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="well well-sm text-center"><b>DATOS RESPONSABLE CONTABILIDAD</b></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nombres y Apellidos</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('nombres_responsable_contabilidad', null, array('placeholder' => 'Juan Perex Sanchez','class' => 'form-control')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Teléfono</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('telefono_responsable_contabilidad', null, array('placeholder' => '984675432 o 084654321','class' => 'form-control')) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-8">
                                        {!! Form::email('email_responsable_contabilidad', null, array('placeholder' => 'email','class' => 'form-control')) !!}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">DNI</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('dni_responsable_contabilidad', null, array('placeholder' => 'DNI','class' => 'form-control','maxlength'=>'8','minlength'=>'8')) !!}

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
            $("#departamento").select2();
            $("#provincia").select2();
            $("#distrito").select2();
            $("#departamento").change(function(){
                if ($(this).val()!="") {
                    $('#loader').addClass('is-active')
                    $.ajax({
                        url: "{{ route('admin.provincias.get_by_departamento') }}?departamento_id=" + $(this).val(),
                        method: 'GET',
                        success: function (data) {
                            $('#provincia').html(data.html);
                            $('#loader').removeClass('is-active')
                        }
                    });
                }
            });

            $("#provincia").change(function(){
                if ($(this).val()!="") {
                    $('#loader').addClass('is-active');
                    $.ajax({
                        url: "{{ route('admin.distritos.get_by_provincia') }}?provincia_id=" + $(this).val(),
                        method: 'GET',
                        success: function (data) {
                            $('#distrito').html(data.html);
                            $('#loader').removeClass('is-active')
                        }
                    });
                }
            });
        });
    </script>
@endsection