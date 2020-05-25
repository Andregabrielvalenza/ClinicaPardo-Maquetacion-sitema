@extends('layouts.sistema')
@section('content')

        <div class="mainpanel" style="background-color: #eeebe5;">
            <div class="contentpanel">
              <h1 class="titulo_paginas_pardo">Emergencia - triage</h1>
              <a href="" class="btn btn_nuevo_abs">+ Nuevo Paciente</a>
              <div class="div_blanco_grande">
                    <div class="div_blanco_grande_1 div_buscar_emergenci">
                      <h4 class="h4_font mb10">Buscar un paciente</h4>
                      <input type="text" placeholder="Ingrese nombre, apellidos o numero de documento, doctor o especialidad" class="input_ingresar" />
                    </div>
                   <div class="div_blanco_list div_emergency">
                      <h4 class="h4_font">Buscar un paciente</h4>
                      <div class="mb20">
                        <h5 class="mb0 h6_font_bol_emercengy">Motivo de consulta</h5>
                        <textarea class="form-control input_iguales input_fondo_color mt5" rows="5"></textarea>
                      </div>
                      <div class="mb20">
                        <h5 class="mb0 h6_font_bol_emercengy">Motivo de consulta</h5>
                        <div class="div_vitales mt5">
                          <input type="" name="" class="input_fondo_color input_iguales_motivos mr5" placeholder="Temperatura">
                          <input type="" name="" class="input_fondo_color input_iguales_motivos mr5" placeholder="Presión">
                          <input type="" name="" class="input_fondo_color input_iguales_motivos mr5">
                          <input type="" name="" class="input_fondo_color input_iguales_motivos mr5" placeholder="Frec cardio">
                          <input type="" name="" class="input_fondo_color input_iguales_motivos mr5" placeholder="Peso">
                          <input type="" name="" class="input_fondo_color input_iguales_motivos" placeholder="Talla">
                        </div>
                      </div>
                      <div class="mb20">
                        <h5 class="mb0 h6_font_bol_emercengy">Motivo de consulta</h5>
                        <textarea class="form-control input_iguales input_fondo_color mt5" rows="5"></textarea>
                      </div>
                      <div>
                        <h5 class="mb0 h6_font_bol_emercengy">Motivo de consulta</h5>
                        <textarea class="form-control input_iguales input_fondo_color mt5" rows="5"></textarea>
                      </div>
                   </div>
               </div>
               <div class="div_blanco_peque_crear">
                  <div class="div_blanco_crear div_pacientes">
                    <div class="div_1">
                        <h4 class="h4_font">Paciente</h4>
                    </div>
                    <div class="perfil_nueva_cita mt10">
                      <div class="perfil_cita">
                        <img src="images/Pic.png">
                      </div>
                      <div class="descripcion_perfil_cita ml15">
                        <p class="color_font_iaguales fonz_size_20">Sharon Monica<br> Gonzales Hernandez</p>
                        <div class="linea_plomo_perfil"></div>
                        <p class="mb0 subir_hc_p">
                          <span class="color_font_iaguales fonz_size_16">HHCC</span>
                          <span class="color_font_diferente">1234556</span>
                        </p>
                      </div>
                    </div>
                    <div class="datos mt15">
                      <div class="accordion-wrap">
                        <div class="accordion-item border_bottom_p">
                          <p class="accordion-header"><i class="fa fa-angle-right" aria-hidden="true"></i> Riesgo<span class="float_right">Ultima actualización<span class="ml5">23.4.2019</span></span></p>
                        </div>
                        <div class="accordion-text">
                          <ul style="list-style-type: none;" class="nopadding">
                            <li class="color_rojo">Fumador/a</li>
                            <li class="color_rojo">Toma Alcohol</li>
                            <li class="color_rojo">Alergias a penicilina</li>
                          </ul>
                        </div>
                      </div>
                      <div class="accordion-wrap">
                        <div class="accordion-item border_bottom_p">
                          <p class="accordion-header"><i class="fa fa-angle-right" aria-hidden="true"></i> Seguro</p>
                        </div>
                        <div class="accordion-text no_borden_bottom">
                          <p>Rimac - Seguros - activo / inactivo</p>
                        </div>
                      </div>
                      <div class="accordion-wrap">
                        <div class="accordion-item border_bottom_p">
                          <p class="accordion-header"><i class="fa fa-angle-right" aria-hidden="true"></i> Datos personales</p>
                        </div>
                        <div class="accordion-text no_borden_bottom">
                          <div class="datos_personales">
                            <div>
                              <p class="mb0"><span class="font_bold_negro mr5">Sexo</span><span class="font_regular_opacity">Femenino</span></p>
                              <p class="mb0"><span class="font_bold_negro mr5">Edad</span><span class="font_regular_opacity">32 años</span></p>
                            </div>
                            <div>
                              <p class="mb0"><span class="font_bold_negro mr5">DNI</span><span class="font_regular_opacity">87982012</span></p>
                            </div>
                          </div>
                          <ul style="list-style-type: none;" class="nopadding mt15">
                            <li>
                              <span class="font_bold_negro">Fecha de nac.</span>
                              <span class="font_regular_opacity ml10">12/09/1988</span>
                            </li>
                            <li>
                              <span class="font_bold_negro">Lugar de nac.</span>
                              <span class="font_regular_opacity ml10">Cusco, Peru.</span>
                            </li>
                            <li>
                              <span class="font_bold_negro">Nacionalidad </span>
                              <span class="font_regular_opacity ml15">Holandesa</span>
                            </li>
                            <li>
                              <span class="font_bold_negro">Nacionalidad </span>
                              <span class="font_regular_opacity ml15">Holandesa</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="accordion-wrap border_bottom">
                        <div class="accordion-item border_bottom_p">
                          <p class="accordion-header"><i class="fa fa-angle-right" aria-hidden="true"></i> Datos de contacto</p>
                        </div>
                        <div class="accordion-text no_borden_bottom">
                          <ul style="list-style-type: none" class="nopadding">
                            <li class="font_regular_opacity">
                              <img src="images/X4fxS1.tif.png" width="15px" class="mr10">
                              984787299
                            </li>
                            <li class="font_regular_opacity">
                              <img src="images/xbeG45.tif.png" width="15px" class="mr10">
                              sharon1231@gmail.com
                            </li>
                            <li class="font_regular_opacity">
                              <img src="images/mD4mWq.tif.png" width="15px" class="mr10">
                              Calle los arboles 432, San Sebastian, Cusco
                            </li>
                          </ul>
                          <div class="datos_personales mt20">
                            <div>
                              <p class="mb0 font_bold_negro">Contacto de emergencia</p>
                              <p class="mb0 font_regular_opacity">Sara Maria Gonzales Sosa</p>
                            </div>
                            <div>
                              <p class="mb0 font_regular_opacity mt15"><img src="images/X4fxS1.tif.png" width="15px" class="mr10">984787299</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="div_link">
                    <a href="" class="btn btn_link_paciente1">Ver Historia clinica</a>
                    <a href="" class="btn btn_link_paciente2">Ver perfil</a>
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

       $(".accordion-wrap").on("click", function(){   
    $(this).children().eq(1).slideToggle(300);  
    $(this).children().eq(0).toggleClass("accordion-no-bar");
    $(this).siblings().find(".accordion-header").removeClass("accordion-gold");
    $(this).siblings().find(".accordion-header i").removeClass("rotate-fa");
    $(this).find(".accordion-header").toggleClass("accordion-gold");
    $(this).find(".fa").toggleClass("rotate-fa");

    $(".accordion-wrap .accordion-text").not($(this).children().eq(1)).slideUp(300);
});


    </script>
@endsection