<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PLANILLA SOLICITUD: ANÁLISIS Y APROBACIÓN DE TRABAJO DE GRADO</title>
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
    }
  </style>

</head>

<body>
  <div class="wrapper">
    <h3 style="text-align: center; margin-bottom: 5px">ANEXO D</h3>
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
    <h4 style="text-align:center; margin-bottom: 0; margin-top: 0;">PLANILLA SOLICITUD: ANÁLISIS Y APROBACIÓN DE TRABAJO DE GRADO</h4>
    <table width="100%" align="center"  cellpading="0" cellspacing="0">
        <tr style="text-align: center" >
          <!-- <td>&nbsp;</td> -->
          <td colspan="3"><b>DATOS PERSONALES</b></td>
          <!-- <td>&nbsp;</td> -->
        </tr>
        <tr>
            <td width="40%">Apellidos: {{$autor->apellido}}</td>
            <td width="40%">Nombres: {{$autor->nombre}}</td>
            <td width="30%">CI: {{$autor->numero_identificacion}}</td>
          </tr>
          <tr>
            <td colspan="2">Dirección: {{$direccion}}</td>
            <td >Teléfono: {{$autor->telefono}}</td>
        </tr>
        <tr style="text-align: center">
            <td colspan="3"><b>DATOS ACADEMICOS</b></td>
        </tr>
        <tr>
          <td colspan="1">Escuela: {{$carrera->name}}</td>
          <td colspan="2">Índice Academico: {{$indice}}</td>
        </tr>
        <tr style="text-align: center">
            <td colspan="3"><b>DATOS DEL PROYECTO DE TRABAJO DE GRADO</b></td>
        </tr>
        <tr>
          <td colspan="3" style="border-bottom: 0px solid #000;">Autores</td>
        </tr>
        <tr>
          <td colspan="2" style="border-bottom: 0px; border-top: 0px; border-right: 0px">Nombre: {{$autor->nombre}} {{$autor->apellido}}</td>
          <td style="border-bottom: 0px; border-top: 0px; border-left: 0px">Teléfono: {{$autor->telefono}}</td>
        </tr>
        <tr>
          <td colspan="2" style="border-bottom: 0px; border-top: 0px; border-right: 0px">Nombre: {{$coautor->nombre}} {{$coautor->apellido}}</td>
          <td style="border-bottom: 0px; border-top: 0px; border-left: 0px">Teléfono: {{$coautor->telefono}}</td>
        </tr>
        <tr>
          <td colspan="3">Título del Trabajo: {{$titulo}}</td>
        </tr>
        <tr>
          <td colspan="3">Breve Descripción: {{$resumen}} </td>
        </tr>
        <tr>
          <td colspan="3">Lugar en donde se desarrollará el proyecto: {{$lugar}}</td>
        </tr>
        <tr>
          <td colspan="3">Tiempo de desarrollo: {{$tiempo}} </td>
        </tr>
        <tr>
          <td colspan="3" style="border-bottom: 0px solid #000;">Tutor Académico propuesto </td>
        </tr>
        <tr>
          <td colspan="3" style="border-top: 0px">Tutor Metodólogico: {{$tutor->nombre}} {{$tutor->apellido}}</td>
        </tr>
    </table>
    <br>
    <table align="center">
      <tr>
        <th>
          __________________________ <br>
          <p style="text-align:center;">
            APROBADO
          </p>
        </th>
        <th>
          __________________________
          <p style="text-align:center;">
            RECHAZADO
          </p>
        </th>
      </tr>
    </table>
    <h5 style="text-align:center; margin-bottom: 0px; margin-top: 0;">COMITÉ DE EVALUACIÓN</h4>
    <h5 style="text-align:center; margin-bottom: 15px; margin-top: 0;">COORDINACION DE PASANTIA Y TRABAJO DE GRADO</h4>
    <table align="center">
      <tr>
        <th>
          _______________________ <br>
          <p style="text-align:center;">
            Nombre
          </p>
        </th>
        <th>
          _______________________ <br>
          <p style="text-align:center;">
            Firma
          </p>
        </th>
        <th>
          _______________________ <br>
          <p style="text-align:center;">
            Fecha
          </p>
        </th>
      </tr>
    </table>
    <h5 style="text-align:center; margin-bottom: 15px; margin-top: 0;">DIRECCIÓN DE ESCUELA</h4>
    <table align="center">
      <tr>
        <th>
          _______________________ <br>
          <p style="text-align:center;">
            Nombre
          </p>
        </th>
        <th>
          _______________________ <br>
          <p style="text-align:center;">
            Firma
          </p>
        </th>
        <th>
          _______________________ <br>
          <p style="text-align:center;">
            Fecha
          </p>
        </th>
      </tr>
    </table><br>
    &nbsp;
      <table border="1" cellpading="0" cellspacing="0">
        <tr>
          <td style="border-bottom: 0px;">Materias o áreas del conocimiento del Pensum que intervienen en la realización del Proyecto (Enumérelas)</td>
        </tr>
        <tr>
          <td style="border-top: 0px; border-bottom: 0">
            1.	Sistema de Información I.
            2.	Sistema de Información II.
            3.	Sistema de Programa.
            4.	Programación Web.
            5.	Sistema de Base de Datos.
            6.	Metodología de la Investigación.
            7.	Ingeniería de Software.
            8.	Interfaces con el Usuario.
          </td>
        </tr>
        <tr >
          <th style="border-top: 0px; border-bottom: 0">Línea de Investigación:</th>
        </tr>
        <tr>
          <td style="border-top: 0px;">Gestión tecnológica empresarial.</td>
        </tr>
      </table>

  </div>
</body>

</html>
