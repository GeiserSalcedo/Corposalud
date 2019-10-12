<?php
	include 'includes/session.php';
 
	if(isset($_POST['add_inst'])){
		$institucionId = $_POST['institucionId'];
		$nombre = $_POST['nombre'];

$sql_search = "SELECT * FROM institucion WHERE institucionId = '$institucionId'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

$_SESSION['error'] = 'Ya existe una institución registrada con el mismo identificador';
header('location: institution.php');
}

else {
		$sql = "INSERT INTO institucion (institucionId, nombre_institucion) VALUES ('$institucionId', UPPER('$nombre'))";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Institución Agregada con Éxito';
			header('location: institution.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location: institution.php');
		}
	}		
}	

	if(isset($_POST['add_dist'])){
		$distritoId = $_POST['distritoId'];
		$nombre = $_POST['nombre'];

$sql_search = "SELECT * FROM distrito WHERE distritoId = '$distritoId'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

$_SESSION['error'] = 'Ya existe un distrito registrado con el mismo identificador';
header('location: district.php');
}

else {


		$sql = "INSERT INTO distrito (distritoId, nombre_distrito) VALUES ('$distritoId', UPPER('$nombre'))";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Distrito Agregado con Éxito';
			header('location: district.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location: district.php');
		}
	}	
}	

	if(isset($_POST['add_depar'])){
		$departamentoId = $_POST['departamentoId'];
		$nombre = $_POST['nombre'];

$sql_search = "SELECT * FROM departamento WHERE departamentoId = '$departamentoId'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

$_SESSION['error'] = 'Ya existe un departamento registrado con el mismo identificador';
header('location: departament.php');
}

else {
		$sql = "INSERT INTO departamento (departamentoId, nombre_depart) VALUES ('$departamentoId', UPPER('$nombre'))";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Departamento Agregado con Éxito';
			header('location: departament.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location: departament.php');
		}
	}	
}	

	if(isset($_POST['add_area1'])){
		$laboral1Id = $_POST['laboral1Id'];
		$nombre = $_POST['nombre'];

$sql_search = "SELECT * FROM area_laboral1 WHERE laboral1Id = '$laboral1Id'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

$_SESSION['error'] = 'Ya existe una area laboral registrada con el mismo identificador';
header('location: area1.php');
}

else {
	
$sql = "INSERT INTO area_laboral1 (laboral1Id, nombre_area1) VALUES ('$laboral1Id', UPPER('$nombre'))";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Area Laboral Agregada con Éxito';
			header('location: area1.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location: area1.php');
		}
	}		
}	

	if(isset($_POST['add_area2'])){
		$laboral2Id = $_POST['laboral2Id'];
		$nombre = $_POST['nombre'];

$sql_search = "SELECT * FROM area_laboral2 WHERE laboral2Id = '$laboral2Id'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

$_SESSION['error'] = 'Ya existe una area laboral registrada con el mismo identificador';
header('location: area2.php');
}

else {
	
		$sql = "INSERT INTO area_laboral2 (laboral2Id, nombre_area2) VALUES ('$laboral2Id', UPPER('$nombre'))";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Area Laboral Agregada con Éxito';
			header('location: area2.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location: area2.php');
		}
	}	
}	
?>