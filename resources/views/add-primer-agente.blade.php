@extends('layouts.sistema')
@section('content')
    <div class="mainpanel">
        <div class="contentpanel">
            <form action="{{route('guardar-primer-agente')}}" method="post" name="form-1">
                <div class="div_datosempresa" style="height:45vh;">
                    <h4><b>Agregar agente a la estructura</b></h4>
                    <p>Quien es</p>
                    <?php
                    // Generamos un codigo a partir de la fecha y hora actual
                        $fecha_hora=date("Y/m/d h:i:sa");
                        $codigo=strtotime($fecha_hora);
                    ?>
                    <input type="text" name="alias" required placeholder="Alias">
                    <input type="text" name="cargo" required placeholder="Cargo">
                    <label style="text-align: left;width: 100%;margin-top: 5px;">Código de afiliación <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Este codigo debe ser compartido con el agente para verificación de su código de afiliación con la empresa"></i></label>
                    <input type="text" name="codigo" readonly value="{{$codigo}}">
                </div>
                <div class="div_datosempresa" style="height: auto;">
                    <h4><b>Configurar</b></h4>
                    <p>Los productos para su Primer Agente</p>
                </div>
                <div class="acordion">
                    <div class="accordion-wrap">
                        @if(count($tipos_de_seguros)>0)
                            @foreach ($tipos_de_seguros as $tipo)
                                <div class="accordion-item" data-ida="{{$tipo->id}}">
                                    <p class="accordion-header">
                                        {{$tipo->nombre}}
                                        <i class="glyphicon glyphicon-chevron-right icono_acordion" aria-hidden="true"></i>
                                    </p>
                                </div>
                                <div class="accordion-text" id="accordion-text-{{$tipo->id}}">
                                    @foreach ($user_empresa->primerEmpresa->Empresa->planes_por_tipo_nuevo($tipo->id)->empresaplanes as $empresa)
                                        @if($empresa->plan!=null)
                                            <div style="width: 100%;display: flex;align-items: center;position: relative;" class="div_acordion">
                                                <input type="checkbox" name="planes[]" class="mgc mgc-primary mgc-primary-1" data-idch="{{$empresa->plan['id']}}" value="{{$empresa->plan['id']}}">
                                                <span class="letra_checbox" style="margin-left: 10px;margin-top: 8px;color: #717171;">
                                                    {{$empresa->plan['aseguradora']['nombre']}} - {{$empresa->plan['nombre']}}
                                                </span>
                                                <div class="porcentaje" id="porcentaje-{{$empresa->plan['id']}}">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div style="text-align: center;">
                        {!! csrf_field() !!}
                        <button class="guardarbutton" type="submit">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('scripts')
	<script>
        // Mostrar mensaje del error de la validacion Laravel
		@if ($errors->any())
			@foreach ($errors->all() as $error)
				$( document ).ready(function() {
					jQuery.gritter.add({
						title: 'Error!',
						text: '{{ $error }}',
						class_name: 'growl-danger',
						image: 'images/screen.png',
						sticky: false,
						time: ''
					});
				});
			@endforeach
		@endif

        var estado=0;
        $(".accordion-item").on("click", function(){
            var id_text_accordion=$(this).data('ida');
            if(estado==0)
            {
                $(this).toggleClass("accordion-no-bar");
                $(this).next().slideToggle(300);
                $(this).find(".accordion-header").removeClass("accordion-gold");
                $(this).find(".accordion-header i").addClass("rotate-fa");
                $(this).find(".accordion-header").toggleClass("accordion-gold");
                $(this).find(".fas").toggleClass("rotate-fa");
                estado=1;
            }
            else
            {
                $(this).find(".accordion-header i").removeClass("rotate-fa");
                $('#accordion-text-'+id_text_accordion).slideUp(300);
                estado=0;
            }
        });

        var contador_checkbox=0;

        $(".mgc").on("click", function(){
            var id_checkbox=$(this).data('idch');
            if($(this).is(':checked'))
            {
                //$('#porcentaje-'+id_checkbox).css({'display':'flex'});
                ///$('#comision-'+id_checkbox).prop('required', true);
                var html='<div class="border_bottom"><input id="comision-'+id_checkbox+'" step="0.01" type="number" name="comision[]" min="1" max="100" required></div><p>%</p>';
                $('#porcentaje-'+id_checkbox).html(html);
                contador_checkbox++;
            }
            else
            {
                //$('#porcentaje-'+id_checkbox).css({'display':'none'});
                //$('#comision-'+id_checkbox).prop('required', false);
                $('#porcentaje-'+id_checkbox).empty();
                contador_checkbox--;
            }
            // Codigo para bloquear el boton de guardar
            /*if (contador_checkbox==0)
            {
                $('.guardarbutton').prop('disabled', true);
            }
            else
            {
                $('.guardarbutton').prop('disabled', false);
            }*/
        });
        $( "#form-config" ).submit(function( event ) {
            //Mostramos mensaje
            if (contador_checkbox==0)
            {
                event.preventDefault();
                jQuery.gritter.add({
                    title: 'Error!',
                    text: 'Debe seleccionar un plan o producto antes de continuar.',
                    class_name: 'growl-danger',
                    image: 'images/screen.png',
                    sticky: false,
                    time: ''
                });
            }
        });

	</script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection