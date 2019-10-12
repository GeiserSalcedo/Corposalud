<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM empleados WHERE codigoRac = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Empleado borrado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Selecciona uno de los empleados primero';
	}

	header('location: employee.php');
	
?>