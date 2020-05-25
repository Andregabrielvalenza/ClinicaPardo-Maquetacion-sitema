@extends('layouts.sistema')
@section('content')

        <div class="mainpanel" style="background-color: #eeebe5;">
            <div class="contentpanel">
              <h1 class="titulo_paginas_pardo">Doctores</h1>
               <div class="div_blanco_grande">
                   <div class="div_perfl_paciente">
                     <div class="div_perfl_paciente1">
                       <div class="perfil_pacinetes">
                         <div class="img_pacientes">
                           <img src="images/Pic1.png">
                         </div>
                         <div class="descripcios_pacientes">
                           <p class="p0">Gregory Manuel<br>Gonzales House</p>
                         </div>
                       </div>
                       <ul style="list-style-type: none;" class="nopadding mt10">
                         <li>
                           <span class="lis_span1">DNI</span><span class="lis_span2 ml10">984787299</span>
                         </li>
                         <li>
                           <span class="lis_span1">Fecha de nacimiento</span><span class="lis_span2 ml10">27.06.1968</span>
                         </li>
                       </ul>
                       <div></div>
                     </div>
                     <div class="div_perfl_paciente2">
                       <h4 class="h4_pacinets">Contacto</h4>
                       <ul style="list-style-type: none;" class="nopadding">
                         <li class="mt10">
                           <img src="images/X4fxS1.tif.png" width="12px" class="mr5">
                           984787299 / (084) 234921
                         </li>
                         <li class="mt10">
                           <img src="images/xbeG45.tif.png" width="12px" class="mr5">
                           sharon1231@gmail.com
                         </li>
                         <li class="mt10">
                           <img src="images/mD4mWq.tif.png" width="12px" class="mr5">
                            Calle los arboles 432, San Sebastian, Cusco
                         </li>
                       </ul>
                     </div>
                   </div>
                   <div class="div_datos">
                     <h4 class="h4_font">Datos generales</h4>
                     <div class="div_opucacion_obser mt20 datos1">
                       <div class="div_ocupacion">
                         <p class="igual_font_color mb0">Título</p>
                         <p class="color_ocupacion">Medico cirujano, Mg.</p>
                         <p class="igual_font_color mb0">Nº de colegiatura</p>
                         <p class="color_ocupacion">32432</p>
                         <p class="igual_font_color mb0">Especialidad</p>
                         <p class="color_ocupacion">Neuro cirugia</p>
                         <p class="igual_font_color mb0">RNE</p>
                         <p class="color_ocupacion">62354</p>
                         <p class="igual_font_color mb0">En pardo desde</p>
                         <p class="color_ocupacion">18.10.2014</p>
                         <p class="igual_font_color mb0">Estado</p>
                         <p class="color_ocupacion">In activo - 20.06.2014</p>
                       </div>
                       <div class="div_observacion">
                         <p class="igual_font_color mb0">Observaciones</p>
                         <p class="descrip_obser_font">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</p>
                         <p class="igual_font_color mb0">Adicional</p>
                         <p class="descrip_obser_font">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</p>
                         <p class="igual_font_color mb0">Observaciones</p>
                         <p class="descrip_obser_font">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</p>
                       </div>
                     </div>
                   </div>
               </div>
               <div class="div_blanco_peque div_proximas">
                <div class="proximas_citas">
                  <div class="div_1">
                        <h4 class="h4_font">Proximas citas</h4>
                        <a href="/crear-nueva-cita" class="btn btn_nueva_cita btncita">+ Nueva cita</a>
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
                    <div class="mt10 div_perfil_doctor_scrooll">
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
                    </div>
                </div>
                <div class="div_link">
                    <a href="" class="btn btn_link_paciente1">Confirmar cita</a>
                    <a href="" class="btn btn_link_paciente2">Editar información</a>
                </div>
               </div>
            </div><!-- panel -->
        </div><!-- mainpanel -->
    </div><!-- mainwrapper -->
</section>
@endsection
@section('scripts')
    <script>
       
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