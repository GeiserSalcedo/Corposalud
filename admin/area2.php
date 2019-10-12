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
        Area Laboral 2
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Area Laboral 2</li>
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
                  <th>Nombre</th>
                  <th>Operaciones</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM area_laboral2";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                       ?>
                        <tr>
                          <td><?php echo $row['laboral2Id']; ?></td>
                          <td><?php echo $row['nombre_area2']; ?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-area2="<?php echo $row['laboral2Id']; ?>"><i class="fa fa-edit"></i></button>
                            <?php if(isset($_SESSION['admin'])) { ?>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-area2="<?php echo $row['laboral2Id']; ?>"><i class="fa fa-trash"></i></button>
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
  <?php include 'includes/area2_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('#example1 tbody').on('click','.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var area2 = $(this).data('area2');
    getRow(area2);
  });

  $('#example1 tbody').on('click','.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var area2 = $(this).data('area2');
    getRow(area2);
  });
});

function getRow(area2){
  $.ajax({
    type: 'POST',
    url: 'location_part_row.php',
    data: {area2:area2},
    dataType: 'json',
    success: function(response){
      $('.decid').val(response.laboral2Id);
      $('#edit_laboral2Id').val(response.laboral2Id);
      $('#edit_nombre').val(response.nombre_area2);
    }
  });
}
</script>
</body>
</html>