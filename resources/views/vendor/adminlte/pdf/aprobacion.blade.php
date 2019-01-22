<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ACTA DE APROBACION DEL INFORME</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>
	body{	}
	.parrafo {
		text-align:justify;
		font-size: 12pt;
		line-height: normal;
    font-stretch: expanded;
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
				COORDINACION DE PASANTIAS Y TRABAJO DE GRADO
			</th>
		</tr>
	</table>

  <h4 style="text-align:center; margin-bottom: 5px; margin-top: 5px;">CRITERIOS PARA EVALUAR EL INFORME FINAL DE PASANTIA O TRABAJO DE GRADO</h4>
	<P class="parrafo">
    El jurado designado por la Facultad de  Ingenieria para la evaluación del <strong>Informe Final  de Pasantía o Trabajo de Grado</strong> titulado: <strong>{{strtoupper($proyecto->titulo)}}</strong> Realizado por el (la) Br. {{Auth::user()->nombre}} {{Auth::user()->apellido}} C.I. Nº <strong>{{number_format(Auth::user()->numero_identificacion, 0, ',', '.')}}</strong>, cursante de la carrera de {{$proyecto->carrera->name}} hace constar  después de analizar su  contenido y oída la exposición oral, considera  que reúne  los  méritos  suficientes  para su  aprobación asignándole la <strong>CALIFICACIÓN DEFINITIVA.</strong><br><br>

<strong>DE:_____________________________,( ________)  PUNTOS.</strong>

	</P>
<p style="text-align: center; font-size: 12pt;">EL JURADO</p>
  <table align="center"  width="100%">
    <tr>
      <td>
        <p style="text-align:center;">
          __________________________ <br>
          <b>Tutor Academico (Coordinador)</b></p>
          <p>Nombre:</p>
          <p>C.I:</p>
      </td>
      <td>
        <p style="text-align:center; font-size: 12pt">
          __________________________ <br>
          <b>Miembro</b></p>
          <p>Nombre:</p>
          <p>C.I:</p>
      </td>
    </tr>
  </table>
  <table align="center"  width="100%">
    <tr>
      <td style="color:white;">asdasdasdasdasdasd</td>
      <td>
        <p style="text-align:center; font-size: 12pt">
          __________________________ <br>
          <b>Miembro</b></p>
          <p>Nombre:</p>
          <p>C.I:</p>
      </td>
      <td  style="color:white;">asdasdasdasdasdd</td>
    </tr>
  </table>
  <p><b>PARA SER LLENADO POR LA COORDINACION DE PASANTIA Y TRABAJO DE GRADO</b></p>
  <table align="center" width="100%" cellpading="0" cellspacing="0" border="0">
    <tr>
      <td>
        <p style="text-align:center;">
          __________________________ <br>
          <b>Nombre de Graduando</b></p>
          <p>C.I:</p>
          <p>Fecha:</p>
      </td>
      <td>
        <p style="text-align:center; font-size: 12pt">
          __________________________________ <br>
          <b>Coordinacion de Pasantia y trabajo de Grado</b></p>
          <p>&nbsp;</p>
          <p>SEMESTRE:</p>
      </td>
    </tr>
  </table>
</body>

</html>
