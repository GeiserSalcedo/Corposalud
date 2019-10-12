<?php include 'includes/session.php'; ?>
<?php
  include '../timezone.php';
  $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
?>
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
        Nómina de sueldos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Nómina de sueldos</li>
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
              <h4><i class='icon fa fa-check'></i> ¡Exito!</h4>
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

        <a href="#addnew" id="calcular" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Calcular</a>

        <a href="#view" id="consultar" data-toggle="modal" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-list"></i> Consultar Nomina</a>
         <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Codigo RAC</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Mes</th>
                  <th>Año</th>
                  <th>Total</th>
                  <th>Operaciones</th>
                </thead>
                <tbody>
                  <?php
        $sql = "SELECT * FROM empleados INNER JOIN nomina ON nomina.codigoRac=empleados.codigoRac";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['codigoRac']; ?></td>
                          <td><?php echo $row['nombre']; ?></td>
                          <td><?php echo $row['apellido']; ?></td>
                          <td><?php echo $row['mes']; ?></td>
                          <td><?php echo $row['ano']; ?></td>
                          <td><?php echo $row['total']; ?></td>
                          <td>
                          <form>
            <input type="hidden" name="codigoRac_pdf" value="<?php echo $row['codigoRac']; ?>">
            <input type="hidden" name="cedula_pdf" value="<?php echo $row['cedula']; ?>">
            <input type="hidden" name="mes_pdf" value="<?php echo $row['mes']; ?>">
            <input type="hidden" name="ano_pdf" value="<?php echo $row['ano']; ?>">
            
<?php if(isset($_SESSION['admin'])) { ?>
    <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['codigoRac']; ?>" data-mes="<?php echo $row['mes']; ?>" data-ano="<?php echo $row['ano']; ?>"><i class="fa fa-trash"></i></button>
<?php } ?>

    <button type="submit" formaction="reports/vaucher.php" class="btn btn-warning btn-sm pdf btn-flat"><i class="fa fa-file-pdf-o"></i></button>


                          </form>
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
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/payroll_modal.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?> 
<script>

$(function(){
  $('#example1 tbody').on('click','.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    var mes = $(this).data('mes');
    var ano = $(this).data('ano');
    getRow(id,mes,ano);
  });
});


function getRow(id,mes,ano){
  $.ajax({
    type: 'POST',
    url: 'payroll_row.php',
    data: {id:id, mes:mes, ano:ano},
    dataType: 'json',
    success: function(response){
      $('#codigoRac_delete').val(response.codigoRac);
      $('#mes_delete').val(response.mes);
      $('#ano_delete').val(response.ano);
    }
  });
}

$(document).ready(function(){
    $('#buscador').select2();
});

$(document).ready(function(){
    $('#buscador_view').select2();
});

//buscador para trabajador

$("#search").click(function() {

if ($('select[id="buscador"]').val() == 0) {
        alert("Debe buscar y seleccionar un trabajador");
        e.preventDefault();
       }
else {
      var url="payroll_calc.php";
      $.ajax({
      type: 'POST',
      url:url,
      data: $("#form_buscar").serialize(),
      success: function(data) {
      $("#success").html(data);

        }
    });
}
  });

//buscar como limpiar la busqueda

$("#search").click(function() {
        $('#search').css('display','none');
        $('#buscador').attr('disabled','disabled');
    });

//buscador para nomina

$("#mostrar").click(function() {

if ($('select[id="buscador_view"]').val() == 0) {
        alert("Debe buscar y seleccionar un trabajador");
        e.preventDefault();
       }
else {
      var url="payroll_view.php";
      $.ajax({
      type: 'POST',
      url:url,
      data: $("#nomina_view").serialize(),
      success: function(data) {
      $("#nomina").html(data);

        }
    });
}
  });
</script>
</body>
</html>



