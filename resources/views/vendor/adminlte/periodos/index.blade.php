@extends('adminlte::layouts.app')
@section('title','Lista de Periodos')
@section('main-content')
  @section('contentheader_title', 'PERIODOS')
  <div id="app">
      {{-- @include('back_office.pages.panel_control.access.usuarios.common.header') --}}
      <section class="content">
          {{-- @include('back_office.includes.notifications') --}}
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title"><strong>LISTADO DE PERIODOS</strong></h3>
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
                          <button class="btn btn-app bg-green" data-target="#modal-nuevo-periodo" data-toggle="modal" data-placement="top" title="Nuevo"><span class="fa fa-plus"></span>Nuevo</button>
                              @include('vendor.adminlte.periodos.modalnuevo')
                          {{-- @endcan --}}
                      </div>
                  </div>
                  <div class="row">
                      <hr style="margin:10px 0 10px 0;">
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="box box-solid">
                              <div class="box-body no-padding">
                                  {{-- @if(count($users)) --}}
                                      <div class="col-xs-12">
                                        @if($periodos->count() == 0)
                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                              <div class="alert alert-danger alert-dismissible">
                                                  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                                                  <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
                                                  No se encontraron resultados.
                                              </div>
                                          </div>
                                        @else
                                          <div class="table-responsive">
                                              <table class="table table-condensed table-hover" id="table">
                                                  <thead>
                                                      <th>ID</th>
                                                      <th>FACULTAD</th>
                                                      <th>AÑO</th>
                                                      <th>PERIODO</th>
                                                      {{-- <th>ROL</th> --}}
                                                      {{-- <th>CREADO</th> --}}
                                                      <th class="text-center">ESTATUS</th>
                                                      <th width="150" class="text-center">OPCIONES</th>
                                                  </thead>
                                                  <tbody>
                                                      @foreach ($periodos as $periodo)
                                                          <tr>
                                                              <td>{{ $periodo->id }}</td>
                                                              <td>{{ $periodo->facultad }}</td>
                                                              <td>{{ $periodo->ano }}</td>
                                                              <td>{{ $periodo->periodo }}</td>
                                                              {{-- <td>{{ $periodo->rol }}</td> --}}
                                                              {{-- <td>{{ date('d/m/Y', strtotime($periodo->created_at)) }}</td> --}}
                                                              <td class="text-center">
                                                                  @if($periodo->estado == 'en curso')
                                                                      <span class="label label-success">En curso</span>
                                                                  @else
                                                                      <span class="label label-warning">Concluido</span>
                                                                  @endif
                                                              </td>
                                                              <td>
                                                                  {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                      <a class="btn btn-link btn-flat btn-sm" href="{{ URL::action('UserController@show', $carrera->id) }}" data-placement="top" title="DETALLES"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                                  </div> --}}
                                                                  {{-- @can('edit_users') --}}
                                                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                        <button style="color: #D68A10;" class="btn btn-link btn-flat btn-sm" data-target="#modal-periodo-{{ $periodo->id }}" data-toggle="modal" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit"></span></button>
                                                                        @include('vendor.adminlte.periodos.modal')
                                                                      </div>
                                                                  {{-- @endcan --}}
                                                                  {{-- @can('delete_users') --}}
                                                                      {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                          <button style="color: #C34233" class="btn btn-link btn-flat btn-sm" data-target="#modal-delete-{{ $periodo->id }}" data-toggle="modal" data-placement="top" title="ELIMINAR" @if($periodo->id != 1 && $periodo->id != 2) disabled @endif><span class="glyphicon glyphicon-remove"></span></button>
                                                                          @include('back_office.pages.panel_control.access.usuarios.modal_delete')
                                                                      </div> --}}
                                                                  {{-- @endcan --}}
                                                              </td>
                                                          </tr>
                                                      @endforeach
                                                  </tbody>
                                              </table>
                                          </div>

                                      </div>
                                  {{-- @else
                                      @include('back_office.includes.result_alert') --}}
                                  @endif
                              </div>
                              {{-- <div class="box-footer">
                                  <div class="row text-center">
                                      {{ $users->appends(Request::only(['search']))->render() }}
                                  </div>
                              </div> --}}
                          </div>
                      </div>
                  </div>
              </div>
            </div>
      </section>
  </div>
@endsection
