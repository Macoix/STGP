<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-proyecto-{{ $proyecto[0]->proyecto_id }}">
  <div class="modal-dialog">
      <div class="modal-content" style="text-align: left">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i>Editar Proyecto</h4>
          </div>
          <div class="modal-body">
            <form class="" action="{{ route('proyectos.update',$proyecto[0]->proyecto_id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="col-sm-6 col-xs-12">
                      <h5><strong>AUTOR:</strong> {{ $proyecto[0]->nombres_autor }} {{ $proyecto[0]->apellidos_autor }}</h5>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                      <h5><strong>COAUTOR:</strong> {{ $proyecto[0]->nombres_coautor }} {{ $proyecto[0]->apellidos_coautor }}</h5>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                      <h5><strong>CREADO:</strong> {{ date('d/m/Y', strtotime($proyecto[0]->created_at)) }}</h5>
                  </div>
              </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('fact_1') ? ' has-warning' : '' }}">
                              <div class="input-group">
                                  {{-- <input type="text" class="form-control" name="fact_1" value="asdf" style="display:none"> --}}
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                          <div class="form-group{{ $errors->has('tipo') ? ' has-warning' : '' }}">
                              <label>TIPO DE PROYECTO</label>
                              <select id="selectTipoProyecto" class="form-control" name="tipo">
                                  <option value="">Seleccionar</option>
                                  <option value="trabajo_grado" @if(old('tipo') == 'trabajo_grado') selected @endif>Trabajo de Grado</option>
                                  <option value="pasantia" @if(old('tipo') == 'pasantia') selected @endif>Pasantia</option>
                                  <option value="extraordinario" @if(old('tipo') == 'extraordinario') selected @endif>Extraordinario</option>
                              </select>
                              @if ($errors->has('tipo'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('tipo') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                            <label>CARRERA</label>
                            <select id="selectCarrera" class="form-control" name="carrera">
                                <option value="" selected>Seleccionar</option>
                                @foreach($carreras as $carrera)
                                    <option value="{{ $carrera->id }}" @if($carrera->id == old('id')) @endif>{{ $carrera->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('programa_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('programa_id') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('tutor_user_id') ? ' has-warning' : '' }}">
                              <label>TUTOR</label>
                              <select id="selectTutor" class="form-control" name="tutor">
                                <option value="" selected>Seleccionar</option>
                                @foreach ($tutores as $tutor)
                                  <option value="{{ $tutor->id }}">{{ $tutor->users->nombre }} {{ $tutor->users->apellido }}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('tutor_user_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('tutor_user_id') }}</strong>
                                  </span>
                              @endif
                            </div>
                          </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      </div>
                    </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="form-group{{ $errors->has('titulo') ? ' has-warning' : '' }}">
                              @if ($errors->has('titulo'))
                                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                              @else
                              <label class="control-label">TITULO</label>
                              @endif
                              <textarea class="form-control" name="titulo" rows="2">{{ $proyecto[0]->titulo }}</textarea>
                              @if ($errors->has('titulo'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('titulo') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="form-group{{ $errors->has('resumen') ? ' has-warning' : '' }}">
                              @if ($errors->has('resumen'))
                                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN RESUMEN</label>
                              @else
                              <label class="control-label">RESUMEN</label>
                              @endif
                              <textarea class="form-control" name="resumen" rows="6">{{ $proyecto[0]->resumen }}</textarea>
                              @if ($errors->has('resumen'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('resumen') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="form-group{{ $errors->has('documento') ? ' has-warning' : '' }}">
                              <label>ACTUALIZAR DOCUMENTO</label> <br>
                              <label for="file-upload1" class="btn btn-app bg-blue">
                                  <i class="fa fa-upload"></i>Subir archivo
                              </label>
                              <input id="file-upload1" onchange='cambiar()' type="file" style='display: none;' name='documento' accept="application/pdf"/>
                              <span id="info1"></span> <br>
                              <label>DOCUMENTO ACTUAL</label> <br>
                              <a class="btn btn-app bg-blue" href="{{ URL::action('ProyectosController@document', $proyecto[0]->anexo) }}" target="_blank">
                                  <i class="fa fa-cloud-download"></i> Descargar
                              </a>
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
                        <button class="btn btn-app bg-yellow" type="reset">
                            <i class="fa fa-paint-brush"></i> Limpiar
                        </button>
                        <button class="btn btn-app bg-green" type="button" data-target="#modal-validation" data-toggle="modal">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                        <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation">
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
