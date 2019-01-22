@extends('adminlte::layouts.app')
@section('title','Decano de Facultad')
@section('main-content')
  @section('contentheader_title','Decano')
  <div id="app">
      {{-- @include('back_office.pages.panel_control.access.usuarios.common.header') --}}
      <section class="content">
          {{-- @include('back_office.includes.notifications') --}}
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title"><strong>Decano</strong></h3>
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
                      </div>
                  </div>
                  <div class="row">
                      <hr style="margin:10px 0 10px 0;">
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                        @if($decanos->count() == 0)
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
                                                      <th class="text-center">ID</th>
                                                      <th class="text-center">NOMBRE</th>
                                                      <th class="text-center">APELLIDO</th>
                                                      <th class="text-center">Numero Identificacion</th>
                                                      <th class="text-center">CREADO</th>
                                                      <th width="150" class="text-center">OPCIONES</th>
                                                  </thead>
                                                  <tbody>
                                                      {{-- @foreach ($decanos as $decano) --}}
                                                          <tr>
                                                              <td class="text-center">{{ $decanos->id }}</td>
                                                              <td class="text-center">{{ $decanos->nombre }}</td>
                                                              <td class="text-center">{{ $decanos->apellido }}</td>
                                                              <td class="text-center">{{$decanos->numero_identificacion}}</td>
                                                              <td class="text-center">{{ date('d/m/Y', strtotime($decanos->created_at)) }}</td>
                                                              <td>
                                                                  {{-- @can('edit_users') --}}
                                                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                                                          <button style="color: #D68A10;" class="btn btn-link btn-flat btn-sm" data-target="#modal-decano-{{ $decanos->id }}" data-toggle="modal" data-placement="top" title="Editar"><span class="glyphicon glyphicon-edit"></span></button>
                                                                          @include('vendor.adminlte.decano.modal')
                                                                      </div>
                                                                  {{-- @endcan --}}
                                                                  {{-- @can('delete_users') --}}

                                                                  {{-- @endcan --}}
                                                              </td>
                                                          </tr>
                                                      {{-- @endforeach --}}
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
