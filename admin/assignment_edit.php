<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$asignacionId = $_POST['asignacionId'];
		$concepto = $_POST['concepto'];
		$frecuencia = $_POST['frecuencia'];
		$valor = $_POST['valor'];

		$sql = "UPDATE asignaciones SET asignacionId = '$asignacionId', concepto = UPPER('$concepto'), frecuencia = UPPER('$frecuencia'), valor = '$valor' WHERE asignacionId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Asignación Actualizada con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location:assignment.php');

?>