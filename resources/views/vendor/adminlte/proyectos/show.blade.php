@extends('adminlte::layouts.app')
@section('title','Lista de proyectos')
@section('main-content')
  @section('contentheader_title', 'PROYECTOS')
  <div class="container">
      {{-- @include('back_office.pages.menu.proyectos.common.header') --}}
      <section class="content">
          {{-- @include('back_office.includes.notifications') --}}
          @if(Session::get('alert_type') == 'warning')
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> ¡Exito!</h4>
                  {{ Session::get('message') }}
              </div>
          @endif
          <div class="row">
              <div class="col-sm-6 col-xs-12">
                  <a class="btn btn-app bg-red" href="{{ route('proyectos.index') }}" v-on:click="loader">
                      <i class="fa fa-reply"></i> Volver
                  </a>
              </div>
          </div>
          <div class="row">
              <hr style="margin:0 0 10px 0;">
          </div>
          <div class="row">
              <div class="col-md-12">
                  <ul class="timeline">
                      <li class="time-label">
                          <span class="bg-green">
                              {{ date('d/m/Y', strtotime($proyecto[0]->created_at)) }}
                          </span>
                      </li>
                      <li>
                          <i class="fa fa-file-pdf-o bg-blue"></i>
                          <div class="timeline-item">
                              <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($proyecto[0]->created_at)) }}</span>
                              <h3 class="timeline-header">
                                  <strong>
                                      DETALLES DEL
                                      @if($proyecto[0]->tipo == 'trabajo_grado')
                                          TRABAJO DE GRADO
                                      @elseif($proyecto[0]->tipo == 'pasantia')
                                          PASANTIA
                                      @elseif($proyecto[0]->tipo == 'extraordinario')
                                          SEMESTRE EXTRAORDINARIO
                                      @endif - ANEXO D
                                  </strong>
                              </h3>
                              <div class="timeline-body">
                                  <div class="row">
                                      <div class="col-sm-6 col-xs-12">
                                          <h5><strong>AUTOR:</strong> {{ strtoupper($proyecto[0]->nombres_autor) }} {{ strtoupper($proyecto[0]->apellidos_autor) }}</h5>
                                          <h5><strong>COAUTOR:</strong> {{ strtoupper($proyecto[0]->nombres_coautor) }} {{ strtoupper($proyecto[0]->apellidos_coautor) }}</h5>
                                          <h5><strong>PROGRAMA:</strong> {{ strtoupper($proyecto[0]->carrera) }}</h5>
                                          <h5><strong>TIPO DE PROYECTO:</strong>
                                              @if($proyecto[0]->tipo == 'trabajo_grado')
                                                  TRABAJO DE GRADO
                                              @elseif($proyecto[0]->tipo == 'pasantia')
                                                  PASANTIA
                                              @elseif($proyecto[0]->tipo == 'extraordinario')
                                                  SEMESTRE EXTRAORDINARIO
                                              @endif
                                          </h5>
                                          <h5><strong>TUTOR:</strong> {{ strtoupper($proyecto[0]->nombres_tutor) }} {{ strtoupper($proyecto[0]->apellidos_tutor) }}</h5>
                                          {{-- <h5><strong>LINEA DE INVESTIGACION:</strong> {{ strtoupper($proyecto[0]->linea_investigacion) }}</h5> --}}
                                      </div>
                                      <div class="col-sm-6 col-xs-12">
                                          <div class="col-sm-offset-6 col-sm-6 col-xs-12 text-right">
                                              <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@document', $proyecto[0]->documento) }}" target="_blank" v-on:click="loader">
                                                  <i class="fa fa-cloud-download"></i> Documento
                                              </a>
                                              {{-- @can('edit_proyectos') --}}
                                                  <a class="btn btn-app bg-yellow" href="" v-on:click="loader">
                                                      <i class="fa fa-edit"></i> Editar
                                                  </a>
                                              {{-- @endcan --}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <hr style="margin:0 0 10px 0;">
                                  </div>
                                  <div class="row">
                                      <div class="col-xs-12">
                                          <h5><strong>TITULO:</strong></h5>
                                          <h5>{{ $proyecto[0]->titulo }}</h5>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <hr style="margin:0 0 10px 0;">
                                  </div>
                                  <div class="row">
                                      <div class="col-xs-12">
                                          <h5><strong>RESUMEN:</strong></h5>
                                          <h5>{{ $proyecto[0]->resumen }}</h5>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </li>
                      <li>
                          <i class="fa fa-user bg-aqua"></i>
                          <div class="timeline-item">
                              <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($proyecto[0]->created_at)) }}</span>
                              <h3 class="timeline-header no-border"><strong> PENDIENTE POR APROBACION DE ANEXO{{ $proyecto[0]->anexo_pendiente }}</strong></h3>
                              {{-- @can('validation_fact_1') --}}
                                  <div class="timeline-footer">
                                      <div class="row">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <button class="btn btn-app bg-green" data-target="#modal-validation-fact-1" data-toggle="modal" @if($proyecto[0]->anexo_estado == 'aprobada') disabled @endif><i class="fa  fa-check-square-o"></i> Validar</button>
                                                <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation-fact-1">
                                                  <form action="{{route('proyectos.anexo', $proyecto[0]->proyecto_id)}}" method="post" autocomplete="off">
                                                    @csrf

                                                		<div class="modal-dialog">
                                                			<div class="modal-content">
                                                				<div class="modal-header">
                                                					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                						<span aria-hidden="true">×</span>
                                                					</button>
                                                					<h4 class="modal-title"><strong>APROBACION DE ANEXO</strong></h4>
                                                				</div>
                                                				<div class="modal-body">
                                                					<div class="row">
                                                						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                							<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                                								<label>ESTADO</label>
                                                								<select style="width: 100%;" class="form-control select2" name="estado">
                                                									<option value="">Seleccionar</option>
                                                									<option value="aprobar">APROBAR</option>
                                                									<option value="rechazar">RECHAZAR</option>
                                                								</select>
                                                							</div>
                                                						</div>
                                                					</div>
                                                				</div>
                                                				<div class="modal-footer">
                                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                              <button type="submit" class="btn btn-success btn-flat btn-block" v-on:click="loader"><strong>CONFIRMAR</strong></button>
                                                          </div>
                                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                              <button type="button" class="btn btn-danger btn-flat btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
                                                          </div>
                                                				</div>
                                                			</div>
                                                		</div>
                                                	</form>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                              {{-- @endcan --}}
                          </div>
                      </li>
                      <?php
                          $asignacion_jurado = 0;
                          $revision_jurado = 0;
                      ?>
                      @foreach($estados as $index => $estado)
                          @if($estado->nombre == 'proyecto_modificado')
                              <li class="time-label">
                                  <span class="bg-green">
                                      {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                  </span>
                              </li>
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header no-border"><strong>
                                          @if($proyecto[0]->tipo == 'trabajo_grado')
                                              TRABAJO DE GRADO
                                          @elseif($proyecto[0]->tipo == 'trabajo_especial_grado')
                                              TRABAJO ESPECIAL DE GRADO
                                          @elseif($proyecto[0]->tipo == 'proyecto')
                                              PROYECTO
                                          @endif
                                          MODIFICADO.
                                      </strong></h3>
                                  </div>
                              </li>
                          @endif
                          @if($proyecto[0]->fact_1_estado == 'aprobada')
                              @if($estado->nombre == 'fact_1_rechazada')
                                  <li class="time-label">
                                      <span class="bg-green">
                                          {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                      </span>
                                  </li>
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header"><strong>FACTURA RECHAZADA - {{ $estado->comentario }}</strong></h3>
                                          <div class="timeline-body">
                                              <span style="color: red;">POR FAVOR VERIFICAR EL NUMERO DE FACTURA.</span>
                                          </div>
                                      </div>
                                  </li>
                              @endif
                              @if($estado->nombre == 'fact_1_aprobada')
                                  <li class="time-label">
                                      <span class="bg-green">
                                          {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                      </span>
                                  </li>
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header no-border"><strong>FACTURA APROBADA</strong></h3>
                                      </div>
                                  </li>
                              @endif
                              @if($estado->nombre == 'pendiente_evaluacion_comite')
                                  @if(count($comite))
                                      @foreach($comite as $com)
                                          @if(Auth::user()->user_id == $com->user_id)
                                              <li>
                                                  <i class="fa fa-user bg-aqua"></i>
                                                  <div class="timeline-item">
                                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                                      <h3 class="timeline-header no-border"><strong>ACTA DE INVITACION - COMITE</strong></h3>
                                                      <div class="timeline-footer">
                                                          <div class="row">
                                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                  <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@acta_invitacion_comite', [$proyecto[0]->proyecto_id]) }}" target="_blank" v-on:click="loader">
                                                                      <i class="fa fa-cloud-download"></i> Descargar
                                                                  </a>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </li>
                                          @endif
                                      @endforeach
                                  @endif
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header no-border"><strong>PENDIENTE POR EVALUACION DE COMITE</strong></h3>
                                          @if(count($comite))
                                              @foreach($comite as $com)
                                                  @if(Auth::user()->user_id == $com->user_id)
                                                      <div class="timeline-body">
                                                          <div class="row">
                                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                  <a class="btn btn-app bg-green" href="@if(count($evaluaciones_comite) < 3) {{ URL::action('ProyectosEvaluacionesComiteController@create', [$proyecto[0]->proyecto_id, 1]) }} @endif" @if(count($evaluaciones_comite) < 3) disable @endif v-on:click="loader">
                                                                      <i class="fa  fa-check-square-o"></i> Evaluar
                                                                  </a>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  @endif
                                              @endforeach
                                          @endif
                                      </div>
                                  </li>
                                  @if(count($evaluaciones_comite))
                                      <li>
                                          <i class="fa fa-envelope bg-blue"></i>
                                          <div class="timeline-item">
                                              <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                              <h3 class="timeline-header">
                                                  <a href="#">EVALUACIONES - COMITE</a></h3>
                                              <div class="timeline-body">
                                                  @include('back_office.pages.menu.proyectos.show.table_evaluaciones_comite')
                                              </div>
                                          </div>
                                      </li>
                                  @endif
                              @endif
                              @if($estado->nombre == 'aprobado_evaluacion_comite' || $estado->nombre == 'aprobado_observaciones_evaluacion_comite' || $estado->nombre == 'rechazado_evaluacion_comite')
                                  <li class="time-label">
                                      <span class="bg-green">
                                          {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                      </span>
                                  </li>
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header no-border"><strong>
                                              @if($proyecto[0]->tipo == 'trabajo_grado')
                                                  TRABAJO DE GRADO
                                              @elseif($proyecto[0]->tipo == 'trabajo_especial_grado')
                                                  TRABAJO ESPECIAL DE GRADO
                                              @elseif($proyecto[0]->tipo == 'proyecto')
                                                  PROYECTO
                                              @endif
                                              @if($estado->nombre == 'aprobado_evaluacion_comite')
                                                  APROBADO POR COMITE
                                              @elseif($estado->nombre == 'aprobado_observaciones_evaluacion_comite')
                                                  APROBADO POR COMITE CON OBSERVACIONES
                                              @else
                                                  NO APROBADO POR COMITE
                                              @endif
                                          </strong></h3>
                                      </div>
                                  </li>
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header no-border"><strong>ACTA DE APROBACION - COMITE</strong></h3>
                                          <div class="timeline-footer">
                                              <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@acta_aprobacion_comite', $proyecto[0]->proyecto_id) }}" target="_blank" v-on:click="loader">
                                                  <i class="fa fa-cloud-download"></i> Descargar
                                              </a>
                                          </div>
                                      </div>
                                  </li>
                              @endif
                          @elseif($proyecto[0]->fact_1_estado == 'rechazada')
                              @if($estado->nombre == 'fact_1_rechazada')
                                  <li class="time-label">
                                      <span class="bg-green">
                                          {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                      </span>
                                  </li>
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header"><strong>FACTURA RECHAZADA - {{ $estado->comentario }}</strong></h3>
                                          <div class="timeline-body">
                                              <span style="color: red;">POR FAVOR VERIFICAR EL NUMERO DE FACTURA.</span>
                                          </div>
                                      </div>
                                  </li>
                              @endif
                          @endif
                          @if($estado->nombre == 'fact_2')
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header no-border"><strong>INGRESAR NUMERO DE FACTURA</strong></h3>
                                      <div class="timeline-footer">
                                          <div class="row">
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <button class="btn btn-app bg-green" data-target="#modal-fact-2" data-toggle="modal"><i class="fa  fa-check-square-o"></i> Ingresar</button>
                                                  @include('back_office.pages.menu.proyectos.show.modal_fact_2')
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          @endif
                          @if($estado->nombre == 'fact_2_pendiente')
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header no-border"><strong> PENDIENTE POR VALIDACION DE FACTURA - N° {{ $proyecto[0]->fact_2 }}</strong></h3>
                                      @can('validation_fact_2')
                                          <div class="timeline-footer">
                                              <div class="row">
                                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                      <button class="btn btn-app bg-green" data-target="#modal-validation-fact-2" data-toggle="modal" @if($proyecto[0]->fact_2_estado == 'aprobada') disabled @endif><i class="fa  fa-check-square-o"></i> Validar</button>
                                                      @include('back_office.pages.menu.proyectos.show.modal_validation_factura_2')
                                                  </div>
                                              </div>
                                          </div>
                                      @endcan
                                  </div>
                              </li>
                          @endif
                          @if($estado->nombre == 'fact_2_rechazada')
                              <li class="time-label">
                                  <span class="bg-green">
                                      {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                  </span>
                              </li>
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header no-border"><strong>FACTURA RECHAZADA - {{ $estado->comentario }}</strong></h3>
                                      <div class="timeline-body">
                                          <span style="color: red;">POR FAVOR VERIFICAR EL NUMERO DE FACTURA.</span>
                                      </div>
                                  </div>
                              </li>
                          @endif
                          @if($estado->nombre == 'fact_2_aprobada')
                              <li class="time-label">
                                  <span class="bg-green">
                                      {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                  </span>
                              </li>
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header no-border"><strong>FACTURA APROBADA</strong></h3>
                                  </div>
                              </li>
                          @endif
                          @if($estado->nombre == 'pendiente_asignacion_jurado')
                              @if($asignacion_jurado  == 0)
                                  <li>
                                      <i class="fa fa-envelope bg-blue"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header"><strong>PENDIENTE DE ASIGNACION DE JURADO</strong></h3>
                                          @if(Auth::user()->user_id == $proyecto[0]->coordinador_user_id)
                                              <div class="timeline-body">
                                                  <div class="row">
                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                          <a class="btn btn-app bg-green" href="{{ URL::action('ProyectosJuradosController@create', $proyecto[0]->proyecto_id) }}" v-on:click="loader">
                                                              <i class="fa fa-plus"></i> Nuevo
                                                          </a>
                                                      </div>
                                                  </div>
                                              </div>
                                          @endif
                                      </div>
                                  </li>
                                  <?php $asignacion_jurado++; ?>
                              @endif
                          @endif
                          @if($estado->nombre == 'pendiente_revision_jurado')
                              @if($revision_jurado == 0)
                                  <li>
                                      <i class="fa fa-envelope bg-blue"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header"><strong>PENDIENTE DE REVISION DE JURADO</strong></h3>
                                          <div class="timeline-body">
                                              @include('back_office.pages.menu.proyectos.show.table_jurado')
                                          </div>
                                      </div>
                                  </li>
                                  <?php $revision_jurado++; ?>
                              @endif
                          @endif
                          @if($estado->nombre == 'jurado_aprobado')
                              <li class="time-label">
                                  <span class="bg-green">
                                      {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                  </span>
                              </li>
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header no-border"><strong>JURADO APROBADO</strong></h3>
                                  </div>
                              </li>
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header no-border"><strong>ACTA DE CONSTITUCION DE JURADO</strong></h3>
                                      <div class="timeline-footer">
                                          <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@acta_constitucion_jurado', $proyecto[0]->proyecto_id) }}" target="_blank" v-on:click="loader">
                                              <i class="fa fa-cloud-download"></i> Descargar
                                          </a>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header no-border"><strong>ACTA DE INVITACION DE JURADO</strong></h3>
                                      <div class="timeline-footer">
                                          <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@acta_invitacion_jurado', $proyecto[0]->proyecto_id) }}" target="_blank" v-on:click="loader">
                                              <i class="fa fa-cloud-download"></i> Descargar
                                          </a>
                                      </div>
                                  </div>
                              </li>
                          @elseif($estado->nombre == 'jurado_rechazado')
                              <li class="time-label">
                                  <span class="bg-green">
                                      {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                  </span>
                              </li>
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header no-border"><strong>JURADO RECHAZADO</strong></h3>
                                  </div>
                              </li>
                          @endif
                          @if($estado->nombre == 'pendiente_evaluacion_jurado')
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header"><strong>PENDIENTE POR EVALUACION DE JURADO</strong></h3>
                                      @if(count($jurado))
                                          @foreach($jurado as $jurado)
                                              @if($jurado->estado == 'aprobado')
                                                  @if(Auth::user()->user_id == $jurado->presidente || $proyecto[0]->coordinador_user_id == Auth::user()->user_id)
                                                      <div class="timeline-body">
                                                          <div class="row">
                                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                  <a class="btn btn-app bg-green" data-target="#modal-evaluacion-jurado" data-toggle="modal">
                                                                      <i class="fa  fa-check-square-o"></i> Evaluar
                                                                  </a>
                                                                  @include('back_office.pages.menu.proyectos.show.modal_evaluacion_jurado')
                                                              </div>
                                                          </div>
                                                      </div>
                                                  @endif
                                              @endif
                                          @endforeach
                                      @endif
                                  </div>
                              </li>
                          @endif
                          @if($estado->nombre == 'aprobado_evaluacion_jurado' || $estado->nombre == 'aprobado_observaciones_evaluacion_jurado' || $estado->nombre == 'rechazado_evaluacion_jurado')
                              <li class="time-label">
                                  <span class="bg-green">
                                      {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                  </span>
                              </li>
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      @if($estado->nombre == 'aprobado_evaluacion_jurado')
                                          <h3 class="timeline-header no-border"><strong>
                                              @if($proyecto[0]->tipo == 'trabajo_grado')
                                                  TRABAJO DE GRADO
                                              @elseif($proyecto[0]->tipo == 'trabajo_especial_grado')
                                                  TRABAJO ESPECIAL DE GRADO
                                              @elseif($proyecto[0]->tipo == 'proyecto')
                                                  PROYECTO
                                              @endif
                                              APROBADO.
                                          </strong></h3>
                                      @endif
                                      @if($estado->nombre == 'aprobado_observaciones_evaluacion_jurado')
                                          <h3 class="timeline-header no-border"><strong>
                                              @if($proyecto[0]->tipo == 'trabajo_grado')
                                                  TRABAJO DE GRADO
                                              @elseif($proyecto[0]->tipo == 'trabajo_especial_grado')
                                                  TRABAJO ESPECIAL DE GRADO
                                              @elseif($proyecto[0]->tipo == 'proyecto')
                                                  PROYECTO
                                              @endif
                                              APROBADO CON OBSERVACIONES.
                                          </strong></h3>
                                      @endif
                                      @if($estado->nombre == 'rechazado_evaluacion_jurado')
                                          <h3 class="timeline-header no-border"><strong>
                                              @if($proyecto[0]->tipo == 'trabajo_grado')
                                                  TRABAJO DE GRADO
                                              @elseif($proyecto[0]->tipo == 'trabajo_especial_grado')
                                                  TRABAJO ESPECIAL DE GRADO
                                              @elseif($proyecto[0]->tipo == 'proyecto')
                                                  PROYECTO
                                              @endif
                                              RECHAZADO.
                                          </strong></h3>
                                      @endif
                                  </div>
                              </li>
                          @endif
                          @if($estado->nombre == 'aprobado_evaluacion_jurado' || $estado->nombre == 'aprobado_observaciones_evaluacion_jurado')
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header"><strong>ACTA DE VEREDICTO</strong></h3>
                                      <div class="timeline-body">
                                          <div class="row">
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@acta_veredicto', [$proyecto[0]->proyecto_id]) }}" target="_blank" v-on:click="loader">
                                                      <i class="fa fa-cloud-download"></i> Descargar
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header"><strong>ACTA BIBLIOTECA VIRTUAL</strong></h3>
                                      <div class="timeline-body">
                                          <div class="row">
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@acta_biblioteca_virtual', [$proyecto[0]->proyecto_id]) }}" target="_blank" v-on:click="loader">
                                                      <i class="fa fa-cloud-download"></i> Descargar
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                              <li class="time-label">
                                  <span class="bg-red">
                                      {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                  </span>
                              </li>
                          @endif
                      @endforeach
                  </ul>
              </div>
          </div>
      </section>
  </div>
  @push ('scripts')
      {{-- @include('back_office.pages.menu.proyectos.common.scripts') --}}
  @endpush
@endsection
