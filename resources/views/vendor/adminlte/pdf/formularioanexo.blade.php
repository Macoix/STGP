@extends('adminlte::layouts.app')
@section('title','Planilla Anexo D')
@section('main-content')
    @section('contentheader_title', 'Planilla Anexo D')
    <div id="createProyecto" class="container">
        {{-- @include('back_office.pages.menu.proyectos.common.header') --}}
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>PLANILLA SOLICITUD: ANÁLISIS Y APROBACIÓN DE TRABAJO DE GRADO</strong></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    </div>

                </div>

                <div class="box-body">
                  <div class="row">
                      <div class="col-sm-6 col-xs-12">
                          <a class="btn btn-app bg-red" href="{{ URL::to('/home') }}" >
                              <i class="fa fa-reply"></i> Volver
                          </a>
                      </div>
                  </div>
                  <div class="row">
                      <hr style="margin:0 0 10px 0;">
                  </div>
                  <form class="" action="{{route('anexod',Auth::user()->id)}}" method="post" enctype="multipart/form-data" target="_blank">
                    @csrf
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
                          <div class="col-xs-12">
                              <div class="form-group{{ $errors->has('titulo') ? ' has-warning' : '' }}">
                                  @if ($errors->has('titulo'))
                                      <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                                  @else
                                  <label class="control-label">DIRECCIÓN</label>
                                  @endif
                                  <textarea class="form-control" name="direccion" rows="2">{{ old('titulo') }}</textarea>
                                  @if ($errors->has('titulo'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('titulo') }}</strong>
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
                            <div class="form-group{{ $errors->has('tutor_user_id') ? ' has-warning' : '' }}">
                                <label>COAUTOR</label>
                                <select id="selectautor" class="form-control selectautor" name="coautor">
                                  <option value="" selected>Seleccionar</option>
                                  @foreach ($user as $users)
                                    <option value="{{$users->id}}">{{$users->nombre}} {{$users->apellido}}</option>
                                  @endforeach
                                </select>
                                @if ($errors->has('tutor_user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tutor_user_id') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group{{ $errors->has('tutor_user_id') ? ' has-warning' : '' }}">
                                  <label>ÍNDICE ACADÉMICO</label>
                                  <input type="text" name="indice" class="form-control">
                                  @if ($errors->has('tutor_user_id'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('tutor_user_id') }}</strong>
                                      </span>
                                  @endif
                                </div>
                              </div>
                          </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group{{ $errors->has('titulo') ? ' has-warning' : '' }}">
                                    @if ($errors->has('titulo'))
                                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                                    @else
                                    <label class="control-label">TITULO DEL TRABAJO</label>
                                    @endif
                                    <textarea class="form-control" name="titulo" rows="2">{{ old('titulo') }}</textarea>
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
                                    <label class="control-label">BREVE DESCRIPCION</label>
                                    @endif
                                    <textarea class="form-control" name="resumen" rows="6">{{ old('resumen') }}</textarea>
                                    @if ($errors->has('resumen'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('resumen') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group{{ $errors->has('resumen') ? ' has-warning' : '' }}">
                                    @if ($errors->has('resumen'))
                                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN RESUMEN</label>
                                    @else
                                    <label class="control-label">LUGAR DONDE SE DESARROLLARÁ EL PROYECTO</label>
                                    @endif
                                    <textarea class="form-control" name="lugar" rows="6">{{ old('resumen') }}</textarea>
                                    @if ($errors->has('resumen'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('resumen') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group{{ $errors->has('tutor_user_id') ? ' has-warning' : '' }}">
                                <label>TIEMPO DE DESARROLLO</label>
                                <select id="tiempo" class="form-control selectautor" name="tiempo">
                                  <option value="" selected>Seleccionar</option>
                                  <option value="32 Semanas">32 Semanas</option>
                                  <option value="16 Semanas">16 Semanas</option>
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

                          <hr style="margin:0 0 10px 0;">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                              <button class="btn btn-app bg-yellow" type="reset">
                                  <i class="fa fa-paint-brush"></i> Limpiar
                              </button>
                              <button class="btn btn-app bg-green" type="button" data-target="#modal-validation" data-toggle="modal">
                                  <i class="fa fa-save"></i> Generar
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
                                                <button type="submit" class="btn btn-success btn-flat btn-block"><strong>CONFIRMAR</strong></button>
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
                    {{-- @include('back_office.pages.menu.proyectos.common.back_button')
                    @include('back_office.includes.form_notification') --}}
        </section>
    </div>
@endsection
