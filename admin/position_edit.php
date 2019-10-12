<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$cargoId = $_POST['cargoId'];
		$nombreCargo = $_POST['nombreCargo'];
		$grado = $_POST['grado'];
		$nivel = $_POST['nivel'];
		$salario = $_POST['salario'];


		$sql = "UPDATE cargos SET cargoId = '$cargoId', nombreCargo = UPPER('$nombreCargo'), grado = '$grado', nivel_instruccion = UPPER('$nivel'), salario = '$salario' WHERE cargoId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cargo Actualizado con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location:position.php');

?>