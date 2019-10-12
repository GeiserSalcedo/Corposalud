<?php
	include 'includes/session.php';

	if(isset($_POST['delete_inst'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM institucion WHERE institucionId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Institución Borrada con Exito';
			header('location: institution.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location: institution.php');
		}		
	}

	
	if(isset($_POST['delete_dist'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM distrito WHERE distritoId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Distrito Borrado con Exito';
			header('location: district.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location: district.php');

		}	
	}

	if(isset($_POST['delete_depar'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM departamento WHERE departamentoId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Departamento Borrado con Exito';
			header('location: departament.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location: departament.php');

		}	
	}

	if(isset($_POST['delete_area1'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM area_laboral1 WHERE laboral1Id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Area Laboral Borrada con Exito';
			header('location: area1.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location: area1.php');

		}	
	}

	if(isset($_POST['delete_area2'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM area_laboral2 WHERE laboral2Id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Area Laboral Borrada con Exito';
			header('location: area2.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location: area2.php');

		}	
	}
?>