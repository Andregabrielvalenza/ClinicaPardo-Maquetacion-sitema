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
                        <li><a href="#!">Residuos Sólidos</a></li>
                        <li><a href="{{ route('tipo-residuos.index') }}">Tipos de residuo</a></li>
                    </ul>
                    <h4>Registrar</h4>
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
                            <h4 class="panel-title">Registrar Tipo de residuo</h4>
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
                            {!! Form::open(array('route' => 'tipo-residuos.store','method'=>'POST','class'=>'form-horizontal form-bordered')) !!}
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tipo de residuo <code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::text('nombre', null, array('placeholder' => 'Biocontaminados','class' => 'form-control','required')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Peligrosidad <code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::select('peligrosidades[]', $peligrosidades,[], array('class' => 'width300','multiple', 'required', 'id'=>'peligrosidades', 'data-placeholder'=>'Seleccionar peligrosidad')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Recipientes <code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::select('recipientes[]', $recipientes,[], array('class' => 'width300','multiple', 'required', 'id'=>'recipientes', 'data-placeholder'=>'Seleccionar recipientes')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tipo de carga <code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::select('tipo_carga_id', array(""=>"Seleccionar tipo")+$tiposcarga,null, array('class' => 'width300', 'required', 'id'=>'tipocarga', 'data-placeholder'=>'Seleccionar tipo de carga')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Estado <code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::select('estado', array(""=>"Seleccionar estado", "Sólido"=>"Sólido", "Semi Sólido"=>"Semi Sólido", "Líquido"=>"Líquido"),null, array('class' => 'width300', 'required', 'id'=>'estado', 'data-placeholder'=>'Seleccionar estado')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Unidad <code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::select('unidad', array(""=>"Seleccionar unidad", "Kg."=>"Kg (Kilogramos)", "L."=>"L (Litros)", "Unid."=>"Unid. (Unidades)", "Gl."=>"Gl. (Galones)"),null, array('class' => 'width300', 'required', 'id'=>'unidad', 'data-placeholder'=>'Seleccionar unidad')) !!}

                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <div class="col-sm-4 control-label">&nbsp;</div>
                                <div class="col-sm-8"><button type="submit" class="btn btn-success">Registrar</button></div>
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
            $("#peligrosidades").select2({minimumResultsForSearch: 5});
            $("#recipientes").select2({minimumResultsForSearch: 5});
            $("#tipocarga").select2();
            $("#estado").select2();
            $("#unidad").select2();
        });
    </script>
@endsection