<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM estatus WHERE estatusId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Estatus Borrado con Exito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccione un elemento para eliminar';
	}

	header('location: status.php');
	
?>