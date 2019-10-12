<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$institucion = $_POST['institucion'];
		$distrito = $_POST['distrito'];
		$departamento = $_POST['departamento'];
		$area1 = $_POST['area1'];
		$area2 = $_POST['area2'];
		$ubicacionId = $institucion.$distrito.$departamento.$area1.$area2;

$sql_search = "SELECT * FROM ubicacion WHERE ubicacionId = '$ubicacionId'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

$_SESSION['error'] = 'Ya existe una ubicación registrada con el mismo identificador';

}

else {


		$sql = "INSERT INTO ubicacion (ubicacionId, institucionId, distritoId, departamentoId, laboral1Id, laboral2Id) VALUES ('$ubicacionId', UPPER('$institucion'), UPPER('$distrito'), UPPER('$departamento'), UPPER('$area1'), UPPER('$area2'))";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Ubicación Agregada con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
}	
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location: location.php');

?>