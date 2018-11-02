@extends('adminlte::layouts.app')
@section('title','Creacion de carreras')
@section('main-content')
    @section('contentheader_title', 'CREAR TUTOR')
    <div id="createProyecto" class="container">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>NUEVO </strong></h3>
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
                              <a class="btn btn-app bg-blue" href="{{route('tutor.index')}}" v-on:click="loader">
                                  <i class="fa fa-reply"></i> Volver
                              </a>
                          {{-- @endcan --}}
                      </div>
                  </div>
                  <div class="row">
                      <hr style="margin:10px 0 10px 0;">
                  </div>
                  <form class="" action="{{route('tutor.store')}}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group{{ $errors->has('programa_id') ? ' has-warning' : '' }}">
                                    <label>TUTOR</label>
                                    <select id="selectPrograma" class="form-control" name="userid">
                                        <option value="" selected>Seleccionar</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" @if($user->id == old('id')) @endif>{{ $user->nombre }} {{ $user->apellido }}</option>
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
