<?php 
	include 'includes/session.php';
	
		$codigoRac = $_POST['codigoRac_view'];
		$mes = $_POST['mes'];
		$ano = $_POST['ano'];
		$sql_asig = "SELECT * FROM asigna_empleado INNER JOIN asignaciones ON asignaciones.asignacionId=asigna_empleado.asignacionId WHERE codigoRac = '$codigoRac' AND mes = '$mes' AND ano = '$ano' AND monto != '0'";
		$query_asig = $conn->query($sql_asig);


        $sql_deduc = "SELECT * FROM deduc_empleado INNER JOIN deducciones ON deducciones.deduccionId=deduc_empleado.deduccionId WHERE codigoRac = '$codigoRac' AND mes = '$mes' AND ano = '$ano' AND monto != '0'";
        $query_deduc = $conn->query($sql_deduc);


        $sql_nom = "SELECT * FROM nomina WHERE codigoRac = '$codigoRac' AND mes = '$mes' AND ano = '$ano'";
        $query_nom = $conn->query($sql_nom);
        $row_nom = $query_nom->fetch_assoc();

        if($query_asig->num_rows > 0 && $query_deduc->num_rows > 0 && $query_nom->num_rows > 0) {



?>

<div id="view_asignaciones">
<?php
		while ($row_asig = $query_asig->fetch_assoc()) {
	
?>	
	
<ul>
    <li>
    	<label><?php echo $row_asig['concepto'] ?></label>
        <input type='text' value='<?php echo $row_asig['monto'] ?>' readonly>
    </li>
</ul>
<?php } ?>	
<ul>
    <li>
        <label>Total Percibido:</label>
        <input type='text' id="totalasig" value='<?php echo $row_nom['percibido'] ?>' readonly>
    </li>
</ul>
</div>

<div id="view_deducciones">    
<?php
		while ($row_deduc = $query_deduc->fetch_assoc()) {
?>	
<ul>
    <li>
    	<label><?php echo $row_deduc['concepto'] ?></label>
        <input type='text' value='<?php echo $row_deduc['monto'] ?>' readonly>
    </li>
</ul>
<?php } ?>
<ul>
    <li>
        <label>Total Deducido:</label>
        <input type='text' id="totaldeduc" value='<?php echo $row_nom['deducido'] ?>' readonly>
    </li>
</ul>
</div>

<div id="view_nom">	
		<label>Total Cobrado:</label>
        <input type='text' value='<?php echo $row_nom['total'] ?>' readonly>
</div>

<?php } 
else { ?>

<span>No hay registros para este trabajador en el periodo seleccionado</span>

<?php } ?>