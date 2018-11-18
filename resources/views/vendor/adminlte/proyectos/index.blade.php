@extends('adminlte::layouts.app')
@section('title','Lista de proyectos')
@section('main-content')
  @section('contentheader_title', 'PROYECTOS')
  <div id="app" class="container">
      {{-- @include('back_office.pages.panel_control.access.usuarios.common.header') --}}
      <section class="content">
          {{-- @include('back_office.includes.notifications') --}}
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title"><strong>LISTADO DE PROYECTOS</strong></h3>
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
                              <a class="btn btn-app bg-green" href="proyectos/crear" v-on:click="loader">
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
                          <div class="box box-solid">
                              <div class="box-body no-padding">
                                  {{-- @if(count($users)) --}}
                                      <div class="col-xs-12">
                                        @if($proyectos->count() == 0)
                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                              <div class="alert alert-danger alert-dismissible">
                                                  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                                                  <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
                                                  No se encontraron resultados.
                                              </div>
                                          </div>
                                        @else
                                          <div class="table-responsive">
                                              <table class="table table-condensed table-hover">
                                                  <thead>
                                                      <th>Codigo</th>
                                                      <th>FECHA</th>
                                                      <th>PROGRAMA</th>
                                                      <th>TITULO</th>
                                                      <th>AUTOR</th>
                                                      <th>COAUTOR</th>
                                                      <!--<th class="text-center">ESTADO</th>-->
                                                      <th width="180" class="text-center">OPCIONES</th>
                                                  </thead>
                                                  <tbody>
                                                      @foreach($proyectos as $proyecto)
                                                          <tr>
                                                              <td>{{ $proyecto->codigo }}</td>
                                                              <td>{{ date('d/m/Y', strtotime($proyecto->created_at)) }}</td>
                                                              <td>{{ $proyecto->carrera->name }}</td>
                                                              <td>{{ $proyecto->titulo }}</td>
                                                              <td>{{ $proyecto->autor->nombre }} {{ $proyecto->autor->apellido }}</td>
                                                              <td>{{$proyecto->coautor->nombre}}<br>{{ $proyecto->coautor->apellido }}</td>
                                                              <!--<td>
                                                                  @if($proyecto->estado == 'pendiente_evaluacion_comite')
                                                                      <span class="label label-warning">PENDIENTE POR EVALUACION DE COMITE</span>
                                                                  @elseif($proyecto->estado == 'evaluado_comite')
                                                                      <span class="label label-success">EVALUADO POR COMITE</span>
                                                                  @elseif($proyecto->estado == 'aprobado_comite')
                                                                      <span class="label label-success">APROBADO POR COMITE</span>
                                                                  @elseif($proyecto->estado == 'pendiente_asignacion_jurado')
                                                                      <span class="label label-warning">PENDIENTE DE ASIGNACION DE JURADO</span>
                                                                  @elseif($proyecto->estado == 'pendiente_revision_jurado')
                                                                      <span class="label label-warning">PENDIENTE POR REVISION DE ASIGNACION DE JURADO</span>
                                                                  @elseif($proyecto->estado == 'jurado_aprobado')
                                                                      <span class="label label-success">JURADO APROBADO</span>
                                                                  @elseif($proyecto->estado == 'pendiente_evaluacion_jurado')
                                                                      <span class="label label-warning">PENDIENTE POR EVALUACION DE JURADO</span>
                                                                  @else
                                                                      <span class="label label-warning">{{ $proyecto->estado }}</span>
                                                                  @endif
                                                              </td>-->
                                                              <td>
                                                                  <div class="col-sm-4 col-xs-12">
                                                                      <a class="btn btn-link btn-flat btn-md" href="{{route('proyectos.show',$proyecto->proyecto_id)}}" data-placement="top" title="DETALLES"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                                  </div>
                                                                  {{-- @can('edit_proyectos') --}}
                                                                      <div class="col-sm-4 col-xs-12">
                                                                          <a style="color: #D68A10;" class="btn btn-link btn-flat btn-md" href="" data-placement="top" title="EDITAR"><span class="glyphicon glyphicon-edit"></span></a>
                                                                      </div>
                                                                  {{-- @endcan --}}
                                                                  {{-- @can('delete_proyectos') --}}
                                                                      <div class="col-sm-4 col-xs-12">
                                                                          <button style="color:#C34233" class="btn btn-link btn-flat btn-md" data-target="#modal-delete-{{ $proyecto->proyecto_id }}" data-toggle="modal" data-placement="top" title="ELIMINAR"><span class="glyphicon glyphicon-remove"></span></button>
                                                                          {{-- @include('back_office.pages.menu.proyectos.modal_delete') --}}
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
