<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$institucion = $_POST['institucion'];
		$distrito = $_POST['distrito'];
		$departamento = $_POST['departamento'];
		$area1 = $_POST['area1'];
		$area2 = $_POST['area2'];
		$ubicacionId = $institucion.$distrito.$departamento.$area1.$area2;

$sql = "UPDATE ubicacion SET ubicacionId = '$ubicacionId', institucionId = '$institucion', distritoId = '$distrito', departamentoId = '$departamento', laboral1Id = '$area1', laboral2Id = '$area2' WHERE ubicacionId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Ubicacion Actualizada con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location:location.php');

?>