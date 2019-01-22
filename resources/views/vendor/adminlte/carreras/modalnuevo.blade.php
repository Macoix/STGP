<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-nueva-carrera">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Crear Nueva Carrera</h5>
            </div>
            <div class="modal-body">
                <form class="" action="{{route('carreras.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                                <label>COORDINADOR</label>
                                <select id="selectPrograma" class="form-control" name="coordinador_id">
                                    <option value="" selected>Seleccionar</option>
                                    @foreach($profesores as $profesor)
                                    <option value="{{ $profesor->id }}" @if($profesor->id == old('id')) @endif>{{ $profesor->nombre }} {{$profesor->apellido}}</option>
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
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group{{ $errors->has('nombre') ? ' has-warning' : '' }}">
                                @if ($errors->has('nombre'))
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                                @else
                                <label class="control-label">NOMBRE DE LA CARRERA</label>
                                @endif
                                <input class="form-control" name="nombre" type="text" value="{{ old('nombre') }}" />
                                @if ($errors->has('nombre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group{{ $errors->has('acronimo') ? ' has-warning' : '' }}">
                                @if ($errors->has('acronimo'))
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                                @else
                                <label class="control-label">ACRONIMO</label>
                                @endif
                                <input class="form-control" name="acronimo" type="text" value="{{ old('acronimo') }}" />
                                @if ($errors->has('acronimo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('acronimo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group{{ $errors->has('estado') ? ' has-warning ' : '' }}">
                                <label>ESTADO</label>
                                <select id="selectEstado" class="form-control" name="estado">
                                    <option value="activo" @if(old('estado') == 'activo') selected @endif>Activo</option>
                                        <option value="inactivo" @if(old('estado') == 'inactivo') selected @endif>Inactivo</option>
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
