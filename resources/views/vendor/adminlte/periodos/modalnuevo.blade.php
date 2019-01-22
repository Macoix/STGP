<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-nuevo-periodo">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Crear Nuevo Periodo</h5>
          </div>
          <div class="modal-body">
            <form class="" action="{{route('periodos.store')}}" method="post">
              @csrf
                <div class="row">
                      <div class="col-lg-3 col-md-2 col-sm-2 col-xs-12">
                          <div class="form-group{{ $errors->has('facultad') ? ' has-warning' : '' }}">
                              <label>FACULTAD</label>
                              <select id="selectPrograma" class="form-control" name="facultades">
                                  <option value="FI" >FI</option>
                                  {{-- @foreach($profesores as $profesor) --}}
                                      {{-- <option value=""></option> --}}
                                  {{-- @endforeach --}}
                              </select>
                              @if ($errors->has('facultad'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('facultad') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                          <div class="form-group{{ $errors->has('ano') ? ' has-warning' : '' }}">
                              @if ($errors->has('ano'))
                                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                              @else
                              <label class="control-label">AÑO</label>
                              @endif
                              <input class="form-control" name="ano" type="text" value="{{ old('ano') }}" />
                              @if ($errors->has('ano'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('ano') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                          <div class="form-group{{ $errors->has('acronimo') ? ' has-warning' : '' }}">
                              @if ($errors->has('periodo'))
                                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                              @else
                              <label class="control-label">PERIODO</label>
                              @endif
                              <input class="form-control" name="periodo" type="text" value="{{ old('periodo') }}" />
                              @if ($errors->has('periodo'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('periodo') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                  </div>
                    <div class="row">
                      <div class="col-sm-4 col-xs-12">
                          <div class="form-group{{ $errors->has('estado') ? ' has-warning ' : '' }}">
                              <label>ESTADO</label>
                              <select id="selectEstado" class="form-control" name="estado">
                                  <option value="en curso" @if(old('estado') == 'en curso') selected @endif>En Curso</option>
                                  <option value="concluido" @if(old('estado') == 'concluido') selected @endif>Concluido</option>
                              </select>
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
