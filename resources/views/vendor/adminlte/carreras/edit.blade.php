@extends('adminlte::layouts.app')
@section('title','Edicion de carreras')
@section('main-content')
    @section('contentheader_title', 'Editar Carrera')
    <div id="createProyecto" class="container">
        {{-- @include('back_office.pages.menu.proyectos.common.header') --}}
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>EDITAR CARRERA</strong></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          {{-- @can('create_users') --}}
                              <a class="btn btn-app bg-blue" href="../../carreras" v-on:click="loader">
                                  <i class="fa fa-reply"></i> Volver
                              </a>
                          {{-- @endcan --}}
                      </div>
                  </div>
                  <div class="row">
                      <hr style="margin:10px 0 10px 0;">
                  </div>
                  <form class="" action="{{route('carreras.update', $carrera->id)}}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                                    <label>COORDINADOR</label>
                                    <select id="selectPrograma" class="form-control" name="coordinador_id">
                                        <option value="">Seleccionar</option>
                                        @foreach($profesores as $profesor)
                                            <option value="{{ $profesor->id }}" @if($profesor->id == old('id')) @endif selected>{{ $profesor->nombre }}</option>
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
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-warning' : '' }}">
                                    @if ($errors->has('nombre'))
                                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> ERROR EN TITULO</label>
                                    @else
                                    <label class="control-label">NOMBRE DE LA CARRERA</label>
                                    @endif
                                    <input class="form-control" name="nombre" type="text" value="{{ $carrera->nombre }}" />
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
                                    <label class="control-label">ACRONIMO</label>
                                    @endif
                                    <input class="form-control" name="acronimo" type="text" value="{{ $carrera->acronimo }}" />
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
                                                      <h4><strong>¿SEGURDO QUE DESEA GUARDAR?</strong></h4>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <button type="submit" class="btn btn-success btn-flat btn-block" v-on:click="loader"><strong>CONFIRMAR</strong></button>
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
