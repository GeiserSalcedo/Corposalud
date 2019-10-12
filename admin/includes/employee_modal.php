<!-- Add -->
<style type="text/css">
  .block-one{
    float:left;
  }

  .block-two {
    float: left;
  }

  .block-three {
    float: left;
  }

 .block-four{
  clear: left;
  }

  .block-five{
  clear: left;
  }
  input {
    text-transform: uppercase;
  }

</style>

<div class="modal fade" id="addnew">
    <div class="modal-dialog" style="margin-left: 150px">
        <div class="modal-content" style="width: 1100px">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Registrar Nuevo Trabajador</b></h4>
                <h6 align="center"><b><i>Campos Obligatorios *</i></b></h6>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
<div class="block-one">
                <div class="form-group">
                    <label for="codigorac" class="col-sm-3 control-label">Codigo Rac *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="codigorac" name="codigorac" minlength="5" maxlength="5" title="Debe ser numérico" required pattern="[0-9]+" />

                    </div>
                </div>
                  <div class="form-group">
                    <label for="cedula" class="col-sm-3 control-label">Cedula *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="cedula" name="cedula" minlength="7" maxlength="8" title="Debe ser numérico" required pattern="[0-9]+" />
                    </div>
                </div>

          		  <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Nombre *</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" title="Solo letras" required pattern="[a-z Ññ A-Z]+" />
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Apellido *</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" title="Solo letras" required pattern="[a-z Ññ A-Z]+" />
                  	</div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Género *</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="gender" id="gender" required>
                        <option value="" selected>- Seleccionar -</option>
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nivel" class="col-sm-3 control-label">Nivel de Instruccion *</label>

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


</div>
<div class="block-two">              
                

                <div class="form-group">
                    <label for="estadocivil" class="col-sm-3 control-label">Estado Civil *</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="estadocivil" id="estadocivil" required />
                        <option value="" selected>- Seleccionar -</option>
                        <option value="S">SOLTERO</option>
                        <option value="C">CASADO</option>
                        <option value="D">DIVORCIADO</option>
                        <option value="V">VIUDO</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fechanacimiento" class="col-sm-3 control-label">Fecha de nacimiento *</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" required>
                      </div>
                    </div>
                </div>


                <div class="form-group">
                  	<label for="address" class="col-sm-3 control-label">Dirección *</label>

                  	<div class="col-sm-9">
                      <input  class="form-control" name="address" id="address" required />
                  	</div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Teléfono *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" minlength="11" maxlength="11" title="Debe ser numérico" required pattern="[0-9]+" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="hijos" class="col-sm-3 control-label">N° de Hijos</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="hijos" name="hijos" maxlength="2" pattern="[0-9]+" />
                    </div>
                </div>
</div>
<div class="block-three">              

                
                <div class="form-group">
                    <label for="fechainicio" class="col-sm-3 control-label">Fecha Inicio *</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="fechainicio" name="fechainicio" required />
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fechainicioadm" class="col-sm-3 control-label">Fecha Inicio Adm *</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="fechainicioadm" name="fechainicioadm" required>
                      </div>
                    </div>
                </div>

                

                <div class="form-group">
                    <label for="cuenta" class="col-sm-3 control-label">N° de Cuenta *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="cuenta" name="cuenta" minlength="20" maxlength="20" title="Debe ser numérico"  pattern="[0-9]+">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tipo" class="col-sm-3 control-label">Tipo *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="tipo" id="tipo" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM estatus";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['estatusId']."'>".$prow['tipo']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="cargos" class="col-sm-3 control-label">Cargos *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="cargos" id="cargos" required />
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM cargos";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['cargoId']."'>".$prow['nombreCargo']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
  </div>
  <div class="block-four">
                <div  class="form-group">
                    <label style="width: 8%;" for="ubicacion" class="col-sm-3 control-label">Ubicación *</label>

                    <div class="col-sm-9">
          
  <select style="width: 123%;" name="ubicacion" id="ubicacion" required>
                        <option value="" selected>- Seleccionar -</option>

                          <?php
                $sql = "SELECT * FROM ubicacion INNER JOIN institucion ON institucion.institucionId=ubicacion.institucionId INNER JOIN distrito ON distrito.distritoId=ubicacion.distritoId INNER JOIN departamento ON departamento.departamentoId=ubicacion.departamentoId INNER JOIN area_laboral1 ON area_laboral1.laboral1Id=ubicacion.laboral1Id INNER JOIN area_laboral2 ON area_laboral2.laboral2Id=ubicacion.laboral2Id";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
    <option value='".$prow['ubicacionId']."'>".$prow['nombre_institucion']."/".$prow['nombre_distrito']."/".$prow['nombre_depart']."/".$prow['nombre_area1']."/".$prow['nombre_area2']."</option>
                            ";
                          }
                        ?>

                      </select>
                    </div>
                </div>
                <div style="float: left;" class="form-group">
                    <label for="profile_photo" class="col-sm-3 control-label">Foto</label>

                    <div class="col-sm-9">
                      <input type="file" name="photo" id="profile_photo">
                    </div>
                </div>
          	</div>
  
