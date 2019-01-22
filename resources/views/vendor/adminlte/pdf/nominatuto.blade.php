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

    <h5 style="text-align:center;">PAGO A JURADO INTERNOS Y EXTERNOS SEMESTRE LECTIVO 2018-2CR</h4>
    <h5 style="text-align:center;">{{$jornada}} JORNADA DE PRESENTACION FINAL ORAL DE PASANTIA Y TRABAJO DE GRADO</h4>
    <table width="100%" align="center"  cellpading="0" cellspacing="0" border="1">
        <tr style="text-align: center" >
          <th style="border: 1px solid #000;padding-top: 5px;padding-bottom: 5px;padding-left: 3px;" colspan="2"></th>
          <th style="border-top: 1px solid #fff">&nbsp;</th>
        </tr>
        <tr>
          <td><b>NRO</b></td>
          <td><b>NOMBRE DEL PROFESOR</b></td>
          <td><b>C.I</b></td>
          <td><b>CONDICION DEL PROFESOR</b></td>
          <td><b>ESTUDIANTE</b></td>
          <td><b>C.I</b></td>
          <td><b>ESCUELA</b></td>
          <td><b>OBSERV.</b></td>
          <td><b>HORAS</b></td>
          <td><b>TOTAL HR</b></td>
        </tr>
        @foreach($tutores as $tutor)

        <tr>
            <td>{{$tutor->tutores->id}}</td>
            <td colspan="1">{{$tutor->tutores->users->nombre}} {{$tutor->tutores->users->apellido}}</td>
            <td>{{number_format($tutor->tutores->users->numero_identificacion, 0, ',', '.')}}</td>
            <td>{{$tutor->tutores->escalafon}}<br> {{$tutor->tutores->condicion}}</td>
            <td>
              <table width="100%" align="center"  cellpading="0" cellspacing="0" class="tabla" border="0">
                <tr><td style="border-left:0;border-right:0;border-top:0; @if(isset($tutor->proyecto->autor)==0) border-bottom:0 @endif">{{$tutor->proyecto->autor->nombre}} {{$tutor->proyecto->autor->apellido}}</td></tr>
                @if(isset($tutor->proyecto->coautor)==1)<tr><td style="border-left:0;border-right:0;border-bottom:0">{{$tutor->proyecto->coautor->nombre}} {{$tutor->proyecto->coautor->apellido}}@endif</td></tr>
              </table>
            </td>
            <td>
              <table width="100%" align="center"  cellpading="0" cellspacing="0" class="tabla" border="0">
                <tr><td style="border-left:0;border-right:0;border-top:0; @if(isset($tutor->proyecto->coautor)==0) border-bottom:0 @endif">{{number_format($tutor->proyecto->autor->numero_identificacion, 0, ',', '.')}}</td></tr>
                @if(isset($tutor->proyecto->coautor)==1)<tr><td style="border-left:0;border-right:0;border-bottom:0">{{number_format($tutor->proyecto->coautor->numero_identificacion, 0, ',', '.')}}</td></tr>@endif
              </table>
            </td>
            <td>{{$tutor->proyecto->carrera->name}}</td>
            <td>{{$tutor->observaciones}}</td>
            <td>{{$tutor->horas}}</td>
            <td>&nbsp;</td>
        </tr>
        {{-- <tr>
          <td colspan="9" style="background: grey;">Total de Horas:</td>
          <td>24</td>
        </tr> --}}
      @endforeach
    </table>
  </div>
</body>
</html>
