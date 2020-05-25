@extends('layouts.sistema')

@section('content')

    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pull-right">
                    <a href="{{ route('manifiestos.historial') }}" class="btn btn-primary" title="Ver historial de manifiestos"><b><i class="fa fa-history"></i></b></a>
                </div>
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href="/home"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><a href="#!">Manifiestos</a></li>
                        <li>Manifiestos</li>
                    </ul>
                    <h4>Manifiestos</h4>
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
                                        <label for="checkName">Numero</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkFecha" value="1">
                                        <label for="checkFecha">Fecha registro</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkPosition" value="2">
                                        <label for="checkPosition">Cliente</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkOffice" value="3">
                                        <label for="checkOffice">Destino</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkResiduo" value="4">
                                        <label for="checkResiduo">Tipos de residuo</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkCantidad" value="5">
                                        <label for="checkCantidad">Cantidad</label>
                                    </div>
                                </li>

                                @canany('manifiesto-edit','manifiesto-show')
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkAge" value="6">
                                        <label for="checkAge">Acciones</label>
                                    </div>
                                </li>
                                @endcanany
                            </ul>
                        </div>
                    </div>
                    <h2 class="panel-title">Lista de Manifiestos</h2>
                    <p>En esta sección puedes acceder a los manifiestos pendientes.</p>
                </div><!-- panel-heading -->

                <table id="basicTable" class="table table-striped table-bordered responsive">
                    <thead class="">
                    <tr>
                        <th>Numero</th>
                        <th>Fecha registro</th>
                        <th>Cliente</th>
                        <th>Destino</th>
                        <th>Residuos</th>
                        <th>Cantidad</th>
                        <th>GR.Remitente</th>
                        <th>GR.Transportista</th>
                        @canany('manifiesto-edit','manifiesto-show')<th>Acciones</th>@endcanany
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($data as $key => $manifiesto)
                        <?php $total=0; $bandera=1;?>
                        @foreach ($manifiesto->detalles as $detalle)
                            <?php $total=$total+$detalle->recepcion->volumen;?>
                        @endforeach
                        @if ($manifiesto->nombres_responsable_tecnico_1=="" || $manifiesto->dni_responsable_tecnico_1=="" || $manifiesto->nombres_responsable_tecnico_2=="" || $manifiesto->dni_responsable_tecnico_2=="" || $manifiesto->nombres_responsable_tecnico_3=="" || $manifiesto->dni_responsable_tecnico_3=="" || $manifiesto->planta_nombres_responsable_tecnico_1=="" || $manifiesto->planta_cip_responsable_tecnico_1=="" || $manifiesto->planta_nombres_responsable_tecnico_2=="" || $manifiesto->planta_cip_responsable_tecnico_2=="")
                            <?php $bandera=0;?>
                        @endif
                    <tr>
                        <td >@if ($total==0 || $bandera==0) <label class="badge badge-danger">{{ $manifiesto->numero }}</label> @else {{ $manifiesto->numero }} @endif</td>
                        <td>{{ date('d/m/Y',strtotime($manifiesto->created_at)) }}</td>
                        <td>{{ $manifiesto->sucursalcliente->cliente->razon_social }}</td>
                        <td>{{ $manifiesto->sucursalplanta->planta->razon_social }}</td>
                        <td>
                            <?php $total=0; $array_residuos=array(); ?>
                            @foreach ($manifiesto->detalles as $detalle)
                                @if (!in_array($detalle->recepcion->residuo->nombre, $array_residuos))
                                <div style="line-height:1; font-size:11px; margin-top:6px;">{{ $detalle->recepcion->residuo->nombre }}</div>
                                <?php $array_residuos[]=$detalle->recepcion->residuo->nombre; $guia_rr=$detalle->recepcion->guia_remision_remitente?>
                                @endif
                                <?php $total=$total+$detalle->recepcion->volumen;?>
                            @endforeach
                        </td>
                        <td>{{$total}} {{$manifiesto->detalles[0]->recepcion->residuo->unidad}}</td>
                        <td>{{$guia_rr}}</td>
                        <td>{{$manifiesto->guia_remision_transportista}}</td>
                        @canany('manifiesto-edit','manifiesto-show')
                        <td>
                            @can('manifiesto-edit')
                            <a class="btn btn-primary btn-bordered btn-xs" style="border:none;" href="{{ route('manifiestos.edit',$manifiesto->id) }}"> <i class="fa fa-pencil-square"></i> Editar</a>
                            @endcan
                            @can('manifiesto-show')
                            <a class="btn btn-success btn-bordered btn-xs" style="border:none;" href="{{ route('manifiestos.show',$manifiesto->id) }}" target="_blank"> <i class="fa fa-print"></i> Imprimir</a>
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
                "order": [[ 0, "desc" ]],
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