</div>
<div class="block-five">
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

</div>

<!------------------------------------- Edit ----------------------------------------------->
<div class="modal fade" id="edit">
    <div class="modal-dialog" style="margin-left: 150px">
        <div class="modal-content" style="width: 1100px">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title"><b><span class="employee_id">Editar Datos del Trabajador</span></b></h4>
                <h6 align="right"><b><i>Campos Obligatorios *</i></b></h6>

          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_edit.php" enctype="multipart/form-data">

                <input type="hidden" class="empid" name="id">
<div class="block-one">
                <div class="form-group">
                    <label for="codigorac" class="col-sm-3 control-label">Codigo Rac *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_codigorac" name="codigorac" minlength="5" maxlength="5" title="Debe ser numérico" required pattern="[0-9]+" />

                    </div>
                </div>
                  <div class="form-group">
                    <label for="cedula" class="col-sm-3 control-label">Cedula *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_cedula" name="cedula" minlength="7" maxlength="8" title="Debe ser numérico" required pattern="[0-9]+" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Nombre *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" title="Solo letras" required pattern="[a-z Ññ A-Z]+" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Apellido *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" title="Solo letras" required pattern="[a-z Ññ A-Z]+" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Género *</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="gender" id="edit_gender" required />
                        <option value="" selected>- Seleccionar -</option>
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nivel" class="col-sm-3 control-label">Nivel de Instruccion *</label>

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
</div>
<div class="block-two">              
                

                <div class="form-group">
                    <label for="estadocivil" class="col-sm-3 control-label">Estado Civil *</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="estadocivil" id="edit_estadocivil" required />
                        <option value="" selected>- Seleccionar -</option>
                        <option value="S">SOLTERO</option>
                        <option value="C">CASADO</option>
                        <option value="D">DIVORCIADO</option>
                        <option value="V">VIUDO</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fechanacimiento" class="col-sm-3 control-label">Fecha de nacimiento *</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="edit_fechanacimiento" name="fechanacimiento" required />
                      </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Dirección *</label>

                    <div class="col-sm-9">
                      <input  class="form-control" name="address" id="edit_address" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Teléfono *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contact" name="contact" minlength="11" maxlength="11" title="Debe ser numérico" required pattern="[0-9]+" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="hijos" class="col-sm-3 control-label">N° de Hijos</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_hijos" name="hijos" maxlength="2" pattern="[0-9]+" />
                    </div>
                </div>
</div>
<div class="block-three">              

                
                <div class="form-group">
                    <label for="fechainicio" class="col-sm-3 control-label">Fecha Inicio *</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="edit_fechainicio" name="fechainicio" required />
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_fechainicioadm" class="col-sm-3 control-label">Fecha Inicio Adm *</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="edit_fechainicioadm" name="fechainicioadm" required />
                      </div>
                    </div>
                </div>

                

                <div class="form-group">
                    <label for="cuenta" class="col-sm-3 control-label">N° de Cuenta *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_cuenta" name="cuenta" minlength="20" maxlength="20" title="Debe ser numérico"  pattern="[0-9]+">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tipo" class="col-sm-3 control-label">Tipo *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="tipo" id="edit_tipo" required />
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM estatus";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['estatusId']."'>".$prow['tipo']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="cargos" class="col-sm-3 control-label">Cargos *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="cargos" id="edit_cargos" required />
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM cargos";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['cargoId']."'>".$prow['nombreCargo']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
  </div>
  <div class="block-four">
 
                <div  class="form-group">
                    <label style="width: 8%;" for="edit_ubicacion" class="col-sm-3 control-label">Ubicación *</label>

                    <div class="col-sm-9">
          
  <select style="width: 123%;" name="ubicacion" id="edit_ubicacion" required>
                        <option value="" selected>- Seleccionar -</option>

                          <?php
                $sql = "SELECT * FROM ubicacion INNER JOIN institucion ON institucion.institucionId=ubicacion.institucionId INNER JOIN distrito ON distrito.distritoId=ubicacion.distritoId INNER JOIN departamento ON departamento.departamentoId=ubicacion.departamentoId INNER JOIN area_laboral1 ON area_laboral1.laboral1Id=ubicacion.laboral1Id INNER JOIN area_laboral2 ON area_laboral2.laboral2Id=ubicacion.laboral2Id";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
    <option value='".$prow['ubicacionId']."'>".$prow['nombre_institucion']."/".$prow['nombre_distrito']."/".$prow['nombre_depart']."/".$prow['nombre_area1']."/".$prow['nombre_area2']."</option>
                            ";
                          }
                        ?>

                      </select>
                    </div>
                </div>
            </div>
  
</div>
<div class="block-five">
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
              </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-------------------------------------------- View ----------------------------------------->
<div class="modal fade" id="view">
    <div class="modal-dialog" style="margin-left: 150px">
        <div class="modal-content" style="width: 1100px">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

          <h4 class="modal-title"><b><span class="employee_id">Datos del Trabajador</span></b></h4>
                <h6 align="right"><b><i>Campos Obligatorios *</i></b></h6>

            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
