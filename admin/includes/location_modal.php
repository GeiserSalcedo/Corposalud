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
            	<h4 class="modal-title"><b>Agregar Nueva Ubicación</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="location_add.php">
                <h5 align="right"><b><i>Campos Obligatorios *</i></b></h5>

                <div class="form-group">
                    <label for="institucion" class="col-sm-3 control-label">Institución *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="institucion" id="institucion" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM institucion";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['institucionId']."'>".$prow['nombre_institucion']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="distrito" class="col-sm-3 control-label">Distrito *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="distrito" id="distrito" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM distrito";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['distritoId']."'>".$prow['nombre_distrito']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="departamento" class="col-sm-3 control-label">Departamento *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="departamento" id="departamento" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM departamento";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['departamentoId']."'>".$prow['nombre_depart']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="area1" class="col-sm-3 control-label">Area Laboral 1 *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="area1" id="area1" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM area_laboral1";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['laboral1Id']."'>".$prow['nombre_area1']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="area2" class="col-sm-3 control-label">Area Laboral 2 *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="area2" id="area2" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM area_laboral2";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['laboral2Id']."'>".$prow['nombre_area2']."</option>
                            ";
                          }
                        ?>
                      </select>
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
            	<h4 class="modal-title"><b>Actualizar Ubicación</b></h4>
          	</div>
          	<div class="modal-body">
              <form class="form-horizontal" method="POST" action="location_edit.php">
                <input type="hidden" class="decid" name="id">

                <h5 align="right"><b><i>Campos Obligatorios *</i></b></h5>

                <div class="form-group">
                    <label for="edit_institucion" class="col-sm-3 control-label">Institución *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="institucion" id="edit_institucion" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM institucion";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['institucionId']."'>".$prow['nombre_institucion']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_distrito" class="col-sm-3 control-label">Distrito *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="distrito" id="edit_distrito" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM distrito";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['distritoId']."'>".$prow['nombre_distrito']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_departamento" class="col-sm-3 control-label">Departamento *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="departamento" id="edit_departamento" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM departamento";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['departamentoId']."'>".$prow['nombre_depart']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_area1" class="col-sm-3 control-label">Area Laboral 1 *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="area1" id="edit_area1" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM area_laboral1";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['laboral1Id']."'>".$prow['nombre_area1']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_area2" class="col-sm-3 control-label">Area Laboral 2 *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="area2" id="edit_area2" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM area_laboral2";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['laboral2Id']."'>".$prow['nombre_area2']."</option>
                            ";
                          }
                        ?>
                      </select>
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
<div class="modal fade" id="delete_location">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Eliminar</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="location_delete.php">
            		<input type="hidden" class="decid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR ESTA UBICACIÓN?</p>
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


     