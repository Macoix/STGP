<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-decano-{{ $decanos->id }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Editar - {{$decanos->name}} {{$decanos->apellido}}</h4>
          </div>
          <div class="modal-body">
            <form class="" action="{{route('decano.update', $decanos->id)}}" method="post">
              @csrf
                  <div class="row">
                      <div class="col-sm-4 col-xs-12">
                          <div class="form-group{{ $errors->has('nombre') ? ' has-warning' : '' }}">
                              @if ($errors->has('nombre'))
                                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO </label>
                              @else
                              <label class="control-label">Nombre</label>
                              @endif
                              <input class="form-control" name="nombre" type="text" value="{{ $decanos->nombre }}" />
                              @if ($errors->has('nombre'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('nombre') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-4 col-xs-12">
                          <div class="form-group{{ $errors->has('acronimo') ? ' has-warning' : '' }}">
                              @if ($errors->has('acronimo'))
                                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                              @else
                              <label class="control-label">Apellido</label>
                              @endif
                              <input class="form-control" name="apellido" type="text" value="{{ $decanos->apellido }}" />
                              @if ($errors->has('acronimo'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('acronimo') }}</strong>
                                  </span>
                              @endif
                          </div>

                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group{{ $errors->has('nombre') ? ' has-warning' : '' }}">
                                @if ($errors->has('nombre'))
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO </label>
                                @else
                                <label class="control-label">Numero Identificacion</label>
                                @endif
                                <input class="form-control" name="numero" type="text" value="{{ $decanos->numero_identificacion }}" />
                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
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
                        <button class="btn btn-app bg-green" type="button" data-placement="bottom" data-target="#modal-validation-{{$decanos->id}}" data-toggle="modal">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                        <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation-{{$decanos->id}}">
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
