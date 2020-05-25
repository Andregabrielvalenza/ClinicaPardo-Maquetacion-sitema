@extends('layouts.sistema')
@section('content')

        <div class="mainpanel" style="background-color: #eeebe5;">
            <div class="contentpanel">
              <h1 class="titulo_paginas_pardo">Doctores</h1>
              <a href="" class="btn btn_registrar_absolute">Registrar doctor</a>
              <div class="div_blanco_grande">
                   <div class="div_blanco_grande_1 buscar_doctor">
                      <h4 class="h4_font">Busca doctor</h4>
                      <div class="input-group">
                          <input type="text" placeholder="Buscar por nombres, apellidos o especialidad" class="form-control" />
                          <span class="input-group-addon">
                            <i class="glyphicon glyphicon-search"></i>
                          </span>
                      </div>
                   </div>
                   <div class="div_blanco_list list_doctor">
                      <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>
                                      <button style="background-color: transparent;border: 0px;padding: 0px;">
                                        <i class="glyphicon glyphicon-arrow-up color_plomo_flechas"></i>
                                      </button>
                                      <button style="background-color: transparent;border: 0px;padding: 0px;">
                                        <i class="glyphicon glyphicon-arrow-down color_plomo_flechas"></i>
                                      </button>
                                    </th>
                                    <th class="text-center">
                                     <button style="background-color: transparent;border: 0px;padding: 0px;">
                                        <i class="glyphicon glyphicon-arrow-up color_plomo_flechas"></i>
                                      </button>
                                      <button style="background-color: transparent;border: 0px;padding: 0px;">
                                        <i class="glyphicon glyphicon-arrow-down color_plomo_flechas"></i>
                                      </button>
                                    </th>
                                    <th class="text-center">
                                      <button style="background-color: transparent;border: 0px;padding: 0px;">
                                        <i class="glyphicon glyphicon-arrow-up color_plomo_flechas"></i>
                                      </button>
                                      <button style="background-color: transparent;border: 0px;padding: 0px;">
                                        <i class="glyphicon glyphicon-arrow-down color_plomo_flechas"></i>
                                      </button>
                                    </th>
                                    <th class="text-center">
                                      <button style="background-color: transparent;border: 0px;padding: 0px;">
                                        <i class="glyphicon glyphicon-arrow-up color_plomo_flechas"></i>
                                      </button>
                                      <button style="background-color: transparent;border: 0px;padding: 0px;">
                                        <i class="glyphicon glyphicon-arrow-down color_plomo_flechas"></i>
                                      </button>
                                    </th>
                                    <th class="text-center">
                                     <button style="background-color: transparent;border: 0px;padding: 0px;">
                                        <i class="glyphicon glyphicon-arrow-up color_plomo_flechas"></i>
                                      </button>
                                      <button style="background-color: transparent;border: 0px;padding: 0px;">
                                        <i class="glyphicon glyphicon-arrow-down color_plomo_flechas"></i>
                                      </button>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th>Especialidad</th>
                                    <th>Nombres y apellidos</th>
                                    <th class="text-center">Horario</th>
                                    <th class="text-center">Dias</th>
                                    <th class="text-center">Cons.</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Neurologia</td>
                                    <td>Herman Felix Gonzales Rodriguez</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Cirugia</td>
                                    <td>Michael Manuel Gonzales Cárdenas</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Nuemologia</td>
                                    <td>Jose Manuel Gonzales Cárdenas</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Pediatria</td>
                                    <td>Manuel Jose Gonzales Cárdenas</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Endocrinologia</td>
                                    <td>Juan Jose Manuel Gonzales</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Nutricion</td>
                                    <td>Vladimir Boris Gonzales Cárdenas</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Ginecologia</td>
                                    <td>Charly Fito Garcia Paez</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Med interna</td>
                                    <td>Ross Chandler Cárdenas Deller</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Neurocirugia</td>
                                    <td>Ross Chandler Cárdenas Deller</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Neurologia</td>
                                    <td>Herman Felix Gonzales Rodriguez</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Cirugia</td>
                                    <td>Jose Manuel Gonzales Cárdenas</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                  <tr>
                                    <td>Neurocirugia</td>
                                    <td>Michael Manuel Gonzales Cárdenas</td>
                                    <td class="text-center">16:00 - 19:00</td>
                                    <td class="text-center">L-V</td>
                                    <td class="text-center">301</td>
                                  </tr>
                                </tbody>
                            </table>
                   </div>
               </div>
               <div class="div_blanco_peque_crear">
                  <div class="div_blanco_crear div_pacientes">
                    <div class="div_1">
                        <h4 class="h4_font">Doctor</h4>
                    </div>
                    <div class="perfil_nueva_cita mt10">
                      <div class="perfil_cita">
                        <img src="images/Pic1.png">
                      </div>
                      <div class="descripcion_perfil_cita ml15">
                        <p class="color_font_iaguales fonz_size_20">Gregory Manuel<br>Gonzales House</p>
                        <div class="linea_plomo_perfil"></div>
                        <p class="mb0 subir_hc_p">
                          <span class="color_font_iaguales fonz_size_16">DNI</span>
                          <span class="color_font_diferente">87982012</span>
                        </p>
                      </div>
                    </div>
                    <div class="datos mt15">
                      <div class="datos_iguales">
                        <h5 class="titulos_font">Título</h5>
                        <p class="subtitulo_font">Medico cirujano, Mg.</p>
                        <h5 class="titulos_font">Nº de colegiatura</h5>
                        <p class="subtitulo_font">32423</p>
                        <h5 class="titulos_font">Especialidad</h5>
                        <p class="subtitulo_font">Neuro cirugia</p>
                      </div>
                      <div class="datos_iguales">
                        <h5 class="titulos_font">RNE</h5>
                        <p class="subtitulo_font">62354</p>
                        <h5 class="titulos_font">En pardo desde</h5>
                        <p class="subtitulo_font">18.10.2014</p>
                        <h5 class="titulos_font">Estado</h5>
                        <p class="subtitulo_font">In activo - 20.06.2014</p>
                      </div>
                      <div class="linea_plomo_datos"></div>
                    </div>
                    <ul style="list-style-type: none;" class="padding_left_list mt25">
                      <li>
                        <img src="images/X4fxS1.tif.png" class="mr10" width="15px">
                        984787299
                      </li>
                      <li class="mt5">
                        <img src="images/xbeG45.tif.png" class="mr10" width="15px">
                        sharon1231@gmail.com
                      </li>
                      <li class="mt5">
                        <img src="images/mD4mWq.tif.png" class="mr10" width="15px">
                        Calle los arboles 432, San Sebastian, Cusco
                      </li>
                    </ul>
                  </div> 
                  <div class="div_link">
                    <a href="" class="btn btn_link_paciente1">Ver Historia clinica</a>
                    <a href="" class="btn btn_link_paciente2">Ver perfil</a>
                  </div>
               </div>
               <div class="agregar_entrada">
                 <div class="div_agregar_entrada">
                   <button class="btn_close">
                     <i class="glyphicon glyphicon-remove"></i>
                   </button>
                   <h4 class="h4_font">Agregar nuevo paciente</h4>
                   <div class="form_agregar_cita">
                    <div class="div_1_cita mb15">
                      <input type="text" name="" class="tamaños_iguales_citas rigth" placeholder="Nombres">
                      <input type="text" name="" class="tamaños_iguales_citas left" placeholder="Apellidos">
                      <div class="tamaños_iguales_citas rigth">
                        <select>
                          <option>Tipo de documento</option>
                          <option></option>
                          <option></option>
                        </select>
                      </div>
                      <input type="number" name="" class="tamaños_iguales_citas left" placeholder="Numero de documento">
                      <div class="tamaños_iguales_citas rigth">
                        <select>
                          <option>Lugar de nacimiento</option>
                          <option></option>
                          <option></option>
                        </select>
                      </div>
                      <div class="tamaños_iguales_citas left">
                        <select>
                          <option>Nacionalidad</option>
                          <option></option>
                          <option></option>
                        </select>
                      </div>
                    </div>
                    <div class="div_1_cita mb15">
                      <div class="tamaños_iguales_citas rigth">
                        <select>
                          <option>Sexo</option>
                          <option></option>
                          <option></option>
                        </select>
                      </div>
                      <input type="text" name="" class="tamaños_iguales_citas left" placeholder="Fecha de nac.">
                      <div class="tamaños_iguales_citas rigth">
                        <select>
                          <option>Estado familiar</option>
                          <option></option>
                          <option></option>
                        </select>
                      </div>
                    </div>
                    <div class="div_1_cita">
                      <input type="number" name="" class="tamaños_iguales_citas rigth" placeholder="Telefono">
                      <input type="email" name="" class="tamaños_iguales_citas left" placeholder="Correo">
                      <input type="text" name="" class="tamaños_iguales_citas input_direciones" placeholder="Dirección">
                    </div>
                    <div class="div_1_cita mt5 mb15">
                      <button>+ Agregar imagen</button>
                    </div>
                    <a href="" class="btn btn_iguales_entrada mb5">Crear historia clinica</a>
                    <a href="" class="btn btn_iguales_entrada">Guardar</a>
                   </div>
                 </div>
               </div>
            </div>
            <!-- panel -->
        </div><!-- mainpanel -->
    </div><!-- mainwrapper -->
</section>
@endsection
@section('scripts')
    <script>
         $(document).ready(function() {
            $('select').niceSelect();
         });

         $(".btn_crear_cita").on("click", function(){
          $('.agregar_entrada').css({'transform':'translate3d(0,0,0)'});
        });
       $(".btn_close").on("click", function(){
          $('.agregar_entrada').css({'transform':'translate3d(100%,0,0)'});
       });
    </script>
@endsection