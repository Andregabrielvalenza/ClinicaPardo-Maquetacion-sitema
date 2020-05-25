<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">


    <!-- CSRF Token -->


    <title>{{ config('app.name', 'JMC') }}</title>
    <!-- Latest compiled and minified CSS -->
        <!-- Scripts -->

    <!-- Fonts -->
      <!-- Styles -->

    <style>
        @page {
            margin: 15px !important;
            padding: 0 !important;
            font-family:sans-serif;
        }
        table{
            background-color:transparent
        }
        th{
            text-align:left
        }
        .table{
            width:100%;
            max-width:100%;
        }
        .table>thead>tr>th,.table>tbody>tr>th,.table>tfoot>tr>th,.table>thead>tr>td,.table>tbody>tr>td,.table>tfoot>tr>td{
            padding:1px 0px;
            line-height:1.42857143;
            vertical-align:top;

        }
        .table>thead>tr>th{
            vertical-align:bottom;
            border-bottom:2px solid #ddd
        }
        .table>caption+thead>tr:first-child>th,.table>colgroup+thead>tr:first-child>th,.table>thead:first-child>tr:first-child>th,.table>caption+thead>tr:first-child>td,.table>colgroup+thead>tr:first-child>td,.table>thead:first-child>tr:first-child>td{
            border-top:0
        }
        .table>tbody+tbody{

        }
        .table .table{
            background-color:#fff
        }
        .table-condensed>thead>tr>th,.table-condensed>tbody>tr>th,.table-condensed>tfoot>tr>th,.table-condensed>thead>tr>td,.table-condensed>tbody>tr>td,.table-condensed>tfoot>tr>td{
            padding:5px
        }
        .table-bordered{

        }
        .table-bordered>thead>tr>th,.table-bordered>tbody>tr>th,.table-bordered>tfoot>tr>th,.table-bordered>thead>tr>td,.table-bordered>tbody>tr>td,.table-bordered>tfoot>tr>td{
            border:1px solid #ddd
        }
        .table-bordered>thead>tr>th,.table-bordered>thead>tr>td{

        }
        .table-striped>tbody>tr:nth-child(odd)>td,.table-striped>tbody>tr:nth-child(odd)>th{
            background-color:#f9f9f9
        }
        .table-hover>tbody>tr:hover>td,.table-hover>tbody>tr:hover>th{
            background-color:#f5f5f5
        }
        table col[class*=col-]{
            position:static;
            display:table-column;
            float:none
        }
        table td[class*=col-],table th[class*=col-]{
            position:static;
            display:table-cell;
            float:none
        }
        .table>thead>tr>td.active,.table>tbody>tr>td.active,.table>tfoot>tr>td.active,.table>thead>tr>th.active,.table>tbody>tr>th.active,.table>tfoot>tr>th.active,.table>thead>tr.active>td,.table>tbody>tr.active>td,.table>tfoot>tr.active>td,.table>thead>tr.active>th,.table>tbody>tr.active>th,.table>tfoot>tr.active>th{
            background-color:#f5f5f5
        }
        .table-hover>tbody>tr>td.active:hover,.table-hover>tbody>tr>th.active:hover,.table-hover>tbody>tr.active:hover>td,.table-hover>tbody>tr:hover>.active,.table-hover>tbody>tr.active:hover>th{
            background-color:#e8e8e8
        }
        .table>thead>tr>td.success,.table>tbody>tr>td.success,.table>tfoot>tr>td.success,.table>thead>tr>th.success,.table>tbody>tr>th.success,.table>tfoot>tr>th.success,.table>thead>tr.success>td,.table>tbody>tr.success>td,.table>tfoot>tr.success>td,.table>thead>tr.success>th,.table>tbody>tr.success>th,.table>tfoot>tr.success>th{
            background-color:#dff0d8
        }
        .table-hover>tbody>tr>td.success:hover,.table-hover>tbody>tr>th.success:hover,.table-hover>tbody>tr.success:hover>td,.table-hover>tbody>tr:hover>.success,.table-hover>tbody>tr.success:hover>th{
            background-color:#d0e9c6
        }
        .table>thead>tr>td.info,.table>tbody>tr>td.info,.table>tfoot>tr>td.info,.table>thead>tr>th.info,.table>tbody>tr>th.info,.table>tfoot>tr>th.info,.table>thead>tr.info>td,.table>tbody>tr.info>td,.table>tfoot>tr.info>td,.table>thead>tr.info>th,.table>tbody>tr.info>th,.table>tfoot>tr.info>th{
            background-color:#d9edf7
        }
        .table-hover>tbody>tr>td.info:hover,.table-hover>tbody>tr>th.info:hover,.table-hover>tbody>tr.info:hover>td,.table-hover>tbody>tr:hover>.info,.table-hover>tbody>tr.info:hover>th{
            background-color:#c4e3f3
        }
        .table>thead>tr>td.warning,.table>tbody>tr>td.warning,.table>tfoot>tr>td.warning,.table>thead>tr>th.warning,.table>tbody>tr>th.warning,.table>tfoot>tr>th.warning,.table>thead>tr.warning>td,.table>tbody>tr.warning>td,.table>tfoot>tr.warning>td,.table>thead>tr.warning>th,.table>tbody>tr.warning>th,.table>tfoot>tr.warning>th{
            background-color:#fcf8e3
        }
        .table-hover>tbody>tr>td.warning:hover,.table-hover>tbody>tr>th.warning:hover,.table-hover>tbody>tr.warning:hover>td,.table-hover>tbody>tr:hover>.warning,.table-hover>tbody>tr.warning:hover>th{
            background-color:#faf2cc
        }
        .table>thead>tr>td.danger,.table>tbody>tr>td.danger,.table>tfoot>tr>td.danger,.table>thead>tr>th.danger,.table>tbody>tr>th.danger,.table>tfoot>tr>th.danger,.table>thead>tr.danger>td,.table>tbody>tr.danger>td,.table>tfoot>tr.danger>td,.table>thead>tr.danger>th,.table>tbody>tr.danger>th,.table>tfoot>tr.danger>th{
            background-color:#f2dede
        }
        .table-hover>tbody>tr>td.danger:hover,.table-hover>tbody>tr>th.danger:hover,.table-hover>tbody>tr.danger:hover>td,.table-hover>tbody>tr:hover>.danger,.table-hover>tbody>tr.danger:hover>th{
            background-color:#ebcccc
        }
        .row{
            margin-right:-15px;
            margin-left:-15px
        }
        .text-center{
            text-align:center
        }
        .clearfix:before,.clearfix:after,.dl-horizontal dd:before,.dl-horizontal dd:after,.container:before,.container:after,.container-fluid:before,.container-fluid:after,.row:before,.row:after,.form-horizontal .form-group:before,.form-horizontal .form-group:after,.btn-toolbar:before,.btn-toolbar:after,.btn-group-vertical>.btn-group:before,.btn-group-vertical>.btn-group:after,.nav:before,.nav:after,.navbar:before,.navbar:after,.navbar-header:before,.navbar-header:after,.navbar-collapse:before,.navbar-collapse:after,.pager:before,.pager:after,.panel-body:before,.panel-body:after,.modal-footer:before,.modal-footer:after{
            display:table;
            content:" "
        }
        .clearfix:after,.dl-horizontal dd:after,.container:after,.container-fluid:after,.row:after,.form-horizontal .form-group:after,.btn-toolbar:after,.btn-group-vertical>.btn-group:after,.nav:after,.navbar:after,.navbar-header:after,.navbar-collapse:after,.pager:after,.panel-body:after,.modal-footer:after{
            clear:both
        }
        div.dt-buttons {
            float: right;
            margin-top: 0.6rem;
            margin-left:1rem;
        }
        .color_borde{ border-color: #CCC;}
        .borde_completo{
            border: 1px solid #CCC;
        }
        .borde_arriba_abajo{
            border-top:1px solid #CCC;
            border-bottom: 1px solid #CCC;
        }

        .border_arriba{
            border-top:1px solid #CCC;
        }
        .border_derecha{
            border-right: 1px solid #CCC;
        }
        .m-0{margin:0}
        .col-xs-1,.col-sm-1,.col-md-1,.col-lg-1,.col-xs-2,.col-sm-2,.col-md-2,.col-lg-2,.col-xs-3,.col-sm-3,.col-md-3,.col-lg-3,.col-xs-4,.col-sm-4,.col-md-4,.col-lg-4,.col-xs-5,.col-sm-5,.col-md-5,.col-lg-5,.col-xs-6,.col-sm-6,.col-md-6,.col-lg-6,.col-xs-7,.col-sm-7,.col-md-7,.col-lg-7,.col-xs-8,.col-sm-8,.col-md-8,.col-lg-8,.col-xs-9,.col-sm-9,.col-md-9,.col-lg-9,.col-xs-10,.col-sm-10,.col-md-10,.col-lg-10,.col-xs-11,.col-sm-11,.col-md-11,.col-lg-11,.col-xs-12,.col-sm-12,.col-md-12,.col-lg-12{
            position:relative;
            min-height:1px;
            padding-right:15px;
            padding-left:15px
        }
        .col-xs-1,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9,.col-xs-10,.col-xs-11,.col-xs-12{
            float:left
        }
        .col-xs-12{
            width:100%
        }
        .col-xs-11{
            width:91.66666667%
        }
        .col-xs-10{
            width:83.33333333%
        }
        .col-xs-9{
            width:75%
        }
        .col-xs-8{
            width:66.66666667%
        }
        .col-xs-7{
            width:58.33333333%
        }
        .col-xs-6{
            width:50%
        }
        .col-xs-5{
            width:41.66666667%
        }
        .col-xs-4{
            width:33.33333333%
        }
        .col-xs-3{
            width:25%
        }
        .col-xs-2{
            width:16.66666667%
        }
        .col-xs-1{
            width:8.33333333%
        }
        .col-xs-pull-12{
            right:100%
        }
        .col-xs-pull-11{
            right:91.66666667%
        }
        .col-xs-pull-10{
            right:83.33333333%
        }
        .col-xs-pull-9{
            right:75%
        }
        .col-xs-pull-8{
            right:66.66666667%
        }
        .col-xs-pull-7{
            right:58.33333333%
        }
        .col-xs-pull-6{
            right:50%
        }
        .col-xs-pull-5{
            right:41.66666667%
        }
        .col-xs-pull-4{
            right:33.33333333%
        }
        .col-xs-pull-3{
            right:25%
        }
        .col-xs-pull-2{
            right:16.66666667%
        }
        .col-xs-pull-1{
            right:8.33333333%
        }
        .col-xs-pull-0{
            right:auto
        }
        .col-xs-push-12{
            left:100%
        }
        .col-xs-push-11{
            left:91.66666667%
        }
        .col-xs-push-10{
            left:83.33333333%
        }
        .col-xs-push-9{
            left:75%
        }
        .col-xs-push-8{
            left:66.66666667%
        }
        .col-xs-push-7{
            left:58.33333333%
        }
        .col-xs-push-6{
            left:50%
        }
        .col-xs-push-5{
            left:41.66666667%
        }
        .col-xs-push-4{
            left:33.33333333%
        }
        .col-xs-push-3{
            left:25%
        }
        .col-xs-push-2{
            left:16.66666667%
        }
        .col-xs-push-1{
            left:8.33333333%
        }
        .col-xs-push-0{
            left:auto
        }
        .col-xs-offset-12{
            margin-left:100%
        }
        .col-xs-offset-11{
            margin-left:91.66666667%
        }
        .col-xs-offset-10{
            margin-left:83.33333333%
        }
        .col-xs-offset-9{
            margin-left:75%
        }
        .col-xs-offset-8{
            margin-left:66.66666667%
        }
        .col-xs-offset-7{
            margin-left:58.33333333%
        }
        .col-xs-offset-6{
            margin-left:50%
        }
        .col-xs-offset-5{
            margin-left:41.66666667%
        }
        .col-xs-offset-4{
            margin-left:33.33333333%
        }
        .col-xs-offset-3{
            margin-left:25%
        }
        .col-xs-offset-2{
            margin-left:16.66666667%
        }
        .col-xs-offset-1{
            margin-left:8.33333333%
        }
        .col-xs-offset-0{
            margin-left:0
        }
        @media (min-width:768px){
            .col-sm-1,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-10,.col-sm-11,.col-sm-12{
                float:left
            }
            .col-sm-12{
                width:100%
            }
            .col-sm-11{
                width:91.66666667%
            }
            .col-sm-10{
                width:83.33333333%
            }
            .col-sm-9{
                width:75%
            }
            .col-sm-8{
                width:66.66666667%
            }
            .col-sm-7{
                width:58.33333333%
            }
            .col-sm-6{
                width:50%
            }
            .col-sm-5{
                width:41.66666667%
            }
            .col-sm-4{
                width:33.33333333%
            }
            .col-sm-3{
                width:25%
            }
            .col-sm-2{
                width:16.66666667%
            }
            .col-sm-1{
                width:8.33333333%
            }
            .col-sm-pull-12{
                right:100%
            }
            .col-sm-pull-11{
                right:91.66666667%
            }
            .col-sm-pull-10{
                right:83.33333333%
            }
            .col-sm-pull-9{
                right:75%
            }
            .col-sm-pull-8{
                right:66.66666667%
            }
            .col-sm-pull-7{
                right:58.33333333%
            }
            .col-sm-pull-6{
                right:50%
            }
            .col-sm-pull-5{
                right:41.66666667%
            }
            .col-sm-pull-4{
                right:33.33333333%
            }
            .col-sm-pull-3{
                right:25%
            }
            .col-sm-pull-2{
                right:16.66666667%
            }
            .col-sm-pull-1{
                right:8.33333333%
            }
            .col-sm-pull-0{
                right:auto
            }
            .col-sm-push-12{
                left:100%
            }
            .col-sm-push-11{
                left:91.66666667%
            }
            .col-sm-push-10{
                left:83.33333333%
            }
            .col-sm-push-9{
                left:75%
            }
            .col-sm-push-8{
                left:66.66666667%
            }
            .col-sm-push-7{
                left:58.33333333%
            }
            .col-sm-push-6{
                left:50%
            }
            .col-sm-push-5{
                left:41.66666667%
            }
            .col-sm-push-4{
                left:33.33333333%
            }
            .col-sm-push-3{
                left:25%
            }
            .col-sm-push-2{
                left:16.66666667%
            }
            .col-sm-push-1{
                left:8.33333333%
            }
            .col-sm-push-0{
                left:auto
            }
            .col-sm-offset-12{
                margin-left:100%
            }
            .col-sm-offset-11{
                margin-left:91.66666667%
            }
            .col-sm-offset-10{
                margin-left:83.33333333%
            }
            .col-sm-offset-9{
                margin-left:75%
            }
            .col-sm-offset-8{
                margin-left:66.66666667%
            }
            .col-sm-offset-7{
                margin-left:58.33333333%
            }
            .col-sm-offset-6{
                margin-left:50%
            }
            .col-sm-offset-5{
                margin-left:41.66666667%
            }
            .col-sm-offset-4{
                margin-left:33.33333333%
            }
            .col-sm-offset-3{
                margin-left:25%
            }
            .col-sm-offset-2{
                margin-left:16.66666667%
            }
            .col-sm-offset-1{
                margin-left:8.33333333%
            }
            .col-sm-offset-0{
                margin-left:0
            }
        }
        @media (min-width:992px){
            .col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12{
                float:left
            }
            .col-md-12{
                width:100%
            }
            .col-md-11{
                width:91.66666667%
            }
            .col-md-10{
                width:83.33333333%
            }
            .col-md-9{
                width:75%
            }
            .col-md-8{
                width:66.66666667%
            }
            .col-md-7{
                width:58.33333333%
            }
            .col-md-6{
                width:50%
            }
            .col-md-5{
                width:41.66666667%
            }
            .col-md-4{
                width:33.33333333%
            }
            .col-md-3{
                width:25%
            }
            .col-md-2{
                width:16.66666667%
            }
            .col-md-1{
                width:8.33333333%
            }
            .col-md-pull-12{
                right:100%
            }
            .col-md-pull-11{
                right:91.66666667%
            }
            .col-md-pull-10{
                right:83.33333333%
            }
            .col-md-pull-9{
                right:75%
            }
            .col-md-pull-8{
                right:66.66666667%
            }
            .col-md-pull-7{
                right:58.33333333%
            }
            .col-md-pull-6{
                right:50%
            }
            .col-md-pull-5{
                right:41.66666667%
            }
            .col-md-pull-4{
                right:33.33333333%
            }
            .col-md-pull-3{
                right:25%
            }
            .col-md-pull-2{
                right:16.66666667%
            }
            .col-md-pull-1{
                right:8.33333333%
            }
            .col-md-pull-0{
                right:auto
            }
            .col-md-push-12{
                left:100%
            }
            .col-md-push-11{
                left:91.66666667%
            }
            .col-md-push-10{
                left:83.33333333%
            }
            .col-md-push-9{
                left:75%
            }
            .col-md-push-8{
                left:66.66666667%
            }
            .col-md-push-7{
                left:58.33333333%
            }
            .col-md-push-6{
                left:50%
            }
            .col-md-push-5{
                left:41.66666667%
            }
            .col-md-push-4{
                left:33.33333333%
            }
            .col-md-push-3{
                left:25%
            }
            .col-md-push-2{
                left:16.66666667%
            }
            .col-md-push-1{
                left:8.33333333%
            }
            .col-md-push-0{
                left:auto
            }
            .col-md-offset-12{
                margin-left:100%
            }
            .col-md-offset-11{
                margin-left:91.66666667%
            }
            .col-md-offset-10{
                margin-left:83.33333333%
            }
            .col-md-offset-9{
                margin-left:75%
            }
            .col-md-offset-8{
                margin-left:66.66666667%
            }
            .col-md-offset-7{
                margin-left:58.33333333%
            }
            .col-md-offset-6{
                margin-left:50%
            }
            .col-md-offset-5{
                margin-left:41.66666667%
            }
            .col-md-offset-4{
                margin-left:33.33333333%
            }
            .col-md-offset-3{
                margin-left:25%
            }
            .col-md-offset-2{
                margin-left:16.66666667%
            }
            .col-md-offset-1{
                margin-left:8.33333333%
            }
            .col-md-offset-0{
                margin-left:0
            }
        }
        @media (min-width:1200px){
            .col-lg-1,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-10,.col-lg-11,.col-lg-12{
                float:left
            }
            .col-lg-12{
                width:100%
            }
            .col-lg-11{
                width:91.66666667%
            }
            .col-lg-10{
                width:83.33333333%
            }
            .col-lg-9{
                width:75%
            }
            .col-lg-8{
                width:66.66666667%
            }
            .col-lg-7{
                width:58.33333333%
            }
            .col-lg-6{
                width:50%
            }
            .col-lg-5{
                width:41.66666667%
            }
            .col-lg-4{
                width:33.33333333%
            }
            .col-lg-3{
                width:25%
            }
            .col-lg-2{
                width:16.66666667%
            }
            .col-lg-1{
                width:8.33333333%
            }
            .col-lg-pull-12{
                right:100%
            }
            .col-lg-pull-11{
                right:91.66666667%
            }
            .col-lg-pull-10{
                right:83.33333333%
            }
            .col-lg-pull-9{
                right:75%
            }
            .col-lg-pull-8{
                right:66.66666667%
            }
            .col-lg-pull-7{
                right:58.33333333%
            }
            .col-lg-pull-6{
                right:50%
            }
            .col-lg-pull-5{
                right:41.66666667%
            }
            .col-lg-pull-4{
                right:33.33333333%
            }
            .col-lg-pull-3{
                right:25%
            }
            .col-lg-pull-2{
                right:16.66666667%
            }
            .col-lg-pull-1{
                right:8.33333333%
            }
            .col-lg-pull-0{
                right:auto
            }
            .col-lg-push-12{
                left:100%
            }
            .col-lg-push-11{
                left:91.66666667%
            }
            .col-lg-push-10{
                left:83.33333333%
            }
            .col-lg-push-9{
                left:75%
            }
            .col-lg-push-8{
                left:66.66666667%
            }
            .col-lg-push-7{
                left:58.33333333%
            }
            .col-lg-push-6{
                left:50%
            }
            .col-lg-push-5{
                left:41.66666667%
            }
            .col-lg-push-4{
                left:33.33333333%
            }
            .col-lg-push-3{
                left:25%
            }
            .col-lg-push-2{
                left:16.66666667%
            }
            .col-lg-push-1{
                left:8.33333333%
            }
            .col-lg-push-0{
                left:auto
            }
            .col-lg-offset-12{
                margin-left:100%
            }
            .col-lg-offset-11{
                margin-left:91.66666667%
            }
            .col-lg-offset-10{
                margin-left:83.33333333%
            }
            .col-lg-offset-9{
                margin-left:75%
            }
            .col-lg-offset-8{
                margin-left:66.66666667%
            }
            .col-lg-offset-7{
                margin-left:58.33333333%
            }
            .col-lg-offset-6{
                margin-left:50%
            }
            .col-lg-offset-5{
                margin-left:41.66666667%
            }
            .col-lg-offset-4{
                margin-left:33.33333333%
            }
            .col-lg-offset-3{
                margin-left:25%
            }
            .col-lg-offset-2{
                margin-left:16.66666667%
            }
            .col-lg-offset-1{
                margin-left:8.33333333%
            }
            .col-lg-offset-0{
                margin-left:0
            }
        }



    </style>
</head>
<body>
@foreach ($pies as $pie)
<div class="contentpanel" style="padding:0; margin:0;">

    <div class="panel panel-default" style="padding:0; margin:0;">
        <div class="panel-body" style="font-size:8px;">
            <div class="row" style="padding:0; margin:0;">

            <table class="table" cellspacing="0" cellpadding="0" style="margin:0;">
                <tr>
                    <td style="width:49%;">
                        <table class="table " cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td rowspan="2" style="width:180px"><img src="http://jmc.test/images/logo_ministerio_peru.png" width="180" height="30"></td>
                                <td rowspan="2">&nbsp;</td>
                                <td style="width:50px; border:1px solid #CCC;" class="text-center">&nbsp;CODIGO</td>
                                <td style="width:135px; color:red; border:1px solid #CCC;" class="text-center"><b>{{$manifiesto->numero}}</b></td>
                            </tr>
                            <tr>
                                <td class="text-center" style="border:1px solid #CCC;">AÑO</td>
                                <td class="text-center" style="border:1px solid #CCC;"><b>{{date('Y')}}</b></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="font-weight: bold; font-size:12px;">&nbsp;MANIFIESTO DE RESIDUOS SOLIDOS PELIGROSOS</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="font-size:2px;">&nbsp;</td>
                            </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td><b>&nbsp;1.0 GENERADOR</b> - Datos generales</td>
                            </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                            <tr>
                                <td style="width:110px">&nbsp;Razón Social y siglas</td>
                                <td class="text-center">{{strtoupper($manifiesto->sucursalcliente->cliente->razon_social)}}</td>
                            </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                            <tr>
                                <td style="width:70px;">&nbsp;N° RUC</td>
                                <td class=" text-center">{{strtoupper($manifiesto->sucursalcliente->cliente->ruc)}}</td>
                                <td style="width:40px;">&nbsp;E-mail</td>
                                <td class=" text-center">{{$manifiesto->sucursalcliente->email}}</td>
                                <td style="width:40px;">&nbsp;Tlf.</td>
                                <td class=" text-center" style="width:95px;">{{strtoupper($manifiesto->sucursalcliente->telefono)}}</td>
                            </tr>

                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td><b>&nbsp;DIRECCION DE LA PLANTA</b> (Establecimiento)</td>
                        </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td style="width:110px">&nbsp;Av.[] Jr.[] Calle[]</td>
                            <td class="text-center">{{strtoupper($manifiesto->sucursalcliente->direccion)}}</td>
                            <td style="width:40px;">&nbsp;N°.</td>
                            <td class="text-center" style="width:95px;">{{strtoupper($manifiesto->sucursalcliente->numero)}}</td>
                        </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td style="width:110px">&nbsp;Urbanización:</td>
                            <td style="width:163px" class="text-center">&nbsp;</td>
                            <td style="width:50px">&nbsp;Distrito</td>
                            <td class="text-center">{{strtoupper($manifiesto->sucursalcliente->distrito->nombre)}}</td>
                        </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td style="width:70px;">&nbsp;Provincia:</td>
                            <td style="width:162px;"class="text-center">{{strtoupper($manifiesto->sucursalcliente->distrito->provincia->nombre)}}</td>
                            <td style="width:40px;" class="border_derecha">&nbsp;Dep.</td>
                            <td class="text-center ">{{strtoupper($manifiesto->sucursalcliente->distrito->provincia->departamento->nombre)}}</td>
                            <td style="width:95px;" >&nbsp;C. Postal:</td>
                        </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td style="width:140px;">&nbsp;Representante Legal (Gerente):</td>
                            <td class="text-center">{{strtoupper($manifiesto->sucursalcliente->nombres_representante_legal)}}</td>
                            <td style="width:40px;">&nbsp;DNI</td>
                            <td style="width:95px;" class="text-center">{{strtoupper($manifiesto->sucursalcliente->dni_representante_legal)}}</td>
                        </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td >&nbsp;Personal Responsable (Profesional o técnico):</td>
                            <td class="text-center">{{strtoupper($manifiesto->nombres_responsable_tecnico_1)}}</td>
                            <td style="width:40px;">&nbsp;CIP/DNI</td>
                            <td style="width:95px;" class="text-center">{{strtoupper($manifiesto->dni_responsable_tecnico_1)}}</td>
                        </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td><b>&nbsp;1.1 DATOS DEL RESIDUO</b> (Llenar para cada tipo de residuo)</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr style="height:40px;">
                            <td style="height:40px;"><b>&nbsp;1.1.1 NOMBRE DEL RESIDUO:</b>&nbsp;
                                @foreach ($residuos as $residuo)
                                    {{strtoupper($residuo)}},&nbsp;
                                @endforeach
                            </td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td><b>&nbsp;1.1.2 CARACTERÍSTICAS:</b></td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                            <tr>
                                <td style="width:110px">&nbsp;a) Estado del residuo:</td>
                                <td class=" text-center " style="width:40px;">Sólido</td>
                                <td class=" text-center " style="width:20px;">@if (array_key_exists('Sólido', $estados)) X @endif</td>
                                <td class=" text-center " style="width:60px;">Semi Sólido</td>
                                <td class=" text-center " style="width:20px;">@if (array_key_exists('Semi Sólido', $estados)) X @endif</td>
                                <td class=" text-center " style="width:50px">Líquido</td>
                                <td class=" text-center " style="width:20px;">@if (array_key_exists('Líquido', $estados)) X @endif</td>
                                <td class="text-center" >Cantidad total ({{strtoupper($manifiesto->detalles[0]->recepcion->residuo->unidad)}})</td>
                                <td class=" text-center" style="width:95px;">{{number_format($total_peso, 2, '.', ',')}}</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td>&nbsp;b) Tipo de envase:</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td class="text-center" style="width:190px; line-height:1;">Recipiente<br>(especifique la forma)</td>
                            <td class="text-center" style="line-height:1;  vertical-align:middle;">Material</td>
                            <td class="text-center" style="width:95px; line-height:1;">Volumen<br>(L)(gal)(m3)(Kg)</td>
                            <td class="text-center" style="width:95px; line-height:1;  vertical-align:middle;">N° de recipientes</td>
                        </tr>
                        </table>

                        <?php $i=0;?>
                        @foreach ($manifiesto->detalles as $det)
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                            <tr>
                                <td class="text-center" style="width:190px;">{{strtoupper($det->recepcion->recipiente->nombre)}}</td>
                                <td class="text-center" >{{strtoupper($det->recepcion->recipiente->material->nombre)}}</td>
                                <td class="text-center" style="width:95px;">@if ($det->recepcion->volumen>0){{strtoupper($det->recepcion->volumen)}} @else &nbsp; @endif</td>
                                <td class="text-center" style="width:95px;">@if ($det->recepcion->nro_recipientes>0) {{strtoupper($det->recepcion->nro_recipientes)}} @else &nbsp; @endif</td>
                            </tr>
                        </table>
                        <?php $i=$i+1;?>
                        @endforeach
                        @for ($i; $i<6; $i++)
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                            <tr>
                                <td class="text-center" style="width:190px;">&nbsp;</td>
                                <td class="text-center" >&nbsp;</td>
                                <td class="text-center" style="width:95px;">&nbsp;</td>
                                <td class="text-center" style="width:95px;">&nbsp;</td>
                            </tr>
                        </table>
                        @endfor


                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                            <tr>
                            <td><b>&nbsp;1.1.3 PELIGROSIDAD:</b> (marque con una X donde corresponda)</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0">
                        <tr style="font-size:9px;">
                            <td style="vertical-align:middle; border-right:0; border-bottom:0; padding-top:3px; padding-bottom:3px;">&nbsp;a) Auto combustibilidad @if (array_key_exists('Auto combustibilidad', $peligrosidades)) <img src="http://jmc.test/images/squarex.png" width="13" height="13" style="margin-top:3px;"> @else <img src="http://jmc.test/images/square.png" width="11" height="11" style="margin-top:3px;"> @endif</td>
                            <td style="vertical-align:middle; border-right:0; border-left:0; border-bottom:0; padding-top:3px; padding-bottom:3px;">&nbsp;b) Reactividad  @if (array_key_exists('Reactividad', $peligrosidades)) <img src="http://jmc.test/images/squarex.png" width="13" height="13" style="margin-top:3px;"> @else <img src="http://jmc.test/images/square.png" width="11" height="11" style="margin-top:3px;"> @endif</td>
                            <td style="vertical-align:middle; border-right:0; border-left:0; border-bottom:0; padding-top:3px; padding-bottom:3px;">&nbsp;c) Patogenicidad @if (array_key_exists('Patogenicidad', $peligrosidades)) <img src="http://jmc.test/images/squarex.png" width="13" height="13" style="margin-top:3px;"> @else <img src="http://jmc.test/images/square.png" width="11" height="11" style="margin-top:3px;"> @endif</td>
                            <td style="vertical-align:middle; border-bottom:0; border-left:0; padding-top:3px; padding-bottom:3px;">&nbsp;d) Explosividad @if (array_key_exists('Explosividad', $peligrosidades)) <img src="http://jmc.test/images/squarex.png" width="13" height="13" style="margin-top:3px;"> @else <img src="http://jmc.test/images/square.png" width="11" height="11" style="margin-top:3px;"> @endif</td>
                            <td class="text-center" rowspan="2" style="vertical-align: middle;">CONTRA EL MEDIO AMBIENTE</td>
                        </tr>
                        <tr style="font-size:9px;">
                            <td style="vertical-align:middle; border-right:0; border-top:0; padding-top:3px; padding-bottom:3px;">&nbsp;e) Toxicidad @if (array_key_exists('Toxicidad', $peligrosidades)) <img src="http://jmc.test/images/squarex.png" width="13" height="13" style="margin-top:3px;"> @else <img src="http://jmc.test/images/square.png" width="11" height="11" style="margin-top:3px;"> @endif</td>
                            <td style="vertical-align:middle; border-right:0; border-left:0; border-top:0; padding-top:3px; padding-bottom:3px;">&nbsp;f) Corrosividad @if (array_key_exists('Corrosividad', $peligrosidades)) <img src="http://jmc.test/images/squarex.png" width="13" height="13" style="margin-top:3px;"> @else <img src="http://jmc.test/images/square.png" width="11" height="11" style="margin-top:3px;"> @endif</td>
                            <td style="vertical-align:middle; border-right:0; border-left:0; border-top:0; padding-top:3px; padding-bottom:3px;">&nbsp;g) Radioactividad @if (array_key_exists('Radioactividad', $peligrosidades)) <img src="http://jmc.test/images/squarex.png" width="13" height="13" style="margin-top:3px;"> @else <img src="http://jmc.test/images/square.png" width="11" height="11" style="margin-top:3px;"> @endif</td>
                            <td style="vertical-align:middle; border-top:0; border-left:0; padding-top:3px; padding-bottom:3px;">&nbsp;h) Otros (especifique)</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td><b>&nbsp;1.1.3 PLAN DE CONTINGENCIA:</b></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;a) Indicar la acción a adoptar en caso de ocurrencia de algun evento no previsto</b></td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td style="width:100px; border-right:0; border-bottom:0; padding-top:2px; padding-bottom:5px;">&nbsp;Derrame</td>
                            <td style="border-left:0; border-bottom:0; padding-top:2px; padding-bottom:5px;">&nbsp;Aislamiento del área, secado conpaños absorventes, limpieza y desinfección.</td>
                        </tr>
                        <tr>
                            <td style="width:100px; border-right:0; border-bottom:0; border-top:0; padding-top:5px; padding-bottom:5px;">&nbsp;Infiltración</td>
                            <td style="border-left:0; border-bottom:0; border-top:0; padding-top:5px; padding-bottom:5px;">&nbsp;Inertización, remediación o retirar la parte contaminada a un relleno de seguridad.</td>
                        </tr>
                        <tr>
                            <td style="width:100px; border-right:0; border-bottom:0; border-top:0; padding-top:5px; padding-bottom:5px;">&nbsp;Incendio</td>
                            <td style="border-left:0; border-bottom:0; border-top:0; padding-top:5px; padding-bottom:5px;">&nbsp;Sofocación inicialcon extintor tipo ABC</td>
                        </tr>
                        <tr>
                            <td style="width:100px; border-right:0; border-bottom:0; border-top:0; padding-top:5px; padding-bottom:5px;">&nbsp;Explosión</td>
                            <td style="border-left:0; border-bottom:0; border-top:0; padding-top:5px; padding-bottom:5px;">&nbsp;Aislamiento de la zona y solicitar apoyo de la policia nacional y defensa civil</td>
                        </tr>
                        <tr>
                            <td style="width:100px; border-right:0; border-top:0; padding-top:5px; padding-bottom:3px;">&nbsp;Otros accidentes</td>
                            <td style="border-left:0; border-top:0; padding-top:5px; padding-bottom:3px;">&nbsp;Aplicar el plan de contingencia correspondiente</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td><b>&nbsp;b) Directorio telefónico de contacto de emergencia</b></td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td class="text-center" style="width:190px;">Empresa / dependencia de salud</td>
                            <td class="text-center" style="width:190px;">Persona de contacto</td>
                            <td class="text-center">Tlf. (indicar cod. ciudad)</td>
                        </tr>
                        <tr>
                            <td class="text-center">JMC GERENCIA Y CONSTRUCCION SAC</td>
                            <td class="text-center">JUAN CARLOS TORRES ESTRADA</td>
                            <td class="text-center">974926556</td>
                        </tr>
                        <tr>
                            <td class="text-center">JMC GERENCIA Y CONSTRUCCION SAC</td>
                            <td class="text-center">FREDDY CACERES QUISPE</td>
                            <td class="text-center">962611879</td>
                        </tr>
                        <tr>
                            <td class="text-center">RADIO PATRULLA</td>
                            <td class="text-center">&nbsp;</td>
                            <td class="text-center">105</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="padding:0;">
                        <tr>
                            <td style="width:100px; height:46px;">&nbsp;Observaciones:</td>
                            <td style="height:46px;">&nbsp;</td>
                        </tr>
                        </table>
                        <table class="table" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding-top:15px; text-align:left; color:red; font-weight: bold; border-top:1px #ddd solid;">&nbsp;{{strtoupper($pie)}}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:2%;">&nbsp;</td>
                    <td style="width:49%;">
                        <table class="table" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td style="text-align:right;">&nbsp;</td>
                                <td style="text-align:center; width:60px; border:1px solid #CCC;">&nbsp;AÑO</td>
                                <td style="text-align:center; width:100px; border:1px solid #CCC;">&nbsp;{{date('Y')}}</td>
                            </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td><b>&nbsp;2.0 EPS-RS TRANSPORTISTA</b></td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td style="width:110px;">&nbsp;Razón Social y siglas</td>
                                <td class="text-center">JMC GENRENCIA Y CONSTRUCCION SAC</td>
                                <td class="text-center" style="width:160px;">N° RUC: 20601440220</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td style="width:130px;">&nbsp;N° Registro EPS-RS</td>
                            <td>&nbsp;Fecha Vcto.</td>
                            <td style="width:160px;">&nbsp;N° Autorización Municipal.</td>
                            <td style="width:160px;">&nbsp;N° Aprobación de ruta (*).</td>
                        </tr>
                        <tr style="font-weight:bold;">
                            <td class="text-center">EP-0801-048.17</td>
                            <td class=" text-center">17/11/2021</td>
                            <td class=" text-center">0011-T / 1506</td>
                            <td class="text-center">708-2019-MTC/15</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td style="width:130px;">&nbsp;Dirección Av.[] Jr.[] Calle[]</td>
                            <td class="text-center">Sector Oscollopampa Lote 3 Via de Evitamiento</td>
                            <td style="width:160px;" class="text-center">&nbsp;N° S/N</td>

                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td style="width:180px;">&nbsp;Urbanización</td>
                            <td>&nbsp;Distrito: SAN JERÓNIMO</td>
                            <td style="width:160px;">&nbsp;Provincia: CUSCO</td>
                        </tr>
                        <tr>
                            <td style="width:180px;">&nbsp;Departamento: Cusco</td>
                            <td class="col-sm-4 border_derecha">&nbsp;Tlf(s). 084247012 / 974926556</td>
                            <td style="width:160px;">&nbsp;EMAIL: jtorres@jmceco.com</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td>&nbsp;Representante Legal: Juan Carlos Torres Estrada</td>
                            <td style="width:160px;">&nbsp;DNI: 24006680</td>
                        </tr>
                        <tr>
                            <td>&nbsp;Ingeniero Responsable: Juan Carlos Torres Estrada</td>
                            <td style="width:160px;">&nbsp;CIP: 71436</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td style="width:110px;">&nbsp;Observaciones: </td>
                            <td>&nbsp;</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td >&nbsp;Nombre del chofer del vehiculo </td>
                            <td style="width:100px;">&nbsp;Tipo de vehiculo</td>
                            <td style="width:100px;">&nbsp;Número de placa </td>
                            <td style="width:80px;">&nbsp;Cantidad (TM)</td>
                        </tr>
                        <tr style="font-weight: bold;">
                            <td class="text-center">&nbsp;{{strtoupper($manifiesto->conductor->nombres)}}</td>
                            <td class="text-center" style="width:100px;">&nbsp;{{strtoupper($manifiesto->transporte->tipo_vehiculo)}}</td>
                            <td class="text-center" style="width:100px;">&nbsp;{{strtoupper($manifiesto->transporte->placa)}}</td>
                            <td class="text-center" style="width:80px;">&nbsp;{{number_format($total_peso/1000, 3, '.', ',')}}</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td>&nbsp;<b>REFRENDOS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Generador - Responsable del Area Técnica del Manejo de Residuos</b></td>

                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr style="vertical-align: middle;">
                            <td style="height:40px; width:60px; vertical-align: middle;">&nbsp;Nombres: </td>
                            <td class="text-center" style="height:40px; vertical-align: middle;">{{strtoupper($manifiesto->nombres_responsable_tecnico_2)}}</td>
                            <td  style="height:40px; width:40px; vertical-align: middle;">&nbsp;Firma: </td>
                            <td class="text-center" style="height:40px; width:160px;">&nbsp;</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td class="text-center"><b>EPS-RS Transporte - Responsable</b></td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr style="height:30px;">
                            <td style="height:30px; width:60px; vertical-align: middle;">&nbsp;Nombres: </td>
                            <td colspan="4" class="text-center" style="height:30px; vertical-align: middle;">JUAN CARLOS TORRES ESTRADA</td>
                            <td style="height:30px; width:40px; vertical-align: middle;">&nbsp;Firma: </td>
                            <td class="text-center" style="height:30px; width:160px; border-bottom:0;">&nbsp;</td>
                        </tr>
                        </table>
                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td style="width:50px; height:10px;">&nbsp;Lugar: </td>
                                <td style="width:60px; height:10px;" class="text-center">&nbsp;Cusco</td>
                                <td style="height:10px;">&nbsp;Fecha: </td>
                                <td style="width:80px; height:10px;">&nbsp;Hora: </td>
                                <td style="width:160px; border-top:0;" class="text-center">&nbsp;</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td><b>&nbsp;3.0 EPS-RS o EC-RS DEL DESTINO FINAL</b></td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td>&nbsp;Marque la opcion que corresponda: </td>
                            <td style="width:90px;" class="text-center">Tratamiento</td>
                            <td style="width:20px;" class="text-center">&nbsp;</td>
                            <td style="width:90px;"class="text-center">Relleno de seguridad</td>
                            <td style="width:20px;" class="text-center">X</td>
                            <td style="width:60px;" class="text-center">Exportacion</td>
                            <td style="width:20px;" class="text-center">&nbsp;</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td style="width:110px;">&nbsp;Razón Social y siglas</td>
                                <td class="text-center">{{strtoupper($manifiesto->sucursalplanta->planta->razon_social)}}</td>
                                <td class="text-center" style="width:160px;">N° RUC: {{strtoupper($manifiesto->sucursalplanta->planta->ruc)}}</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td style="width:80px;">&nbsp;N° Registro</td>
                            <td style="width:60px;">&nbsp;Fecha Vcto.</td>
                            <td>&nbsp;R.D. N° Autorizacion Sanitaria</td>
                            <td>&nbsp;N° Autorizacion Municipal</td>
                            <td>&nbsp;Notif. al pais Importador</td>
                        </tr>
                        <tr style="font-weight:bold;">
                            <td class="text-center">{{strtoupper($manifiesto->sucursalplanta->planta->registro_digesa)}}</td>
                            <td class="text-center">{{strtoupper($manifiesto->sucursalplanta->planta->fecha_vencimiento_digesa)}}</td>
                            <td @if (strlen($manifiesto->sucursalplanta->planta->autorizacion_sanitaria)>21) style="font-size:7px;" @endif class="text-center">{{strtoupper($manifiesto->sucursalplanta->planta->autorizacion_sanitaria)}}</td>
                            <td class="text-center">{{strtoupper($manifiesto->sucursalplanta->planta->autorizacion_municipal)}}</td>
                            <td class="text-center">&nbsp;</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td style="width:80px;">&nbsp;Dirección</td>
                                <td class="text-center">{{strtoupper($manifiesto->sucursalplanta->direccion)}}</td>
                                <td style="width:80px;" class="text-center">&nbsp;N° {{strtoupper($manifiesto->sucursalplanta->numero)}}</td>

                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td style="width:180px;">&nbsp;Urbanización</td>
                                <td>&nbsp;Distrito: {{strtoupper($manifiesto->sucursalplanta->distrito->nombre)}}</td>
                                <td style="width:160px;">&nbsp;Provincia: {{strtoupper($manifiesto->sucursalplanta->distrito->provincia->nombre)}}</td>
                            </tr>
                            <tr>
                                <td style="width:180px;">&nbsp;Departamento: {{strtoupper($manifiesto->sucursalplanta->distrito->provincia->departamento->nombre)}}</td>
                                <td class="col-sm-4 border_derecha">&nbsp;Tlf(s). {{strtoupper($manifiesto->sucursalplanta->telefono)}}</td>
                                <td style="width:200px;">&nbsp;E-mail: {{$manifiesto->sucursalplanta->email}}</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td>&nbsp;Representante Legal: {{strtoupper($manifiesto->sucursalplanta->nombres_representante_legal)}}</td>
                                <td style="width:160px;">&nbsp;DNI/CE: {{strtoupper($manifiesto->sucursalplanta->dni_representante_legal)}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;Ingeniero Responsable: {{strtoupper($manifiesto->planta_nombres_responsable_tecnico_1)}}</td>
                                <td style="width:160px;">&nbsp;CIP: {{strtoupper($manifiesto->planta_cip_responsable_tecnico_1)}}</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td>&nbsp;Cantidad de residuos peligrosos entregados y recepcionados (TM)</td>
                            <td style="width:160px;">&nbsp;</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr>
                            <td style="width:80px;">&nbsp;Observaciones: </td>
                            <td>&nbsp;</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td>&nbsp;<b>REFRENDOS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EPS-RS Transporte - Responsable</b></td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr style="height:40px;">
                            <td style="height:30px; width:50px;">&nbsp;Nombres: </td>
                            <td class="text-center" style="height:40px; vertical-align:middle;">JUAN CARLOS TORRES ESTRADA</td>
                            <td class="text-center" style="height:40px; width:230px;">&nbsp;</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr style="font-weight: bold;">
                            <td class="text-center">EPS-RS Tratamiento, Disposición Final o EC-RS de Exportación a Aduana - Responsables</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr style="height:30px;">
                                <td style="height:30px; width:50px;">&nbsp;Nombres: </td>
                                <td class="text-center" style="height:30px; vertical-align:middle;">{{strtoupper($manifiesto->planta_nombres_responsable_tecnico_2)}}</td>
                                <td style="height:30px; width:230px;">&nbsp;Firma</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td style="width:50px; height:10px;">&nbsp;Lugar: </td>
                                <td style="width:60px; height:10px;" class="text-center">&nbsp;Cusco</td>
                                <td style="height:10px;">&nbsp;Fecha: </td>
                                <td style="width:80px; height:10px;">&nbsp;Hora: </td>
                                <td style="width:230px; border-top:0;" class="text-center">&nbsp;</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr style="font-weight: bold;">
                                <td>&nbsp;<b>REFRENDOS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Devolución del manifiesto al Generador (Responsable Ténico)</b></td></td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr style="height:40px;">
                                <td style="height:42px; width:50px;">&nbsp;Nombres: </td>
                                <td class="text-center" style="height:40px; vertical-align:middle;">{{strtoupper($manifiesto->nombres_responsable_tecnico_3)}}</td>
                                <td style="height:40px; width:230px;">&nbsp;Firma</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                        <tr style="font-weight: bold;">
                            <td class="text-center">EPS-RS Transporte - Responsable</td>
                        </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr style="height:30px;">
                                <td style="height:30px; width:50px;">&nbsp;Nombres: </td>
                                <td class="text-center" style="height:30px; vertical-align:middle;">JUAN CARLOS TORRES ESTRADA</td>
                                <td style="height:30px; width:230px; border-bottom:0;">&nbsp;Firma</td>
                            </tr>
                        </table>

                        <table class="table table-bordered" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td style="width:50px; height:10px;">&nbsp;Lugar: </td>
                                <td style="width:60px; height:10px;" class="text-center">&nbsp;Cusco</td>
                                <td style="height:10px;">&nbsp;Fecha: </td>
                                <td style="width:80px; height:10px;">&nbsp;Hora: </td>
                                <td style="width:230px; border-top:0;" class="text-center">&nbsp;</td>
                            </tr>
                        </table>

                        <table class="table" cellspacing="0" cellpadding="0" style="margin:0;">
                            <tr>
                                <td style="text-align:right; color:red; font-weight: bold; border-top:1px #ddd solid;">&nbsp;{{strtoupper($pie)}}</td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
            </table>


            </div><!-- row -->


        </div><!-- panel-body -->
    </div><!-- panel -->

</div><!-- contentpanel -->
@endforeach
</body>
</html>
