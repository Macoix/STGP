<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-user-{{ $user->id }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Editar - {{$user->nombre}} {{$user->apellido}}</h4>
          </div>
          <div class="modal-body">
            <form class="" action="{{route('user.update', $user->id)}}" method="post">
              @csrf
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                              <label>TIPO DE DOCUMENTO</label>
                              <select id="selectDocumento" class="form-control" name="tipo_documento">
                                  <option value="">Seleccionar</option>
                                  <option value="Cedula" @if($user->tipo_identificacion == 'Cedula') selected @endif>Cedula</option>
                                  <option value="Pasaporte" @if($user->tipo_identificacion == 'Pasaporte') selected @endif>Pasaporte</option>
                              </select>
                              @if ($errors->has('tipo_documento'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('tipo_documento') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('nombre') ? ' has-warning' : '' }}">
                              @if ($errors->has('nombre'))
                                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                              @else
                              <label class="control-label">&nbsp;</label>
                              @endif
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                  <input type="text" class="form-control" name="numero_documento" value="{{ $user->numero_identificacion }}" placeholder="Ingrese Numeros...">
                              </div>
                              @if ($errors->has('nombre'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('nombre') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('nombre') ? ' has-warning' : '' }}">
                              @if ($errors->has('nombre'))
                                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                              @else
                              <label class="control-label">NOMBRES</label>
                              @endif
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control" name="nombre" type="text" value="{{ $user->nombre }}" placeholder="Ingrese Nombres" />
                              </div>
                              @if ($errors->has('nombre'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('nombre') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('apellido') ? ' has-warning' : '' }}">
                              @if ($errors->has('acronimo'))
                                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                              @else
                              <label class="control-label">APELLIDOS</label>
                              @endif
                              <input class="form-control" name="apellido" type="text" value="{{ $user->apellido }}" placeholder="Ingrese Apellidos"/>
                              @if ($errors->has('apellido'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('apellido') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group{{ $errors->has('nombre') ? ' has-warning' : '' }}">
                                @if ($errors->has('nombre'))
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                                @else
                                <label class="control-label">E-MAIL</label>
                                @endif
                                <input class="form-control" name="email" type="email" value="{{ $user->email }}" placeholder="Correo@example.com" />
                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-6 col-xs-12">
                              <div class="form-group{{ $errors->has('telefono') ? ' has-warning' : '' }}">
                                  @if ($errors->has('telefono'))
                                      <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                                  @else
                                  <label class="control-label">TELEFONO</label>
                                  @endif
                                  <input class="form-control" name="telefono" type="text" value="{{ $user->telefono }}" placeholder="xxxxxxx" />
                                  @if ($errors->has('telefono'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('telefono') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                                  <label>ROL</label>
                                  <select id="selectPrograma" class="form-control" name="rol">
                                    <option value="" >Seleccionar</option>
                                    @foreach($roles as $rol)
                                      <option value="{{ $rol->id }}" @if($user->rol->id == $rol->id) selected @endif >{{ $rol->name }}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                        </div>

                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('estado') ? ' has-warning ' : '' }}">
                              <label>ESTADO</label>
                              <select id="selectEstado" class="form-control" name="estado">
                                  <option value="activo" @if($user->estado == 'activo') selected @endif>Activo</option>
                                  <option value="inactivo" @if($user->estado == 'eliminado') selected @endif>Inactivo</option>
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
                        <button class="btn btn-app bg-green" type="button" data-target="#modal-validation-{{$user->id}}" data-toggle="modal">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                        <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation-{{$user->id}}">
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
