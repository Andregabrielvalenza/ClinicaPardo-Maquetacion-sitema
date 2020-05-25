@extends('layouts.sistema')

@section('content')

    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                @can('conductore-create')
                <div class="pull-right">
                    <a href="{{ route('conductores.create') }}" class="btn btn-success"><b><i class="fa fa-plus"></i></b></a>
                </div>
                @endcan
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href="/home"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><a href="#!">Data Interna</a></li>
                        <li>Conductores</li>
                    </ul>
                    <h4>Conductores</h4>

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
                                @canany('conductore-edit','conductore-delete')
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
                    <h2 class="panel-title">Lista de Conductores</h2>
                    <p>En esta sección puede procesar toda la información referida a sus conductores.</p>
                </div><!-- panel-heading -->

                <table id="basicTable" class="table table-striped table-bordered responsive">
                    <thead class="">
                    <tr>
                        <th>Nombres y Apellidos</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Licencia</th>
                        @canany('conductore-edit','conductore-delete')<th>Acciones</th>@endcanany
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($data as $key => $conductor)
                        <tr>
                            <td>{{ $conductor->nombres }}</td>
                            <td>{{ $conductor->dni }}</td>
                            <td>{{ $conductor->telefono }}</td>
                            <td>{{ $conductor->email }}</td>
                            <td>{{ $conductor->tipo_licencia }} {{$conductor->nro_licencia}}</td>
                            @canany('conductore-edit','conductore-delete')
                            <td>
                                @can('conductore-edit')
                                <a class="btn btn-primary btn-bordered btn-xs" style="border:none;" href="{{ route('conductores.edit',$conductor->id) }}"> <i class="fa fa-pencil-square"></i> Editar</a>
                                @endcan
                                @can('conductore-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['conductores.destroy', $conductor->id],'style'=>'display:inline']) !!}
                                <button onclick="return confirm('Seguro que desea eliminar este conductor')" class="btn btn-danger btn-bordered btn-xs" style="border:none" type="submit"><i class="fa fa-times-circle"></i> Eliminar</button>
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