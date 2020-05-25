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
                        <li><a href="#!">Accesos</a></li>
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                    </ul>
                    <h4>Editar</h4>
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
                            <h4 class="panel-title">Editar Rol</h4>
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
                            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id], 'class'=>'form-horizontal form-bordered']) !!}
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Rol <code>(*)</code></label>
                                <div class="col-sm-8">
                                    {!! Form::text('name', null, array('placeholder' => 'Admin','class' => 'form-control','required')) !!}
                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Permisos <code>(*)</code></label>
                                <div class="col-sm-8">
                                    <select id="permisos" name="permission[]" required data-placeholder="Seleccionar permisos" multiple class="width300">
                                        <?php $seccion=""; $seccion_nuevo="";?>
                                        @foreach($permission as $value)
                                            <?php $seccion_nuevo=explode('-',$value->name)[0];?>
                                            @if ($seccion_nuevo!=$seccion)
                                                <optgroup label="{{strtoupper($seccion_nuevo)}}S">
                                                    @endif
                                                    <option value="{{$value->id}}" {{in_array($value->id, $rolePermissions) ? "selected" : false}}>{{ $value->name }}</option>
                                                    <?php $seccion=$seccion_nuevo;?>
                                                    @if ($seccion_nuevo!=$seccion)
                                                </optgroup>
                                            @endif
                                        @endforeach

                                    </select>

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
            $("#permisos").select2({minimumResultsForSearch: 5});
        });
    </script>
@endsection