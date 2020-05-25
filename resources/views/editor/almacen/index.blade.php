@extends('layouts.sistema')

@section('content')

    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href="/home"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><a href="#!">Almacen</a></li>
                        <li>Almacen</li>
                    </ul>
                    <h4>Almacen</h4>

                </div>

            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">

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
                                        <label for="checkName">Fecha recepcion</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkRemitente" value="1">
                                        <label for="checkRemitente">GR-Remitente</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkPosition" value="2">
                                        <label for="checkPosition">Razon Social/Sucursal</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkResiduo" value="3">
                                        <label for="checkResiduo">Residuo</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkDetalles" value="4">
                                        <label for="checkDetalles">Detalles</label>
                                    </div>
                                </li>
                                @canany('manifiesto-create','manifiesto-edit')
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
                    <h2 class="panel-title">Lista de Residuos Solidos</h2>
                    <p>Desde esta sección usted puede generar los manifiestos.</p>
                </div><!-- panel-heading -->

                <script>
                    function generarColor(str){
                        var hash = 0;
                        for (var i = 0; i < str.length; i++) {
                            hash = str.charCodeAt(i) + ((hash << 5) - hash);
                        }
                        var colour = '#';
                        for (var i = 0; i < 3; i++) {
                            var value = (hash >> (i * 8)) & 0xFF;
                            colour += ('00' + value.toString(16)).substr(-2);
                        }
                        return colour;
                    }
                </script>
                <table id="basicTable" class="table table-striped table-bordered responsive">
                    <thead class="">
                    <tr>
                        <th>Fecha recepción</th>
                        <th>GR-Remitente</th>
                        <th>Razon Social/Sucursal</th>
                        <th>Residuo</th>
                        <th>Detalles</th>
                        @can('manifiesto-create')<th>Acciones</th>@endcan
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($data as $key => $recepcion)
                        <tr>
                            <td>{{ date('d/m/Y h:i A',strtotime($recepcion->programacion->fecha_recepcion)) }}</td>
                            <td><span  id="fila_{{$recepcion->id}}" class="glyphicon glyphicon-tag"></span> {{ $recepcion->guia_remision_remitente }}</td>
                            <script>
                                var cadena="";
                                @if ($recepcion->residuo->junto==1)
                                cadena="axthoae";
                                @else cadena="98765437859";
                                @endif
                                var color=generarColor(cadena+'{{ $recepcion->guia_remision_remitente }}-{{ $recepcion->sucursal->direccion }}-');
                                document.getElementById("fila_"+{{$recepcion->id}}).style.color=color;
                            </script>
                            <td style="font-size:11px;">{{ $recepcion->programacion->cliente->razon_social }}<br>{{ $recepcion->sucursal->direccion }} {{ $recepcion->sucursal->numero }}</td>
                            <td>{{ $recepcion->residuo->nombre }} </td>
                            <td>{{ $recepcion->nro_recipientes }} {{ $recepcion->recipiente->nombre }} = {{ $recepcion->volumen }}{{$recepcion->residuo->unidad}}</td>
                            @canany('manifiesto-create')
                            <td>
                                @can('manifiesto-create')
                                @if ($recepcion->guia_remision_remitente!="" && $recepcion->guia_remision_remitente!=null)
                                <a class="btn btn-success btn-bordered btn-xs" style="border:none;" href="{{ route('manifiestos.create',['recepcion'=>$recepcion->id]) }}"> <i class="fa fa-pencil-square"></i> Generar manifiesto</a>
                                @endif
                                @endcan
                                @can('manifiesto-edit')
                                <a class="btn btn-primary btn-bordered btn-xs" style="border:none;" href="{{ route('recepciones.edit',$recepcion->id) }}"> <i class="fa fa-pencil-square"></i> Editar</a>
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