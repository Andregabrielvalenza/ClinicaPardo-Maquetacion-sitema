@extends('layouts.sistema')
@section('content')
    <div class="mainpanel">
    	<div class="contentpanel">
    		<div class="div_datosempresa ">
				<!--<img src="/images/Grupo-717.png" width="190px">-->
				<h4><b>Configurar</b></h4>
				<p>Datos de agente</p>
				<p class="font_estructura">¿Perteneces a una estructura?</p>
				<div class="dos_cuadrados">
					<a href="#popup1" class="btn" style="cursor: pointer;"><b>SI</b></a>
					<a href="/configuracion-productos-agente" class="btn" style="cursor: pointer;"><b>NO</b></a>
				</div>
			</div>
    	</div>
    </div>
</section>
<!-- MODAL -->
    <div id="popup1" class="overlay">
		<div class="popup formulario_modal">
			<form action="{{route('add-agente-red')}}" method="post" name="add-agente">
				<div style="text-align: center;">
					<a class="close" href="#">
						<div class="modal_close icono"></div>
					</a>
					<p style="color: #fff;margin-top: 50px;margin-bottom: 50px;">Anéxate a la estructura<br> de tu empresa</p>
					<div class="input_modal">
						<i class="glyphicon glyphicon-edit"></i>
						<input type="text" name="codigo" placeholder="¿Tienes código de referencia?" required>
					</div>
					{!! csrf_field() !!}
					<button type="submit" class="btn btn_modal">Siguiente</button>
				</div>
			</form>
		</div>
    </div>
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
		@isset($mensaje)
            $( document ).ready(function() {
                jQuery.gritter.add({
                    title: 'Error!',
                    text: '{{ $mensaje }}',
                    class_name: 'growl-danger',
                    image: 'images/screen.png',
                    sticky: false,
                    time: ''
                });
            });
		@endisset
	</script>
@endsection