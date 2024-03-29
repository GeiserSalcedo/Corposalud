<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Actualizar Perfil</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Usuario</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Nueva Contraseña</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa una nueva contraseña para actualizar" value="<?php echo $user['password']; ?>">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="profile_nivel" class="col-sm-3 control-label">Nivel</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="profile_nivel" name="nivel" value="<?php echo $user['nivel']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="profile_tipo" class="col-sm-3 control-label">Tipo</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="profile_tipo" name="tipo" value="<?php echo $user['tipo']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="new_profile_photo" class="col-sm-3 control-label">Foto:</label>

                    <div class="col-sm-9">
                      <input type="file" id="new_profile_photo" name="photo">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Contraseña Actual:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Introducir nueva contraseña para guardar" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Guardar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>