<?php
	include 'includes/session.php';

	if(isset($_POST['edit_inst'])){
		$id = $_POST['id'];
		$institucionId = $_POST['institucionId'];
		$nombre = $_POST['nombre'];

		$sql = "UPDATE institucion SET institucionId = '$institucionId', nombre_institucion = UPPER('$nombre') WHERE institucionId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Institución Actualizada con Éxito';
			header('location:institution.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location:institution.php');
		}
	}


	if(isset($_POST['edit_dist'])){
		$id = $_POST['id'];
		$distritoId = $_POST['distritoId'];
		$nombre = $_POST['nombre'];

		$sql = "UPDATE distrito SET distritoId = '$distritoId', nombre_distrito = UPPER('$nombre') WHERE distritoId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Distrito Actualizado con Éxito';
			header('location:district.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location:district.php');
		}
	}

	if(isset($_POST['edit_depar'])){
		$id = $_POST['id'];
		$departamentoId = $_POST['departamentoId'];
		$nombre = $_POST['nombre'];

		$sql = "UPDATE departamento SET departamentoId = '$departamentoId', nombre_depart = UPPER('$nombre') WHERE departamentoId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Departamento Actualizado con Éxito';
			header('location:departament.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location:departament.php');
		}
	}

	if(isset($_POST['edit_area1'])){
		$id = $_POST['id'];
		$laboral1Id = $_POST['laboral1Id'];
		$nombre = $_POST['nombre'];

		$sql = "UPDATE area_laboral1 SET laboral1Id = '$laboral1Id', nombre_area1 = UPPER('$nombre') WHERE laboral1Id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Area Laboral Actualizada con Éxito';
			header('location:area1.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location:area1.php');
		}
	}

	if(isset($_POST['edit_area2'])){
		$id = $_POST['id'];
		$laboral2Id = $_POST['laboral2Id'];
		$nombre = $_POST['nombre'];

		$sql = "UPDATE area_laboral2 SET laboral2Id = '$laboral2Id', nombre_area2 = UPPER('$nombre') WHERE laboral2Id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Area Laboral Actualizada con Éxito';
			header('location:area2.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location:area2.php');
		}
	}
	
?>