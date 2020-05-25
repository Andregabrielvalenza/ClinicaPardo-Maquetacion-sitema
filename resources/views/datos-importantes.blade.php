@extends('layouts.sistema')
@section('content')
	<div class="mainpanel">
		<div class="contentpanel">
			@if($tipo_registro==0)
				<form action="{{route('guardar-datos-importante')}}" method="post" name="form-1">
					<div class="div_datosempresa">
						<h4><b>Completar Datos</b></h4>
						<p>A Continuacion se le solicitaran unos datos importante para su cuenta de Agente, ya que se registro por un medio externo como (Facebook, Google).</p>
						<input type="text" name="telefono" required pattern="^(\+?( |-|\.)?\d{1,2}( |-|\.)?)?(\(?\d{3}\)?|\d{3})( |-|\.)?(\d{3}( |-|\.)?\d{4})$" title="El formato no coincide debes ingresar el prefijo de tu pais y seguido el numero de telefono." placeholder="Teléfono (Ejemplo: +51895789789)">
						<input type="hidden" name="tipo_registro" value="{{$tipo_registro}}">
						{!! csrf_field() !!}
						<button type="submit">Ok</button>
					</div>
				</form>
			@else
				<form action="{{route('guardar-datos-importante')}}" method="post" name="form-2">
					<div class="div_datosempresa">
						<h4><b>Datos de empresa</b></h4>
						<p>A Continuacion se le solicitaran unos datos importante para su cuenta de Empresa.</p>
						<input type="text" name="nombre_comercial" placeholder="Nombre comercial" required>
						<input type="number" name="ruc" placeholder="Numero de Ruc" required>
						<input type="text" name="telf" required pattern="^(\+?( |-|\.)?\d{1,2}( |-|\.)?)?(\(?\d{3}\)?|\d{3})( |-|\.)?(\d{3}( |-|\.)?\d{4})$" title="El formato no coincide debes ingresar el prefijo de tu pais y seguido el numero de telefono." placeholder="Teléfono (Ejemplo: +51895789789)">
						<input type="email" name="correo" placeholder="Correo electrónico" required>
						<input type="text" name="direccion" placeholder="Dirección" required>
						<input type="hidden" name="tipo_registro" value="{{$tipo_registro}}">
						{!! csrf_field() !!}
						<button type="submit">Ok</button>
					</div>
				</form>
 			@endif
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
	</script>
@endsection