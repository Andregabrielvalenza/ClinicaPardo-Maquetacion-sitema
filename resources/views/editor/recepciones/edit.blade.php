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
                        <li><a href="#!">Almacen</a></li>
                        <li><a href="{{ route('almacen') }}">Almacen</a></li>
                    </ul>
                    <h4>Editar elemento</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">

            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!--<div class="panel-btns">
                                <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <h4 class="panel-title">Editar elemento</h4>
                            <p>Los campos con <code>asterisco(*)</code> son obligatorios</p>
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
                        </div><!-- panel-heading -->

                        <div class="panel-body nopadding">
                            {!! Form::model($recepcion, ['method' => 'PATCH','route' => ['recepciones.update', $recepcion->id], 'class'=>'form-horizontal form-bordered']) !!}
                            <div class="form-group text-left">
                                <label class="col-sm-12 "><code>{{$recepcion->sucursal->cliente->razon_social}} - {{$recepcion->sucursal->direccion}} {{$recepcion->sucursal->numero}}</code></label>
                                <label class="col-sm-12 "><code>{{$recepcion->residuo->nombre}} - {{$recepcion->recipiente->nombre}}</code></label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nro. Recipientes<code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::text('nro_recipientes', null, array('placeholder' => 'Nro. Recipientes','class' => 'form-control','required')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Volumen<code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::text('volumen', null, array('placeholder' => 'L/gal/m3/Kg','class' => 'form-control','required')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Guia Remision Remitente</label>
                                <div class="col-sm-8">
                                    {!! Form::text('guia_remision_remitente', null, array('placeholder' => 'Guia Remision Remitente','class' => 'form-control')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <div class="col-sm-4 control-label">&nbsp;</div>
                                <div class="col-sm-8"><button type="submit" class="btn btn-success">Actualizar</button></div>
                            </div>

                            {!! Form::close() !!}
                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div>
            </div><!-- row -->

        </div><!-- contentpanel -->
    </div>
    </div><!-- mainwrapper -->
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection