<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-jurado-{{$jurado->jurado_id}}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              <h5 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i>Editar Jurado</h5>
          </div>
          <div class="modal-body">
            <form class="" action="{{route('jurado.update', $jurado->jurado_id)}}" method="post">
              @csrf
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                              <label>CARRERA</label>
                              <select id="selectPrograma" class="form-control" name="carreraid">
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
                  </div>
                  <div class="row">
                    <hr style="margin:0 0 10px 0;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                        <button class="btn btn-app bg-yellow" type="reset">
                            <i class="fa fa-paint-brush"></i> Limpiar
                        </button>
                        <button class="btn btn-app bg-green" type="button" data-target="#modal-validation-{{$jurado->jurado_id}}" data-toggle="modal">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                        <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation-{{$jurado->jurado_id}}">
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
