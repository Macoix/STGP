@extends('adminlte::layouts.app')
@section('title','Calendario')
@section('main-content')
@section('contentheader_title', 'Calendario')
<div class="panel panel-default">
    <div class="panel-body">
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h4 class="box-title">Eventos</h4>
                        </div>
                        <div class="box-body">
                            <!-- the events -->
                            <div id="external-events">
                                @if(@isset($proyectos)==1)
                                @foreach($proyectos as $proyecto)
                                <div class="external-event" style="@if($proyecto->carrera->acronimo == 'C')background-color: #3333ff; color: #fff @elseif($proyecto->carrera->acronimo == 'L')background-color: #009c02; color: #fff @elseif($proyecto->carrera->acronimo == 'E')background-color: #a400a4; color: #fff @elseif($proyecto->carrera->acronimo == 'I')background-color: #f39c12; color: #fff @elseif($proyecto->carrera->acronimo == 'M')background-color: #ec770f; color: #fff @elseif($proyecto->carrera->acronimo == 'T')background-color: #989898; color: #fff @endif"
                                id="{{$proyecto->proyecto_id}}">{{$periodo->facultad}}-@if($proyecto->tipo == 'extraordinario')SE-@elseif($proyecto->tipo == 'pasantia')IP-@endif{{$proyecto->carrera->acronimo}}-{{$proyecto->codigo}}-{{$periodo->ano}}-{{$periodo->periodo}}</div>
                            @endforeach
                            <div class="checkbox">
                                <label for="drop-remove">
                                    <input type="checkbox" id="drop-remove">
                                    Eliminar al asignar
                                </label>
                            </div>
                            @else
                            {{$mensaje}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Generar agenda</h3>
                    </div>
                    <div class="box-body">
                        <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                            <form class="" action="{{route('agenda')}}" method="post" target="_blank">
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="carrera">
                                        @foreach ($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-app bg-green" type="submit" @if(isset($proyectos)!=1 || count($proyectos)<=0) disabled @endif>
                                    <i class="fa fa-calendar"></i> Generar
                                    </button>
                            </form>
                        </div>
                        <br /><br />
                        <form action="" method="post" id="form-calendario">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
    </div>
</div>
@endsection
