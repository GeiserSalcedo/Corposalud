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
              <h4 class="modal-title"><b>Agregar Nuevo Cargo</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="position_add.php">
                <h5 align="right"><b><i>Campos Obligatorios *</i></b></h5>

                <div class="form-group">
                    <label for="id" class="col-sm-3 control-label">Identificador *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="id" name="cargoId" minlength="5" maxlength="5"  title="Debe ser numérico" required pattern="[0-9]+" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombreCargo" class="col-sm-3 control-label">Nombre del Cargo *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nombreCargo" name="nombreCargo" title="Solo letras" required pattern="[a-z Ññ A-Z]+" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="grado" class="col-sm-3 control-label">Grado *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="grado" name="grado" minlength="1" maxlength="2" title="Solo Numeros" required pattern="[0-9]+" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="estatus" class="col-sm-3 control-label">Nivel de Instruccion *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="nivel" id="nivel" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM nivel_instruccion";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['nivelId']."'>".$prow['concepto']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
              <div id="horas">
                <div class="form-group">
                    <label id="horas" for="horas" class="col-sm-3 control-label">Horas (Solo Medicos)</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="horas" name="horas" minlength="1" maxlength="2" title="Solo Numeros" pattern="[0-9]+">
                    </div>
                </div>
              </div>
                 <div class="form-group">
                    <label for="salario" class="col-sm-3 control-label">Salario *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="salario" name="salario" title="Debe ser numérico" required pattern="[0-9 \.,]+" >
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
              <h4 class="modal-title"><b>Actualizar Cargo</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="position_edit.php">

                <input type="hidden" class="decid" name="id">

                <div class="form-group">
                    <label for="edit_cargoId" class="col-sm-3 control-label">Identificador *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_cargoId" name="cargoId" minlength="5" maxlength="5"  title="Debe ser numérico" required pattern="[0-9]+" />
                    </div>
                </div>
              <div class="form-group">
                    <label for="edit_nombreCargo" class="col-sm-3 control-label">Nombre del Cargo *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nombreCargo" name="nombreCargo" title="Solo letras" required pattern="[a-z Ññ A-Z]+" />
                    </div>
                </div>

                  <div class="form-group">
                    <label for="edit_grado" class="col-sm-3 control-label">Grado *</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_grado" name="grado" minlength="1" maxlength="2" title="Solo Numeros" required pattern="[0-9]+" />
                    </div>
                </div>
                 <div class="form-group">
                    <label for="estatus" class="col-sm-3 control-label">Nivel de Instruccion *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="nivel" id="edit_nivel" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM nivel_instruccion";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['nivelId']."'>".$prow['concepto']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                 <div id="horas">
                <div class="form-group">
                    <label id="horas" for="horas" class="col-sm-3 control-label">Horas (Solo Medicos)</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_horas" name="horas" minlength="1" maxlength="2" title="Solo Numeros" pattern="[0-9]+">
                    </div>
                </div>
              </div>
                 <div class="form-group">
                    <label for="edit_salario" class="col-sm-3 control-label">Salario *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_salario" name="salario" title="Debe ser numérico" required pattern="[0-9 \.,]+">
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
              <form class="form-horizontal" method="POST" action="position_delete.php">
                <input type="hidden" class="decid" name="id">
                <div class="text-center">
                    <p>¿DESEA ELIMINAR ESTE CARGO?</p>
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


     