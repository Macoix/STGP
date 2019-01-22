<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-jurado-proyecto-{{$proyecto[0]->proyecto_id}}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Edicion de Jurados</h4>
          </div>
          <div class="modal-body">
            <form class="" action="{{ route('jurados.update', $proyecto[0]->proyecto_id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label>MIEMBRO 1</label>
                            <select id="selectPresidente" class="form-control select2" name="presidente_user_id">
                                <option value="">Seleccionar</option>
                                @foreach($juradoss as $jurados)
                                    <option value="{{ $jurados->user_id }}">{{ $jurados->nombre }} {{ $jurados->apellido }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label>MIEMBRO 2</label>
                            <select id="selectMiembro1" class="form-control select2" name="miembro1_user_id">
                                <option value="">Seleccionar</option>
                                @foreach($juradoss as $jurados)
                                    <option value="{{ $jurados->user_id }}">{{ $jurados->nombre }} {{ $jurados->apellido }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label>MIEMBRO 3</label>
                            <select id="selectMiembro2" class="form-control select2" name="miembro2_user_id">
                                <option value="">Seleccionar</option>
                                @foreach($juradoss as $jurados)
                                    <option value="{{ $jurados->user_id }}">{{ $jurados->nombre }} {{ $jurados->apellido }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label>SUPLENTE</label>
                            <select id="selectSuplente" class="form-control select2" name="suplente_user_id">
                                <option value="">Seleccionar</option>
                                @foreach($juradoss as $jurado)
                                    <option value="{{ $jurado->user_id }}">{{ $jurado->nombres }} {{ $jurado->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                    <hr style="margin:0 0 10px 0;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                        <button class="btn btn-app bg-yellow" type="reset">
                            <i class="fa fa-paint-brush"></i> Limpiar
                        </button>
                        <button class="btn btn-app bg-green" type="button" data-placement="top" data-target="#modal-validation-jurado-proyecto-{{$proyecto[0]->proyecto_id}}" data-toggle="modal">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                        <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-validation-jurado-proyecto-{{$proyecto[0]->proyecto_id}}">
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
