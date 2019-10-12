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
        Ubicaciones
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Ubicaciones</li>
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
                  <th>Identificador</th>
                  <th>Institución</th>
                  <th>Distrito</th>
                  <th>Departamento</th>
                  <th>Area 1</th>
                  <th>Area 2</th>
                  <th>Operaciones</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM ubicacion INNER JOIN institucion ON institucion.institucionId=ubicacion.institucionId INNER JOIN distrito ON distrito.distritoId=ubicacion.distritoId INNER JOIN departamento ON departamento.departamentoId=ubicacion.departamentoId INNER JOIN area_laboral1 ON area_laboral1.laboral1Id=ubicacion.laboral1Id INNER JOIN area_laboral2 ON area_laboral2.laboral2Id=ubicacion.laboral2Id";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                       ?>
                        <tr>
                          <td><?php echo $row['ubicacionId']; ?></td>
                          <td><?php echo $row['nombre_institucion']; ?></td>
                          <td><?php echo $row['nombre_distrito']; ?></td>
                          <td><?php echo $row['nombre_depart']; ?></td>
                          <td><?php echo $row['nombre_area1']; ?></td>
                          <td><?php echo $row['nombre_area2']; ?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['ubicacionId']; ?>"><i class="fa fa-edit"></i></button>
                            <?php if(isset($_SESSION['admin'])) { ?>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['ubicacionId']; ?>"><i class="fa fa-trash"></i></button>
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
  <?php include 'includes/location_modal.php'; ?>
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
    $('#delete_location').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'location_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.decid').val(response.ubicacionId);
      $('#edit_institucion').val(response.institucionId);
      $('#edit_distrito').val(response.distritoId);
      $('#edit_departamento').val(response.departamentoId);
      $('#edit_area1').val(response.laboral1Id);
      $('#edit_area2').val(response.laboral2Id);
 

    }
  });
}
</script>
</body>
</html>
