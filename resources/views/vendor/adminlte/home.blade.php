@extends('adminlte::layouts.app')

@section('title','Inicio')
@section('contentheader_title', 'Inicio')
@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Bienvenido <strong>{{Auth::user()->nombre}} {{Auth::user()->apellido}}</strong></h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
					<strong>INSTRUCCIONES:</strong><br><br>
					Si eres alumno cursante de trabajo de grado I, Ingresa a la sección de <b>Anexos</b> y procede a llenar los datos requeridos para <b>Anexo D</b> o en caso de Pasantía <b>Anexo 4A</b>.
					<br><br>
					Una vez poseas el anexo correspondiente, procede a crear un nuevo proyecto y sigue los pasos.<br><br>
					Si eres alumno de Trabajo de Grado II, sigue el progreso de tu proyecto en el timeline bajo la sección de proyectos.<br><br>

					<b><u>CRONOGRAMA DE ACTIVIDADES PASANTIAS Y TRABAJO DE GRADO I</u></b><br>
<b>SEMANA 1</b> – INICIO DE ACTIVIDADES.<br>
<b>SEMANA 4</b> – CHARLA INFORMATIVA TRABAJO DE GRADO I.<br>
<b>SEMANA 5</b> – CHARLA INFORMATIVA SEMESTRE EXTRAORDINARIO.<br>
<b>SEMANA 9</b> – FECHA TOPE DE APROBACIÓN DEL PLAN DE TRABAJO (PASANTÍA I). PROPUESTA (ACREDITACIÓN) Y DEL ANTEPROYECTO (TRABAJO DE GRADO I). HASTA DOS CORRECCIONES.<br>
<b>SEMANA 11</b> – REVISIÓN METODOLÓGICA SOLO PARA EL PROYECTO DE TRABAJO DE GRADO I POR EL ASESOR METODOLÓGICO. SIN PRORROGA.<br>
<b>SEMANA 15</b> – ENTREGAR EN LA COORDINACIÓN PROYECTO DE TRABAJO DE GRADO I (FIRMADO POR EL TUTOR ACADÉMICO Y ASESOR METODOLÓGICO).<br>
<b>SEMANA 15</b> – ENTREGAR EN LA COORDINACIÓN INFORME PRELIMINAR DE PASANTÍA (FIRMADO POR LOS TUTORES Y SELLADO POR LA EMPRESA).<br><br>

<b><u>CRONOGRAMA DE ACTIVIDADES PASANTIAS Y TRABAJO DE GRADO II</u></b><br>
<b>SEMANA I</b>- INICIO DE ACTIVIDADES.<br>
<b>SEMANA 8</b> – REVISIÓN DEL TOMO I. CORRECCIONES DEL TOMO.<br>
<b>SEMANA 9</b> – CARTA ACEPTACIÓN DEL DECANO.<br>
<b>SEMANA 11</b>- REUNIÓN DE PRESENTACIONES DE TRABAJO DE GRADO.<br>
<b>SEMANA 14</b> – PUBLICACIÓN DEL JURADO DESIGNADO POR LA COORDINACIÓN DE PASANTÍA Y TRABAJO DE GRADO Y DIRECTORES DE ESCUELA.<br>
<b>SEMANA 14</b> - ENTREGA DE CARTA DE INVITACIÓN AL JURADO DE TRABAJO DE GRADO O DE INFORME FINAL DE PASANTÍA (ENVIAR ARCHIVO POR CORREO ELECTRÓNICO A JURADO).<br>
<b>SEMANA 17</b> – PRESENTACIÓN PÚBLICA DEL INFORME FINAL DE PASANTÍA Y TRABAJO DE GRADO.<br><br>

<b><u>CRONOGRAMA DE ACTIVIDADES SEMESTRE EXTRAORDINARIO</u></b><br>
<b>SEMANA 1</b> – INICIO DE ACTIVIDADES.<br>
<b>SEMANA 5</b> – CHARLA INFORMATIVA SEMESTRE EXTRAORDINARIO.<br>
<b>SEMANA 5</b> – SOLICITUD Y ENTREGA DE ANTEPROYECTOS. PROPUESTA O PLAN DE TRABAJO.<br>
<b>SEMANA 5</b>- FECHA TOPE DE APROBACIÓN DE ANTEPROYECTO DE TRABAJO DE GRADO.<br>
<b>SEMANA 8</b> – REVISIÓN METODOLÓGICA DEL PROYECTO DE TRABAJO DE GRADO.<br>
<b>SEMANA 8</b> – ENTREGA DE PROYECTO DE TRABAJO DE GRADO O INFORME PRELIMINAR DE PASANTÍA.<br>
<b>SEMANA 9</b> – REVISIÓN DEL TOMO TRABAJO DE GRADO I. CORRECCIONES DEL TOMO<br>
<b>SEMANA 10</b> – CARTA ACEPTACIÓN DEL DECANO.<br>
<b>SEMANA 11</b> - REUNIÓN DE PRESENTACIONES DE TRABAJO DE GRADO.<br>
<b>SEMANA 14</b> - PUBLICACIÓN DEL JURADO DESIGNADO POR LA COORDINACIÓN DE PASANTÍA Y TRABAJO DE GRADO Y DIRECTORES DE ESCUELA.<br>
<b>SEMANA 14</b> – ENTREGA DE CARTA DE INVITACIÓN AL JURADO DE TRABAJO DE GRADO O DE INFORME FINAL DE PASANTÍA (ENVIAR ARCHIVO POR CORREO ELECTRÓNICO A JURADO).<br>
<b>SEMANA 17</b> – PRESENTACIÓN PÚBLICA DEL INFORME FINAL DE PASANTÍA Y TRABAJO DE GRADO<br>

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
