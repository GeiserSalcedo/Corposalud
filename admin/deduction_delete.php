<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM deducciones WHERE deduccionId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Deducción Borrada con Exito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccione un elemento para eliminar';
	}

	header('location: deduction.php');
	
?>