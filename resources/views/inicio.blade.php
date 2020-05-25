@extends('layouts.sistema')

@section('content')



            <div class="mainpanel">
                <div class="pageheader">
                    <div class="media">
                        @can('programacione-create')
                        <div class="pull-right">
                            <a href="{{ route('programaciones.create') }}" class="btn btn-success"><b><i class="fa fa-plus"></i></b></a>
                        </div>
                        @endcan
                        <div class="pageicon pull-left">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="media-body">
                            <ul class="breadcrumb">
                                <li><a href="/home"><i class="glyphicon glyphicon-home"></i></a></li>
                                <li>Programación</li>
                            </ul>
                            <h4>Programación</h4>
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
                                                <label for="checkName">Fecha y Hora</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ckbox ckbox-primary">
                                                <input type="checkbox" checked="checked" id="checkPosition" value="1">
                                                <label for="checkPosition">Cliente</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ckbox ckbox-primary">
                                                <input type="checkbox" checked="checked" id="checkSucursal" value="2">
                                                <label for="checkSucursal">Recepcionar en</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ckbox ckbox-primary">
                                                <input type="checkbox" checked="checked" id="checkTransporte" value="3">
                                                <label for="checkTransporte">Transporte</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ckbox ckbox-primary">
                                                <input type="checkbox" checked="checked" id="checkConductor" value="4">
                                                <label for="checkConductor">Responsable</label>
                                            </div>
                                        </li>
                                        @canany('programacione-edit','programacione-delete')
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
                            <h2 class="panel-title">Programación</h2>
                            <p>En esta sección puede procesar toda la información referida a la programación de trabajo.</p>
                        </div><!-- panel-heading -->

                        <table id="basicTable" class="table table-striped table-bordered responsive">
                            <thead class="">
                            <tr>
                                <th>Fecha y Hora</th>
                                <th>Cliente</th>
                                <th>Recepcionar en</th>
                                <th>Transporte</th>
                                <th>Responsable</th>
                                @canany('programacione-edit','programacione-delete')<th>Acciones</th>@endcanany
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($data as $key => $programacion)
                                <tr>
                                    <td>{{ date('d/m/Y',strtotime($programacion->fecha)) }} {{ date('h:i A',strtotime($programacion->hora)) }}</td>
                                    <td>{{ $programacion->cliente->razon_social }}</td>
                                    <td>{{ $programacion->sucursal->direccion }} {{ $programacion->sucursal->numero }}</td>
                                    <td>{{ $programacion->transporte->marca }} {{ $programacion->transporte->modelo }} {{ $programacion->transporte->tipo_vehiculo }}<br><b>Placa:</b> {{ $programacion->transporte->placa }}</td>
                                    <td>{{ $programacion->conductor->nombres }}</td>
                                    @canany('programacione-edit','programacione-delete')
                                    <td>
                                        @can('programacione-create')
                                        <a class="btn btn-warning btn-bordered btn-xs" style="border:none;" href="{{ route('clonar-programacion', $programacion->id) }}"> <i class="fa fa-plus"></i> Clonar</a><br>
                                        @endcan
                                        @can('programacione-procesar')
                                        <a class="btn btn-success btn-bordered btn-xs" style="border:none;" href="{{ route('procesar-programacion', $programacion->id) }}"> <i class="fa fa-pencil-square"></i> Procesar</a><br>
                                        @endcan
                                        @can('programacione-edit')
                                        <a class="btn btn-primary btn-bordered btn-xs" style="border:none;" href="{{ route('programaciones.edit',$programacion->id) }}"> <i class="fa fa-pencil-square"></i> Editar</a>
                                        @endcan
                                        @can('programacione-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['programaciones.destroy', $programacion->id],'style'=>'display:inline']) !!}
                                        <button onclick="return confirm('Seguro que desea eliminar esta programacion')" class="btn btn-danger btn-bordered btn-xs" style="border:none" type="submit"><i class="fa fa-times-circle"></i> Eliminar</button>
                                        {!! Form::close() !!}
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
            $.fn.dataTable.moment('DD[/]MM[/]YYYY h:mm a');
            console.log(moment().format('DD[/]MM[/]YYYY h:mm a'));
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