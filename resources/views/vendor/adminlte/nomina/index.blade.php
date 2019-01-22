@extends('adminlte::layouts.app')
@section('title','Nomina de Tutores')
@section('main-content')
  @section('contentheader_title','Nomina de Tutores')
  <div id="app">
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
                              {{-- <button class="btn btn-app bg-green" data-target="#modal-nuevo-jurado" data-toggle="modal" data-placement="top" title="Nuevo"><span class="fa fa-plus"></span>Nuevo</button>
                                @include('vendor.adminlte.jurado.modalnuevo') --}}
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
                                              <table class="table table-condensed table-hover" id="table">
                                                  <thead>
                                                      <th>ID</th>
                                                      <th>NOMBRE</th>
                                                      <th>APELLIDO</th>
                                                      <th>CARRERA</th>
                                                      <th>ESCALAFON</th>
                                                      <th>CONDICION</th>
                                                      <th>PROYECTO</th>
                                                      <th>HORAS</th>
                                                      <th>OBSERVACIONES</th>
                                                      <th width="150" class="text-center">OPCIONES</th>
                                                  </thead>
                                                  <tbody>
                                                      @foreach ($tutores as $tutor)
                                                          <tr>
                                                              <td>{{$tutor->tutores->id}}</td>
                                                              <td>{{$tutor->tutores->users->nombre}}</td>
                                                              <td>{{$tutor->tutores->users->apellido}}</td>
                                                              <td>{{$tutor->tutores->carrera->name}}</td>
                                                              <td>{{$tutor->tutores->escalafon}}</td>
                                                              <td>{{$tutor->tutores->condicion}}</td>
                                                              <td>{{$tutor->proyecto->titulo}}</td>
                                                              <td>{{$tutor->horas}}</td>
                                                              <td>{{$tutor->observaciones}}</td>
                                                              <td>
                                                                  {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                      <a class="btn btn-link btn-flat btn-sm" href="{{ route('user.show',$tutores->id) }}" data-placement="top" title="DETALLES"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                                  </div> --}}
                                                                  {{-- @can('edit_users') --}}
                                                                  <div class="col-lg-4 col-md-1 col-sm-4 col-xs-12">
                                                                      <button style="color: #D68A10;" class="btn btn-link btn-flat btn-sm" data-target="#modal-tutores-{{$tutor->tutores->id}}" data-toggle="modal" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit"></span></button>
                                                                      @include('vendor.adminlte.nomina.modal')
                                                                  </div>
                                                                  {{-- @endcan --}}
                                                                  {{-- @can('delete_users') --}}
                                                                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                        <button style="color: #C34233" class="btn btn-link btn-flat btn-sm" data-target="#modal-delete-" data-toggle="modal" data-placement="top" title="ELIMINAR"><span class="glyphicon glyphicon-remove"></span></button>
                                                                        {{-- @include('vendor.adminlte.tutores.modaldelete') --}}
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
                              @if($tutores->count()>0)
                              <hr style="margin:0 0 10px 0;">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form action="{{ route('nominatuto') }}" target="_blank">
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                      <label>JORNADA</label>
                                      <input type="text" name="jornada" class="form-control" placeholder="Ingrese la Jornada">
                                    </div>
                                    <button class="btn btn-app bg-green" type="submit" >
                                      <i class="fa fa-file-text"></i> Generar
                                    </button>
                                  </div>
                                </form>
                              </div>
                            @endif
                          </div>
                      </div>
                  </div>
              </div>
            </div>
      </section>
  </div>@endsection
