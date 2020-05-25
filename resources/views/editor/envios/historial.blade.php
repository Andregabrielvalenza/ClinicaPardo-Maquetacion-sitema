@extends('layouts.sistema')

@section('content')

    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <!--<div class="pull-right">
                    <a href="{{ route('envios.historial') }}" class="btn btn-primary" title="Ver historial de envios"><b><i class="fa fa-history"></i></b></a>
                </div>-->
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href="/home"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><a href="{{ route('envios.index') }}">Envios</a></li>
                        <li><a href="{{ route('envios.index') }}">Envios</a></li>
                    </ul>
                    <h4>Historial de envios</h4>

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
                            </ul>
                        </div>
                    </div>
                    <h2 class="panel-title">Lista de Envios Pendientes</h2>
                    <p>En esta sección puede procesar toda la información referida a sus envios pendientes.</p>
                </div><!-- panel-heading -->

                <table id="basicTable" class="table table-striped table-bordered responsive">
                    <thead class="">
                    <tr>
                        <th>Fecha Envío</th>
                        <th>Vehiculo</th>
                        <th>Conductor</th>
                        <th>Manifiestos/GR-Remitente/GR-Transportista</th>
                        <th>Carga Total</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($envios as $key => $envio)
                        <tr>
                            <td>{{ date('d/m/Y',strtotime($envio->fecha_envio)) }}</td>
                            <td>{{ $envio->transporte->full_data }}</td>
                            <td>{{ $envio->conductor->nombres }}</td>
                            <td>
                                @foreach ($envio->detalles as $detalle)
                                    <a href="{{ route('manifiestos.show',$detalle->manifiesto->id) }}" target="_blank"><label class="badge badge-success" style="cursor: pointer;">{{$detalle->manifiesto->numero}}</label></a>
                                    &nbsp;/&nbsp;
                                    {{$detalle->manifiesto->guia_remision_transportista}}
                                    &nbsp;/&nbsp;
                                    <label class="badge badge-success" style="cursor: pointer;">{{$detalle->manifiesto->detalles[0]->recepcion->guia_remision_remitente}}</label><br>
                                @endforeach
                            </td>

                            <td>
                                {{$envio->peso}}
                            </td>
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
            $.fn.dataTable.moment('DD[/]MM[/]YYYY');
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