@if($ultimo_estado->nombre == 'anexo_pendiente')
  <div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 10%">10%</div>
  </div>
@elseif ($ultimo_estado->nombre == 'anexo_aprobado')
  <div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
  </div>
@elseif ($ultimo_estado->nombre == 'pendiente_tomo1')
  <div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
  </div>
@elseif ($ultimo_estado->nombre == 'pendiente_evaluacion_comite')
  <div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 35%">35%</div>
  </div>
@elseif ($ultimo_estado->nombre == 'aprobado_evaluacion_comite')
  <div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
  </div>
@elseif ($ultimo_estado->nombre == 'pendiente_tomo2')
  <div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 60%">60%</div>
  </div>
@elseif ($ultimo_estado->nombre == 'pendiente_asignacion_jurado')
  <div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 70%">70%</div>
  </div>
@elseif ($ultimo_estado->nombre == 'pendiente_evaluacion_jurado')
  <div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 80%">80%</div>
  </div>
@elseif ($ultimo_estado->nombre == 'aprobado_evaluacion_jurado')
  <div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
  </div>
@endif
