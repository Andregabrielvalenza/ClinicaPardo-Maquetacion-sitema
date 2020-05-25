@extends('layouts.sistema')
@section('content')

        <div class="mainpanel" style="background-color: #eeebe5;">
            <div class="contentpanel">
              <h1 class="titulo_paginas_pardo">Panel principal</h1>
               <div class="div_blanco_grande panel_prin">
                   <div class="div_blanco_grande_1 altura_inicio1">
                       <h4 class="h4_font">Rol de doctores</h4>
                       <div class="input-group">
                          <input type="text" placeholder="Buscar doctor o por especialidad" class="form-control" />
                          <span class="input-group-addon">
                            <i class="glyphicon glyphicon-search"></i>
                          </span>
                       </div> 
                       <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Especialidad</th>
                                    <th class="text-center">Doctor/a</th>
                                    <th class="text-center">Horario</th>
                                    <th class="text-center">Dias</th>
                                    <th class="text-center">Cons.</th>
                                  </tr>
                                </thead>
                                <tbody class="tabal_doctores">
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
                   <div class="div_blanco_grande_1 subir_div altura_inicio2">
                       <div class="descrip_tabla">
                           <h4 class="h4_font">Flujo de caja</h4>
                           <div class="table-responsive bajar_tabla">
                            <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <td>
                                        <div class="div_circulo verde">
                                            +
                                        </div>
                                    </td>
                                    <td class="td_font">Paciente Joana Cornejo Sablan</td>
                                    <td class="text-right td_font">S/. 20.00</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="div_circulo rojo">
                                            -
                                        </div>
                                    </td>
                                    <td class="td_font">Papel bond algo de algo</td>
                                    <td class="text-right td_font">S/. 20.00</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="div_circulo verde">
                                            +
                                        </div>
                                    </td>
                                    <td class="td_font">Papel bond algo de algo</td>
                                    <td class="text-right td_font">S/. 20.00</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="div_circulo rojo">
                                            -
                                        </div>
                                    </td>
                                    <td class="td_font">Papel bond algo de algo</td>
                                    <td class="text-right td_font">S/. 20.00</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="div_circulo verde">
                                            +
                                        </div>
                                    </td>
                                    <td class="td_font">Paciente Joana Cornejo Sablan</td>
                                    <td class="text-right td_font">S/. 20.00</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="div_circulo rojo">
                                            -
                                        </div>
                                    </td>
                                    <td class="td_font">Papel bond algo de algo</td>
                                    <td class="text-right td_font">S/. 20.00</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="div_circulo verde">
                                            +
                                        </div>
                                    </td>
                                    <td class="td_font">Papel bond algo de algo</td>
                                    <td class="text-right td_font">S/. 20.00</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="div_circulo verde">
                                            +
                                        </div>
                                    </td>
                                    <td class="td_font">Papel bond algo de algo</td>
                                    <td class="text-right td_font">S/. 20.00</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="div_circulo rojo">
                                            -
                                        </div>
                                    </td>
                                    <td class="td_font">Papel bond algo de algo</td>
                                    <td class="text-right td_font">S/. 20.00</td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <div class="div_circulo verde">
                                            +
                                        </div>
                                    </td>
                                    <td class="td_font">Papel bond algo de algo</td>
                                    <td class="text-right td_font">S/. 20.00</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                       </div>
                       <div class="agregar_caja">
                           <button class="btn_agregar">+ Agregar entrada</button>
                           <div class="div_total_caja">
                               <p>Total en caja:</p>
                               <div class="linea_plomo"></div>
                               <p>S/. 548.00</p>
                           </div>
                           <a href="/operacion-exitosa" class="btn btn_ver_caja sticky-top">Ver caja</a>
                       </div>
                   </div>
               </div>
               <div class="div_blanco_peque">
                   <div class="div_1">
                        <h4 class="h4_font">Proximas citas</h4>
                        <a href="/crear-nueva-cita" class="btn btn_nueva_cita">+ Nueva cita</a>
                   </div>
                   <div class="div_colapse">
                            <div class="div_colapse_todos">
                                <button class="btn_col">Todos
                                <div class="div_linea_celeste"></div>
                                </button>
                            </div>
                            <div class="div_colapse_todos">
                                <button class="btn_col">Por doctor
                                    <div class="div_linea_celeste"></div>
                                </button>
                                <div class="div_linea_celeste"></div>
                            </div>
                            <div class="div_colapse_todos">
                                <button class="btn_col">Por especialidad
                                    <div class="div_linea_celeste"></div>
                                </button>
                            </div>
                    </div>
                    <div class="mt20 div_scrool_citass">
                       <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                            <div class="cuadrado_blanco_cita">
                              <a href="" class="font_cuadrado">Reprogramar cita</a>
                              <div class="linea_plomo_cuadrado"></div>
                              <a href="" class="font_cuadrado">Cancelar cita</a>
                            </div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                     <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                     <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                     <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                     <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                     <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                     <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                     <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                        </div>
                        <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                     <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2">
                                <div class="div_perfil_citas">
                                     <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas">
                                  <p class="p0">Sharon Monica Gonzales Hernandez</p>
                                  <p class="p1">Dr. Jose Manuel Gonzales Cárdenas</p>
                                  <p class="p2">Ginecologia</p>  
                                </div>
                            </div>
                            <div class="div_cita3">
                                <button class="btn_puntos">
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                    <div class="cirulo_btn"></div>
                                </button>
                            </div>
                        </div> 
                         
                    </div>
               </div>
               <div class="agregar_entrada">
                 <div class="div_agregar_entrada">
                   <button class="btn_close">
                     <i class="glyphicon glyphicon-remove"></i>
                   </button>
                   <h4 class="h4_font">Agreger entrada de caja</h4>
                   <div class="form_agregar_entrada">
                      <div class="rdio check_plomo">
                        <input type="radio" name="radio" id="radioDefault" value="1" checked="checked" />
                        <label class="label_check ml5" for="radioDefault">Egreso</label>
                      </div>
                      <div class="rdio check_plomo ml_radio">
                          <input type="radio" name="radio" value="2" id="radioPrimary" />
                          <label class="label_check ml5" for="radioPrimary">Ingreso</label>
                      </div> 
                      <input type="text" name="" placeholder="Concepto" class="input_agregar_entrada mt15 mb5">
                      <div class="select_agregar_entrada">
                        <select>
                          <option>Tipo de moneda</option>
                          <option></option>
                          <option></option>
                          <option></option>
                        </select>
                      </div>
                      <input type="number" name="" placeholder="Monto" class="input1_agregar_entrada">
                      <a href="/verify-account" class="btn btn_listos_agregar_entrada">Listo</a>
                   </div>
                 </div>
               </div>
            </div><!-- panel -->
        </div><!-- mainpanel -->
    </div><!-- mainwrapper -->
</section>
@endsection
@section('scripts')
    <script>
         $(document).ready(function() {
            $('select').niceSelect();
         });

       $(".btn_agregar").on("click", function(){
          $('.agregar_entrada').css({'transform':'translate3d(0,0,0)'});
       });
       $(".btn_close").on("click", function(){
          $('.agregar_entrada').css({'transform':'translate3d(100%,0,0)'});
       });
       
       var inicio = "estado"
       $(".btn_puntos").on("click", function(){
          if (inicio == "estado") 
          {
            $('.cuadrado_blanco_cita').css({'display':'block'});
            inicio = "click"
          }
          else
          {
            $('.cuadrado_blanco_cita').css({'display':'none'});
            inicio = "estado"
          }
       });
    </script>
@endsection
