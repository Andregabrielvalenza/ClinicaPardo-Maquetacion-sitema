@extends('layouts.sistema')

@section('content')

    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                @can('planta-create')
                <div class="pull-right">
                    <a href="{{ route('plantas.create') }}" class="btn btn-success"><b><i class="fa fa-plus"></i></b></a>
                </div>
                @endcan
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href="/home"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><a href="#!">Residuos Sólidos</a></li>
                        <li>Plantas de procesamiento</li>
                    </ul>
                    <h4>Plantas de procesamiento</h4>

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
                                        <label for="checkName">Razon Social</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkOffice" value="1">
                                        <label for="checkOffice">RUC/DNI</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkDigesa" value="2">
                                        <label for="checkDigesa">Registro DIGESA</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkSanitaria" value="3">
                                        <label for="checkSanitaria">Autorizacion Sanitaria</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkMunicipal" value="4">
                                        <label for="checkMunicipal">Autorización Municipal</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ckbox ckbox-primary">
                                        <input type="checkbox" checked="checked" id="checkSucursales" value="5">
                                        <label for="checkSucursales">Sucursales</label>
                                    </div>
                                </li>
                                @canany('planta-edit','planta-delete')
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
                    <h2 class="panel-title">Lista de Plantas de procesamiento</h2>
                    <p>En esta sección puedes procesar toda la información referida a las plantas de procesamiento de residuos sólidos.</p>
                </div><!-- panel-heading -->

                <table id="basicTable" class="table table-striped table-bordered responsive">
                    <thead class="">
                    <tr>
                        <th>Razon Social</th>
                        <th>RUC/DNI</th>
                        <th>Registro DIGESA</th>
                        <th>Auto. Sanitaria</th>
                        <th>Auto. Municipal</th>
                        <th>Sucursales</th>
                        @canany('planta-edit','planta-delete')<th>Acciones</th>@endcanany
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($data as $key => $planta)
                        <tr>
                            <td>{{ $planta->razon_social }}</td>
                            <td>{{ $planta->ruc }}</td>
                            <td>{{ $planta->registro_digesa }}<br><b>Vence:</b> {{ date('d/m/Y',strtotime($planta->fecha_vencimiento_digesa)) }}</td>
                            <td>{{ $planta->autorizacion_sanitaria }}</td>
                            <td>{{ $planta->autorizacion_municipal }}</td>
                            <td style="font-size: 12px; text-transform: lowercase;">
                                @foreach ($planta->sucursales as $key => $sucursal)
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#ubic-{{$sucursal->id}}" data-toggle="tab"><strong> <i class="fa fa-map-marker"></i></strong></a></li>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                            <i class="fa fa-user"></i> <span class="caret"></span>                                        </a>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            <li><a href="#rl-{{$sucursal->id}}" data-toggle="tab">Representante legal</a></li>
                                            <li><a href="#rt-{{$sucursal->id}}" data-toggle="tab">Contacto técnico</a></li>
                                            <li><a href="#rc-{{$sucursal->id}}" data-toggle="tab">Contacto contabilidad</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        @canany('plantasucursal-edit','plantasucursal-delete')
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                            <i class="fa fa-wrench"></i> <span class="caret"></span>                                        </a>
                                        <ul role="menu" class="dropdown-menu pull-right">
                                            @can('plantasucursal-edit')
                                            <li><a href="{{ route('sucursales-planta.edit',$sucursal->id) }}">Editar Sucursal</a></li>
                                            @endcan
                                            @can('plantasucursal-delete')
                                            <li> {!! Form::open(['method' => 'DELETE','route' => ['sucursales-planta.destroy', $sucursal->id],'style'=>'display:inline']) !!}
                                                <button onclick="return confirm('Seguro que desea eliminar esta sucursal')" class="btn btn-danger btn-bordered btn-xs" style="border:none" type="submit"><i class="fa fa-times-circle"></i> Eliminar</button>
                                                {!! Form::close() !!}
                                            </li>
                                            @endcan
                                        </ul>
                                        @endcanany
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content" style="margin-bottom:0.5rem;">
                                    <div class="tab-pane active" id="ubic-{{$sucursal->id}}">
                                        <p style="text-transform: uppercase;"><i class="fa fa-location-arrow"></i> {{$sucursal->direccion}} - {{$sucursal->numero}}<br>
                                            <span style="text-transform: none;"><i class="fa fa-envelope"></i> {{$sucursal->email}}</span><br>
                                            <i class="fa fa-phone"></i> {{$sucursal->telefono}}<br>
                                            <span style="text-transform: capitalize;"> {{$sucursal->distrito->nombre}} / {{$sucursal->distrito->provincia->nombre}} / {{$sucursal->distrito->provincia->departamento->nombre}}</span>
                                        </p>
                                    </div><!-- tab-pane -->

                                    <div class="tab-pane" id="rl-{{$sucursal->id}}">
                                        <p><i class="fa fa-user"></i> {{$sucursal->nombres_representante_legal}}<br>
                                            <i class="fa fa-file-photo-o"></i> {{$sucursal->dni_representante_legal}}<br>
                                            <i class="fa fa fa-envelope"></i> {{$sucursal->email_representante_legal}}<br>
                                            <span class="glyphicon glyphicon-phone"></span> {{$sucursal->telefono_representante_legal}}<br>
                                        </p>
                                    </div><!-- tab-pane -->

                                    <div class="tab-pane" id="rt-{{$sucursal->id}}">
                                        <p><i class="fa fa-user"></i> {{$sucursal->nombres_responsable_tecnico}}<br>
                                            <i class="fa fa-file-photo-o"></i> {{$sucursal->dni_responsable_tecnico}}<br>
                                            <i class="fa fa fa-envelope"></i> {{$sucursal->email_responsable_tecnico}}<br>
                                            <span class="glyphicon glyphicon-phone"></span> {{$sucursal->telefono_responsable_tecnico}}<br>
                                            CIP:{{$sucursal->cip_responsable_tecnico}}<br>
                                        </p>
                                    </div><!-- tab-pane -->

                                    <div class="tab-pane" id="rc-{{$sucursal->id}}">
                                        <p><i class="fa fa-user"></i> {{$sucursal->nombres_responsable_contabilidad}}<br>
                                            <i class="fa fa-file-photo-o"></i> {{$sucursal->dni_responsable_contabilidad}}<br>
                                            <i class="fa fa fa-envelope"></i> {{$sucursal->email_responsable_contabilidad}}<br>
                                            <span class="glyphicon glyphicon-phone"></span> {{$sucursal->telefono_responsable_contabilidad}}<br></p>
                                    </div><!-- tab-pane -->

                                </div><!-- tab-content -->
                                @endforeach
                                @can('plantasucursal-create')
                                <div class="text-right">
                                    <a href="{{ route('sucursales-planta.create', ['planta'=>$planta->id]) }}" class="btn btn-success btn-xs"><b><i class="fa fa-plus"></i></b></a>
                                </div>
                                @endcan

                            </td>
                            @canany('planta-edit','planta-delete')
                            <td>
                                @can('planta-edit')
                                <a class="btn btn-primary btn-bordered btn-xs" style="border:none;" href="{{ route('plantas.edit',$planta->id) }}"> <i class="fa fa-pencil-square"></i> Editar</a>
                                @endcan
                                @can('planta-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['plantas.destroy', $planta->id],'style'=>'display:inline']) !!}
                                <button onclick="return confirm('Seguro que desea eliminar esta Planta de procesamiento')" class="btn btn-danger btn-bordered btn-xs" style="border:none" type="submit"><i class="fa fa-times-circle"></i> Eliminar</button>
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