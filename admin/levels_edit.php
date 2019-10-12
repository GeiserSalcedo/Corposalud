<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$nivelId = $_POST['nivelId'];
		$concepto = $_POST['concepto'];

		$sql = "UPDATE nivel_instruccion SET nivelId = UPPER('$nivelId'), concepto = UPPER('$concepto') WHERE nivelId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Nivel de Instrucción Actualizado con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location:levels.php');

?>