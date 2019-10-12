<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$asignacionId = $_POST['asignacionId'];
		$concepto = $_POST['concepto'];
		$frecuencia = $_POST['frecuencia'];
		$valor = $_POST['valor'];

$sql_search = "SELECT * FROM asignaciones WHERE asignacionId = '$asignacionId'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

	$_SESSION['error'] = 'Ya existe una asignación registrada con el mismo identificador';
}

else  {

		$sql = "INSERT INTO asignaciones (asignacionId, concepto, frecuencia, valor) VALUES ('$asignacionId', UPPER('$concepto'), UPPER('$frecuencia'), '$valor')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Asignación Agregada con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
}
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location: assignment.php');

?>