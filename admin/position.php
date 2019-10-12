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
        Cargos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Cargos</li>
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
                  <th>Descripción</th>
                  <th>Grado</th>
                  <th>Nivel Instrucción</th>
                  <th>Horas</th>
                  <th>Salario Base</th>
                  <th>Operaciones</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM cargos INNER JOIN nivel_instruccion ON nivel_instruccion.nivelId=cargos.nivel_instruccion";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                       ?>
                        <tr>
                          <td><?php echo $row['cargoId']; ?></td>
                          <td><?php echo $row['nombreCargo']; ?></td>
                          <td><?php echo $row['grado']; ?></td>
                          <td><?php echo $row['nivelId']; ?></td>
                          <td><?php 

                          if ($row['horas'] == 0) {
                            echo "N/A";
                          }
                          else {
                          echo $row['horas']; 
                          }
                          ?></td>
                          <td><?php echo $row['salario']; ?></td>

                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['cargoId']; ?>"><i class="fa fa-edit"></i></button>
                            <?php if(isset($_SESSION['admin'])) { ?>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['cargoId']; ?>"><i class="fa fa-trash"></i></button>
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
  <?php include 'includes/position_modal.php'; ?>
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
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'position_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.decid').val(response.cargoId);
      $('#edit_cargoId').val(response.cargoId);
      $('#edit_nombreCargo').val(response.nombreCargo);
      $('#edit_grado').val(response.grado);
      $('#edit_nivel').val(response.nivel_instruccion);
      $('#edit_horas').val(response.horas);
      $('#edit_salario').val(response.salario);

    }
  });
}
/*
$(document).ready(function() {
  $('#nivel').click(function(e){
  if ($('select[id="nivel"').val() == "PIII") {
      $('div[id="horas"]').attr('disabled',false);
}
  else if ($('select[id="nivel"').val() != "PIII"){
      $('div[id="horas"]').attr('disabled',true);
  }
  });
});
*/

$("#salario").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
        });
    }
});
$("#edit_salario").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')

        });
    }
});
</script>
</body>
</html>
