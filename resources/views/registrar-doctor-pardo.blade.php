@extends('layouts.sistema')
@section('content')

        <div class="mainpanel" style="background-color: #eeebe5;">
            <div class="contentpanel">
              <h1 class="titulo_paginas_pardo">Registrar nuevo / editar doctor</h1>
               <div class="div_blanco_grande">
                   <div class="div_perfl_paciente">
                     <div class="div_perfl_paciente1">
                       <div class="perfil_pacinetes">
                         <div class="img_pacientes">
                           <img src="images/Pic1.png">
                         </div>
                         <div class="descripcios_pacientes">
                           <input type="text" name="" placeholder="Nombres" class="color_placeholder mb5">
                           <input type="text" name="" placeholder="Apellidos" class="color_placeholder">
                         </div>
                       </div>
                       <ul style="list-style-type: none;" class="nopadding mt10">
                         <li>
                           <span class="lis_span1">DNI</span> <input type="numbertext" name="" class="input_dni ml10">
                         </li>
                         <li class="mt5">
                           <span class="lis_span1">Fecha de nacimiento</span><input type="numbertext" name="" class="input_dni ml10">
                         </li>
                       </ul>
                       <div></div>
                     </div>
                     <div class="div_perfl_paciente2">
                       <h4 class="h4_pacinets">Contacto</h4>
                       <ul style="list-style-type: none;" class="nopadding">
                         <li class="mt10">
                           <img src="images/X4fxS1.tif.png" width="12px" class="mr5">
                           <input type="number" name="" class="input_list_datos">
                         </li>
                         <li class="mt10">
                           <img src="images/xbeG45.tif.png" width="12px" class="mr5">
                           <input type="email" name="" class="input_list_datos">
                         </li>
                         <li class="mt10">
                           <img src="images/mD4mWq.tif.png" width="12px" class="mr5">
                            <input type="text" name="" class="input_list_datos">
                         </li>
                       </ul>
                     </div>
                   </div>
                   <div class="div_datos">
                     <h4 class="h4_font">Datos generales</h4>
                     <div class="div_opucacion_obser mt20 datos1">
                       <div class="div_ocupacion">
                         <p class="igual_font_color mb0">Título</p>
                         <input type="numbertext" name="" class="input_iguales_datos">
                         <p class="igual_font_color mb0">Nº de colegiatura</p>
                         <input type="numbertext" name="" class="input_iguales_datos">
                         <p class="igual_font_color mb0">Especialidad</p>
                         <input type="numbertext" name="" class="input_iguales_datos">
                         <p class="igual_font_color mb0">RNE</p>
                         <input type="numbertext" name="" class="input_iguales_datos">
                         <p class="igual_font_color mb0">En pardo desde</p>
                         <input type="numbertext" name="" class="input_iguales_datos">
                         <p class="igual_font_color mb0">Estado</p>
                         <input type="numbertext" name="" class="input_iguales_datos">
                       </div>
                       <div class="div_observacion">
                         <p class="igual_font_color mb0">Observaciones</p>
                         <textarea class="form-control input_iguales_obser input_observa" rows="5"></textarea>
                         <p class="igual_font_color mb0">Adicional</p>
                         <textarea class="form-control input_iguales_obser input_iguales" rows="5"></textarea>
                         <p class="igual_font_color mb0">Observaciones</p>
                         <textarea class="form-control input_iguales_obser input_iguales" rows="5"></textarea>
                       </div>
                     </div>
                   </div>
               </div>
               <div class="div_blanco_peque div_proximas">
                <div class="proximas_citas">
                  <h4 class="h4_font mb30">Configurar horarios de atención</h4>
                  <div class="div_configurar_atencion">
                    <input type="checkbox" class="mgc mgc-primary mgc-primary-1 nopadding mt0" id="acepto-terminos">
                    <div class="dias">
                      Todos los dias
                    </div>
                    <div class="input_horas">
                      <input type="number" name="" class="input_dias">-<input type="number" name="" class="input_dias"> y de <input type="number" name="" class="input_dias">-<input type="" name="" class="input_dias">
                    </div>
                  </div>
                  <div class="div_configurar_atencion">
                    <input type="checkbox" class="mgc mgc-primary mgc-primary-1 nopadding mt0" id="acepto-terminos">
                    <div class="dias">
                      Lunes - jueves
                    </div>
                    <div class="input_horas">
                      <input type="number" name="" class="input_dias">-<input type="number" name="" class="input_dias"> y de <input type="number" name="" class="input_dias">-<input type="" name="" class="input_dias">
                    </div>
                  </div>
                  <div class="div_configurar_atencion">
                    <input type="checkbox" class="mgc mgc-primary mgc-primary-1 nopadding mt0" id="acepto-terminos">
                    <div class="dias">
                      Lunes
                    </div>
                    <div class="input_horas">
                      <input type="number" name="" class="input_dias">-<input type="number" name="" class="input_dias"> y de <input type="number" name="" class="input_dias">-<input type="" name="" class="input_dias">
                    </div>
                  </div>
                  <div class="div_configurar_atencion">
                    <input type="checkbox" class="mgc mgc-primary mgc-primary-1 nopadding mt0" id="acepto-terminos">
                    <div class="dias">
                      Martes
                    </div>
                    <div class="input_horas">
                      <input type="number" name="" class="input_dias">-<input type="number" name="" class="input_dias"> y de <input type="number" name="" class="input_dias">-<input type="" name="" class="input_dias">
                    </div>
                  </div>
                  <div class="div_configurar_atencion">
                    <input type="checkbox" class="mgc mgc-primary mgc-primary-1 nopadding mt0" id="acepto-terminos">
                    <div class="dias">
                      Miércoles
                    </div>
                    <div class="input_horas">
                      <input type="number" name="" class="input_dias">-<input type="number" name="" class="input_dias"> y de <input type="number" name="" class="input_dias">-<input type="" name="" class="input_dias">
                    </div>
                  </div>
                  <div class="div_configurar_atencion">
                    <input type="checkbox" class="mgc mgc-primary mgc-primary-1 nopadding mt0" id="acepto-terminos">
                    <div class="dias">
                      Jueves
                    </div>
                    <div class="input_horas">
                      <input type="number" name="" class="input_dias">-<input type="number" name="" class="input_dias"> y de <input type="number" name="" class="input_dias">-<input type="" name="" class="input_dias">
                    </div>
                  </div>
                  <div class="div_configurar_atencion">
                    <input type="checkbox" class="mgc mgc-primary mgc-primary-1 nopadding mt0" id="acepto-terminos">
                    <div class="dias">
                      Viernes
                    </div>
                    <div class="input_horas">
                      <input type="number" name="" class="input_dias">-<input type="number" name="" class="input_dias"> y de <input type="number" name="" class="input_dias">-<input type="" name="" class="input_dias">
                    </div>
                  </div>
                  <div class="div_configurar_atencion">
                    <input type="checkbox" class="mgc mgc-primary mgc-primary-1 nopadding mt0" id="acepto-terminos">
                    <div class="dias">
                      Sábado
                    </div>
                    <div class="input_horas">
                      <input type="number" name="" class="input_dias">-<input type="number" name="" class="input_dias"> y de <input type="number" name="" class="input_dias">-<input type="" name="" class="input_dias">
                    </div>
                  </div>
                  <div class="div_configurar_atencion">
                    <input type="checkbox" class="mgc mgc-primary mgc-primary-1 nopadding mt0" id="acepto-terminos">
                    <div class="dias">
                      Domingo
                    </div>
                    <div class="input_horas">
                      <input type="number" name="" class="input_dias">-<input type="number" name="" class="input_dias"> y de <input type="number" name="" class="input_dias">-<input type="" name="" class="input_dias">
                    </div>
                  </div>
                </div>
                <a href="" class="btn btn_guardar">Guardar</a>
               </div>
            </div><!-- panel -->
        </div><!-- mainpanel -->
    </div><!-- mainwrapper -->
</section>
@endsection