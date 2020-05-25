@extends('layouts.sistema')

@section('content')

    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                @can('materiale-create')
                <div class="pull-right">
                    <a href="{{ route('materiales.create') }}" class="btn btn-success"><b><i class="fa fa-plus"></i></b></a>
                </div>
                @endcan
                <div class="pageicon pull-left">
                    <i class="fa fa-th-list"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href="/home"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><a href="#!">Residuos Sólidos</a></li>
                        <li>Materiales - Recipiente</li>
                    </ul>
                    <h4>Materiales - Recipiente</h4>

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
                                        <label for="checkName">Material</label>
                                    </div>
                                </li>
                                @canany('materiale-edit','materiale-delete')
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
                    <h2 class="panel-title">Lista de Materiales</h2>
                    <p>En esta sección puede procesar toda la información referida a a los materiales de los recipientes de los residuos sólidos</p>
                </div><!-- panel-heading -->

                <table id="basicTable" class="table table-striped table-bordered responsive">
                    <thead class="">
                    <tr>
                        <th>Material</th>
                        @canany('materiale-edit','materiale-delete')<th>Acciones</th>@endcanany
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($data as $key => $material)
                        <tr>
                            <td>{{ $material->nombre }}</td>
                            @canany('materiale-edit','materiale-delete')
                            <td>
                                @can('materiale-edit')
                                <a class="btn btn-primary btn-bordered btn-xs" style="border:none;" href="{{ route('materiales.edit',$material->id) }}"> <i class="fa fa-pencil-square"></i> Editar</a>
                                @endcan
                                @can('materiale-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['materiales.destroy', $material->id],'style'=>'display:inline']) !!}
                                <button onclick="return confirm('Seguro que desea eliminar este material')" class="btn btn-danger btn-bordered btn-xs" style="border:none" type="submit"><i class="fa fa-times-circle"></i> Eliminar</button>
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