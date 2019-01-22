@extends('adminlte::layouts.app')
@section('title','Timeline de projecto')
@section('main-content')
  @include('vendor.adminlte.layouts.partials.bar')
  @section('contentheader_title', 'PROYECTOS')
  <div class="">
      {{-- @include('back_office.pages.menu.proyectos.common.header') --}}
      <section class="content">
          {{-- @include('back_office.includes.notifications') --}}
          @if(Session::get('alert_type') == 'warning')
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> ¡Éxito!</h4>
                  {{ Session::get('message') }}
              </div>
          @endif
          <div class="row">
              <div class="col-sm-6 col-xs-12">
                  <a class="btn btn-app bg-red" href="{{ route('proyectos.index') }}">
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
                                          PASANTÍA
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
                                                  PASANTÍA
                                              @elseif($proyecto[0]->tipo == 'extraordinario')
                                                  SEMESTRE EXTRAORDINARIO
                                              @endif
                                          </h5>
                                          <h5><strong>TUTOR:</strong> {{ strtoupper($proyecto[0]->nombres_tutor) }} {{ strtoupper($proyecto[0]->apellidos_tutor) }}</h5>
                                          {{-- <h5><strong>LINEA DE INVESTIGACION:</strong> {{ strtoupper($proyecto[0]->linea_investigacion) }}</h5> --}}
                                      </div>
                                      <div class="col-sm-6 col-xs-12">
                                          <div class="col-sm-offset-6 col-sm-6 col-xs-12 text-right">
                                              <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@document', $proyecto[0]->anexo) }}" target="_blank" >
                                                  <i class="fa fa-cloud-download"></i> Documento
                                              </a>
                                              {{-- @can('edit_proyectos') --}}
                                                  <button class="btn btn-app bg-yellow" data-target="#modal-proyecto-{{ $proyecto[0]->proyecto_id }}" data-toggle="modal" data-placement="top" title="Editar"><i class="fa fa-edit"></i>Editar</button>
                                                  @include('vendor.adminlte.proyectos.modal')
                                              {{-- @endcan --}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <hr style="margin:0 0 10px 0;">
                                  </div>
                                  <div class="row">
                                      <div class="col-xs-12">
                                          <h5><strong>TÍTULO:</strong></h5>
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
                              <h3 class="timeline-header no-border"><strong> PENDIENTE POR APROBACIÓN DE ANEXO</strong></h3>
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
                                                					<h4 class="modal-title"><strong>APROBACIÓN DE ANEXO</strong></h4>
                                                				</div>
                                                				<div class="modal-body">
                                                					<div class="row">
                                                						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                							<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                                								<label>ESTADO</label>
                                                								<select style="width: 100%;" class="form-control select2" name="estado" id="estado_anexo">
                                                									<option value="">Seleccionar</option>
                                                									<option value="aprobar">APROBAR</option>
                                                									<option value="rechazar">RECHAZAR</option>
                                                								</select>
                                                                <label>OBSERVACIONES</label>
                                                                <textarea name="observaciones" rows="8" cols="80" id="anexo_observaciones" disabled></textarea>
                                                							</div>
                                                						</div>
                                                					</div>
                                                				</div>
                                                				<div class="modal-footer">
                                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                              <button type="submit" class="btn btn-success btn-flat btn-block" ><strong>CONFIRMAR</strong></button>
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
                                          @elseif($proyecto[0]->tipo == 'Pasantia')
                                              Pasantía
                                          @elseif($proyecto[0]->tipo == 'Extraordinario')
                                              Semestre Extraordinario
                                          @endif
                                           - ANEXO MODIFICADO.
                                      </strong></h3>
                                  </div>
                              </li>
                          @endif
                          @if($proyecto[0]->anexo_estado == 'rechazada')
                              @if($estado->nombre == 'anexo_rechazado')
                                  <li class="time-label">
                                      <span class="bg-green">
                                          {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                      </span>
                                  </li>
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header"><strong>ANEXO RECHAZADO</strong></h3>
                                          <div class="timeline-body">
                                              <span style="color: red;">POR FAVOR VERIFIQUE SU ANEXO.</span><br><br>
                                              <label>OBSERVACIONES:</label>
                                              {{$estado->comentario}}
                                          </div>
                                      </div>
                                  </li>
                              @endif
                            @endif
                            @if($proyecto[0]->anexo_estado == 'aprobada')
                              @if($estado->nombre == 'anexo_aprobado')
                                  <li class="time-label">
                                      <span class="bg-green">
                                          {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                      </span>
                                  </li>
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header no-border"><strong>ANEXO APROBADO</strong></h3>
                                      </div>
                                  </li>
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header no-border"><strong> PENDIENTE POR SUBIDA DE TOMO - 1</strong></h3>
                                          {{-- @can('validation_fact_1') --}}
                                              <div class="timeline-footer">
                                                  <div class="row">
                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                              <form action="{{route('proyectos.tomo', $proyecto[0]->proyecto_id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                  <div class="col-xs-12">
                                                                    <small style="color: red;" class="" style="margin: 0 0 10px 0">*<b><u>NOTA</u></b>: Por favor, verifique que su titulo y objetivos sean iguales al Anexo. <br> De lo contrario, tendra altas posibilidades de ser rechazado su tomo, tome precauciones antes de subir el archivo.</small>
                                                                    <hr style="margin:10px 0 10px 0;">

                                                                    <div class="form-group{{ $errors->has('documento') ? ' has-warning' : '' }}">

                                                                      <label for="file-upload3" class="btn btn-app bg-blue">
                                                                        <i class="fa fa-upload"></i>Subir archivo
                                                                      </label>
                                                                      <input id="file-upload3" onchange='cambiar3()' type="file" style='display:none;' name='documento' accept="application/pdf"/>
                                                                      <span id="info3"></span>
                                                                      {{-- <input type="file" name="documento"  accept="application/pdf" class="file-input"> --}}


                                                                      @if ($errors->has('documento'))
                                                                        <span class="help-block">
                                                                          <strong>{{ $errors->first('documento') }}</strong>
                                                                        </span>
                                                                      @endif
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                <div class="row">

                                                                  <hr style="margin:0 0 10px 0;">
                                                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">

                                                                      <button class="btn btn-app bg-green" type="button" data-target="#modal-validation-{{$proyecto[0]->proyecto_id}}" data-toggle="modal" @if($proyecto[0]->tomo_estado == 'pendiente') disabled @endif>
                                                                          <i class="fa fa-save"></i> Guardar
                                                                      </button>
                                                                      <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation-{{$proyecto[0]->proyecto_id}}">
                                                                          <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header">
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">×</span>
                                                                                      </button>
                                                                                  </div>
                                                                                  <div class="modal-body">
                                                                                      <div class="row">
                                                                                          <div class="col-xs-12 text-center">
                                                                                              <h4><strong>¿SEGURO QUE DESEA GUARDAR?</strong></h4>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="modal-footer">

                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                        <button type="submit" class="btn btn-success btn-flat btn-block" ><strong>CONFIRMAR</strong></button>
                                                                                    </div>
                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                        <button type="button" class="btn btn-danger btn-flat btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
                                                                                    </div>

                                                                                  </div>
                                                                              </div>
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
                                  </li>
                              @endif
                              @if($estado->nombre == 'pendiente_evaluacion_comite')
                                <li class="time-label">
                                    <span class="bg-green">
                                        {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-file-pdf-o bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                        <h3 class="timeline-header">
                                            <strong>
                                                DETALLES DEL
                                                @if($proyecto[0]->tipo == 'trabajo_grado')
                                                    TRABAJO DE GRADO
                                                @elseif($proyecto[0]->tipo == 'pasantia')
                                                    PASANTÍA
                                                @elseif($proyecto[0]->tipo == 'extraordinario')
                                                    SEMESTRE EXTRAORDINARIO
                                                @endif - TOMO 1
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
                                                            PASANTÍA
                                                        @elseif($proyecto[0]->tipo == 'extraordinario')
                                                            SEMESTRE EXTRAORDINARIO
                                                        @endif
                                                    </h5>
                                                    <h5><strong>TUTOR:</strong> {{ strtoupper($proyecto[0]->nombres_tutor) }} {{ strtoupper($proyecto[0]->apellidos_tutor) }}</h5>
                                                </div>
                                                <div class="col-sm-6 col-xs-12">
                                                    <div class="col-sm-offset-6 col-sm-6 col-xs-12 text-right">
                                                        <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@document2', $proyecto[0]->tomo) }}" target="_blank" >
                                                            <i class="fa fa-cloud-download"></i> Documento
                                                        </a>
                                                        {{-- @can('edit_proyectos') --}}
                                                            <a class="btn btn-app bg-yellow" href="" >
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
                                                    <h5><strong>TÍTULO:</strong></h5>
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
                                  {{-- @if(count($comite))
                                      @foreach($comite as $com)
                                          @if(Auth::user()->id == $com->id)
                                              <li>
                                                  <i class="fa fa-user bg-aqua"></i>
                                                  <div class="timeline-item">
                                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                                      <h3 class="timeline-header no-border"><strong>ACTA DE INVITACION - COMITE</strong></h3>
                                                      <div class="timeline-footer">
                                                          <div class="row">
                                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                  <a class="btn btn-app bg-blue" href="" target="_blank" >
                                                                      <i class="fa fa-cloud-download"></i> Descargar
                                                                  </a>
                                                                  {{ URL::action('ProyectosController@acta_invitacion_comite', [$proyecto[0]->proyecto_id]) }}
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </li>
                                          @endif
                                      @endforeach
                                  @endif --}}
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header no-border"><strong>PENDIENTE POR EVALUACIÓN DE COMITÉ</strong></h3>
                                          @if(count($comite))
                                              @foreach($comite as $com)
                                                  @if(Auth::user()->id == $com->id)
                                                    <div class="timeline-footer">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <button class="btn btn-app bg-green" data-target="#modal-validation-fact_2" data-toggle="modal"  > <i class="fa fa-check-square-o"></i> Evaluar</button>
                                                                  <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation-fact_2">
                                                                    <form action="{{route('proyectos.comite', $proyecto[0]->proyecto_id)}}" method="post" autocomplete="off">
                                                                      @csrf

                                                                      <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                          <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">×</span>
                                                                            </button>
                                                                            <h4 class="modal-title"><strong>APROBACIÓN DE COMITE</strong></h4>
                                                                          </div>
                                                                          <div class="modal-body">
                                                                            <div class="row">
                                                                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                                                                  <label>ESTADO</label>
                                                                                  <select style="width: 100%;" class="form-control" name="estado_comite">
                                                                                    <option value="">Seleccionar</option>
                                                                                    <option value="aprobar">APROBAR</option>
                                                                                    <option value="rechazar">RECHAZAR</option>
                                                                                  </select>
                                                                                  <label>OBSERVACIONES</label>
                                                                                  <textarea name="observaciones_comite" rows="8" cols="80" ></textarea>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <button type="submit" class="btn btn-success btn-flat btn-block" ><strong>CONFIRMAR</strong></button>
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
                                                  @endif
                                              @endforeach
                                          @endif
                                      </div>
                                  </li>
                                  @if(count($evaluaciones_comite))
                                    <li class="time-label">
                                        <span class="bg-green">
                                            {{ date('d/m/Y', strtotime($proyecto[0]->created_at)) }}
                                        </span>
                                    </li>
                                      <li>
                                          <i class="fa fa-envelope bg-blue"></i>
                                          <div class="timeline-item">
                                              <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                              <h3 class="timeline-header">
                                                  <b>EVALUACIONES - COMITÉ</b></h3>
                                              <div class="timeline-body">
                                                @if(count($evaluaciones_comite))
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-condensed table-hover">
                                                                    <thead style="background-color: #A9D0F5;">
                                                                        <th>#</th>
                                                                        <th>PROFESOR</th>
                                                                        <th>VEREDICTO</th>
                                                                        <th>OBSERVACIONES</th>
                                                                        <th>ESTADO</th>
                                                                        <th>FECHA - HORA</th>
                                                                        {{-- <th width="120" class="text-center">OPCIONES</th> --}}
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($evaluaciones_comite as $index => $evaluacion)
                                                                            <tr>
                                                                                <td>{{ $index + 1 }}</td>
                                                                                <td>{{ $evaluacion->nombre }} {{ $evaluacion->apellido }}</td>
                                                                                <td>
                                                                                    @if($evaluacion->veredicto == 'aprobar' && $evaluacion->observaciones == '')
                                                                                        <span class="label label-success">APROBADO</span>
                                                                                    @elseif($evaluacion->veredicto == 'aprobar' && $evaluacion->observaciones != '')
                                                                                        <span class="label label-warning">APROBADO CON OBSERVACIONES</span>
                                                                                    @elseif($evaluacion->veredicto == 'rechazado')
                                                                                        <span class="label label-danger">NO APROBADO</span>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                  @if($evaluacion->observaciones == '')
                                                                                    No se hicieron observaciones
                                                                                  @else
                                                                                    {{ $evaluacion->observaciones }}
                                                                                  @endif
                                                                                </td>
                                                                                <td>{{ $evaluacion->estado }}</td>
                                                                                <td>{{ date('d/m/Y - h:m', strtotime($evaluacion->created_at)) }}</td>
                                                                                {{-- <td>
                                                                                    <div class="col-sm-4 col-xs-12">
                                                                                        <a class="btn btn-link btn-flat btn-md" href="" target="_blank" data-placement="top" title="DETALLES"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                                                    </div>
                                                                                    @if(count($comite))
                                                                                        @foreach($comite as $com)
                                                                                            @if(Auth::user()->user_id == $com->user_id)
                                                                                                <div class="col-sm-4 col-xs-12">
                                                                                                    <a style="color: #D68A10;" class="btn btn-link btn-flat btn-md" href="@if(count($evaluaciones_comite) < 3) {{ URL::action('ProyectosEvaluacionesComiteController@create', [$proyecto[0]->proyecto_id, 1]) }} @endif"  data-placement="top" title="EDITAR" @if(count($evaluaciones_comite) < 3) disable @endif><span class="glyphicon glyphicon-edit"></span></a>
                                                                                                </div>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                </td> --}}
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                              </div>
                                              <div class="timeline-footer">
                                                <hr style="margin:0 0 10px 0;">
                                                  <div class="row">
                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                                                          <button class="btn btn-app bg-green" data-target="#modal-validation-3" data-toggle="modal" @if($estado->nombre == 'aprobado_evaluacion_comite' || $estado->nombre == 'aprobado_observaciones_evaluacion_comite') disabled @endif> <i class="fa fa-check-square-o"></i> Validar</button>
                                                            <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation-3">
                                                              <form action="{{route('proyectos.aprobar', $proyecto[0]->proyecto_id)}}" method="post" autocomplete="off">
                                                                @csrf

                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                      </button>
                                                                      <h4 class="modal-title text-left"><strong>APROBACION DE COMITÉ</strong></h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                          <button type="submit" class="btn btn-success btn-flat btn-block" ><strong>CONFIRMAR</strong></button>
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
                                                  APROBADO POR COMITÉ
                                              @elseif($estado->nombre == 'aprobado_observaciones_evaluacion_comite')
                                                  APROBADO POR COMITÉ CON OBSERVACIONES
                                              @else
                                                  NO APROBADO POR COMITÉ
                                              @endif
                                          </strong></h3>
                                      </div>
                                  </li>
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header no-border"><strong>ACTA DE APROBACIÓN DEL DECANO</strong></h3>
                                          <div class="timeline-footer">
                                              <a class="btn btn-app bg-blue" href="{{route('cartadecano',$proyecto[0]->proyecto_id)}}" target="_blank" >
                                                  <i class="fa fa-cloud-download"></i> Descargar
                                              </a>
                                          </div>
                                      </div>
                                  </li>
                                @endif
                                @if($estado->nombre == 'pendiente_tomo2')
                                  <li>
                                      <i class="fa fa-user bg-aqua"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header no-border"><strong> PENDIENTE POR SUBIDA DE TOMO - II</strong></h3>
                                          {{-- @can('validation_fact_1') --}}
                                              <div class="timeline-footer">
                                                  <div class="row">
                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                              <form action="{{route('proyectos.tomo2', $proyecto[0]->proyecto_id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                  <div class="col-xs-12">
                                                                    <small style="color: red;" class="" style="margin: 0 0 10px 0">*<b><u>NOTA</u></b>: Por favor, verifique que su titulo y objetivos sean iguales al Anexo y al Tomo I. <br> De lo contrario, tendrá altas posibilidades de ser rechazado su tomo, tome precauciones antes de subir el archivo.</small>
                                                                    <hr style="margin:10px 0 10px 0;">

                                                                    <div class="form-group{{ $errors->has('documento') ? ' has-warning' : '' }}">

                                                                      <label for="file-upload2" class="btn btn-app bg-blue">
                                                                        <i class="fa fa-upload"></i>Subir archivo
                                                                      </label>
                                                                      <input id="file-upload2" onchange='cambiar2()' type="file" style='display: none;' name='documento2' accept="application/pdf"/>
                                                                      <span id="info2"></span>
                                                                      {{-- <input type="file" name="documento"  accept="application/pdf" class="file-input"> --}}


                                                                      @if ($errors->has('documento'))
                                                                        <span class="help-block">
                                                                          <strong>{{ $errors->first('documento') }}</strong>
                                                                        </span>
                                                                      @endif
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                <div class="row">

                                                                  <hr style="margin:0 0 10px 0;">
                                                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">

                                                                      <button class="btn btn-app bg-green" type="button" data-target="#modal-validation3" data-toggle="modal" @if($proyecto[0]->tomo2_estado == 'pendiente') disabled @endif>
                                                                          <i class="fa fa-save"></i> Guardar
                                                                      </button>
                                                                      <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation3">
                                                                          <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                  <div class="modal-header">
                                                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">×</span>
                                                                                      </button>
                                                                                  </div>
                                                                                  <div class="modal-body">
                                                                                      <div class="row">
                                                                                          <div class="col-xs-12 text-center">
                                                                                              <h4><strong>¿SEGURO QUE DESEA GUARDAR?</strong></h4>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="modal-footer">

                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                        <button type="submit" class="btn btn-success btn-flat btn-block" ><strong>CONFIRMAR</strong></button>
                                                                                    </div>
                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                        <button type="button" class="btn btn-danger btn-flat btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
                                                                                    </div>

                                                                                  </div>
                                                                              </div>
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
                            <li class="time-label">
                                <span class="bg-green">
                                    {{ date('d/m/Y', strtotime($estado->created_at)) }}
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-file-pdf-o bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                    <h3 class="timeline-header">
                                        <strong>
                                            DETALLES DEL
                                            @if($proyecto[0]->tipo == 'trabajo_grado')
                                                TRABAJO DE GRADO
                                            @elseif($proyecto[0]->tipo == 'pasantia')
                                                PASANTIA
                                            @elseif($proyecto[0]->tipo == 'extraordinario')
                                                SEMESTRE EXTRAORDINARIO
                                            @endif - TOMO 2
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
                                                        PASANTÍA
                                                    @elseif($proyecto[0]->tipo == 'extraordinario')
                                                        SEMESTRE EXTRAORDINARIO
                                                    @endif
                                                </h5>
                                                <h5><strong>TUTOR:</strong> {{ strtoupper($proyecto[0]->nombres_tutor) }} {{ strtoupper($proyecto[0]->apellidos_tutor) }}</h5>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="col-sm-offset-6 col-sm-6 col-xs-12 text-right">
                                                    <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@document3', $proyecto[0]->tomo2) }}" target="_blank" >
                                                        <i class="fa fa-cloud-download"></i> Documento
                                                    </a>
                                                    {{-- @can('edit_proyectos') --}}
                                                        <a class="btn btn-app bg-yellow" href="" >
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
                                                <h5><strong>TÍTULO:</strong></h5>
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
                              @if($asignacion_jurado  == 0)
                                  <li>
                                      <i class="fa fa-envelope bg-blue"></i>
                                      <div class="timeline-item">
                                          <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                          <h3 class="timeline-header"><strong>PENDIENTE POR ASIGNACIÓN DE JURADO</strong></h3>
                                          @if(Auth::user()->id == $proyecto[0]->coordinador_user_id)
                                              <div class="timeline-body">
                                                  <div class="row">
                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                          <button class="btnn btn btn-app bg-green" data-target="#modal-jurado-{{$proyecto[0]->proyecto_id}}" data-toggle="modal" data-placement="top" title="Nuevo"><span class="fa fa-plus"></span>Nuevo</button>
                                                              @include('vendor.adminlte.proyectos.modaljurado')
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
                                          <h3 class="timeline-header"><strong>PENDIENTE POR REVISIÓN DE JURADO</strong></h3>
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
                                      <h3 class="timeline-header no-border"><strong>ACTA DE CONSTITUCIÓN DE JURADO</strong></h3>
                                      <div class="timeline-footer">
                                          <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@acta_constitucion_jurado', $proyecto[0]->proyecto_id) }}" target="_blank" >
                                              <i class="fa fa-cloud-download"></i> Descargar
                                          </a>
                                      </div>
                                  </div>
                              </li>
                              {{-- <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header no-border"><strong>ACTA DE INVITACION DE JURADO</strong></h3>
                                      <div class="timeline-footer">
                                          <a class="btn btn-app bg-blue" href="{{ route('invitacionJurado', $proyecto[0]->proyecto_id) }}" target="_blank" >
                                              <i class="fa fa-cloud-download"></i> Descargar
                                          </a>
                                      </div>
                                  </div>
                              </li> --}}
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
                                    <h3 class="timeline-header no-border"><strong>JURADO ASIGNADO</strong></h3>
                                    <div class="timeline-body">
                                      <div class="row">
                                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                              <div class="table-responsive">
                                                  <table class="table table-condensed table-hover">
                                                      <thead style="background-color: #A9D0F5;">
                                                          <th>JURADOS</th>
                                                          <th>FECHA</th>
                                                          <th>HORA</th>
                                                          <th>OPCIONES</th>
                                                          {{-- @if($proyecto[0]->estado == 'pendiente_revision_jurado')
                                                              @if(Auth::user()->user_id == $postgrado[0]->user_id)
                                                                  <th width="60">OPCIONES</th>
                                                              @endif
                                                          @endif --}}
                                                      </thead>
                                                      <tbody>
                                                          @foreach($jurados as $jurado)
                                                              <tr>
                                                                  <td>
                                                                      <strong>Miembro 1: </strong>{{ $jurado->nombres_presidente }} {{ $jurado->apellidos_presidente }}<br>
                                                                      <strong>Miembro 2: </strong>{{ $jurado->nombres_miembro1 }} {{ $jurado->apellidos_miembro1 }}<br>
                                                                      <strong>Miembro 3: </strong>{{ $jurado->nombres_miembro2 }} {{ $jurado->apellidos_miembro2 }}
                                                                  </td>
                                                                  <td>{{ date('d/m/Y', strtotime($jurado->created_at)) }}</td>
                                                                  <td>{{ date('g:i A', strtotime($jurado->created_at)) }}</td>
                                                                  <td>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                                        <button style="color: #D68A10;" class="btn btn-link btn-flat btn-sm" data-target="#modal-jurado-proyecto-{{$proyecto[0]->proyecto_id}}" data-toggle="modal" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit"></span></button>
                                                                        @include('vendor.adminlte.proyectos.modaleditarjurado')
                                                                    </div>
                                                                  </td>
                                                              </tr>
                                                          @endforeach
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user bg-aqua"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                    <h3 class="timeline-header"><strong>INVITACIÓN DE JURADO</strong></h3>
                                    <div class="timeline-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <a class="btn btn-app bg-blue" href="{{ route('invitacionJurado', $proyecto[0]->proyecto_id) }}" target="_blank" >
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
                                      <h3 class="timeline-header"><strong>PENDIENTE POR EVALUACIÓN DE JURADO</strong></h3>
                                      @if(count($jurados))
                                          @foreach($jurados as $jurado)
                                              {{-- @if($jurado->estado == 'aprobado') --}}
                                                  {{-- @if(Auth::user()->id == $jurado->presidente || $proyecto[0]->coordinador_user_id == Auth::user()->id) --}}
                                                      <div class="timeline-body">
                                                          <div class="row">
                                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                  <a class="btn btn-app bg-green" data-target="#modal-evaluacion-jurado" data-toggle="modal">
                                                                      <i class="fa  fa-check-square-o"></i> Evaluar
                                                                  </a>
                                                                  <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-evaluacion-jurado">
                                                                  	<form class="" action="{{ route('proyectos.veredicto', $proyecto[0]->proyecto_id) }}" method="post">
                                                                      @csrf
                                                                  		<div class="modal-dialog">
                                                                  			<div class="modal-content">
                                                                  				<div class="modal-header">
                                                                  					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  						<span aria-hidden="true">×</span>
                                                                  					</button>
                                                                  					<h4 class="modal-title"><strong>VEREDICTO FINAL</strong></h4>
                                                                  				</div>
                                                                  				<div class="modal-body">
                                                                  					<div class="row">
                                                                  						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                  							<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                                                  								<label>VEREDICTO</label>
                                                                  								<select style="width: 100%;" class="form-control select2" name="veredicto">
                                                                  									<option value="">Seleccionar</option>
                                                                  									<option value="aprobado">APROBAR</option>
                                                                  									<option value="aprobado_observaciones">APROBAR CON OBSERVACIONES</option>
                                                                  									<option value="rechazado">RECHAZAR</option>
                                                                  								</select>
                                                                  							</div>
                                                                  						</div>
                                                                  					</div>
                                                                  				</div>
                                                                  				<div class="modal-footer">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <button type="submit" class="btn btn-success btn-flat btn-block" ><strong>CONFIRMAR</strong></button>
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
                                                  {{-- @endif --}}
                                              {{-- @endif --}}
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
                                    <h3 class="timeline-header"><strong>HOJA CRITERIOS DE EVALUACIÓN</strong></h3>
                                    <div class="timeline-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <a class="btn btn-app bg-blue" @if($proyecto[0]=="pasantia") href="{{ route('criteriop') }}" @else href="{{ route('criteriot') }}" @endif target="_blank" >
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
                                    <h3 class="timeline-header"><strong>ACTA DE APROBACIÓN</strong></h3>
                                    <div class="timeline-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <a class="btn btn-app bg-blue" href="{{route('aprobacionap',$proyecto[0]->proyecto_id)}}" target="_blank" >
                                                    <i class="fa fa-cloud-download"></i> Descargar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                              {{-- <li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('g:i A', strtotime($estado->created_at)) }}</span>
                                      <h3 class="timeline-header"><strong>ACTA BIBLIOTECA VIRTUAL</strong></h3>
                                      <div class="timeline-body">
                                          <div class="row">
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                  <a class="btn btn-app bg-blue" href="" target="_blank" >
                                                      <i class="fa fa-cloud-download"></i> Descargar
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </li> --}}
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
  {{-- @push ('scripts')
      @include('back_office.pages.menu.proyectos.common.scripts')
  @endpush --}}
@endsection
