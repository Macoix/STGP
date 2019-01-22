<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CARTA ACEPTACIO DE DECANO</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>
	body{

	}
	.parrafo {
		text-align:justify;
		font-size: 12pt;
		line-height: normal;
	}
	.wrapper{
		margin-right: 4rem;
		margin-left: 4rem;
    margin-top: 4rem;
	}
	.header{
		margin-right: 4rem;
		margin-left:4rem;
		display: inline-table;
	}
	.space{
		margin-right: 7.5rem;
	}
	.box{
		border: 2px solid #000;
		padding: 20px 20px 20px 20px;
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
				FACULTAD DE INGENIERIA
			</th>
		</tr>
	</table>
  <hr>


  <p style="text-align: left;">{{$periodo->facultad}}-@if($proyecto->tipo == 'extraordinario')SE-@elseif($proyecto->tipo == 'pasantia')IP-@else{{$proyecto->acronimo}}-{{$proyecto->codigo}}-{{$periodo->ano}}-@if($periodo->periodo == 1)ICR @elseif($periodo->periodo == 2)IICR @else IIICR @endif @endif</p>
    <br>
  	<br>
	<p style="text-align:right;">San diego {{ Carbon\Carbon::now()->format('Y-m-d') }}</p>

  @if(isset($proyecto->id_coautor) == 1)
    <p>Ciudadanos: <br>
    {{$proyecto->nombres_autor}} {{$proyecto->apellidos_autor}} <br>
    C.I: {{number_format($proyecto->numero_identificacion_autor, 0, ',', '.')	}} <br>
    {{$proyecto->nombres_coautor}} {{$proyecto->apellidos_coautor}} <br>
    C.I: {{number_format($proyecto->numero_identificacion_coautor, 0, ',', '.')}} <br>
    Presente.-
    </p>
  @else
	<p>Ciudadano: <br>
  {{$proyecto->nombres_autor}} {{$proyecto->apellidos_autor}} <br>
  C.I: {{$proyecto->numero_identificacion_autor}} <br>
  Presente.-
  </p>
@endif
	<P class="parrafo">
		Cumplo con  informarle que la Comisión de Trabajo de Grado y Pasantías de la Facultad de Ingeniería en su reunión  <b>Nº @if($periodo->periodo == 1)01-@elseif($periodo->periodo == 2)02-@else 03-@endif{{$periodo->ano}}</b> de fecha <b>{{ Carbon\Carbon::now()->format('d-m-Y') }}</b>  aprobó el  proyecto de  trabajo de grado titulado <b>{{$proyecto->titulo}}</b>. Presentado por usted(es) como requisito para optar al título de @if($proyecto->carrera == 'Computacion')Ingeniero en Computacion. @elseif($proyecto->carrera == 'Civil')Ingeniero Civil.@endif
		<br><br>
		Se ratifica la designación del  Ing. {{ strtoupper($proyecto->nombres_tutor) }} {{ strtoupper($proyecto->apellidos_tutor) }}, C.I: {{number_format($proyecto->numero_identificacion_tutor, 0, ',', '.')}}  y  la Ing. Alicia Yánez, C.I.: 4.598.880 como Tutores Académicos que lo asesorarán en el desarrollo de este proyecto.
	</P>
	<br>
  <p align="center">Atentamente,</p> <br><br>
	<table align="center">
		<tr>
			<th>
				____________________________________ <br>
				<p style="text-align:center;">
					Prof. {{$decano->nombre}} {{$decano->apellido}} <br>
					Decano de la Facultad de Ingenieria
				</p>
			</th>
		</tr>
	</table> <br> <br>
  c.c Coordinacion de Pasantias y Trabajos de Grados (1).
</div>
</body>

</html>
