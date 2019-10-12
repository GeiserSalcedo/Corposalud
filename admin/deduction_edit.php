<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$deduccionId = $_POST['deduccionId'];
		$concepto = $_POST['concepto'];
		$frecuencia = $_POST['frecuencia'];
		$valor = $_POST['valor'];

		$sql = "UPDATE deducciones SET deduccionId = '$deduccionId', concepto = UPPER('$concepto'), frecuencia = UPPER('$frecuencia'), valor = '$valor' WHERE deduccionId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Deducción Actualizada con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location:deduction.php');

?>