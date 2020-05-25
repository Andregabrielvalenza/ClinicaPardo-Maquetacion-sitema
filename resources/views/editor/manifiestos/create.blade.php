@extends('layouts.sistema')

@section('content')
    <style>
        .color_borde{ border-color: #CCC;}
        .borde_completo{
            border: 1px solid #CCC;
        }
        .borde_arriba_abajo{
            border-top:1px solid #CCC;
            border-bottom: 1px solid #CCC;
        }

        .border_arriba{
            border-top:1px solid #CCC;
        }
        .border_derecha{
            border-right: 1px solid #CCC;
        }
        .m-0{margin:0}
        .resaltado{

            color:darkblue;
            font-weight: bold;;
        }


    </style>
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-pencil"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href="/home"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><a href="#!">Manifiestos</a></li>
                        <li><a href="/almacen">Manifiestos</a></li>
                    </ul>
                    <h4>Registrar</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">

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

            <div class="panel panel-default">
                <div class="panel-body" style="font-size:12px;">
                    {!! Form::open(array('route' => 'manifiestos.store','method'=>'POST')) !!}
                    {!! Form::hidden('sucursal_cliente_id', $recepcion->sucursal->id, array('placeholder' => 'Cliente','class' => 'form-control')) !!}
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="row m-0">
                                    <div class="col-sm-12"><b>&nbsp;1.0 GENERADOR</b> - Datos generales</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3 border_derecha">&nbsp;Razón Social y siglas</div>
                                    <div class="col-sm-9 text-center resaltado">{{strtoupper($recepcion->programacion->cliente->razon_social)}}</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-2 border_derecha">&nbsp;N° RUC</div>
                                    <div class="col-sm-2 border_derecha text-center resaltado">{{$recepcion->programacion->cliente->ruc}}</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;EMAIL</div>
                                    <div class="col-sm-4 border_derecha text-center resaltado">{{strtoupper($recepcion->sucursal->email)}}</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;Tlf.</div>
                                    <div class="col-sm-2 text-center resaltado">{{$recepcion->sucursal->telefono}}</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-12"><b>&nbsp;DIRECCION DE LA PLANTA</b> (Establecimiento)</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3 border_derecha">&nbsp;Av.[] Jr.[] Calle[]</div>
                                    <div class="col-sm-6 text-center border_derecha resaltado">{{strtoupper($recepcion->sucursal->direccion)}}</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;N°.</div>
                                    <div class="col-sm-2 text-center resaltado">{{strtoupper($recepcion->sucursal->numero)}}</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-2 border_derecha">&nbsp;Urbanización:</div>
                                    <div class="col-sm-4 text-center border_derecha">&nbsp;</div>
                                    <div class="col-sm-2 border_derecha">&nbsp;Distrito</div>
                                    <div class="col-sm-4 text-center resaltado">{{strtoupper($recepcion->sucursal->distrito->nombre)}}</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-2 border_derecha">&nbsp;Provincia:</div>
                                    <div class="col-sm-3 text-center border_derecha resaltado">{{strtoupper($recepcion->sucursal->distrito->provincia->nombre)}}</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;Dep.</div>
                                    <div class="col-sm-3 text-center border_derecha resaltado">{{strtoupper($recepcion->sucursal->distrito->provincia->departamento->nombre)}}</div>
                                    <div class="col-sm-3">&nbsp;C. Postal:</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 border_derecha">&nbsp;Representante Legal (Gerente):</div>
                                    <div class="col-sm-5 text-center border_derecha resaltado">{{strtoupper($recepcion->sucursal->nombres_representante_legal)}}</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;DNI</div>
                                    <div class="col-sm-2 text-center resaltado">{{strtoupper($recepcion->sucursal->dni_representante_legal)}}</div>
                                </div>
                                <div class="row m-0 border_arriba" style="padding-top:10px; padding-bottom:10px; background-color:lightgrey;">
                                    <div class="col-sm-4 " style="color:#000;">&nbsp;Personal Responsable (Profesional o técnico):</div>
                                    {!! Form::hidden('tipo_responsable_tecnico_1', 0, array('class' => 'form-control', 'id'=>'tipo_responsable_tecnico_1')) !!}

                                    <div class="col-sm-8 text-center" id="espacio_select_responsable_tecnico_1">
                                        {!! Form::select('responsable_tecnico_1', $responsables_tecnicos, $responsable_tecnico, array('class' => 'responsable_tecnico', 'id'=>'responsable_tecnico_1', 'data-placeholder'=>'Seleccionar responsable', 'style'=>'width:90%;')) !!}
                                        @if ($advertencia_rt==1)<span id="advertencia_responsable_tecnico_1" style="font-size:11px; color:red;"><br>No tiene aisgnado DNI/CIP</span> @else <span id="advertencia_responsable_tecnico_1" style="font-size:11px; color:red;"></span>@endif
                                    </div>
                                    <div class="col-sm-8 text-center" id="espacio_edit_responsable_tecnico_1" style="display:none;">
                                        <a href="#!" class="regresar" data-idi="responsable_tecnico_1"><i class="fa fa-level-down" style="font-size:16px;"></i></a>
                                        {!! Form::text('nombres_responsable_tecnico_1', null, array('class' => 'form-control', 'placeholder'=>'Nombres y Apellidos', 'id'=>'nombres_responsable_tecnico_1', 'size'=>'10')) !!}
                                        {!! Form::text('dni_responsable_tecnico_1', null, array('class' => 'form-control', 'placeholder'=>'DNI/CIP', 'id'=>'dni_responsable_tecnico_1', 'size'=>'10')) !!}
                                    </div>
                                    <!--<div class="col-sm-1 border_derecha" style="padding:0;">&nbsp;CIP/ DNI</div>
                                    <div class="col-sm-2 text-center">74298945</div>-->
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-12"><b>&nbsp;1.1 DATOS DEL RESIDUO</b> (Llenar para cada tipo de residuo)</div>
                                </div>
                                <div class="row m-0 border_arriba" style="height:50px;">
                                    <div class="col-sm-12 resaltado" style="height:50px;"><b>&nbsp;1.1.1 NOMBRE DEL RESIDUO:</b>
                                        @foreach ($residuos as $residuo)
                                        {{strtoupper($residuo)}},&nbsp;
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-12"><b>&nbsp;1.1.2 CARACTERÍSTICAS:</b></div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-2 border_derecha">&nbsp;a) Estado del residuo:</div>
                                    <div class="col-sm-1 text-center border_derecha">Sólido</div>
                                    <div class="col-sm-1 text-center border_derecha @if (array_key_exists('Sólido', $estados)) resaltado @endif">
                                        @if (array_key_exists('Sólido', $estados)) X @endif
                                    </div>
                                    <div class="col-sm-1 text-center border_derecha">Semi Sólido</div>
                                    <div class="col-sm-1 text-center border_derecha @if (array_key_exists('Semi Sólido', $estados)) resaltado @endif">
                                        @if (array_key_exists('Semi Sólido', $estados)) X @endif
                                    </div>
                                    <div class="col-sm-1 text-center border_derecha">Líquido</div>
                                    <div class="col-sm-1 text-center border_derecha @if (array_key_exists('Líquido', $estados)) resaltado @endif" >
                                        @if (array_key_exists('Líquido', $estados)) X @endif
                                    </div>
                                    <div class="col-sm-2 text-center border_derecha text-center">Cantidad total ({{strtoupper($recepciones[0]->residuo->unidad)}})</div>
                                    <div class="col-sm-2 text-center resaltado">{{number_format($total_peso, 2, '.', ',')}}</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-12">&nbsp;b) Tipo de envase:</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 text-center border_derecha">Recipiente<br>(especifique la forma)</div>
                                    <div class="col-sm-4 text-center border_derecha">Material</div>
                                    <div class="col-sm-2 text-center border_derecha text-center" style="padding:0;">Volumen<br>(L)(gal)(m3)(Kg)</div>
                                    <div class="col-sm-2 text-center">N° de recipientes</div>
                                </div>
                                <?php $i=0;?>
                                @foreach ($recepciones as $rec)
                                <div class="row m-0 border_arriba">
                                    {!! Form::hidden('recepciones[]', $rec->id, array('class' => 'form-control')) !!}
                                    <div class="col-sm-4 text-center border_derecha resaltado">{{$rec->recipiente->nombre}}</div>
                                    <div class="col-sm-4 text-center border_derecha resaltado">{{$rec->recipiente->material->nombre}}</div>
                                    <div class="col-sm-2 text-center border_derecha text-center resaltado" style="padding:0;">@if ($rec->volumen>0){{$rec->volumen}} @else &nbsp; @endif</div>
                                    <div class="col-sm-2 text-center resaltado">@if ($rec->volumen>0) {{$rec->nro_recipientes}} @else &nbsp; @endif</div>
                                </div>
                                <?php $i=$i+1;?>
                                @endforeach
                                @for ($i; $i<5; $i++)
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 text-center border_derecha">&nbsp;</div>
                                    <div class="col-sm-4 text-center border_derecha">&nbsp;</div>
                                    <div class="col-sm-2 text-center border_derecha text-center" style="padding:0;">&nbsp;</div>
                                    <div class="col-sm-2 text-center">&nbsp;</div>
                                </div>
                                @endfor
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-12"><b>&nbsp;1.1.3 PELIGROSIDAD:</b> (marque con una X donde corresponda)</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-2 text-center @if (array_key_exists('Auto combustibilidad', $peligrosidades)) resaltado @endif " style="padding:0;">a)Auto combustibilidad</div>
                                    <div class="col-sm-2 text-center @if (array_key_exists('Reactividad', $peligrosidades)) resaltado @endif " style="padding:0;">b)Reactividad</div>
                                    <div class="col-sm-2 text-center @if (array_key_exists('Patogenicidad', $peligrosidades)) resaltado @endif" style="padding:0;">c)Patogenicidad</div>
                                    <div class="col-sm-2 text-center @if (array_key_exists('Explosividad', $peligrosidades)) resaltado @endif" style="padding:0;">d)Explosividad</div>
                                    <div class="col-sm-4 text-center" style="padding:0;">CONTRA EL MEDIO AMBIENTE</div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-sm-2 text-center @if (array_key_exists('Toxicidad', $peligrosidades)) resaltado @endif" style="padding:0;">e)Toxicidad</div>
                                    <div class="col-sm-2 text-center @if (array_key_exists('Corrosividad', $peligrosidades)) resaltado @endif" style="padding:0;">f)Corrosividad</div>
                                    <div class="col-sm-2 text-center @if (array_key_exists('Radioactividad', $peligrosidades)) resaltado @endif" style="padding:0;">g)Radioactividad</div>
                                    <div class="col-sm-2 text-center @if (array_key_exists('Otros', $peligrosidades)) resaltado @endif" style="padding:0;">h)Otros (especifique)</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-12"><b>&nbsp;1.1.3 PLAN DE CONTINGENCIA:</b></div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-12"><b>&nbsp;a) Indicar la acción a adoptar en caso de ocurrencia de algun evento no previsto</b></div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-2 text-left ">Derrame</div>
                                    <div class="col-sm-10 text-left ">Aislamiento del área, secado conpaños absorventes, limpieza y desinfección.</div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-sm-2 text-left ">Infiltración</div>
                                    <div class="col-sm-10 text-left ">Inertización, remediación o retirar la parte contaminada a un relleno de seguridad.</div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-sm-2 text-left ">Incendio</div>
                                    <div class="col-sm-10 text-left ">Sofocación inicialcon extintor tipo ABC</div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-sm-2 text-left ">Explosión</div>
                                    <div class="col-sm-10 text-left ">Aislamiento de la zona y solicitar apoyo de la policia nacional y defensa civil</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-12"><b>&nbsp;b) Directorio telefónico de contacto de emergencia</b></div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 border_derecha text-center">Empresa / dependencia de salud</div>
                                    <div class="col-sm-4 border_derecha text-center">Persona de contacto</div>
                                    <div class="col-sm-4  text-center">Tlf. (indicar cod. ciudad)</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 border_derecha text-center">JMC GERENCIA Y CONSTRUCCION SAC</div>
                                    <div class="col-sm-4 border_derecha text-center">JUAN CARLOS TORRES ESTRADA</div>
                                    <div class="col-sm-4  text-center">974926556</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 border_derecha text-center">JMC GERENCIA Y CONSTRUCCION SAC</div>
                                    <div class="col-sm-4 border_derecha text-center">FREDDY CACERES QUISPE</div>
                                    <div class="col-sm-4  text-center">962611879</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 border_derecha text-center">RADIO PATRULLA</div>
                                    <div class="col-sm-4 border_derecha text-center">&nbsp;</div>
                                    <div class="col-sm-4  text-center">105</div>
                                </div>
                                <div class="row m-0 border_arriba" style="height:50px;">
                                    <div class="col-sm-2 text-left border_derecha" style="height:50px;">Observaciones:</div>
                                    <div class="col-sm-10 text-left " style="height:50px;">&nbsp;</div>
                                </div>
                            </div>
                        </div><!-- col-sm-6 -->

                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="row m-0">
                                    <div class="col-sm-12"><b>&nbsp;2.0 EPS-RS TRANSPORTISTA</b></div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3 border_derecha">&nbsp;Razón Social y siglas</div>
                                    <div class="col-sm-6 text-center border_derecha">JMC GENRENCIA Y CONSTRUCCION SAC</div>
                                    <div class="col-sm-3 text-center">N° RUC: 20601440220</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3  border_derecha">&nbsp;N° Registro EPS-RS</div>
                                    <div class="col-sm-3  border_derecha">&nbsp;Fecha Vcto.</div>
                                    <div class="col-sm-3 border_derecha">&nbsp;N° Autorización Municipal.</div>
                                    <div class="col-sm-3 ">&nbsp;N° Aprobación de ruta (*).</div>
                                </div>
                                <div class="row m-0 border_arriba" style="font-weight:bold;">
                                    <div class="col-sm-3 text-center  border_derecha">&nbsp;EP-0801-048.17</div>
                                    <div class="col-sm-3 text-center border_derecha">&nbsp;17/11/2021</div>
                                    <div class="col-sm-3 text-center border_derecha">&nbsp;0011-T / 1506</div>
                                    <div class="col-sm-3 text-center">&nbsp;708-2019-MTC/15</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3  border_derecha">&nbsp;Dirección Av.[] Jr.[] Calle[]</div>
                                    <div class="col-sm-6  text-center border_derecha">Sector Oscollopampa Lote 3 Via de Evitamiento</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;N°</div>
                                    <div class="col-sm-2 text-center">S/N</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 border_derecha">&nbsp;Urbanización</div>
                                    <div class="col-sm-4 border_derecha">&nbsp;Distrito: SAN JERÓNIMO</div>
                                    <div class="col-sm-4 ">&nbsp;Provincia: CUSCO</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 border_derecha">&nbsp;Departamento: Cusco</div>
                                    <div class="col-sm-4 border_derecha">&nbsp;Tlf(s). 084247012 / 974926556</div>
                                    <div class="col-sm-4 ">&nbsp;EMAIL: jtorres@jmceco.com</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-8 border_derecha">&nbsp;Representante Legal: Juan Carlos Torres Estrada</div>
                                    <div class="col-sm-4 ">&nbsp;DNI: 24006680</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-8 border_derecha">&nbsp;Ingeniero Responsable: Juan Carlos Torres Estrada</div>
                                    <div class="col-sm-4 ">&nbsp;CIP: 71436</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3 border_derecha">&nbsp;Observaciones: </div>
                                    <div class="col-sm-9 ">&nbsp;</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3 border_derecha">&nbsp;Nombre del chofer del vehiculo </div>
                                    <div class="col-sm-3 border_derecha">&nbsp;Tipo de vehiculo</div>
                                    <div class="col-sm-3 border_derecha">&nbsp;Número de placa </div>
                                    <div class="col-sm-3 ">&nbsp;Cantidad (TM)</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3  text-center" style="padding-bottom:10px; padding-top: 10px; background-color:lightgrey;">
                                        {!! Form::select('conductor', $choferes, $vehiculos[0]->vehiculo->conductor->id, array('class' => 'responsable_tecnico', 'id'=>'conductor', 'style'=>'width:100%', 'data-placeholder'=>'Seleccionar conductor')) !!}
                                    </div>
                                    <div class="col-sm-6  text-center" style="padding-bottom:10px; padding-top: 10px; background-color:lightgrey;">
                                        {{--{!! Form::select('vehiculo', $vehiculos, [], array('class' => 'responsable_tecnico', 'id'=>'vehiculo', 'style'=>'width:100%', 'data-placeholder'=>'Seleccionar vehiculo')) !!}--}}
                                        <select class="responsable_tecnico" id="vehiculo" data-placeholder="Seleccionar Vehiculo" style="width:100%;" name="vehiculo">
                                            @foreach ($vehiculos as $vehiculo)
                                                <?php $carga_total=0;?>
                                                @if (count($vehiculo->vehiculo->cargaasignada)>0)
                                                    @if ($vehiculo->vehiculo->unidad_carga=="TM")
                                                        @foreach ($vehiculo->vehiculo->cargaasignada as $carga)
                                                            @foreach ($carga->detalles as $detalle)
                                                                {{$detalle->recepcion->volumen}}
                                                                <?php $carga_total+=$detalle->recepcion->volumen;?>
                                                            @endforeach
                                                        @endforeach
                                                        <?php $aux=number_format($carga_total/1000,2,',','.'); $cargaactual='('.$aux.$vehiculo->vehiculo->unidad_carga.' de '.$vehiculo->vehiculo->carga.$vehiculo->vehiculo->unidad_carga.')'; ?>
                                                    @elseif ($vehiculo->vehiculo->unidad_carga=="L")
                                                        @foreach ($vehiculo->vehiculo->cargaasignada as $carga)
                                                            @foreach ($carga->detalles as $detalle)
                                                                <?php $carga_total+=$detalle->recepcion->volumen;?>
                                                            @endforeach
                                                        @endforeach
                                                            <?php $aux=number_format($carga_total*3.785,2,',','.'); $cargaactual='('.$aux.$vehiculo->vehiculo->unidad_carga.' de '.$vehiculo->vehiculo->carga.$vehiculo->vehiculo->unidad_carga.')'; ?>
                                                    @endif
                                                @else
                                                    <?php $cargaactual='('.number_format(0,2,',','.').$vehiculo->vehiculo->unidad_carga.' de '.$vehiculo->vehiculo->carga.$vehiculo->vehiculo->unidad_carga.')'; ?>
                                                @endif
                                                <option value="{{$vehiculo->vehiculo_id}}">{{$vehiculo->vehiculo->marca}} {{$vehiculo->vehiculo->modelo}} {{$vehiculo->vehiculo->tipo_vehiculo}} {{$vehiculo->vehiculo->placa}} {{$cargaactual}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 resaltado text-center">{{number_format($total_peso/1000, 3, '.', ',')}}</div>
                                </div>
                                <div class="row m-0 border_arriba" style="font-weight: bold;">
                                    <div class="col-sm-3">&nbsp;REFRENDOS: </div>
                                    <div class="col-sm-9  text-center">&nbsp;Generador - Responsable del Area Técnica del Manejo de Residuos</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-1" style="">&nbsp;Nombres: </div>
                                    {!! Form::hidden('tipo_responsable_tecnico_2', 0, array('class' => 'form-control', 'id'=>'tipo_responsable_tecnico_2')) !!}
                                    <div class="col-sm-5 border_derecha text-center" id="espacio_select_responsable_tecnico_2" style=" background-color:lightgrey; padding-top: 10px; padding-bottom:10px;">
                                        {!! Form::select('responsable_tecnico_2', $responsables_tecnicos, $responsable_tecnico, array('class' => 'responsable_tecnico', 'id'=>'responsable_tecnico_2', 'data-placeholder'=>'Seleccionar responsable', 'style'=>'width:100%')) !!}
                                        @if ($advertencia_rt==1)<span id="advertencia_responsable_tecnico_2" style="font-size:11px; color:red;"><br>No tiene aisgnado DNI/CIP</span>@else <span id="advertencia_responsable_tecnico_2" style="font-size:11px; color:red;"></span> @endif
                                    </div>
                                    <div class="col-sm-5 text-center" id="espacio_edit_responsable_tecnico_2" style="display:none; background-color:lightgrey; padding-top: 10px; padding-bottom:10px;">
                                        <a href="#!" class="regresar" data-idi="responsable_tecnico_2"><i class="fa fa-level-down" style="font-size:16px;"></i></a>
                                        {!! Form::text('nombres_responsable_tecnico_2', null, array('class' => 'form-control', 'placeholder'=>'Nombres y Apellidos', 'id'=>'nombres_responsable_tecnico_2', 'size'=>'10')) !!}
                                        {!! Form::text('dni_responsable_tecnico_2', null, array('class' => 'form-control', 'placeholder'=>'DNI/CIP', 'id'=>'dni_responsable_tecnico_2', 'size'=>'10')) !!}
                                    </div>
                                    <div class="col-sm-1 border_derecha" style="">&nbsp;Firma: </div>
                                    <div class="col-sm-5 text-center" style="">&nbsp;</div>
                                </div>
                                <div class="row m-0 border_arriba" style="font-weight: bold;">
                                    <div class="col-sm-12 text-center">EPS-RS Transporte - Responsable</div>
                                </div>
                                <div class="row m-0 border_arriba" style="height:50px;">
                                    <div class="col-sm-1 border_derecha" style="height:50px;">&nbsp;Nombres: </div>
                                    <div class="col-sm-5 border_derecha text-center" style="height:50px;">JUAN CARLOS TORRES ESTRADA</div>
                                    <div class="col-sm-1 border_derecha" style="height:50px;">&nbsp;Firma: </div>
                                    <div class="col-sm-5 text-center" style="height:50px;">&nbsp;</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-1 border_derecha">&nbsp;Lugar: </div>
                                    <div class="col-sm-2 border_derecha text-center">&nbsp;</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;Fecha: </div>
                                    <div class="col-sm-2 border_derecha text-center">&nbsp;</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;Hora: </div>
                                    <div class="col-sm-2 border_derecha text-center">&nbsp;</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-12"><b>&nbsp;3.0 EPS-RS o EC-RS DEL DESTINO FINAL</b></div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3 border_derecha">&nbsp;Marque la opcion que corresponda: </div>
                                    <div class="col-sm-2 border_derecha text-center">Tratamiento</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;</div>
                                    <div class="col-sm-2 border_derecha text-center">Relleno de seguridad</div>
                                    <div class="col-sm-1 border_derecha text-center">X</div>
                                    <div class="col-sm-2 border_derecha text-center">Exportacion</div>
                                    <div class="col-sm-1 border_derecha text-center">&nbsp;</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3">&nbsp;Razón Social y siglas</div>
                                    <div class="col-sm-6 text-center border_derecha" style="padding-bottom:10px; padding-top: 10px; background-color:lightgrey;">
                                        <select class="planta_combo" id="planta" data-placeholder="Seleccionar planta" style="width:100%;" name="planta">
                                            @foreach ($plantas as $planta)
                                                @foreach ($planta->planta->sucursales as $sucursal)
                                                <option value="{{$sucursal->id}}">{{$planta->planta->razon_social}} {{$sucursal->direccion}} {{$sucursal->numero}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="planta_ruc" class="col-sm-3 text-center resaltado">N° RUC: {{$plantas[0]->planta->ruc}}</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-2 border_derecha">&nbsp;N° Registro</div>
                                    <div class="col-sm-2 border_derecha">&nbsp;Fecha Vcto.</div>
                                    <div class="col-sm-3 border_derecha">&nbsp;R.D. N° Autorizacion Sanitaria</div>
                                    <div class="col-sm-3 border_derecha">&nbsp;N° Autorizacion Municipal</div>
                                    <div class="col-sm-2 ">&nbsp;Notif. al pais Importador</div>
                                </div>
                                <div class="row m-0 border_arriba" style="font-weight:bold;">
                                    <div id="planta_digesa" class="col-sm-2 border_derecha text-center resaltado">{{$plantas[0]->planta->registro_digesa}}</div>
                                    <div id="planta_vencimiento_digesa" class="col-sm-2 border_derecha text-center resaltado">{{$plantas[0]->planta->fecha_vencimiento_digesa}}</div>
                                    <div id="planta_autorizacion_sanitaria" class="col-sm-3 border_derecha text-center resaltado">{{$plantas[0]->planta->autorizacion_sanitaria}}</div>
                                    <div id="planta_autorizacion_municipal" class="col-sm-3 border_derecha text-center resaltado">{{$plantas[0]->planta->autorizacion_municipal}}</div>
                                    <div class="col-sm-2 text-center">&nbsp;</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-2  border_derecha">&nbsp;Dirección</div>
                                    <div id="planta_direccion" class="col-sm-7  text-center border_derecha resaltado">{{$plantas[0]->planta->sucursales[0]->direccion}}</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;N°</div>
                                    <div id="planta_numero" class="col-sm-2 text-center resaltado">{{$plantas[0]->planta->sucursales[0]->numero}}</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 border_derecha">&nbsp;Urbanización</div>
                                    <div id="planta_distrito" class="col-sm-4 border_derecha resaltado">&nbsp;Distrito: {{strtoupper($plantas[0]->planta->sucursales[0]->distrito->nombre)}}</div>
                                    <div id="planta_provincia" class="col-sm-4 resaltado">&nbsp;Provincia: {{strtoupper($plantas[0]->planta->sucursales[0]->distrito->provincia->nombre)}}</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div id="planta_departamento" class="col-sm-4 border_derecha resaltado">&nbsp;Departamento: {{strtoupper($plantas[0]->planta->sucursales[0]->distrito->provincia->departamento->nombre)}}</div>
                                    <div id="planta_telefono" class="col-sm-4 border_derecha resaltado">&nbsp;Tlf(s). {{$plantas[0]->planta->sucursales[0]->telefono}}</div>
                                    <div id="planta_email" class="col-sm-4 resaltado">&nbsp;EMAIL: {{$plantas[0]->planta->sucursales[0]->email}}</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div id="planta_nombres_representante_legal" class="col-sm-8 border_derecha resaltado">&nbsp;Representante Legal: {{$plantas[0]->planta->sucursales[0]->nombres_representante_legal}}</div>
                                    <div id="planta_dni_representante_legal" class="col-sm-4 resaltado">&nbsp;DNI/CE: {{$plantas[0]->planta->sucursales[0]->dni_representante_legal}}</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-4 ">&nbsp;Ingeniero Responsable:</div>
                                    {!! Form::hidden('tipo_responsable_planta', 0, array('class' => 'form-control', 'id'=>'tipo_responsable_planta')) !!}
                                    <div class="col-sm-8" id="espacio_select_responsable_planta" style="padding-bottom:10px; padding-top: 10px; background-color:lightgrey;">
                                        <?php
                                        $responsables_planta=array();
                                        $responsables_planta[$plantas[0]->planta->sucursales[0]->nombres_responsable_tecnico.':'.$plantas[0]->planta->sucursales[0]->cip_responsable_tecnico]=$plantas[0]->planta->sucursales[0]->nombres_responsable_tecnico.':'.$plantas[0]->planta->sucursales[0]->cip_responsable_tecnico;
                                        if ($plantas[0]->planta->sucursales[0]->nombres_responsable_tecnico_2!="" && $plantas[0]->planta->sucursales[0]->cip_responsable_tecnico!="")
                                            $responsables_planta[$plantas[0]->planta->sucursales[0]->nombres_responsable_tecnico_2.':'.$plantas[0]->planta->sucursales[0]->cip_responsable_tecnico_2]=$plantas[0]->planta->sucursales[0]->nombres_responsable_tecnico_2.':'.$plantas[0]->planta->sucursales[0]->cip_responsable_tecnico_2;
                                        $responsables_planta["0"]="Ingresar Manualmente";
                                        $responsables_planta[""]="No especificar";
                                        if ($plantas[0]->planta->sucursales[0]->cip_responsable_tecnico=="" || $plantas[0]->planta->sucursales[0]->cip_responsable_tecnico==null) $advertencia_rtp=1; else $advertencia_rtp=0;
                                        ?>
                                        <select class="responsable_tecnico" id="responsable_planta" data-placeholder="Seleccionar responsable" style="width:100%;" name="responsable_planta">

                                            @foreach ($responsables_planta as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach

                                        </select>
                                        @if ($advertencia_rtp==1)<span id="advertencia_responsable_planta" style="font-size:11px; color:red;"><br>No tiene aisgnado DNI/CIP</span>@else <span id="advertencia_responsable_planta" style="font-size:11px; color:red;"></span> @endif
                                    </div>
                                    <div class="col-sm-8 text-center" id="espacio_edit_responsable_planta" style="display:none; background-color:lightgrey; padding-top: 10px; padding-bottom:10px;">
                                        <a href="#!" class="regresar" data-idi="responsable_planta"><i class="fa fa-level-down" style="font-size:16px;"></i></a>
                                        {!! Form::text('nombres_responsable_planta_1', null, array('class' => 'form-control', 'placeholder'=>'Nombres y Apellidos', 'id'=>'nombres_responsable_planta_1', 'size'=>'10')) !!}
                                        {!! Form::text('cip_responsable_planta_1', null, array('class' => 'form-control', 'placeholder'=>'DNI/CIP', 'id'=>'cip_responsable_planta_1', 'size'=>'10')) !!}
                                    </div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-8 border_derecha">&nbsp;Cantidad de residuos peligrosos entregados y recepcionados (TM)</div>
                                    <div class="col-sm-4 ">&nbsp;</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-3 border_derecha">&nbsp;Observaciones: </div>
                                    <div class="col-sm-9 ">&nbsp;</div>
                                </div>
                                <div class="row m-0 border_arriba" style="font-weight: bold;">
                                    <div class="col-sm-3">&nbsp;REFRENDOS: </div>
                                    <div class="col-sm-9 border_derecha text-center">&nbsp;EPS-RS Transporte - Responsable</div>
                                </div>
                                <div class="row m-0 border_arriba" style="height:50px;">
                                    <div class="col-sm-1 border_derecha" style="height:50px;">&nbsp;Nombres: </div>
                                    <div class="col-sm-5 border_derecha text-center" style="height:50px;">JUAN CARLOS TORRES ESTRADA</div>
                                    <div class="col-sm-5 text-center" style="height:50px;">&nbsp;</div>
                                </div>
                                <div class="row m-0 border_arriba" style="font-weight: bold;">
                                    <div class="col-sm-12 border_derecha text-center">EPS-RS Tratamiento, Disposición Final o EC-RS de Exportación a Aduana - Responsables</div>
                                </div>
                                <div class="row m-0 border_arriba" >
                                    <div class="col-sm-1" >&nbsp;Nombres: </div>
                                    {!! Form::hidden('tipo_responsable_planta_2', 0, array('class' => 'form-control', 'id'=>'tipo_responsable_planta_2')) !!}
                                    <div class="col-sm-5 border_derecha text-center" id="espacio_select_responsable_planta_2"  style="padding-bottom:10px; padding-top: 10px; background-color:lightgrey;">
                                        <select class="responsable_tecnico" id="responsable_planta_2" data-placeholder="Seleccionar responsable" style="width:100%;" name="responsable_planta_2">

                                            @foreach ($responsables_planta as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach

                                        </select>
                                        @if ($advertencia_rtp==1)<span id="advertencia_responsable_planta_2" style="font-size:11px; color:red;"><br>No tiene aisgnado DNI/CIP</span>@else <span id="advertencia_responsable_planta_2" style="font-size:11px; color:red;"></span> @endif
                                    </div>
                                    <div class="col-sm-5 text-center" id="espacio_edit_responsable_planta_2" style="display:none; background-color:lightgrey; padding-top: 10px; padding-bottom:10px;">
                                        <a href="#!" class="regresar" data-idi="responsable_planta_2"><i class="fa fa-level-down" style="font-size:16px;"></i></a>
                                        {!! Form::text('nombres_responsable_planta_2', null, array('class' => 'form-control', 'placeholder'=>'Nombres y Apellidos', 'id'=>'nombres_responsable_planta_2', 'size'=>'5', 'style'=>'width:100%;')) !!}
                                        {!! Form::text('cip_responsable_planta_2', null, array('class' => 'form-control', 'placeholder'=>'DNI/CIP', 'id'=>'cip_responsable_planta_2', 'size'=>'5', 'size'=>'5', 'style'=>'width:100%;')) !!}
                                    </div>
                                    <div class="col-sm-5">Firma:</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-1 border_derecha">&nbsp;Lugar: </div>
                                    <div class="col-sm-2 border_derecha text-center">&nbsp;</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;Fecha: </div>
                                    <div class="col-sm-2 border_derecha text-center">&nbsp;</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;Hora: </div>
                                    <div class="col-sm-2 border_derecha text-center">&nbsp;</div>
                                </div>
                                <div class="row m-0 border_arriba" style="font-weight: bold;">
                                    <div class="col-sm-3">&nbsp;REFRENDOS: </div>
                                    <div class="col-sm-9 border_derecha text-center">Devolución del manifiesto al Generador (Responsable Ténico)</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-1">&nbsp;Nombres: </div>
                                    {!! Form::hidden('tipo_responsable_tecnico_3', 0, array('class' => 'form-control', 'id'=>'tipo_responsable_tecnico_3')) !!}
                                    <div class="col-sm-5 border_derecha text-center" id="espacio_select_responsable_tecnico_3" style="padding-bottom:10px; padding-top: 10px; background-color:lightgrey;">
                                        {!! Form::select('responsable_tecnico_3', $responsables_tecnicos, $responsable_tecnico, array('class' => 'responsable_tecnico', 'id'=>'responsable_tecnico_3', 'data-placeholder'=>'Seleccionar responsable', 'style'=>'width:100%;')) !!}
                                        @if ($advertencia_rt==1)<span id="advertencia_responsable_tecnico_3" style="font-size:11px; color:red;"><br>No tiene aisgnado DNI/CIP</span>@else <span id="advertencia_responsable_tecnico_3" style="font-size:11px; color:red;"></span> @endif
                                    </div>
                                    <div class="col-sm-5 text-center" id="espacio_edit_responsable_tecnico_3" style="display:none; background-color:lightgrey; padding-top: 10px; padding-bottom:10px;">
                                        <a href="#!" class="regresar" data-idi="responsable_tecnico_3"><i class="fa fa-level-down" style="font-size:16px;"></i></a>
                                        {!! Form::text('nombres_responsable_tecnico_3', null, array('class' => 'form-control', 'placeholder'=>'Nombres y Apellidos', 'id'=>'nombres_responsable_tecnico_3', 'size'=>'5', 'style'=>'width:100%;')) !!}
                                        {!! Form::text('dni_responsable_tecnico_3', null, array('class' => 'form-control', 'placeholder'=>'DNI/CIP', 'id'=>'dni_responsable_tecnico_3', 'size'=>'5', 'size'=>'5', 'style'=>'width:100%;')) !!}
                                    </div>
                                    <div class="col-sm-5">Firma:</div>
                                </div>
                                <div class="row m-0 border_arriba" style="font-weight: bold;">
                                    <div class="col-sm-12 border_derecha text-center">EPS-RS Transporte - Responsable</div>
                                </div>
                                <div class="row m-0 border_arriba" style="height:50px;">
                                    <div class="col-sm-1 border_derecha" style="height:50px;">&nbsp;Nombres: </div>
                                    <div class="col-sm-5 border_derecha text-center" style="height:50px;">JUAN CARLOS TORRES ESTRADA</div>
                                    <div class="col-sm-5" style="height:50px;">Firma:</div>
                                </div>
                                <div class="row m-0 border_arriba">
                                    <div class="col-sm-1 border_derecha">&nbsp;Lugar: </div>
                                    <div class="col-sm-2 border_derecha text-center">CUSCO</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;Fecha: </div>
                                    <div class="col-sm-2 border_derecha text-center">&nbsp;</div>
                                    <div class="col-sm-1 border_derecha">&nbsp;Hora: </div>
                                    <div class="col-sm-2 border_derecha text-center">&nbsp;</div>
                                </div>
                            </div>

                        </div>


                    </div><!-- row -->

                    <div class="text-right btn-invoice">
                        <button type="submit" class="btn btn-primary btn-lg mr5">Procesar</button>
                    </div>
                    {!! Form::close() !!}

                    <div class="mb30"></div>

                    <!--<div class="well nomargin">
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
            $(".planta_combo").select2();
            $('.planta_combo span').css('color', 'darkblue');
            $('.planta_combo span').css('font-weight', 'bold');

            $(".responsable_tecnico").select2();
            $('.responsable_tecnico span').css('color', 'darkblue');
            $('.responsable_tecnico span').css('font-weight', 'bold');



            $("#planta").change(function(){
                var idsucursal=$(this).val();
                $('#loader').addClass('is-active');
                $.ajax({
                    url: "{{ route('admin.planta.get_by_sucursal') }}?sucursal_id=" + idsucursal,
                    method: 'GET',
                    success: function (data) {
                        $('#loader').removeClass('is-active');
                        $('#planta_ruc').html("N° RUC: "+data.planta.ruc);
                        $('#planta_digesa').html(data.planta.registro_digesa);
                        $('#planta_vencimiento_digesa').html(data.planta.fecha_vencimiento_digesa);
                        $('#planta_autorizacion_sanitaria').html(data.planta.autorizacion_sanitaria);
                        $('#planta_autorizacion_municipal').html(data.planta.autorizacion_municipal);
                        $('#planta_direccion').html(data.sucursal.direccion);
                        $('#planta_numero').html(data.sucursal.numero);
                        $('#planta_distrito').html("&nbsp;Distrito: "+data.distrito);
                        $('#planta_provincia').html("&nbsp;Provincia: "+data.provincia);
                        $('#planta_departamento').html("&nbsp;Departamento: "+data.departamento);
                        $('#planta_telefono').html("&nbsp;Tlf(s). "+data.sucursal.telefono);
                        $('#planta_email').html("&nbsp;EMAIL: "+data.sucursal.email);
                        $('#planta_nombres_representante_legal').html("&nbsp;Representante legal: "+data.sucursal.nombres_representante_legal);
                        $('#planta_dni_representante_legal').html("&nbsp;DNI/CE: "+data.sucursal.dni_representante_legal);
                        $('#responsable_planta').html(data.html);
                        $("#responsable_planta").select2();

                        $('#responsable_planta_2').html(data.html);
                        $("#responsable_planta_2").select2();
                        $('.responsable_tecnico span').css('color', 'darkblue');
                        $('.responsable_tecnico span').css('font-weight', 'bold');
                        if (data.advertencia==1){
                            $('#advertencia_responsable_planta').html("<br>No tiene aisgnado DNI/CIP");
                            $('#advertencia_responsable_planta_2').html("<br>No tiene aisgnado DNI/CIP");
                        }else{
                            $('#advertencia_responsable_planta').html("");
                            $('#advertencia_responsable_planta_2').html("");
                        }
                    }
                });
            })

            $.fn.toggleSelect2 = function(state) {
                return this.each(function() {
                    $.fn[state ? 'show' : 'hide'].apply($(this).next('.select2-container'));
                });
            };

            $(".responsable_tecnico").change(function(){
                var id=$(this).attr('id');
                console.log(id);
                console.log($(this).val());
                if ($(this).val()=="0"){
                    console.log('entra');
                    $('#tipo_'+id).val(1);
                    $("#espacio_select_"+id).css('display','none');
                    $("#espacio_edit_"+id).slideDown('slow');
                    $('#advertencia_' + id).html("");
                }else{
                    if ($(this).val()!="") {
                        var partes = $(this).val().split(':');
                        //console.log("asdsadsadsa"+$(this).val());
                        if (partes[1].trim() == "") $('#advertencia_' + id).html("<br>No tiene aisgnado DNI/CIP"); else $('#advertencia_' + id).html("");
                    }else $('#advertencia_' + id).html("");
                }
            });

            $(".regresar").click(function(){
                var id=$(this).data('idi');
                console.log(id);
                $('#tipo_'+id).val(0);
                $("#espacio_edit_"+id).css('display','none');
                $("#espacio_select_"+id).slideDown('slow');
                $('#advertencia_'+id).html("");
            });

        });
    </script>
@endsection