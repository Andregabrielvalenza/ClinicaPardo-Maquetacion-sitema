@extends('layouts.sistema')
@section('content')

        <div class="mainpanel" style="background-color: #eeebe5;">
            <div class="contentpanel">
              <h1 class="titulo_paginas_pardo">Calendario de citas</h1>
              <div class="div_calendario">
                <div class="input-group">
                    <input type="text" placeholder="Buscar doctor o por especialidad" class="form-control" />
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-search"></i>
                    </span>
                </div>
                 <div class="calendario_cita">
                   <div class="date">
                      <div class="linea_plomo_date"></div>
                      <h3>Enero 2020</h3>
                      <div class="days">
                        <div class="day">LUN</div>
                        <div class="day">MAR</div>
                        <div class="day">MIE</div>
                        <div class="day">JUE</div>
                        <div class="day">VIE</div>
                        <div class="day">SAB</div>
                        <div class="day">DOM</div>
                        <div class="number"></div>
                        <div class="number fondo_f6 fondof7">1</div>
                        <div class="number fondo_f6 fondof7">2</div>
                        <div class="number fondo_f6 fondof7">3</div>
                        <div class="number fondo_f6 fondof7">4</div>
                        <div class="number fondo_f6">5</div>
                        <div class="number active fondo_f6">6</div>

                        <div class="number fondo_f6 fondof7">7</div>
                        <div class="number fondo_f6 fondof7">8</div>
                        <div class="number fondo_f6 fondof7">9</div>
                        <div class="number fondo_f6 fondof7">10</div>
                        <div class="number fondo_verde">11</div>
                        <div class="number fondo_f6">12</div>
                        <div class="number fondo_f6">13</div>
                        <div class="number fondo_f6 fondof7">14</div>
                        <div class="number fondo_f6 fondof7">15</div>
                        <div class="number fondo_f6 fondof7">16</div>
                        <div class="number fondo_f6 fondof7">17</div>
                        <div class="number fondo_f6 fondof7">18</div>
                        <div class="number fondo_f6">19</div>
                        <div class="number fondo_f6">20</div>
                        <div class="number fondo_f6 fondof7">21</div>
                        <div class="number fondo_f6 fondof7">22</div>
                        <div class="number fondo_f6 fondof7">23</div>
                        <div class="number fondo_f6 fondof7">24</div>
                        <div class="number fondo_f6 fondof7">25</div>
                        <div class="number fondo_f6">27</div>
                        <div class="number fondo_f6">28</div>
                        <div class="number fondo_f6 fondof7">29</div>
                        <div class="number fondo_f6 fondof7">30</div>
                        <div class="number fondo_f6 fondof7">31</div>
                      </div>
                   </div>
                   <div class="date">
                      <div class="linea_plomo_date"></div>
                      <h3>Enero 2020</h3>
                      <div class="days">
                        <div class="day">LUN</div>
                        <div class="day">MAR</div>
                        <div class="day">MIE</div>
                        <div class="day">JUE</div>
                        <div class="day">VIE</div>
                        <div class="day">SAB</div>
                        <div class="day">DOM</div>
                        <div class="number"></div>
                        <div class="number fondo_f6 fondof7">1</div>
                        <div class="number fondo_f6 fondof7">2</div>
                        <div class="number fondo_f6 fondof7">3</div>
                        <div class="number fondo_f6 fondof7">4</div>
                        <div class="number fondo_f6">5</div>
                        <div class="number active fondo_f6">6</div>

                        <div class="number fondo_f6 fondof7">7</div>
                        <div class="number fondo_f6 fondof7">8</div>
                        <div class="number fondo_f6 fondof7">9</div>
                        <div class="number fondo_f6 fondof7">10</div>
                        <div class="number fondo_f6 fondof7">11</div>
                        <div class="number fondo_f6">12</div>
                        <div class="number fondo_f6">13</div>
                        <div class="number fondo_f6 fondof7">14</div>
                        <div class="number fondo_f6 fondof7">15</div>
                        <div class="number fondo_f6 fondof7">16</div>
                        <div class="number fondo_f6 fondof7">17</div>
                        <div class="number fondo_f6 fondof7">18</div>
                        <div class="number fondo_f6">19</div>
                        <div class="number fondo_f6">20</div>
                        <div class="number fondo_f6 fondof7">21</div>
                        <div class="number fondo_f6 fondof7">22</div>
                        <div class="number fondo_f6 fondof7">23</div>
                        <div class="number fondo_f6 fondof7">24</div>
                        <div class="number fondo_f6 fondof7">25</div>
                        <div class="number fondo_f6">27</div>
                        <div class="number fondo_f6">28</div>
                        <div class="number fondo_f6 fondof7">29</div>
                        <div class="number fondo_f6 fondof7">30</div>
                        <div class="number fondo_f6 fondof7">31</div>
                      </div>
                   </div>
                 </div>
              </div>
              <div class="div_blanco_peque div_calendarios_citas">
                   <div class="div_1">
                        <h4 class="h4_font">Citas</h4>
                        <a href="/crear-nueva-cita" class="btn btn_nueva_cita btn_calendarios_cita">+ Nueva cita</a>
                   </div>
                   <h3>Cardiologia - 13/12/2019</h3>
                    <div class="mt20 calendario_citas_scrool" style="display: flex;position: relative;">
                      <div class="div_calendario_cita1">
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <div class="linea_rojo_citas"></div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>   
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>   
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <div class="linea_rojo_citas"></div>
                        </div>   
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>   
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>   
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>   
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>   
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>  
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>  
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>  
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>   
                      </div>
                      <div class="linea_plomo_citas"></div>
                      <div class="div_calendario_cita2">
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <div class="rectangulo_tamaño_iguales fondo_66">
                              Dr. Jose Manuel Gonzales Cárdenas
                            </div>
                            <div class="linea_rojo_citas"></div>
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <div class="rectangulo_tamaño_iguales fondo_f244">
                              Dr. Jose Manuel Gonzales Cárdenas
                            </div>
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <div class="rectangulo_tamaño_iguales fondo_66">
                              Dr. Jose Manuel Gonzales Cárdenas
                            </div>
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div> 
                        <div class="div_citas">
                            <div class="div_cita1 hora_calendario_citas">
                                <p>4:20 pm</p>
                                <p class="margin_bottom_0">Hoy</p>
                            </div>
                            <div class="div_cita2 perfil_nombre_citas">
                                <div class="div_perfil_citas">
                                    <img src="/images/photos/Pic.png">
                                </div>
                                <div class="div_descripcion_citas mt0">
                                  <p class="p0 p0_subir">Sharon Monica</p>
                                  <p class="p0">Gonzales Hernandez</p>
                                </div>
                            </div>
                            <div class="div_cita3 btn_citas">
                                <button class="btn_puntos btn_citas">
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
                            <div class="rectangulo_tamaño_iguales fondo_f244">
                              Dr. Jose Manuel Gonzales Cárdenas
                            </div>
                            <!--<div class="linea_rojo_citas"></div>-->
                        </div>
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