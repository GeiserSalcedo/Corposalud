<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #D4E6F1;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Trabajadores
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Trabajadores</li>
        <li class="active">Lista de Trabajadores</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> ¡Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> ¡Éxito!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Codigo RAC</th>
                  <th>Foto</th> 
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cargo</th>
                  <th>Tipo</th>
                  <th>Operaciones</th>
                </thead>
                <tbody>
                  <?php
        $sql = "SELECT *, empleados.codigoRac AS empid FROM empleados LEFT JOIN cargos ON cargos.cargoId=empleados.cargoId LEFT JOIN estatus ON estatus.estatusId=empleados.estatusId LEFT JOIN ubicacion ON ubicacion.ubicacionId=empleados.ubicacionId";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['codigoRac']; ?></td>
           <td><img src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" width="30px" height="30px"> <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['empid']; ?>"><span class="fa fa-edit"></span></a></td>
                          <td><?php echo $row['nombre']; ?></td>
                          <td><?php echo $row['apellido']; ?></td>
                          <td><?php echo $row['nombreCargo']; ?></td>
                        
                          <td><?php echo $row['tipo']; ?></td></td>
                          <td>

                          <button class="btn btn-primary btn-sm view btn-flat" title="Ver" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-search"></i></button>

                          <button class="btn btn-success btn-sm edit btn-flat" title="Editar" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-edit"></i></button>
                          <?php if(isset($_SESSION['admin'])) { ?>
                          <button class="btn btn-danger btn-sm delete btn-flat" title="Borrar" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-trash"></i></button>
                          <?php } ?>
                          </td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/employee_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('#example1 tbody').on('click','.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('#example1 tbody').on('click','.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('#example1 tbody').on('click','.view', function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    getRowView(id);
    
  });


  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

//Traermos la consulta como arreglo y lo mostramos dentro de cada input identificado por el id
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.codigoRac);
      $('.codigoRac').html(response.codigoRac);
      $('#edit_codigorac').val(response.codigoRac);
      $('#edit_cedula').val(response.cedula);
      $('#edit_firstname').val(response.nombre);
      $('#edit_lastname').val(response.apellido);
      $('#edit_gender').val(response.genero);
      $('#edit_estadocivil').val(response.estadoCivil);
      $('#edit_fechanacimiento').val(response.fechaNacimiento);
      $('#edit_address').val(response.direccion);
      $('#edit_contact').val(response.telefono);
      $('#edit_fechainicio').val(response.fechaInicio);
      $('#edit_fechainicioadm').val(response.fechaInicioAdm);
      $('#edit_hijos').val(response.numeroHijos);
      $('#edit_cuenta').val(response.numeroCuenta);
      $('#edit_años').val(response.anosServicio);
      $('#edit_nivel').val(response.nivelId);
      $('#edit_cargos').val(response.cargoId);
      $('#edit_ubicacion').val(response.ubicacionId);
      $('#edit_tipo').val(response.estatusId);
    }
  });
}

function getRowView(id){
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.codigoRac').html(response.codigoRac);
      $('#view_codigorac').val(response.codigoRac);
      $('#view_cedula').val(response.cedula);
      $('#view_firstname').val(response.nombre);
      $('#view_lastname').val(response.apellido);
      $('#view_gender').val(response.genero);
      $('#view_estadocivil').val(response.estadoCivil);
      $('#view_fechanacimiento').val(response.fechaNacimiento);
      $('#view_address').val(response.direccion);
      $('#view_contact').val(response.telefono);
      $('#view_fechainicio').val(response.fechaInicio);
      $('#view_fechainicioadm').val(response.fechaInicioAdm);
      $('#view_hijos').val(response.numeroHijos);
      $('#view_cuenta').val(response.numeroCuenta);
      $('#view_años').val(response.anosServicio);
      $('#view_nivel').val(response.nivelId);
      $('#view_cargos').val(response.cargoId);
      $('#view_ubicacion').val(response.ubicacionId);
      $('#view_tipo').val(response.estatusId);
    }
  });
}
$(document).ready(function(){
    $('#ubicacion').select2();
});

</script>
</body>
</html>
