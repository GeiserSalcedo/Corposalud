<?php 
	include 'includes/session.php';
	
		$codigoRac = $_POST['codigoRac'];
		$sql = "SELECT * FROM empleados INNER JOIN estatus ON estatus.estatusId=empleados.estatusId INNER JOIN cargos ON cargos.cargoId=empleados.cargoId WHERE codigoRac = '$codigoRac'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

    $sql2 = "SELECT * FROM empleados WHERE codigoRac = '$codigoRac'";
    $query2 = $conn->query($sql2);
    $row2 = $query2->fetch_assoc();

?>
<form class="form-horizontal" method="POST" id="formulario" action="payroll_add.php">

<input type="hidden" name="codigorac" value="<?php echo $row['codigoRac']?>" >
<input type="hidden" name="hijos" value="<?php echo $row['numeroHijos']?>" >
<input type="hidden" name="anos" value="<?php echo $row['anosServicio']?>" >
<input type="hidden" name="nivel_instruccion" value="<?php echo $row2['nivel_instruccion']?>" >
<input type="hidden" name="tipo" value="<?php echo $row['estatusId']?>" >

<input type="hidden" name="compensacion" value="">
<input type="hidden" name="compensacione" value="">
<input type="hidden" name="guardianocturna" value="">
<input type="hidden" name="domingoferdiur" value="">
<input type="hidden" name="domingofernoc" value="">

<div id="info">
<span><b>Codigo Rac:</b> </span><span><?php echo $row['codigoRac'] ?></span><br>
<span><b>Nombre y Apellido: </b></span><span><?php echo $row['nombre']." ".$row['apellido'] ?></span><br>
<span><b>Tipo: </b></span><span><?php echo $row['tipo'] ?></span><br>
<span><b>Cargo: </b></span><span><?php echo $row['nombreCargo'] ?></span><br>
</div>


<div style="display: none;" class="block-four">
     <div class="asignacion">
                <h5><b>Asignaciones</b></h5>
                <?php

                  $sql = "SELECT * FROM asignaciones";
                  $query = $conn->query($sql);
                   while($prow = $query->fetch_assoc()){
                    echo "
          <div id='".$prow['asignacionId']."'>
          <input id='asignacion' name='".$prow['asignacionId']."' type='checkbox' value='".$prow['asignacionId']."'>".$prow['concepto']." <br> 
          </div>
                    ";
                   }
              
                ?>
               
      </div>
      <div class="deduccion">
                <h5><b>Deducciones</b></h5>
                <?php
                  $sql = "SELECT * FROM deducciones";
                  $query = $conn->query($sql);
                   while($prow = $query->fetch_assoc()){

                    echo "
          <div id='".$prow['deduccionId']."'>    
          <input id='deduccion' name='".$prow['deduccionId']."' type='checkbox' value='".$prow['deduccionId']."'>".$prow['concepto']."<br>
          </div>
                    ";
                   }
                ?>     
      </div>
  </div>
<div id="resultado"></div>

<div class="block-five">
      <div class="modal-footer">

      <button style="display: none;" type="submit" id="guardar" class="btn btn-primary btn-flat" name="guardar"><i class="fa fa-save"></i> Guardar</button>

      <button style="display: none;" type="button" id="cargar" class="btn btn-success btn-flat" name="add"><i class="fa fa-calculator"></i> Calcular</button>

      <a class="btn btn-primary btn-flat" id="filtro" href="#"><i class="fa fa-list-ul"></i> Listar</a>

      </form>

      </div>
</div>
<script type="text/javascript">
  $("#search").click(function() {
        $('.block-four').show();
        $('#search').css('display','none');
    });

  $("#filtro").click(function() {
        $('.block-four').show();
        $('#filtro').css('display','none');
        $('#cargar').attr('disabled',false);
        
    });

$("#filtro").click(function() {
    $('div[id="0001"]').css('display','none');
});

//Validar que se seleccionen las 4 deducciones ley
  $("#filtro").click(function() {
    $('input[name="5001"]').attr('checked','true');
        $('input[name="5002"]').attr('checked','true');
        $('input[name="5003"]').attr('checked','true');
        $('input[name="5004"]').attr('checked','true');
    });

