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
                    <h4>Procesar recepción</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">

            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::open(array('route' => 'registrar-recepcion','method'=>'POST','class'=>'form-horizontal form-bordered')) !!}
                    {!! Form::hidden('programacion', $programacion->id, array()) !!}
                    <div class="row">
                        <div class="col-sm-6">

                            <h5 class="lg-title mb10"><b>DATOS ED-RS</b></h5>
                            <!--<img src="images/themeforest.png" class="img-responsive mb10" alt="" />-->
                            <address>
                                <strong>Operador</strong><br>
                                Nombres: {{$programacion->conductor->nombres}}<br>
                                DNI: {{$programacion->conductor->dni}}<br>
                                <abbr title="Phone">Telefono:</abbr> {{$programacion->conductor->telefono}}
                            </address>

                            <address>
                                <strong>Vehiculo / Placa</strong><br>
                                Vehiulo: {{$programacion->transporte->marca}} {{$programacion->transporte->modelo}} {{$programacion->transporte->tipo_vehiculo}}<br>
                                Licencia: {{$programacion->transporte->licencia}}<br>
                                Placa: {{$programacion->transporte->placa}}<br>
                            </address>

                        </div><!-- col-sm-6 -->

                        <div class="col-sm-6 text-right">
                            <h5 class="subtitle mb10">Datos del Generador</h5>
                            <h4 class="text-primary">{{$programacion->cliente->razon_social}}</h4>

                            <h5 class="subtitle mb10">RUC: {{$programacion->cliente->ruc}}</h5>
                            <address>
                                <strong>Lugar de recepción</strong><br>
                                {{$programacion->sucursal->direccion}} {{$programacion->sucursal->numero}}<br>
                                {{$programacion->sucursal->distrito->provincia->departamento->nombre}} / {{$programacion->sucursal->distrito->provincia->nombre}} / {{$programacion->sucursal->distrito->nombre}}<br>
                                {{$programacion->sucursal->email}}<br>
                                <abbr title="Phone">Telefono:</abbr> {{$programacion->sucursal->telefono}}
                            </address>

                            <p><strong>Fecha programada de recepción:</strong> {{ date('d/m/Y',strtotime($programacion->fecha)) }} {{ date('h:i A',strtotime($programacion->hora)) }}</p>
                            <p>
                                <strong>Responsable Técnico:</strong> {!! Form::select('responsable_tecnico', $responsables_tecnicos,[], array('class' => '', 'id'=>'responsable_tecnico', 'data-placeholder'=>'Seleccionar responsable')) !!}
                                @if ($advertencia==1)<span id="advertencia" style="font-size:11px; color:red;"><br>No tiene aisgnado DNI/CIP</span> @endif
                            </p>
                            @foreach ($programacion->sucursal->cliente->sucursales as $su)
                            <p>
                                {!! Form::text('guia_remision_remitente_'.$su->id, null, array('placeholder' => 'Nro.GR Remitente '.$su->direccion,'class' => 'form-control width300', 'style'=>'float:right; margin-top:0.5rem;')) !!}
                            </p>
                            @endforeach

                        </div>


                    </div><!-- row -->

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

                    <div class="table-responsive">
                        <table id="pendientes" class="table table-bordered table-dark table-invoice">
                            <thead>
                            <tr>
                                <th>Residuo Sólido</th>
                                @if (count($programacion->cliente->sucursales)>1) <th>Sucursal</th> @endif
                                <th>Recipiente</th>
                                <th>Nro. Recipientes</th>
                                <th>Volumen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($programacion->cliente->residuos as $residuo)
                            <tr>
                                <td>
                                    {!! Form::hidden('residuos[]', $residuo->residuo->id, array('class' => 'residuos', 'data-placeholder'=>'Residuo')) !!}
                                    <h5><a href="#!">{{$residuo->residuo->nombre}}</a> <a href="#!" data-idcliente="{{$programacion->cliente_id}}" data-idresiduo="{{$residuo->residuo->id}}" class="btn btn-success btn-xs btn-bordered agregar" style="border:0;"><b><i class="fa fa-plus"></i></b></a></h5>
                                </td>
                                @if (count($programacion->cliente->sucursales)>1)
                                <td>
                                    {!! Form::select('sucursales[]', $programacion->cliente->sucursales->pluck('direccion','id'),[], array('class' => 'sucursales', 'data-placeholder'=>'Seleccionar sucursal', 'required')) !!}
                                </td>
                                @else
                                    {!! Form::hidden('sucursales[]', $programacion->cliente->sucursales[0]->id, array('placeholder' => 'Sucursal','class' => 'form-control')) !!}
                                @endif
                                <td>
                                    <?php $recipientes=array(); ?>
                                    @foreach ($residuo->residuo->recipientes as $recipiente)
                                        <?php $recipientes[$recipiente->recipiente->id]=$recipiente->recipiente->nombre?>
                                    @endforeach
                                    {!! Form::select('recipientes[]', $recipientes,[], array('class' => 'recipientes', 'data-placeholder'=>'Seleccionar recipiente', 'required')) !!}
                                </td>
                                <td>{!! Form::text('nro_recipientes[]', null, array('placeholder' => '# recipientes','class' => 'form-control','size'=>'4')) !!}</td>
                                <td>{!! Form::text('volumen[]', null, array('placeholder' => $residuo->residuo->unidad,'class' => 'form-control')) !!}</td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- table-responsive -->

                    <!--<table class="table table-total">
                        <tbody>
                        <tr>
                            <td>TOTAL:</td>
                            <td>00.00</td>
                        </tr>
                        </tbody>
                    </table>-->

                    <div class="text-right btn-invoice">
                        <button class="btn btn-primary btn-lg mr5">Procesar</button>
                    </div>
                    {!! Form::close() !!}

                    <!--<div class="mb30"></div>

                    <div class="well nomargin">
                        Thank you for your business. Please make sure all cheques payable to <strong>ThemeForest Web Services, Inc.</strong> Account No. 54353535
                    </div>-->


                </div><!-- panel-body -->
            </div><!-- panel -->

        </div><!-- contentpanel -->
    </div>
    </div><!-- mainwrapper -->
    </section>
    <div id="loader" class="loader loader-default " data-text="Actualizando"></div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#responsable_tecnico").select2();
            $(".recipientes").select2();
            $(".sucursales").select2();
            $(".agregar").click(function(){
                var idresiduo=$(this).data('idresiduo');
                var idcliente=$(this).data('idcliente');
                var contenedor=$('#pendientes');
                $('#loader').addClass('is-active')
                $.ajax({
                    url: "{{ route('admin.get_residuo_data') }}?residuo_id=" + idresiduo +'&cliente_id=' + idcliente,
                    method: 'GET',
                    success: function (data) {
                        $('#loader').removeClass('is-active')
                        contenedor.append(data.html);
                        $("#"+data.identificadortabla).show('slow');
                        if (data.identificador!='nada') $("#"+data.identificador).select2();
                        $("#"+data.identificadorrecipiente).select2();

                    }
                });
            })

            $('#responsable_tecnico').change(function(){
                if ($(this).val()=="") $('#advertencia').html("");
                else{
                    var partes=$(this).val().split(':');
                    console.log(partes);
                    if (partes[1].trim()=="") $('#advertencia').html("<br>No tiene aisgnado DNI/CIP"); else $('#advertencia').html("");

                }
            })
        });
    </script>
@endsection