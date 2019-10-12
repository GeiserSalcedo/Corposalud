<?php
	include 'includes/session.php';
	
	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$estatusId = $_POST['estatusId'];
		$tipo = $_POST['tipo'];

		$sql = "UPDATE estatus SET estatusId = '$estatusId', tipo = UPPER('$tipo') WHERE estatusId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Estatus Actualizado con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location:status.php');

?>