//Valido que si no tiene hijos deshabilite la opcion
  $("#filtro").click(function() {
    if ($('input[name="hijos"]').val() == 0) {
        $('div[id="0005"]').css('display','none');
      }
    else {
        $('input[name="0005"]').attr('checked','true');
    }
    });
//Validar antiguedad segun años
  $("#filtro").click(function() {
    if ($('input[name="anos"]').val() <= 5) {
        $('input[name="0301"]').attr('checked','true');
        $('div[id="0302"]').css('display','none');
        $('div[id="0303"]').css('display','none');
        $('div[id="0304"]').css('display','none');
        $('div[id="0305"]').css('display','none');
    } 

    if ($('input[name="anos"]').val() >= 6 && $('input[name="anos"]').val() <= 10 ) {
        $('input[name="0302"]').attr('checked','true');
        $('div[id="0301"]').css('display','none');
        $('div[id="0303"]').css('display','none');
        $('div[id="0304"]').css('display','none');
        $('div[id="0305"]').css('display','none');
    } 

    if ($('input[name="anos"]').val() >= 11 && $('input[name="anos"]').val() <= 15 ) {
        $('input[name="0303"]').attr('checked','true');
        $('div[id="0301"]').css('display','none');
        $('div[id="0302"]').css('display','none');
        $('div[id="0304"]').css('display','none');
        $('div[id="0305"]').css('display','none');
    } 

    if ($('input[name="anos"]').val() >= 16 && $('input[name="anos"]').val() <= 20 ) {
        $('input[name="0304"]').attr('checked','true');
        $('div[id="0301"]').css('display','none');
        $('div[id="0302"]').css('display','none');
        $('div[id="0303"]').css('display','none');
        $('div[id="0305"]').css('display','none');
    } 

    if ($('input[name="anos"]').val() >= 21) {
        $('input[name="0305"]').attr('checked','true');
        $('div[id="0301"]').css('display','none');
        $('div[id="0302"]').css('display','none');
        $('div[id="0303"]').css('display','none');
        $('div[id="0304"]').css('display','none');
    } 
  });
  
//Validar profesionalizacion
  $("#filtro").click(function() {
    if ($('input[name="nivel_instruccion"]').val() == "BI" || $('input[name="nivel_instruccion"]').val() == "BII" || $('input[name="nivel_instruccion"]').val() == "BIII")
    {
      $('div[id="0401"]').css('display','none');
      $('div[id="0402"]').css('display','none');
      $('div[id="0403"]').css('display','none');
      $('div[id="0404"]').css('display','none');
    } 

    if ($('input[name="nivel_instruccion"]').val() == "TI") {
      $('input[name="0401"]').attr('checked','true');
      $('div[id="0402"]').css('display','none');
      $('div[id="0403"]').css('display','none');
      $('div[id="0404"]').css('display','none');
  }

  if ($('input[name="nivel_instruccion"]').val() == "TII") {
      $('input[name="0401"]').attr('checked','true');
      $('div[id="0402"]').css('display','none');
      $('div[id="0403"]').css('display','none');
      $('div[id="0404"]').css('display','none');
  }

  if ($('input[name="nivel_instruccion"]').val() == "PI") {
      $('input[name="0402"]').attr('checked','true');
      $('div[id="0401"]').css('display','none');
      $('div[id="0403"]').css('display','none');
      $('div[id="0404"]').css('display','none');
  }

  if ($('input[name="nivel_instruccion"]').val() == "PII") {
      $('input[name="0403"]').attr('checked','true');
      $('div[id="0401"]').css('display','none');
      $('div[id="0402"]').css('display','none');
      $('div[id="0404"]').css('display','none');
  }

  if ($('input[name="nivel_instruccion"]').val() == "PIII") {
      $('input[name="0404"]').attr('checked','true');
      $('div[id="0401"]').css('display','none');
      $('div[id="0402"]').css('display','none');
      $('div[id="0403"]').css('display','none');
  }
});
//Validar compensacion y compensacion por evaluacion
  $("#filtro").click(function() {
    $('input[name="0601"]').attr('checked','true');
    $('input[name="0701"]').attr('checked','true');
  });

  $("#filtro").click(function() {

  //Validar Sistema publico nacional
  $('input[name="0501"]').attr('checked','true');
  //Validar COMPLEMENTO ESPECIAL DE EST. ECONÓMICA
  $('input[name="0801"]').attr('checked','true');
  //Validar para el escalafon
  if ($('select[name="tipo"]').val() >= 4) {
  $('input[name="0901"]').attr('checked','true');
    }
  else {
    $('div[id="0901"]').css('display','none');
  }
  });

  function diasDelMesYAñoActual() {
  var fecha = new Date();
  return new Date(fecha.getFullYear(), fecha.getMonth() + 1, 0).getDate();
  }
  //Validar para dia adicional
  $("#filtro").click(function() {
  if (diasDelMesYAñoActual() == 31) {
    $('input[name="0004"]').attr('checked','true');
  }
  else {
    $('div[id="0004"]').css('display','none');
  }
  });

  $("#filtro").click(function() {
      $('#search').css('display','none');
      $('#codigoRac').attr('disabled', true);
      $('#cargar').css('display','inline-block');
  });

  $("#cargar").click(function() {
  if ($('input[id=asignacion]:checked').length === 0 || $('input[id=deduccion]:checked').length === 0) {
    e.preventDefault();
    alert('Debe seleccionar al menos una asignacion y una deduccion');
    }
  });

