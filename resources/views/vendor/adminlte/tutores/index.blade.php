@extends('adminlte::layouts.app')
@section('title','Lista de usuarios')
@section('main-content')
  @section('contentheader_title','TUTORES')
  <div id="app" class="container">
      {{-- @include('back_office.pages.panel_control.access.usuarios.common.header') --}}
      <section class="content">
          {{-- @include('back_office.includes.notifications') --}}
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title"><strong>LISTADO DE TUTORES</strong></h3>
                  <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                              title="Collapse">
                      <i class="fa fa-minus"></i></button>
                  </div>
              </div>
              <div class="box-body">
                  {{-- @include('back_office.pages.panel_control.access.common.breadcrumb') --}}



                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          {{-- @can('create_users') --}}
                              <a class="btn btn-app bg-green" href="{{ route('tutor.create') }}" v-on:click="loader">
                                  <i class="fa fa-plus"></i> Nuevo
                              </a>
                          {{-- @endcan --}}
                      </div>
                  </div>
                  <div class="row">
                      <hr style="margin:10px 0 10px 0;">
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                        @if($tutores->count() == 0)
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="alert alert-danger alert-dismissible">
                                  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                                  <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
                                  No se encontraron resultados.
                              </div>
                          </div>
                        @else
                          <div class="box box-solid">
                              <div class="box-body no-padding">
                                  {{-- @if(count($users)) --}}
                                      <div class="col-xs-12">
                                          <div class="table-responsive">
                                              <table class="table table-condensed table-hover">
                                                  <thead>
                                                      <th>ID</th>
                                                      <th>TUTOR</th>
                                                      <th>APELLIDO</th>
                                                      <th>CARRERA</th>
                                                      {{-- <th>ROL</th> --}}
                                                      <th>CREADO</th>
                                                      {{-- <th class="text-center">ESTATUS</th> --}}
                                                      <th width="150" class="text-center">OPCIONES</th>
                                                  </thead>
                                                  <tbody>
                                                      @foreach ($tutores as $tutor)
                                                          <tr>
                                                              <td>{{ $tutor->id }}</td>
                                                              <td>{{ $tutor->users->nombre }}</td>
                                                              <td>{{ $tutor->users->apellido }}</td>
                                                              <td>{{ $tutor->carrera->name }}</td>
                                                              {{-- <td>{{ $tutor->rol->name }}</td> --}}
                                                              <td>{{ date('d/m/Y', strtotime($tutor->created_at)) }}</td>
                                                              {{-- <td class="text-center">
                                                                  @if($user->estado == 'activo')
                                                                      <span class="label label-success">ACTIVO</span>
                                                                  @else
                                                                      <span class="label label-warning">INACTIVO</span>
                                                                  @endif
                                                              </td> --}}
                                                              <td>
                                                                  <div class="col-lg-1 col-md-1 col-sm-4 col-xs-12">
                                                                      <a class="btn btn-link btn-flat btn-sm" href="{{ route('user.show',$tutor->id) }}" data-placement="top" title="DETALLES"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                                  </div>
                                                                  {{-- @can('edit_users') --}}
                                                                      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                                          <a style="color: #D68A10;" class="btn btn-link btn-flat btn-sm" href="{{ route('user.edit',$tutor->id) }}" data-placement="top" title="EDITAR"><span class="glyphicon glyphicon-edit"></span></a>
                                                                      </div>
                                                                  {{-- @endcan --}}
                                                                  {{-- @can('delete_users') --}}
                                                                      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                                          <button style="color: #C34233" class="btn btn-link btn-flat btn-sm" data-target="#modal-delete-{{ $user->user_id }}" data-toggle="modal" data-placement="top" title="ELIMINAR" @if($user->id == 1) disabled @endif><span class="glyphicon glyphicon-remove"></span></button>
                                                                          {{-- @include('back_office.pages.panel_control.access.usuarios.modal_delete') --}}
                                                                      </div>
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
                              <div class="box-footer">
                                  {{-- <div class="row text-center">
                                      {{ $users->appends(Request::only(['search']))->render() }}
                                  </div> --}}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
      </section>
  </div>@endsection
