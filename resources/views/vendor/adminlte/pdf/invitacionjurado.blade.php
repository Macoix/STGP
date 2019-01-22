<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INVITACION DE JURADO</title>
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
			<th><img src="./img/Logo-UJAP2.png" width="80px" alt=""></th>
			<th>
				UNIVERSIDAD JOSÉ ANTONIO PÁEZ <br>
				FACULTAD DE INGENIERIA <br>
				COORNDINACION DE PASANTIA Y TRABAJO DE GRADO
			</th>
		</tr>
	</table>
	<br>
	<br>

	<p style="text-align:left;">San diego {{ Carbon\Carbon::now()->format('Y-m-d') }}</p>
  {{-- <p style="text-align: right;">{{$periodo->facultad}}-@if($proyecto->tipo == 'extraordinario')SE-@elseif($proyecto->tipo == 'pasantia')IP-@else{{$proyecto->carrera->acronimo}}-{{$proyecto->codigo}}-{{$periodo->ano}}-{{$periodo->periodo}}</p> --}}

	<center><h4>INVITACION JURADOS</h4></center>

	<p>Profesor: <br>
  <b>{{$jurado->nombres_presidente}} {{$jurado->apellidos_presidente}}</b> <br>
  Jurado <br>
  </p>

	<P class="parrafo">
		La Coordinación de Pasantía y Trabajo de Grado de la Facultad de Ingeniería de la Universidad “José Antonio Páez”, se complace en invitarlo(a) en calidad de Jurado del(los) bachiller(es): <b>{{$proyecto->nombres_autor}} {{$proyecto->apellidos_autor}}</b>  @if(isset($proyecto->coautor_id)!=1) y <b>{{$proyecto->nombres_coautor}} {{$proyecto->apellidos_coautor}}</b>@endif,
				titular(es) de la(s) Cédula de Identidad N° {{number_format($proyecto->numero_identificacion_autor, 0, ',', '.')}} @if(isset($proyecto->coautor_id)!=1)y  {{number_format($proyecto->numero_identificacion_coautor, 0, ',', '.')}}@endif, a la presentación de su Trabajo de Grado [ @if($proyecto->tipo=='trabajo_grado')<b>X</b>@endif ] o Informe Final de Pasantía [ @if($proyecto->tipo=='pasantia')<b>X</b>@endif ], titulado:  <b>{{strtoupper($proyecto->titulo)}}</b><br><br>
			 La exposición se realizará en las instalaciones de la Universidad José Antonio Páez, en el Municipio San Diego.<br><br>
			 <table cellspacing="0" border="1" width="100%">
		 		<tr>
		 			<td><b>Dia:</b>@if(isset($fecha->fechaIni)==1) {{date('j/m/Y', strtotime($fecha->fechaIni))}}@endif</td>
		 			<td><b>Hora:</b>@if(isset($fecha->fechaIni)==1) {{date('g:i A', strtotime($fecha->fechaIni))}}@endif</td>
					<td><b>Aula:</b> </td>
		 		</tr>
				<tr>
					<td colspan="3"><b>Correo Electronico del Jurado:</b> {{$jurado->correo_presidente}}</td>
				</tr>
		 	</table>
      <br><br>
			Sabremos agradecerle, que se sirva contactar al tutor académico, Prof. <b>{{$proyecto->nombres_tutor}} {{$proyecto->apellidos_tutor}}</b>, a través del teléfono: <b>{{$proyecto->telefono_tutor}}</b> antes de la fecha de presentación, para aclarar cualquier duda respecto al trabajo.<br><br>
			Seguros estamos de poder contar con su valiosa colaboración para culminar exitosamente el Programa de Pasantía de la Universidad José Antonio Páez.
	</p>
	<br>
  <p align="center">Atentamente,</p> <br><br>
	<table align="center">
		<tr>
			<th>
				____________________________________ <br>
				<p style="text-align:center;">
					Coordinador de Pasantia <br> y Trabajo de Grado
				</p>
			</th>
		</tr>
	</table>
