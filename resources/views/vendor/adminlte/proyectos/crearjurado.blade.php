@extends('adminlte::layouts.app')
@section('title','Timeline de projecto')
@section('main-content')
  @section('contentheader_title', 'JURADOS')
  <div class="">
      {{-- @include('back_office.pages.menu.proyectos.common.header') --}}
      <section class="content">
          {{-- @include('back_office.includes.notifications') --}}
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <div class="box">
                      <div class="box-header with-border">
                          <h3 class="box-title"><strong>ADICION DE JURADO AL PROYECTO</strong></h3>
                          <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                      title="Collapse">
                              <i class="fa fa-minus"></i></button>
                          </div>
                      </div>
                      <div class="box-body">
                          {{-- @include('back_office.pages.menu.proyectos.common.breadcrumb') --}}

                          <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <a class="btn btn-app bg-red" href="{{ route('proyectos.show', $proyecto->proyecto_id) }}" v-on:click="loader">
                                      <i class="fa fa-reply"></i> Anterior
                                  </a>
                              </div>
                          </div>
                          <div class="row">
                              <hr style="margin:0 0 10px 0;">
                          </div>
    {{-- aquiitaaa--}}    <form class="" action="{{ route('jurados.store', $proyecto->proyecto_id) }}" method="post">
                              @csrf
                              <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                      <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                          <label>MIEMBRO 1</label>
                                          <select id="selectPresidente" class="form-control select2" name="presidente_user_id">
                                              <option value="">Seleccionar</option>
                                              @foreach($jurados as $jurado)
                                                  <option value="{{ $jurado->user_id }}">{{ $jurado->nombre }} {{ $jurado->apellido }}</option>
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
                                              @foreach($jurados as $jurado)
                                                  <option value="{{ $jurado->user_id }}">{{ $jurado->nombre }} {{ $jurado->apellido }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                      <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                          <label>MIEMBRO 3</label>
                                          <select id="selectMiembro2" class="form-control select2" name="miembro2_user_id">
                                              <option value="">Seleccionar</option>
                                              @foreach($jurados as $jurado)
                                                  <option value="{{ $jurado->user_id }}">{{ $jurado->nombre }} {{ $jurado->apellido }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                      <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                          <label>SUPLENTE</label>
                                          <select id="selectSuplente" class="form-control select2" name="suplente_user_id">
                                              <option value="">Seleccionar</option>
                                              @foreach($jurados as $jurado)
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
                                    <button class="btn btn-app bg-green" type="submit" v-on:click="loader">
                                        <i class="fa fa-save"></i> Guardar
                                    </button>
                                </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>
@endsection
