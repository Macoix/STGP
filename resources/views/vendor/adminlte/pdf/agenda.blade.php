<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>LISTA DE PROYECTOS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <style>
    body {}

    .parrafo {
      text-align: justify;
      font-size: 12pt;
      line-height: normal;
    }

    .wrapper {
      margin-right: 4rem;
      margin-left: 4rem;
    }

    .header {
      margin-right: 4rem;
      margin-left: 4rem;
      display: inline-table;
    }

    .space {
      margin-right: 7.5rem;
    }

    .box {
      border: 2px solid #000;
      padding: 20px 20px 20px 20px;
    }

    .text-center {
      text-align: center;
    }
    td{
      border: 1px solid #000;
      padding-top: 5px;
      padding-bottom: 5px;
      padding-left: 3px;
      text-align: center;
    }
    table{
      font-size: 10px;
    }
  </style>

</head>

<body>
  <div class="wrapper">
    <table>
      <tr>
        <th><img src="./img/Logo-UJAP2.png" width="50px" alt=""></th>
        <th>
          UNIVERSIDAD JOSÉ ANTONIO PÁEZ <br>
          COORDINACION DE TRABAJO DE GRADO Y PASANTIA <br>
          FACULTAD DE INGENIERIA
        </th>
      </tr>
    </table>
    <h4 style="text-align:center;">AGENDA 2018-1CR</h4>
    <table width="100%" align="center"  cellpading="0" cellspacing="0" border="1">
        <tr style="text-align: center" >
          <th style="border: 1px solid #000;padding-top: 5px;padding-bottom: 5px;padding-left: 3px;" colspan="2"><b>@if($proyectos[0]->carrera_id == 1)INGENIERIA COMPUTACION @else INGENIERIA CIVIL @endif</b></th>
          <th style="border-top: 1px solid #fff">&nbsp;</th>
        </tr>
        <tr>
          <td><b>CODIGO</b></td>
          <td><b>ESTUDIANTE</b></td>
          <td><b>C.I</b></td>
          <td><b>TITULO DEL TRABAJO</b></td>
          <td><b>TUTOR ACADEMICO</b></td>
          <td><b>FECHA - HORA DEFENSA</b></td>
        </tr>
        @foreach($proyectos as $proyecto)
        <tr>
            <td>{{$proyecto->calen_titulo}}</td>
            <td colspan="1">{{$proyecto->nombres_autor}} {{$proyecto->apellidos_autor}} <br>@if(isset($proyecto->coautor_id) == 1){{$proyecto->nombres_coautor}} {{$proyecto->apellidos_coautor}}@endif</td>
            <td>{{number_format($proyecto->numero_identificacion_autor,0 , ',', '.')}} <br> @if(isset($proyecto->coautor_id) == 1){{number_format($proyecto->numero_identificacion_coautor, 0, ',', '.' )}}@endif</td>
            <td>{{$proyecto->titulo}}</td>
            <td>{{$proyecto->nombres_tutor}} {{$proyecto->apellidos_tutor}}</td>
            <td>{{date('d/m/Y - g:i A', strtotime($proyecto->fecha_inicio))}}</td>
        </tr>
      @endforeach
    </table>
  </div>
</body>
</html>
