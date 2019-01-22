<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-tutores-{{$tutor->tutores->id}}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              <h5 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i>Editar Horas de Tutores</h5>
          </div>
          <div class="modal-body">
            <form class="" action="{{ route('nomina.update', $tutor->tutores->id) }}" method="post">
              @csrf
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                              <label>ESCALAFON</label>
                              <select id="selectPrograma" class="form-control" name="escalafon">
                                  <option value="" @if(isset($tutor->tutores->escalafon)!=1) selected @endif disabled>Seleccionar</option>
                                  <option value="Instructor" @if($tutor->tutores->escalafon == 'Instructor') selected @endif>Instructor</option>
                                  <option value="Asistente" @if($tutor->tutores->escalafon == 'Asistente') selected @endif>Asistente</option>
                                  <option value="Agregado" @if($tutor->tutores->escalafon == 'Agregado') selected @endif>Agregado</option>
                                  <option value="Asociado" @if($tutor->tutores->escalafon == 'Asociado') selected @endif>Asociado</option>
                                  <option value="Titular" @if($tutor->tutores->escalafon == 'Titular') selected @endif>Titular</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                            <label>HORAS</label>
                            <input type="text" name="horas" class="form-control" @if(isset($tutor->horas)==1) value="{{$tutor->horas}}" @endif>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                            <label>CONDICION</label>
                            <select id="selectPrograma" class="form-control" name="condicion">
                                <option value="" @if(isset($tutor->tutores->condicion)!=1) selected @endif disabled>Seleccionar</option>
                                <option value="Tiempo Convencional" @if($tutor->tutores->condicion == 'Tiempo Convencional') selected @endif>Tiempo Convencional</option>
                                <option value="Tiempo Completo" @if($tutor->tutores->condicion == 'Tiempo Completo') selected @endif>Tiempo Completo</option>
                                <option value="Medio Tiempo" @if($tutor->tutores->condicion == 'Medio Tiempo') selected @endif>Medio Tiempo</option>
                            </select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                              <label>OBSERVACIONES</label>
                              <textarea name="observaciones" rows="8" cols="80" class="form-control">@if(isset($tutor->observaciones)==1){{$tutor->observaciones}} @endif</textarea>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <hr style="margin:0 0 10px 0;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                        <button class="btn btn-app bg-yellow" type="reset">
                            <i class="fa fa-paint-brush"></i> Limpiar
                        </button>
                        <button class="btn btn-app bg-green" type="button" data-target="#modal-validation-{{$tutor->tutores->id}}" data-toggle="modal">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                        <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation-{{$tutor->tutores->id}}">
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
