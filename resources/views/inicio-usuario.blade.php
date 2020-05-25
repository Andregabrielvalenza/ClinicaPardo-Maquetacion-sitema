@extends('layouts.sistema')
@section('content')
            <div class="mainpanel">
                <div class="pageheader">
                    <div class="media">
                        <div class="pageicon pull-left">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="media-body">
                            <ul class="breadcrumb">
                                <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                                <li><a href="/dashboard">Dashboard</a></li>
                                <li>Verificacion Inicial</li>
                            </ul>
                            <h4>Verificacion Inicial</h4>
                        </div>
                    </div><!-- media -->
                </div><!-- pageheader -->

                <div class="contentpanel">

                    <div class="row">
                        <div class="col-sm-3">

                            <h5 class="md-title" id="banner" style="width:100%;">Mis redes <span class="text-right"><a href="{{ route('empresas.create') }}" class="btn btn-success btn-sm"><b><i class="fa fa-plus"></i></b></a></span></h5>
                            <ul class="nav nav-pills nav-stacked nav-contacts">

                                    <li class="active">
                                        <a href="">
                                            nombre comercial
                                            <span class="badge pull-right">178</span>
                                        </a>
                                    </li>

                                Cuanto no tenga una red creada mostrar este mensaje de abajo
                                    <p>Aún no has creado una red</p>

                            </ul>

                            <hr>

                            <h5 class="md-title" id="banner" style="width:100%;">Soy Parte de <span class="text-right"><a href="{{ route('empresas.create') }}" class="btn btn-success btn-sm"><b><i class="fa fa-plus"></i></b></a></span></h5>
                            <ul class="nav nav-pills nav-stacked nav-contacts">

                                    <li class="active">
                                        <a href="">
                                            All Contacts
                                            <span class="badge pull-right">300+</span>
                                        </a>
                                    </li>

                                    <p>Aún no perteneces a ninguna red</p>

                            </ul>

                            <br />

                        </div><!-- col-sm-3 -->
                        <div class="col-sm-9">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-line">
                                <li class="active"><a href="#activities" data-toggle="tab"><strong>Servicios</strong></a></li>
                                <li><a href="#followers" data-toggle="tab"><strong>Agentes</strong></a></li>
                                <li><a href="#following" data-toggle="tab"><strong>Notificaciones</strong></a></li>
                                <li><a href="#events" data-toggle="tab"><strong>News / Events / Articles</strong></a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content nopadding noborder">
                                <div class="tab-pane active" id="activities">
                                    <h5 class="lg-title mb10">Basic Accordion</h5>
                                    <p class="mb20">Get base styles and flexible support for collapsible components like accordions.</p>

                                    <div class="panel-group" id="accordion">

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                        nombre de un tipo de seguro
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse  in ">
                                                <div class="panel-body" style="border:none;">
                                                    <ul class="media-list msg-list">

                                                        <li class="media unread">
                                                            <div class="ckbox ckbox-primary pull-left">

                                                                <input class="segurocheck" data-ido="" data-ids="" data-ide="" type="checkbox" id="checkbox-1">
                                                                <label for="checkbox-1"></label>
                                                            </div>
                                                            <a class="pull-left" href="#">
                                                                <img class="media-object img-circle img-online" src="images/photos/user1.png" alt="...">
                                                            </a>
                                                            <div class="media-body">
                                                                <div class="pull-right media-option" style="display:none;" id="opciones-1">

                                                                    {!! Form::number('comision-1', 1, array('placeholder' => '%Comision','class' => 'form-control grabar-comision','required', 'data-ids'=>1, 'data-ide'=>1, 'data-ido'=>1, 'id'=>'comision-1')) !!}

                                                                </div>
                                                                <h4 class="sender">Aseguradora Nombre</h4>
                                                                <p>Seguro Nombre</p>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- panel -->

                                    </div><!-- panel-group -->

                                </div><!-- tab-pane -->

                                <div class="tab-pane" id="followers">
                                    <div class="well mt10">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="Who are you looking for?" class="form-control">
                                            </div>
                                            <div class="col-sm-3">
                                                <select id="search-type" class="width100p" data-placeholder="Search Type">
                                                    <option value="">Choose One</option>
                                                    <option value="Full Name" selected>Full Name</option>
                                                    <option value="Position">Position</option>
                                                    <option value="Company">Company</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- well -->

                                    <br />

                                    <!--<div class="pull-right">
                                        <ul class="pagination pagination-split pagination-sm pagination-contact">
                                            <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>-->
                                    <div class="media">
                                        <div class="pull-right">
                                            <a title="Registrar nuevo agente" href="{{ route('agentes.create') }}" class="btn btn-success"><b><i class="fa fa-plus"></i></b></a>
                                        </div>
                                        <h3 class="xlg-title">Agentes</h3>
                                    </div>

                                    <div class="list-group contact-group">
                                        <a href="#" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="img-circle img-online" src="images/photos/user1.png" alt="...">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Weno Carasbong <small>Software Engineer at Apple, Inc.</small></h4>
                                                    <div class="media-content">
                                                        <i class="fa fa-map-marker"></i> Cebu Business Park, Cebu City, Philippines
                                                        <ul class="list-unstyled">
                                                            <li><i class="fa fa-skype"></i> weno.carasbong</li>
                                                            <li><i class="fa fa-mobile"></i> +63 934 345 3433</li>
                                                            <li><i class="fa fa-envelope-o"></i> weno.carasbong@email.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- media -->
                                        </a><!-- list-group -->

                                        <a href="#" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="img-circle img-offline" src="images/photos/user2.png" alt="...">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Renov Leonga <small>Software Engineer at Sun Microsystems, Inc.</small></h4>
                                                    <div class="media-content">
                                                        <i class="fa fa-map-marker"></i> Market Street San Francisco CA
                                                        <ul class="list-unstyled">
                                                            <li><i class="fa fa-skype"></i> renov.leonga</li>
                                                            <li><i class="fa fa-mobile"></i> +63 934 345 3433</li>
                                                            <li><i class="fa fa-envelope-o"></i> renov.leonga@email.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- media -->
                                        </a><!-- list-group -->

                                        <a href="#" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="img-circle img-offline" src="images/photos/user3.png" alt="...">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Zaham Sindilmaca <small>Chief Executive at GMA Network, Inc.</small></h4>
                                                    <div class="media-content">
                                                        <i class="fa fa-map-marker"></i> Metro Manila, Philippines
                                                        <ul class="list-unstyled">
                                                            <li><i class="fa fa-skype"></i> zaham.sindilmaca</li>
                                                            <li><i class="fa fa-mobile"></i> +63 934 345 3433</li>
                                                            <li><i class="fa fa-envelope-o"></i> zaham.sindilmaca@email.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- media -->
                                        </a><!-- list-group -->

                                        <a href="#" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="img-circle img-online" src="images/photos/user4.png" alt="...">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Weno Carasbong <small>Software Engineer at Apple, Inc.</small></h4>
                                                    <div class="media-content">
                                                        <i class="fa fa-map-marker"></i> Cebu Business Park, Cebu City, Philippines
                                                        <ul class="list-unstyled">
                                                            <li><i class="fa fa-skype"></i> weno.carasbong</li>
                                                            <li><i class="fa fa-mobile"></i> +63 934 345 3433</li>
                                                            <li><i class="fa fa-envelope-o"></i> weno.carasbong@email.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- media -->
                                        </a><!-- list-group -->

                                        <a href="#" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="img-circle img-offline" src="images/photos/user5.png" alt="...">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Renov Leonga <small>Software Engineer at Sun Microsystems, Inc.</small></h4>
                                                    <div class="media-content">
                                                        <i class="fa fa-map-marker"></i> Market Street San Francisco CA
                                                        <ul class="list-unstyled">
                                                            <li><i class="fa fa-skype"></i> renov.leonga</li>
                                                            <li><i class="fa fa-mobile"></i> +63 934 345 3433</li>
                                                            <li><i class="fa fa-envelope-o"></i> renov.leonga@email.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- media -->
                                        </a><!-- list-group -->

                                        <a href="#" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="img-circle img-online" src="images/photos/user1.png" alt="...">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Zaham Sindilmaca <small>Chief Executive at GMA Network, Inc.</small></h4>
                                                    <div class="media-content">
                                                        <i class="fa fa-map-marker"></i> Metro Manila, Philippines
                                                        <ul class="list-unstyled">
                                                            <li><i class="fa fa-skype"></i> zaham.sindilmaca</li>
                                                            <li><i class="fa fa-mobile"></i> +63 934 345 3433</li>
                                                            <li><i class="fa fa-envelope-o"></i> zaham.sindilmaca@email.com</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- media -->
                                        </a><!-- list-group -->

                                    </div><!-- list-group -->
                                </div><!-- tab-pane -->

                                <div class="tab-pane" id="following">

                                    <div class="activity-list">
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user2.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <strong>Chris Anthemum</strong> liked a photos<br />
                                                <small class="text-muted">Today at 12:30pm</small>

                                                <ul class="uploadphoto-list">
                                                    <li><a href="images/photos/media5.png" data-rel="prettyPhoto"><img src="images/photos/media5.png" class="thumbnail img-responsive" alt="" /></a></li>
                                                    <li><a href="images/photos/media4.png" data-rel="prettyPhoto"><img src="images/photos/media4.png" class="thumbnail img-responsive" alt="" /></a></li>
                                                </ul>
                                            </div>
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <strong>Ray Sin</strong> is now following to <strong>Chris Anthemum</strong>. <br />
                                                <small class="text-muted">Yesterday at 1:30pm</small>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user4.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <strong>Frank Furter</strong> is now following to <strong>Ray Sin</strong>. <br />
                                                <small class="text-muted">3 days ago at 1:30pm</small>
                                            </div>
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user2.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <strong>Chris Anthemum</strong> liked a photos<br />
                                                <small class="text-muted">5 days ago at 12:30pm</small>

                                                <ul class="uploadphoto-list">
                                                    <li><a href="images/photos/media6.png" data-rel="prettyPhoto"><img src="images/photos/media6.png" class="thumbnail img-responsive" alt="" /></a></li>
                                                    <li><a href="images/photos/media7.png" data-rel="prettyPhoto"><img src="images/photos/media7.png" class="thumbnail img-responsive" alt="" /></a></li>
                                                    <li><a href="images/photos/media2.png" data-rel="prettyPhoto"><img src="images/photos/media2.png" class="thumbnail img-responsive" alt="" /></a></li>
                                                </ul>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user1.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <strong>Nusja Nawancali</strong> is now following to <strong>Zaham Sindilmaca</strong>. <br />
                                                <small class="text-muted">December 25 at 1:30pm</small>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user4.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <strong>Frank Furter</strong> is now following to <strong>Zaham Sindilmaca</strong>. <br />
                                                <small class="text-muted">December 24 at 1:30pm</small>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user3.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <strong>Nusja NawanCali</strong> posted a new blog. <br />
                                                <small class="text-muted">December 23 at 3:18pm</small>

                                                <div class="media blog-media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object" src="images/photos/media3.png" alt="" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-title"><a href="">Ut Enim Ad Minim Veniam</a></h4>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat... <a href="">Read more</a></p>
                                                    </div><!-- media-body -->
                                                </div><!-- media -->
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user4.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <strong>Mark Zonsion</strong> is now following to <strong>Weno Carasbong</strong>. <br />
                                                <small class="text-muted">December 23 at 1:30pm</small>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="images/photos/user4.png" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <strong>Frank Furter</strong> is now following to <strong>Weno Carasbong</strong>. <br />
                                                <small class="text-muted">December 20 at 4:30pm</small>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                    </div><!-- activity-list -->
                                    <button class="btn btn-white btn-block">Show More</button>
                                </div><!-- tab-pane -->

                                <div class="tab-pane" id="events">
                                    <div class="events">
                                        <h5 class="lg-title mb20">Upcoming Events</h5>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object thumbnail" src="holder.js/100x120" alt="" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="event-title"><a href="">Free Living Trust Seminar</a></h4>
                                                        <small class="text-muted"><i class="fa fa-map-marker"></i> Silicon Valley, San Francisco, CA</small>
                                                        <small class="text-muted"><i class="fa fa-calendar"></i> Sunday, January 15, 2014 at 11:00am</small>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                                                    </div>
                                                </div><!-- media -->
                                            </div><!-- col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object thumbnail" src="holder.js/100x120" alt="" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="event-title"><a href="">Serious Games Seminar</a></h4>
                                                        <small class="text-muted"><i class="fa fa-map-marker"></i> New York City</small>
                                                        <small class="text-muted"><i class="fa fa-calendar"></i> Monday, January 14, 2014 at 8:00am</small>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                                                    </div>
                                                </div><!-- media -->
                                            </div><!-- col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object thumbnail" src="holder.js/100x120" alt="" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="event-title"><a href="">Travel &amp; Adventure Show</a></h4>
                                                        <small class="text-muted"><i class="fa fa-map-marker"></i> Los Angeles, CA</small>
                                                        <small class="text-muted"><i class="fa fa-calendar"></i> Friday, January 12, 2014 at 8:00am</small>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                                                    </div>
                                                </div><!-- media -->
                                            </div><!-- col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object thumbnail" src="holder.js/100x120" alt="" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="event-title"><a href="">Mobile Games Summit</a></h4>
                                                        <small class="text-muted"><i class="fa fa-map-marker"></i> Bay Area, San Francisco</small>
                                                        <small class="text-muted"><i class="fa fa-calendar"></i> Saturday, January 10, 2014 at 8:00am</small>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                                                    </div>
                                                </div><!-- media -->
                                            </div><!-- col-sm-6 -->
                                        </div><!-- row -->

                                        <br />

                                        <h5 class="lg-title mb20">Past Events</h5>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object thumbnail" src="holder.js/100x120" alt="" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="event-title"><a href="">Free Living Trust Seminar</a></h4>
                                                        <small class="text-muted"><i class="fa fa-map-marker"></i> Silicon Valley, San Francisco, CA</small>
                                                        <small class="text-muted"><i class="fa fa-calendar"></i> Sunday, January 15, 2014 at 11:00am</small>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                                                    </div>
                                                </div><!-- media -->
                                            </div><!-- col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object thumbnail" src="holder.js/100x120" alt="" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="event-title"><a href="">Serious Games Seminar</a></h4>
                                                        <small class="text-muted"><i class="fa fa-map-marker"></i> New York City</small>
                                                        <small class="text-muted"><i class="fa fa-calendar"></i> Monday, January 14, 2014 at 8:00am</small>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                                                    </div>
                                                </div><!-- media -->
                                            </div><!-- col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object thumbnail" src="holder.js/100x120" alt="" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="event-title"><a href="">Travel &amp; Adventure Show</a></h4>
                                                        <small class="text-muted"><i class="fa fa-map-marker"></i> Los Angeles, CA</small>
                                                        <small class="text-muted"><i class="fa fa-calendar"></i> Friday, January 12, 2014 at 8:00am</small>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                                                    </div>
                                                </div><!-- media -->
                                            </div><!-- col-sm-6 -->

                                            <div class="col-sm-6">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object thumbnail" src="holder.js/100x120" alt="" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="event-title"><a href="">Mobile Games Summit</a></h4>
                                                        <small class="text-muted"><i class="fa fa-map-marker"></i> Bay Area, San Francisco</small>
                                                        <small class="text-muted"><i class="fa fa-calendar"></i> Saturday, January 10, 2014 at 8:00am</small>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                                                    </div>
                                                </div><!-- media -->
                                            </div><!-- col-sm-6 -->
                                        </div><!-- row -->
                                    </div><!-- events -->
                                </div><!-- tab-pane -->

                            </div><!-- tab-content -->


                        </div><!-- col-sm-9 -->
                    </div><!-- row -->

                </div><!-- contentpanel -->

            </div>
        </div><!-- mainwrapper -->
    </section>
    <div id="loader" class="loader loader-default " data-text="Actualizando..."></div>
@endsection
@section('scripts')
    <script>

        $(document).ready(function() {
            var enjoyhint_instance = new EnjoyHint({});
            var enjoyhint_script_steps = [
                {
                    selector:'#banner',
                    event:'click',
                    description:'Set first task as completed'

                },
            ];

            //set script config
            enjoyhint_instance.setScript(enjoyhint_script_steps);

        });
    </script>
@endsection