<div class="block-one">
                <div class="form-group">
                    <label for="codigorac" class="col-sm-3 control-label">Codigo Rac *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_codigorac" name="codigorac" minlength="5" maxlength="5" title="Debe ser numérico" required pattern="[0-9]+" disabled />

                    </div>
                </div>
                  <div class="form-group">
                    <label for="cedula" class="col-sm-3 control-label">Cedula *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_cedula" name="cedula" minlength="7" maxlength="8" title="Debe ser numérico" required pattern="[0-9]+" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Nombre *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_firstname" name="firstname" title="Solo letras" required pattern="[a-z Ññ A-Z]+" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Apellido *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_lastname" name="lastname" title="Solo letras" required pattern="[a-z Ññ A-Z]+" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Género *</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="gender" id="view_gender" disabled required >
                        <option value="" selected>- Seleccionar -</option>
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nivel" class="col-sm-3 control-label">Nivel de Instruccion *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="nivel" id="view_nivel" disabled required>
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
</div>
<div class="block-two">              
                

                <div class="form-group">
                    <label for="estadocivil" class="col-sm-3 control-label">Estado Civil *</label>

                    <div class="col-sm-9"> 
                      <select class="form-control" name="estadocivil" id="view_estadocivil" disabled required />
                        <option value="" selected>- Seleccionar -</option>
                        <option value="S">SOLTERO</option>
                        <option value="C">CASADO</option>
                        <option value="D">DIVORCIADO</option>
                        <option value="V">VIUDO</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fechanacimiento" class="col-sm-3 control-label">Fecha de nacimiento *</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="view_fechanacimiento" name="fechanacimiento" disabled required />
                      </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Dirección *</label>

                    <div class="col-sm-9">
                      <input  class="form-control" name="address" id="view_address" disabled required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Teléfono *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_contact" name="contact" minlength="11" maxlength="11" title="Debe ser numérico" required pattern="[0-9]+" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label for="hijos" class="col-sm-3 control-label">N° de Hijos</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_hijos" name="hijos" maxlength="2" pattern="[0-9]+" disabled />
                    </div>
                </div>
</div>
<div class="block-three">              

                
                <div class="form-group">
                    <label for="fechainicio" class="col-sm-3 control-label">Fecha Inicio *</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="view_fechainicio" name="fechainicio" required disabled />
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fechainicioadm" class="col-sm-3 control-label">Fecha Inicio Adm *</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="view_fechainicioadm" name="fechainicioadm" required disabled />
                      </div>
                    </div>
                </div>

                

                <div class="form-group">
                    <label for="cuenta" class="col-sm-3 control-label">N° de Cuenta *</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="view_cuenta" name="cuenta" minlength="20" maxlength="20" title="Debe ser numérico" required pattern="[0-9]+" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label for="tipo" class="col-sm-3 control-label">Tipo *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="tipo" id="view_tipo" disabled required />
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM estatus";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['estatusId']."'>".$prow['tipo']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="cargos" class="col-sm-3 control-label">Cargos *</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="cargos" id="view_cargos" disabled required />
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                          $sql = "SELECT * FROM cargos";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['cargoId']."'>".$prow['nombreCargo']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
  </div>
  <div class="block-four">
<div  class="form-group">
                    <label style="width: 8%;" for="view_ubicacion" class="col-sm-3 control-label">Ubicación *</label>

                    <div class="col-sm-9">
          
  <select style="width: 123%;" name="ubicacion" id="view_ubicacion" disabled required>
                        <option value="" selected>- Seleccionar -</option>

                          <?php
                $sql = "SELECT * FROM ubicacion INNER JOIN institucion ON institucion.institucionId=ubicacion.institucionId INNER JOIN distrito ON distrito.distritoId=ubicacion.distritoId INNER JOIN departamento ON departamento.departamentoId=ubicacion.departamentoId INNER JOIN area_laboral1 ON area_laboral1.laboral1Id=ubicacion.laboral1Id INNER JOIN area_laboral2 ON area_laboral2.laboral2Id=ubicacion.laboral2Id";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
    <option value='".$prow['ubicacionId']."'>".$prow['nombre_institucion']."/".$prow['nombre_distrito']."/".$prow['nombre_depart']."/".$prow['nombre_area1']."/".$prow['nombre_area2']."</option>
                            ";
                          }
                        ?>

                      </select>
                    </div>
                </div>
            </div>
            <div style="float: left;" class="form-group">
                    <label for="años" class="col-sm-3 control-label">Años de Servicio</label>

                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="años" id="view_años" minlength="2" maxlength="2" disabled>
                    </div>
                </div>
  
</div>
<div class="block-five">
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              </form>
            </div>
        </div>
    </div>
</div>

</div>
<!--------------------------------------------------- Delete -------------------------->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="employee_id">Eliminar</span></b></h4>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_delete.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>¿DESEA ELIMINAR TODOS LOS DATOS DE ESTE EMPLEADO?</p>
	                	<h2 class="bold del_employee_name"></h2>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="employee_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="edit_profile_photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="edit_profile_photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Actualizar</button>
              </form>
            </div>
        </div>
    </div>
</div>    

 