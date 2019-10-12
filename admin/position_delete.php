<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM cargos WHERE cargoId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cargo Borrado con Exito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccione un elemento para eliminar';
	}

	header('location: position.php');
	
?>