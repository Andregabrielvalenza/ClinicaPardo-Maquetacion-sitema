@extends('layouts.sistema')
@section('content')
            <div class="mainpanel">
                <div class="pageheader">
                    <div class="media">
                        <div class="pageicon pull-left">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="media-body">
                            <ul class="breadcrumb">
                                <li><a href="/dashboard"><i class="glyphicon glyphicon-home"></i></a></li>
                                <li>Dashboard</li>
                            </ul>
                            <h4>Dashboard</h4>
                        </div>
                    </div><!-- media -->
                </div><!-- pageheader -->

                <div class="contentpanel contentpanel-wizard">
                    <div class="row">
                        <div class="col-12 col-lg-10 col-lg-offset-1">
                            <h5 class="lg-title">Wizard with Progress Bar</h5>
                            <p class="mb20">Same with basic wizard setup but with progress bar.</p>

                            <!-- PROGRESS WIZARD -->
                            <form method="post" id="progressWizard" class="panel-wizard">
                                <ul class="nav nav-justified nav-wizard nav-wizard-primary">
                                    <li><a href="#tab1-2" data-toggle="tab"><strong>Paso 1:</strong> Usuario</a></li>
                                    <li><a href="#tab2-2" data-toggle="tab"><strong>Paso 2:</strong> Configuracion</a></li>
                                    <li><a href="#tab3-2" data-toggle="tab"><strong>Paso 3:</strong> Aseguradoras</a></li>
                                    <li><a href="#tab4-2" data-toggle="tab"><strong>Paso 4:</strong> Finalizar</a></li>
                                </ul>

                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="tab-content">

                                    <div class="tab-pane" id="tab1-2">
                                        <div class="row row-stat">
                                            <div class="col-12 col-lg-10 col-lg-offset-1">
                                                <div class="col-md-6">
                                                    <div class="card tipouser">
                                                        <img class="card-img-top" src="/images/logojmc.jpg" alt="Card image cap">
                                                        <div class="card-body text-center">
                                                            <h3 class="card-title" style="font-weight:bold; margin-bottom: 2rem;"><span class="text-primary">Administro</span> <small>una red</small></h3>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card tipouser">
                                                        <img class="card-img-top" src="/images/logojmc.jpg" alt="Card image cap">
                                                        <div class="card-body text-center">
                                                            <h3 class="card-title" style="font-weight:bold; margin-bottom: 2rem;"><span class="text-primary">Soy parte</span> <small>de una red</small></h3>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- tab-pane -->

                                    <div class="tab-pane" id="tab2-2">
                                        <div class="form-group">
                                            <label class="col-sm-4">Product ID</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="product_id" class="form-control" />
                                            </div>
                                        </div><!-- form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-4">Product Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="product_name" class="form-control" />
                                            </div>
                                        </div><!-- form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-4">Category</label>
                                            <div class="col-sm-4">
                                                <select class="width100p" data-placeholder="Choose One">
                                                    <option value="">Choose One</option>
                                                    <option value="">3D Animation</option>
                                                    <option value="">Web Design</option>
                                                    <option value="">Software Engineering</option>
                                                </select>
                                            </div>
                                        </div><!-- form-group -->
                                    </div><!-- tab-pane -->

                                    <div class="tab-pane" id="tab3-2">
                                        <div class="form-group">
                                            <label class="col-sm-4">Card No</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cardno" class="form-control" />
                                            </div>
                                        </div><!-- form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-4">Expiration</label>
                                            <div class="col-sm-4">
                                                <select class="width100p" data-placeholder="Month">
                                                    <option value="">Choose One</option>
                                                    <option value="">January</option>
                                                    <option value="">February</option>
                                                    <option value="">March</option>
                                                    <option value="">...</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="width100p" data-placeholder="Year">
                                                    <option value="">Choose One</option>
                                                    <option value="">2013</option>
                                                    <option value="">2014</option>
                                                    <option value="">2015</option>
                                                    <option value="">...</option>
                                                </select>
                                            </div>
                                        </div><!-- form-group -->

                                        <div class="form-group">
                                            <label class="col-sm-4">CSV</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="csv" class="form-control" />
                                            </div>
                                        </div><!-- form-group -->
                                    </div><!-- tab-pane -->
                                </div><!-- tab-content -->

                                <ul class="list-unstyled wizard opciones">
                                    <li class="pull-left previous"><button type="button" class="btn btn-default">Regresar</button></li>
                                    <li class="pull-right next"><button type="button" class="btn btn-primary">Siguiente</button></li>
                                    <li class="pull-right finish hide"><button type="submit" class="btn btn-primary">Finish</button></li>
                                </ul>

                            </form><!-- panel-wizard -->

                        </div><!-- col-md-12 -->
                    </div>


                    <div class="row">
                        <div class="col-sm-12 col-lg-8 col-lg-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Datos de la red</h4>
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
                                    {!! Form::open(array('route' => 'clientes.store','method'=>'POST','class'=>'form-horizontal form-bordered')) !!}


                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nombre de la red<code>(*)</code></label>
                                        <div class="col-sm-8">
                                            {!! Form::text('nombre_red', null, array('placeholder' => '','class' => 'form-control')) !!}

                                        </div>
                                    </div><!-- form-group -->

                                    <div class="form-group">
                                        <div class="col-sm-4 control-label">&nbsp;</div>
                                        <div class="col-sm-8"><button type="submit" class="btn btn-success">Continuar</button></div>
                                    </div>

                                    {!! Form::close() !!}
                                </div><!-- panel-body -->
                            </div><!-- panel -->
                        </div>
                    </div><!-- row -->

                </div><!-- contentpanel -->

            </div><!-- mainpanel -->
        </div><!-- mainwrapper -->
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#progressWizard').bootstrapWizard({
                onTabShow: function(tab, navigation, index) {
                    tab.prevAll().addClass('done');
                    tab.nextAll().removeClass('done');
                    tab.removeClass('done');

                    var $total = navigation.find('li').length;
                    var $current = index + 1;

                    if($current >= $total) {
                        $('#progressWizard').find('.wizard .next').addClass('hide');
                        $('#progressWizard').find('.wizard .finish').removeClass('hide');
                    } else {
                        $('#progressWizard').find('.wizard .next').removeClass('hide');
                        $('#progressWizard').find('.wizard .finish').addClass('hide');
                    }

                    if ($current==1){
                        $('#progressWizard').find('.wizard .previous').addClass('hide');
                    }else{
                        $('#progressWizard').find('.wizard .previous').removeClass('hide');
                    }

                    var $percent = ($current/$total) * 100;
                    $('#progressWizard').find('.progress-bar').css('width', $percent+'%');
                },
                onTabClick: function(tab, navigation, index) {
                    return false;
                }
            });


        });
    </script>
@endsection