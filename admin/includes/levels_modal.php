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
            	<h4 class="modal-title"><b>Agregar Nuevo Nivel de Instrucción</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="levels_add.php">
                <h5 align="right"><b><i>Campos Obligatorios *</i></b></h5>

          		  <div class="form-group">
                  	<label for="id" class="col-sm-3 control-label">Identificador *</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="id" name="nivelId" minlength="2" maxlength="4" required pattern="[a-z Ññ A-Z 0-9 \.%-]+">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="concepto" class="col-sm-3 control-label">Concepto *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="concepto" name="concepto" required pattern="[a-z Ññ A-Z 0-9 \.%-/]+" />
                    </div>
                </div>

          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
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
            	<h4 class="modal-title"><b>Actualizar Nivel de Instrucción</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="levels_edit.php">

            		<input type="hidden" class="decid" name="id">

                <div class="form-group">
                    <label for="id" class="col-sm-3 control-label">Identificador *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_id" name="nivelId" minlength="2" maxlength="4" required pattern="[a-z Ññ A-Z 0-9 \.%-]+">
                    </div>
                </div>
               <div class="form-group">
                    <label for="concepto" class="col-sm-3 control-label">Concepto *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_concepto" name="concepto" required pattern="[a-z Ññ A-Z 0-9 \.%-/]+" />
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
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
            	<form class="form-horizontal" method="POST" action="levels_delete.php">
            		<input type="hidden" class="decid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR ESTE NIVEL DE INSTRUCCIÓN?</p>
	                	<h2 id="del_deduction" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Borrar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     