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
            	<h4 class="modal-title"><b>Agregar Nueva Asignación</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="assignment_add.php">
                <h5 align="right"><b><i>Campos Obligatorios *</i></b></h5>

          		  <div class="form-group">
                  	<label for="id" class="col-sm-3 control-label">Identificador *</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="id" name="asignacionId" minlength="4" maxlength="4"  title="Debe ser numérico" required pattern="[0-9]+" />
                  	</div>
                </div>
                <div class="form-group">
                    <label for="concepto" class="col-sm-3 control-label">Concepto *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="concepto" name="concepto" title="Solo letras" required pattern="[a-z Ññ A-Z 0-9 \.%-áéíóúÁÉÍÓÚ]+" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="frecuencia" class="col-sm-3 control-label">Frecuencia *</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="frecuencia" id="frecuencia" required />
                        <option value="" selected>- Seleccionar -</option>
                        <option value="SS">Semanal</option>
                        <option value="QQ">Quincenal</option>
                        <option value="MM">Mensual</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="valor" class="col-sm-3 control-label">Valor *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="valor" name="valor"  title="Debe ser numérico" required pattern="[0-9 \.,%-]+" />
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
            	<h4 class="modal-title"><b>Actualizar Asignación</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="assignment_edit.php">

            		<input type="hidden" class="decid" name="id">

                <div class="form-group">
                    <label for="asignacionId" class="col-sm-3 control-label">Identificador *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_asignacionId" name="asignacionId" minlength="4" maxlength="4"  title="Debe ser numérico" required pattern="[0-9]+" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_concepto" class="col-sm-3 control-label">Concepto *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_concepto" name="concepto" title="Solo letras" required pattern="[a-z Ññ A-Z 0-9 \.%-áéíóúÁÉÍÓÚ]+" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_frecuencia" class="col-sm-3 control-label">Frecuencia *</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="frecuencia" id="edit_frecuencia" required >
                        <option value="" selected>- Seleccionar -</option>
                        <option value="SS">Semanal</option>
                        <option value="QQ">Quincenal</option>
                        <option value="MM">Mensual</option>
                      </select>
                    </div>
                </div>
                    
                    <div class="form-group">
                    <label for="valor" class="col-sm-3 control-label">Valor *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_valor" name="valor"  title="Debe ser numérico" required pattern="[0-9 \.,%-]+" />
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
            	<form class="form-horizontal" method="POST" action="assignment_delete.php">
            		<input type="hidden" class="decid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR ESTA ASIGNACIÓN?</p>
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


     