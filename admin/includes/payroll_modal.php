
<style type="text/css">
  input {
    text-transform: uppercase;
  }
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
  border-top:1px;
  }

 #resultado{
  clear: left;
  }

  .block-five{
  clear: left;
  }
  
  .asignacion {
    float: left;
    padding-left: 90px;
    min-height: 200px; 
  }

  .deduccion {
    float: right;
    padding-right: 90px;
    min-height: 200px;
  }

  #resultado input[type=text] {
    width: 100px;
  }


  #resultado ul {
    list-style:none;
  }

  .valores_asignaciones {
    float: left;
    margin-left: 40px;
    padding-top: 20px;
    padding-bottom: 20px;

  }

  .valores_asignaciones h5 {
    margin-left: 80px;
  }

  .valores_asignaciones input[type=text] {
    float: right;
    margin-left: 10px;
  }

  .valores_asignaciones input[type=number] {
    float: right;
    margin-left: 10px;
    width: 100px;
  }

  .valores_deducciones {
    float: left;
    margin-right:40px;
    padding-top: 20px;
    padding-bottom: 20px;

  }

  .valores_deducciones h5{
    margin-left: 80px;
  }

  .valores_deducciones input[type=text] {
    float: right;
    margin-left: 10px;

  }

  #spTotal_input {
    background-color: #E9E9E9;
    border: 2px solid #A8A8A8;
  }

  #periodo {
    clear: left;
    margin-left: 600px;
  }

  #periodo_view {
    clear: left;
    margin-top: 60px;
    margin-left: 520px;
  }

  #total {
    clear: left;
    margin-left: 600px;
    border-top: 1px solid #A8A8A8;
    border-bottom: 1px solid #A8A8A8;
    margin-bottom: 25px;
    font-size: 15px;
  }

  #total input[type=text]{
   border: none;
   text-decoration: underline;
  }

  #info {
    margin-left: 20px;
  }

  .periodo-delete {
    margin-left: 40%;
  }

  .periodo-delete input[type=text]{
    width: 40px;
  }


  #nomina ul {
    list-style:none;
  }

  #view_asignaciones {
    float: left;
    padding-top: 10px;
    padding-bottom: 20px;
    margin-right: 20px;
  }

  #view_asignaciones input[type=text] {
    float: right;
    margin-left: 10px;
    width: 80px;
  }

  #view_deducciones {
    padding-top: 10px;
    padding-bottom: 20px;

  }

  #view_deducciones input[type=text] {
    float: right;
    width: 80px;
  }

  #view_nom {
    clear: left;
    margin-left: 580px;
    border-top: 1px solid #A8A8A8;
    border-bottom: 1px solid #A8A8A8;
    margin-bottom: 25px;
    font-size: 15px;
  }

  #view_nom input[type=text]{
   border: none;
   text-decoration: underline;
  }

  #totaldeduc {
    background-color: #E9E9E9;
    border: 2px solid #A8A8A8;
  }

  #totalasig {
    background-color: #E9E9E9;
    border: 2px solid #A8A8A8;
  }


</style>
<!-------------------------------------------Buscar trabajador------------------------------->
<div class="modal fade" id="addnew">
    <div class="modal-dialog" style="margin-left: 250px">
        <div class="modal-content" style="width: 900px">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Buscar Trabajador</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="form_buscar" action="">
                <div  class="form-group">
                   <div class="col-sm-9">
          
  <select style="width: 135%;" name="codigoRac" id="buscador" required>
                        <option value="" selected>- Seleccionar -</option>

                          <?php
                          $sql = "SELECT * FROM empleados";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
    <option value='".$prow['codigoRac']."'>CODIGO RAC: ".$prow['codigoRac']." | CEDULA: ".$prow['cedula']." | NOMBRE: ".$prow['nombre']." ".$prow['apellido']."</option>
                            ";
                          }
                        ?>

                      </select>
                    </div>
                </div>
            </div>
<div id="success"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-flat" id="search" name="search"><i class="fa fa-search"></i> Buscar</button>


              </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------Mostrar montos de periodos anteriores---------------------------->

<div class="modal fade" id="view">
    <div class="modal-dialog" style="margin-left: 250px">
        <div class="modal-content" style="width: 900px">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Nomina del Trabajador</b></h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" method="POST" id="nomina_view" action="">
            <div  class="form-group">
                   <div class="col-sm-9">
  <select style="width: 100%;" name="codigoRac_view" id="buscador_view" required>
                        <option value="" selected>- Seleccionar -</option>

                          <?php
                          $sql = "SELECT * FROM empleados";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
    <option value='".$prow['codigoRac']."'>CODIGO RAC: ".$prow['codigoRac']." | CEDULA: ".$prow['cedula']." | NOMBRE: ".$prow['nombre']." ".$prow['apellido']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                    <button type="button" class="btn  btn-flat" id="mostrar"><i class="fa fa-search"></i> Buscar</button>
                </div>
                
    <div id="periodo_view">
    <span>Periodo de Pago:</span>
    <label>Mes:</label>
    <select name="mes">
        <?php
        for ($i=1; $i<=12; $i++) {
            if ($i == date('m'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
    </select>
    <label>Año:</label>
    <select name="ano">
        <?php
        for($i=date('o'); $i>=1910; $i--){
            if ($i == date('o'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
    </select>
    </div>
            <div id="nomina"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!---------------------------------Borrar---------------------------------------------->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Eliminar</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="payroll_delete.php">
                <input type="hidden" id="codigoRac_delete" name="codigoRac_delete">
                <input type="hidden" id="mes_delete" name="mes_delete">
                <input type="hidden" id="ano_delete" name="ano_delete">
                <div class="text-center">
                    <p>¿DESEA ELIMINAR LA NOMINA DE ESTE TRABAJADOR EN ESTE PERIODO?</p>
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
