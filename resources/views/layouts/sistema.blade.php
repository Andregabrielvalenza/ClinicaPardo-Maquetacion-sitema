<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JMC') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    <link href="{{ asset('css/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select-cita.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css-loader.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>
    <link href="{{ asset('css/bootstrap-timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pricing.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.gritter.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-add.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.enjoyhint.css') }}" rel="stylesheet">

    <style>
        div.dt-buttons {
            float: right;
            margin-top: 0.6rem;
            margin-left:1rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="headerwrapper">
            <div class="header-left">
                <a href="/home" class="logo">
                    <img src="/images/Imagen1.png" alt="" width="100px" />
                </a>
                <div class="pull-right">
                    <a href="" class="menu-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div><!-- header-left -->

            <div class="header-right">

                <div class="pull-right" style="display: none;">
                    @can('dashboard')
                        <form class="form form-search" action="search-results.html">
                            <input type="search" class="form-control" placeholder="Search" />
                        </form>
                    @endcan

                    <div class="btn-group btn-group-list btn-group-notification">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge">5</span>
                        </button>
                        <div class="dropdown-menu pull-right">
                            <a href="" class="link-right"><i class="fa fa-search"></i></a>
                            <h5>Notification</h5>
                            <ul class="media-list dropdown-list">
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong> likes a photo of you
                                        <small class="date"><i class="fa fa-thumbs-up"></i> 15 minutes ago</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos/user2.png" alt="">
                                    <div class="media-body">
                                        <strong>Weno Carasbong</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
                                        <small class="date"><i class="fa fa-calendar"></i> July 04, 2014</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos/user3.png" alt="">
                                    <div class="media-body">
                                        <strong>Venro Leonga</strong> likes a photo of you
                                        <small class="date"><i class="fa fa-thumbs-up"></i> July 03, 2014</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos/user4.png" alt="">
                                    <div class="media-body">
                                        <strong>Nanterey Reslaba</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
                                        <small class="date"><i class="fa fa-calendar"></i> July 03, 2014</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
                                        <small class="date"><i class="fa fa-calendar"></i> July 02, 2014</small>
                                    </div>
                                </li>
                            </ul>
                            <div class="dropdown-footer text-center">
                                <a href="" class="link">See All Notifications</a>
                            </div>
                        </div>
                    </div><!-- btn-group -->

                    <!--<div class="btn-group btn-group-list btn-group-messages">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge">2</span>
                        </button>
                        <div class="dropdown-menu pull-right">
                            <a href="" class="link-right"><i class="fa fa-plus"></i></a>
                            <h5>New Messages</h5>
                            <ul class="media-list dropdown-list">
                                <li class="media">
                                    <span class="badge badge-success">New</span>
                                    <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong>
                                        <p>Hi! How are you?...</p>
                                        <small class="date"><i class="fa fa-clock-o"></i> 15 minutes ago</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <span class="badge badge-success">New</span>
                                    <img class="img-circle pull-left noti-thumb" src="images/photos/user2.png" alt="">
                                    <div class="media-body">
                                        <strong>Weno Carasbong</strong>
                                        <p>Lorem ipsum dolor sit amet...</p>
                                        <small class="date"><i class="fa fa-clock-o"></i> July 04, 2014</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos/user3.png" alt="">
                                    <div class="media-body">
                                        <strong>Venro Leonga</strong>
                                        <p>Do you have the time to listen to me...</p>
                                        <small class="date"><i class="fa fa-clock-o"></i> July 03, 2014</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos/user4.png" alt="">
                                    <div class="media-body">
                                        <strong>Nanterey Reslaba</strong>
                                        <p>It might seem crazy what I'm about to say...</p>
                                        <small class="date"><i class="fa fa-clock-o"></i> July 03, 2014</small>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                                    <div class="media-body">
                                        <strong>Nusja Nawancali</strong>
                                        <p>Hey I just met you and this is crazy...</p>
                                        <small class="date"><i class="fa fa-clock-o"></i> July 02, 2014</small>
                                    </div>
                                </li>
                            </ul>
                            <div class="dropdown-footer text-center">
                                <a href="" class="link">See All Messages</a>
                            </div>
                        </div><!-- dropdown-menu
                    </div><!-- btn-group -->

                    <div class="btn-group btn-group-option">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            @can('dashboard')
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Mi Perfil</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-star"></i> Notificaciones</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Configuracion</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Ayuda</a></li>
                            @endcan
                            <li><a href="https://www.asproapp.com/" target="_blank"><i class="glyphicon glyphicon-question-sign"></i> Sobre Aspro</a></li>
                            <li class="divider"></li>
                            <li>
                                {!! Form::open(array('route' => 'logout','method'=>'POST','style'=>'display:inline')) !!}
                                <button onclick="return confirm('Seguro que desea cerrar sesión')" class="btn btn-bordered btn-xs" style="border:none; color:red; width:100%; text-align:left;" type="submit" title="cerrar sesión"><i class="glyphicon glyphicon-log-out"></i>Salir</button>
                                <!--<a href="logout"><i class="glyphicon glyphicon-log-out"></i>Salir</a>-->
                                {!! Form::close() !!}

                            </li>
                        </ul>
                    </div><!-- btn-group -->

                </div><!-- pull-right -->

            </div><!-- header-right -->

        </div><!-- headerwrapper -->
    </header>

    <section>
        <div class="mainwrapper">
            <div class="leftpanel" style="background-color: #3E7EC8;">
                <div class="media profile-left">
                    <a class="pull-left profile-thumb" href="#!" >
                        <img class="img-circle" style="border: 2px solid #fff;" src="/images/photos/Pic.png" >
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading" style="font-size:12px; line-height: 1; font-weight:bold;color: #3E7EC8;">{{ Auth::user()->name }}</h4>
                        <p style="color: #3E7EC8;">Product Owner</p>
                    </div>
                </div><!-- media -->

                <h5 class="leftpanel-title">Menu principal</h5>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="messages.html"><span>Panel principal</span></a></li>
                    <li class="parent"><a href=""><span>Crear cita nueva</span></a>
                    </li>
                    <li class="parent"><a href=""><span>Citas</span></a>
                    </li>
                    <li class="parent"><a href=""><span class="ml10"><i class="glyphicon glyphicon-arrow-right"></i></span>Citas por doctor</a>
                    </li>
                    <li class="parent"><a href=""><span class="ml10"><i class="glyphicon glyphicon-arrow-right"></i></span>Citas por especialidad</a>
                    </li>
                    <li class="parent"><a href=""><span>Doctores</span></a>
                    </li>
                    <li class="parent"><a href=""><span>Pacientes</span></a>
                    </li>
                    <li class="parent"><a href=""><span class="ml10"><i class="glyphicon glyphicon-arrow-right"></i></span>Agregar nuevo</a>
                    </li>
                    <li class="parent"><a href=""><span class="ml10"><i class="glyphicon glyphicon-arrow-right"></i></span>Gestionar pacientes</a>
                    </li>
                    <li class="parent"><a href=""><span class="ml10"><i class="glyphicon glyphicon-arrow-right"></i></span>Referencía</a>
                    </li>
                    <li class="parent"><a href=""><span class="ml10"><i class="glyphicon glyphicon-arrow-right"></i></span>Emergencia</a>
                    </li>
                </ul>

            </div><!-- leftpanel -->

    @yield('content')

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui-1.10.3.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/modernizr.min.js') }}" defer></script>
    <script src="{{ asset('js/pace.min.js') }}" defer></script>
    <script src="{{ asset('js/retina.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.cookies.js') }}" defer></script>
    <script src="{{ asset('js/flot/jquery.flot.min.js') }}" defer></script>
    <script src="{{ asset('js/flot/jquery.flot.resize.min.js') }}" defer></script>
    <script src="{{ asset('js/flot/jquery.flot.spline.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.sparkline.min.js') }}" defer></script>
    <script src="{{ asset('js/morris.min.js') }}" defer></script>
    <script src="{{ asset('js/raphael-2.1.0.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-wizard.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-timepicker.min.js') }}" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>
    <script src="{{ asset('js/jquery.gritter.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-wizard.min.js') }}" defer></script>
    <script src="{{ asset('js/nice-select.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="https://checkout.culqi.com/js/v3"></script>
    <script src="{{ asset('js/enjoyhint.js') }}" defer></script>
    <script src="{{ asset('js/enjoyhint.min.js') }}" defer></script>
    @yield('scripts')
</body>
</html>
