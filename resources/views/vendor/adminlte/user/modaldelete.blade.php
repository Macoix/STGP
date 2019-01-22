<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $user->id }}">
	<form action="{{ route('user.delete', $user->id) }}" method="post">
    @csrf
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                  </button>
                  <h5 class="modal-title"><strong>ELIMINACION DE {{$user->nombre}} {{$user->apellido}}</strong></h5>
  			</div>
  			<div class="modal-body">
  				<p>Confirme si desea Eliminar al usuario: <br><br> {{$user->nombre}} {{$user->apellido}}</p>
  			</div>
  			<div class="modal-footer">
  				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <button type="submit" class="btn btn-success btn-flat btn-block" ><strong>CONFIRMAR</strong></button>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <button type="button" class="btn btn-danger btn-flat btn-block" data-dismiss="modal"><strong>CANCELAR</strong></button>
          </div>
  			</div>
  		</div>
  	</div>
  </form>
</div>