//Ingresar compensaciones
  $("#cargar").click(function(e) {
  if ($("input[name='0601']").attr("checked") && $("input[name='0701']").attr("checked")) {

    var compensacion = parseFloat(prompt("Por favor, ingresar el monto correspondiente a la Compensación"));

    if (isNaN(compensacion) == true)  {
      alert("Debe Ingresar un monto");
      preventDefault();
    }

    var compensacione = parseFloat(prompt("Por favor, ingresar el monto correspondiente a la Compensación por Evaluación"));


    if (isNaN(compensacione) == true){
      alert("Debe Ingresar un monto");
      preventDefault();
    }
  
  $('input[name="compensacion"]').val(compensacion);
  $('input[name="compensacione"]').val(compensacione);

    }  
  });

//Ingresar numero de guardias
  $("#cargar").click(function(e) {
  if ($("input[name='0101']:checked").length > 0) {

    var guardianocturna = parseInt(prompt("Por favor, ingresar el numero de guardias realizadas por el trabajador."));

    if (isNaN(guardianocturna) == true)  {
      alert("Debe Ingresar un numero");
      preventDefault();
    }
  
  $('input[name="guardianocturna"]').val(guardianocturna);
    }  
  });

//Ingresar numero de domingos o feriados diurnos
  $("#cargar").click(function(e) {
  if ($("input[name='0002']:checked").length > 0) {

    var domingoferdiur = parseInt(prompt("Por favor, ingresar el numero de Domingos y/o Feriados Diurnos."));

    if (isNaN(domingoferdiur) == true)  {
      alert("Debe Ingresar un numero");
      preventDefault();
    }
  
  $('input[name="domingoferdiur"]').val(domingoferdiur);

  }
  });

//Ingresar numero de domingos o feriados nocturnos
  $("#cargar").click(function(e) {
  if ($("input[name='0003']:checked").length > 0) {

    var domingofernoc = parseInt(prompt("Por favor, ingresar el numero de Domingos y/o Feriados Nocturnos."));

    if (isNaN(domingofernoc) == true)  {
      alert("Debe Ingresar un numero");
      preventDefault();
    }
  
  $('input[name="domingofernoc"]').val(domingofernoc);

  }
  });

//Mostrar los montos ya calculados
  $(function(){
  $("#cargar").click(function() {
    var url="payroll_calc_assignment.php";
    $.ajax({
    type: 'POST',
    url:url,
    data: $("#formulario").serialize(),
    success: function(data) {
    $("#resultado").html(data);

        }
     });
    });
  });

  $("#cargar").click(function() {
      $('#cargar').css('display','none');
      $('#guardar').css('display','inline-block');
      $('.block-four').hide();
  });
</script>