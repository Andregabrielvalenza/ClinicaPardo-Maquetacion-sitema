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
					<a href="#popup1" class="btn"><b>SI</b></a>
					<a href="/configuracion-productos-agente" class="btn"><b>NO</b></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- MODAL -->
    <div id="popup1" class="overlay">
		<div class="popup formulario_modal">
			<div style="text-align: center;">
				 <a class="close" href="#">
				 	<div class="modal_close icono"></div>
				 </a>
			   <p style="color: #fff;margin-top: 50px;margin-bottom: 50px;">Anéxate a la estructura<br> de tu empresa</p> 
			   <div class="input_modal">
                    <i class="glyphicon glyphicon-edit" id="procesar_codigo" style="cursor:pointer;"></i>
                    <input type="text" name="cupon_agente" id="cupon_referencia" placeholder="¿Tienes código de referencia?">
                </div> 
                <a href="" class="btn btn_modal">Siguiente</a>
			</div>
		</div>
    </div>
@endsection