<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$cargoId = $_POST['cargoId'];
		$nombreCargo = $_POST['nombreCargo'];
		$grado = $_POST['grado'];
		$nivel = $_POST['nivel'];
		$salario = $_POST['salario'];

$sql_search = "SELECT * FROM cargos WHERE cargoId = '$cargoId'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

$_SESSION['error'] = 'Ya existe un cargo registrado con el mismo identificador';

}

else {

		$sql = "INSERT INTO cargos (cargoId, nombreCargo, grado, nivel_instruccion, salario ) VALUES ('$cargoId', UPPER('$nombreCargo'), '$grado', UPPER('$nivel'), '$salario')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cargo Agregado con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
}	
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location: position.php');

?>