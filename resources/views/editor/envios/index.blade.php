@extends('layouts.sistema')

@section('content')

    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pull-right">
                    <a href="{{ route('envios.historial') }}" class="btn btn-primary" title="Ver historial de envios"><b><i class="fa fa-history"></i></b></a>
                </div>
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href="/home"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><a href="#!">Envios</a></li>
                        <li>Envios</li>
                    </ul>
                    <h4>Envios pendientes</h4>

                </div>

            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="panel panel-dark-head">
                <div class="panel-heading" style="margin-bottom:2rem;">
                    <div class="pull-right">
                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-sm mt5 btn-white noborder dropdown-toggle" type="button">
                                +/- Columnas <span class="caret"></span>
                            </button>
                            <ul role="menu" id="shCol" class="dropdown-menu dropdown-menu-sm pull-right">
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkName" value="0">
                                        <label for="checkName">Nombres y Apellidos</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkPosition" value="1">
                                        <label for="checkPosition">DNI</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkOffice" value="2">
                                        <label for="checkOffice">Telefono</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkEmail" value="3">
                                        <label for="checkEmail">Email</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkLicencia" value="4">
                                        <label for="checkLicencia">Licencia</label>
                                    </div>
                                </li>
                                @canany('envio-create')
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkAge" value="5">
                                        <label for="checkAge">Acciones</label>
                                    </div>
                                </li>
                                @endcanany
                            </ul>
                        </div>
                    </div>
                    <h2 class="panel-title">Lista de Envios Pendientes</h2>
                    <p>En esta sección puede procesar toda la información referida a sus envios pendientes.</p>
                </div><!-- panel-heading -->

                <table id="basicTable" class="table table-striped table-bordered responsive">
                    <thead class="">
                    <tr>
                        <th>Vehiculo</th>
                        <th>Conductor</th>
                        <th>Manifiestos/GR-Remitente/GR-Transportista</th>
                        <th>Carga Total</th>
                        @canany('envio-create')<th>Acciones</th>@endcanany
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($vehiculos as $key => $vehiculo)
                        <tr>
                            <td>{{ $vehiculo->full_data }}</td>
                            <td>@if (count($vehiculo->cargaasignada)>0)
                                {{$vehiculo->cargaasignada[0]->conductor->nombres}}
                                @else
                                --
                                @endif
                            </td>
                            <td>
                                @if (count($vehiculo->cargaasignada)>0)
                                    @foreach ($vehiculo->cargaasignada as $manifiesto)
                                    <?php $total=0; $bandera=1;?>
                                    @foreach ($manifiesto->detalles as $detalle)
                                        <?php $total=$total+$detalle->recepcion->volumen;?>
                                    @endforeach
                                    @if ($manifiesto->nombres_responsable_tecnico_1=="" || $manifiesto->dni_responsable_tecnico_1=="" || $manifiesto->nombres_responsable_tecnico_2=="" || $manifiesto->dni_responsable_tecnico_2=="" || $manifiesto->nombres_responsable_tecnico_3=="" || $manifiesto->dni_responsable_tecnico_3=="" || $manifiesto->planta_nombres_responsable_tecnico_1=="" || $manifiesto->planta_cip_responsable_tecnico_1=="" || $manifiesto->planta_nombres_responsable_tecnico_2=="" || $manifiesto->planta_cip_responsable_tecnico_2=="")
                                        <?php $bandera=0;?>
                                    @endif

                                    @if ($total==0 || $bandera==0)
                                    <a href="{{ route('manifiestos.edit',[$manifiesto->id,'origen'=>'envios']) }}"><label class="badge badge-danger" style="cursor: pointer;">{{$manifiesto->numero}}</label></a>
                                    @else
                                    <a href="{{ route('manifiestos.show',$manifiesto->id) }}" target="_blank"><label class="badge badge-success" style="cursor: pointer;">{{$manifiesto->numero}}</label></a>
                                    @endif
                                    &nbsp;/ {{$manifiesto->detalles[0]->recepcion->guia_remision_remitente}} / <label class="badge badge-success">{{$manifiesto->guia_remision_transportista}}</label><br>
                                    @endforeach
                                @else
                                    --
                                @endif
                            </td>
                            <td>
                                <?php $carga_total=0;?>
                                @if (count($vehiculo->cargaasignada)>0)
                                    @if ($vehiculo->unidad_carga=="TM")
                                        @foreach ($vehiculo->cargaasignada as $carga)
                                            @foreach ($carga->detalles as $detalle)
                                                <?php $carga_total+=$detalle->recepcion->volumen;?>
                                            @endforeach
                                        @endforeach
                                        <?php $aux=number_format($carga_total/1000,2,'.',' '); $cargaactual='('.$aux.$vehiculo->unidad_carga.' de '.$vehiculo->carga.$vehiculo->unidad_carga.')'; ?>
                                    @elseif ($vehiculo->unidad_carga=="L")
                                        @foreach ($vehiculo->cargaasignada as $carga)
                                            @foreach ($carga->detalles as $detalle)
                                                <?php $carga_total+=$detalle->recepcion->volumen;?>
                                            @endforeach
                                        @endforeach
                                        <?php $aux=number_format($carga_total*3.785,2,'.',' '); $cargaactual='('.$aux.$vehiculo->unidad_carga.' de '.$vehiculo->carga.$vehiculo->unidad_carga.')'; ?>
                                    @endif
                                    <?php $variable=$aux.$vehiculo->unidad_carga;?>
                                    {{$cargaactual}}
                                @else
                                    --
                                @endif
                            </td>
                            @canany('envio-create')
                            <td>
                                @can('envio-create')
                                    @if (count($vehiculo->cargaasignada)>0)
                                    <a class="btn btn-success btn-bordered btn-xs" style="border:none;" href="{{ route('envios.create',['vehiculo'=>$vehiculo->id,'carga'=>$variable]) }}"> <i class="fa fa-pencil-square"></i> Procesar</a>
                                    @else
                                        --
                                    @endif
                                @endcan

                            </td>
                            @endcanany
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- panel -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->
    </div><!-- mainwrapper -->
    </section>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            var shTable = $('#basicTable').DataTable({

                dom: 'lBfrtip',
                responsive: true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontro resultado",
                    "info": "Página _PAGE_ - _PAGES_ de _MAX_ registros",
                    "infoEmpty": "Sin información",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar",
                    paginate: {
                        previous: '‹',
                        next:     '›'
                    }
                },
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }
                        ]
                    }
                ]
            });


            $('#shCol').click(function(event){
                event.stopPropagation();
            });

            $('#shCol input').on('click', function() {

                // Get the column API object
                var column = shTable.column($(this).val());

                // Toggle the visibility
                if ($(this).is(':checked'))
                    column.visible(true);
                else
                    column.visible(false);
            });
        });
    </script>
@endsection