<!-- Add -->
<style type="text/css">
  input {
    text-transform: uppercase;
  }
</style>
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Agregar Nuevo Departamento</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="location_part_add.php">
                <h5 align="right"><b><i>Campos Obligatorios *</i></b></h5>

          		  <div class="form-group">
                  	<label for="departamentoId" class="col-sm-3 control-label">Identificador *</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="departamentoId" name="departamentoId" minlength="2" maxlength="2"  title="Debe ser numérico" required pattern="[0-9]+" >
                  	</div>
                </div>
                <div class="form-group">
                    <label for="nombre" class="col-sm-3 control-label">Nombre *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nombre" name="nombre" title="Solo letras" required pattern="[a-z Ññ A-Z 0-9 \.%-áéíóúÁÉÍÓÚ]+" >
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add_depar"><i class="fa fa-save"></i> Guardar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Actualizar Departamento</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="location_part_edit.php">
                <h5 align="right"><b><i>Campos Obligatorios *</i></b></h5>

                <input type="hidden" class="decid" name="id">

                <div class="form-group">
                    <label for="edit_departamentoId" class="col-sm-3 control-label">Identificador *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_departamentoId" name="departamentoId" minlength="2" maxlength="2"  title="Debe ser numérico" required pattern="[0-9]+" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_nombre" class="col-sm-3 control-label">Nombre *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nombre" name="nombre" title="Solo letras" required pattern="[a-z Ññ A-Z 0-9 \.%-áéíóúÁÉÍÓÚ]+" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit_depar"><i class="fa fa-check-square-o"></i> Actualizar</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Eliminar</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="location_part_delete.php">
            		<input type="hidden" class="decid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR ESTE DEPARTAMENTO?</p>
	                	<h2 id="del_deduction" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete_depar"><i class="fa fa-trash"></i> Borrar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     