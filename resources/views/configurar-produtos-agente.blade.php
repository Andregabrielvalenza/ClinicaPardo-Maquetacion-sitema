@extends('layouts.sistema')
@section('content')
	<div class="mainpanel">
		<div class="contentpanel">
			<div class="div_datosempresa" style="height: auto;">
				<!--<img src="/images/Grupo-717.png" width="190px">-->
				<h4><b>Configurar</b></h4>
				<p>Mis productos</p>
			</div>
			<div class="acordion">
				@can('config-cuenta-agente')
					<form action="{{route('guardar-config-planes-agente')}}" method="post" id="form-config" name="form-config">
						<div class="accordion-wrap">

							@if(count($tipos_de_seguros)>0)
								@foreach($tipos_de_seguros as $tipo)
									<div class="accordion-item" data-ida="{{$tipo->id}}">
										<p class="accordion-header">
											<b>{{$tipo->nombre}}</b>
											<i class="glyphicon glyphicon-chevron-right icono_acordion" aria-hidden="true"></i>
										</p>
									</div>
									<div class="accordion-text" id="accordion-text-{{$tipo->id}}">
										@if(count($tipo->planes)>0)
											@foreach($tipo->planes as $plan)
												<div style="width: 100%;display: flex;align-items: center;position: relative;" class="div_acordion">
													<input type="checkbox" name="planes[]" class="mgc mgc-primary mgc-primary-1" id="plan-{{$plan->id}}" data-idch="{{$plan->id}}" value="{{$plan->id}}">
													<label for="plan-{{$plan->id}}" class="letra_checbox" style="margin-left: 10px;margin-top: 10px;color: #717171; cursor: pointer;">
														{{$plan->aseguradora->nombre}} - {{$plan->nombre}}
													</label>
													<div class="porcentaje" id="porcentaje-{{$plan->id}}">

													</div>
												</div>
											@endforeach
										@endif
									</div>
								@endforeach
							@endif
						</div>
						<div style="text-align: center;">
							{!! csrf_field() !!}
							<a href="/configuracion-estructura-agente">
								<button class="guardarbutton" type="button">Atras</button>
							</a>
							<button class="guardarbutton" type="submit">Continuar</button>
						</div>
					</form>
				@endcan
			</div>
		</div>
	</div>
</section>
<!-- Fin que cubre nuestro seguro -->
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

		var array_accodion_activo=new Array();
        $(".accordion-item").on("click", function(){
            var id_text_accordion=$(this).data('ida');
			var validar=array_accodion_activo.indexOf(id_text_accordion);

			if(validar==-1)
			{
			    // no existe
				array_accodion_activo.push(id_text_accordion);
                $(this).toggleClass("accordion-no-bar");
                $(this).next().slideToggle(300);
                $(this).find(".accordion-header").removeClass("accordion-gold");
                $(this).find(".accordion-header i").addClass("rotate-fa");
                $(this).find(".accordion-header").toggleClass("accordion-gold");
                $(this).find(".fas").toggleClass("rotate-fa");
			}
			else
			{
			    // Si existe
				array_accodion_activo.splice(validar,1);
                $(this).find(".accordion-header i").removeClass("rotate-fa");
                $('#accordion-text-'+id_text_accordion).slideUp(300);
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
            $('#comision-'+id_checkbox).focus();
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
@endsection