</div>
<br><br><br><div class="wrapper">
	<table>
		<tr>
			<th><img src="./img/Logo-UJAP2.png" width="80px" alt=""></th>
			<th>
				UNIVERSIDAD JOSÉ ANTONIO PÁEZ <br>
				FACULTAD DE INGENIERIA <br>
				COORNDINACION DE PASANTIA Y TRABAJO DE GRADO
			</th>
		</tr>
	</table>
	<br>
	<br>

	<p style="text-align:left;">San diego {{ Carbon\Carbon::now()->format('Y-m-d') }}</p>
  {{-- <p style="text-align: right;">{{$periodo->facultad}}-@if($proyecto->tipo == 'extraordinario')SE-@elseif($proyecto->tipo == 'pasantia')IP-@else{{$proyecto->carrera->acronimo}}-{{$proyecto->codigo}}-{{$periodo->ano}}-{{$periodo->periodo}}</p> --}}

	<center><h4>INVITACION JURADOS</h4></center>

	<p>Profesor: <br>
  <b>{{$jurado->nombres_miembro1}} {{$jurado->apellidos_miembro1}}</b> <br>
  Jurado <br>
  </p>

	<P class="parrafo">
		La Coordinación de Pasantía y Trabajo de Grado de la Facultad de Ingeniería de la Universidad “José Antonio Páez”, se complace en invitarlo(a) en calidad de Jurado del(los) bachiller(es): <b>{{$proyecto->nombres_autor}} {{$proyecto->apellidos_autor}}</b>  @if(isset($proyecto->coautor_id)!=1) y <b>{{$proyecto->nombres_coautor}} {{$proyecto->apellidos_coautor}}</b>@endif,
				titular(es) de la(s) Cédula de Identidad N° {{$proyecto->numero_identificacion_autor}} @if(isset($proyecto->coautor_id)!=1)y  {{$proyecto->numero_identificacion_coautor}}@endif, a la presentación de su Trabajo de Grado [ @if($proyecto->tipo=='trabajo_grado')<b>X</b>@endif ] o Informe Final de Pasantía [ @if($proyecto->tipo=='pasantia')<b>X</b>@endif ], titulado:  <b>{{strtoupper($proyecto->titulo)}}</b><br><br>
			 La exposición se realizará en las instalaciones de la Universidad José Antonio Páez, en el Municipio San Diego.<br><br>
			 <table cellspacing="0" border="1" width="100%">
		 		<tr>
		 			<td><b>Dia:</b> </td>
		 			<td><b>Hora:</b> </td>
					<td><b>Aula:</b> </td>
		 		</tr>
				<tr>
					<td colspan="3"><b>Correo Electronico del Jurado:</b> {{$jurado->correo_miembro1}}</td>
				</tr>
		 	</table>
      <br><br>
			Sabremos agradecerle, que se sirva contactar al tutor académico, Prof. <b>{{$proyecto->nombres_tutor}} {{$proyecto->apellidos_tutor}}</b>, a través del teléfono: <b>{{$proyecto->telefono_tutor}}</b> antes de la fecha de presentación, para aclarar cualquier duda respecto al trabajo.<br><br>
			Seguros estamos de poder contar con su valiosa colaboración para culminar exitosamente el Programa de Pasantía de la Universidad José Antonio Páez.
	</p>
	<br>
  <p align="center">Atentamente,</p> <br><br>
	<table align="center">
		<tr>
			<th>
				____________________________________ <br>
				<p style="text-align:center;">
					Coordinador de Pasantia <br> y Trabajo de Grado
				</p>
			</th>
		</tr>
	</table>
</div>
<br>
<br>
<div class="wrapper">
	<table>
		<tr>
			<th><img src="./img/Logo-UJAP2.png" width="80px" alt=""></th>
			<th>
				UNIVERSIDAD JOSÉ ANTONIO PÁEZ <br>
				FACULTAD DE INGENIERIA <br>
				COORNDINACION DE PASANTIA Y TRABAJO DE GRADO
			</th>
		</tr>
	</table>
	<br>
	<br>

	<p style="text-align:left;">San diego {{ Carbon\Carbon::now()->format('Y-m-d') }}</p>
  {{-- <p style="text-align: right;">{{$periodo->facultad}}-@if($proyecto->tipo == 'extraordinario')SE-@elseif($proyecto->tipo == 'pasantia')IP-@else{{$proyecto->carrera->acronimo}}-{{$proyecto->codigo}}-{{$periodo->ano}}-{{$periodo->periodo}}</p> --}}

	<center><h4>INVITACION JURADOS</h4></center>

	<p>Profesor: <br>
  <b>{{$jurado->nombres_miembro2}} {{$jurado->apellidos_miembro2}}</b> <br>
  Jurado <br>
  </p>

	<P class="parrafo">
		La Coordinación de Pasantía y Trabajo de Grado de la Facultad de Ingeniería de la Universidad “José Antonio Páez”, se complace en invitarlo(a) en calidad de Jurado del(los) bachiller(es): <b>{{$proyecto->nombres_autor}} {{$proyecto->apellidos_autor}}</b>  @if(isset($proyecto->coautor_id)!=1) y <b>{{$proyecto->nombres_coautor}} {{$proyecto->apellidos_coautor}}</b>@endif,
				titular(es) de la(s) Cédula de Identidad N° {{$proyecto->numero_identificacion_autor}} @if(isset($proyecto->coautor_id)!=1)y  {{$proyecto->numero_identificacion_coautor}}@endif, a la presentación de su Trabajo de Grado [ @if($proyecto->tipo=='trabajo_grado')<b>X</b>@endif ] o Informe Final de Pasantía [ @if($proyecto->tipo=='pasantia')<b>X</b>@endif ], titulado:  <b>{{strtoupper($proyecto->titulo)}}</b><br><br>
			 La exposición se realizará en las instalaciones de la Universidad José Antonio Páez, en el Municipio San Diego.<br><br>
			 <table cellspacing="0" border="1" width="100%">
		 		<tr>
		 			<td><b>Dia:</b> </td>
		 			<td><b>Hora:</b> </td>
					<td><b>Aula:</b> </td>
		 		</tr>
				<tr>
					<td colspan="3"><b>Correo Electronico del Jurado:</b> {{$jurado->correo_miembro2}}</td>
				</tr>
		 	</table>
      <br><br>
			Sabremos agradecerle, que se sirva contactar al tutor académico, Prof. <b>{{$proyecto->nombres_tutor}} {{$proyecto->apellidos_tutor}}</b>, a través del teléfono: <b>{{$proyecto->telefono_tutor}}</b> antes de la fecha de presentación, para aclarar cualquier duda respecto al trabajo.<br><br>
			Seguros estamos de poder contar con su valiosa colaboración para culminar exitosamente el Programa de Pasantía de la Universidad José Antonio Páez.
	</p>
	<br>
  <p align="center">Atentamente,</p> <br><br>
	<table align="center">
		<tr>
			<th>
				____________________________________ <br>
				<p style="text-align:center;">
					Coordinador de Pasantia <br> y Trabajo de Grado
				</p>
			</th>
		</tr>
	</table>
</div>
</body>
</html>
