<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$nivelId = $_POST['nivelId'];
		$concepto = $_POST['concepto'];

$sql_search = "SELECT * FROM nivel_instruccion WHERE nivelId = '$nivelId'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

	$_SESSION['error'] = 'Ya existe un nivel de Instrucción registrado con el mismo identificador';
}

else {
		$sql = "INSERT INTO nivel_instruccion (nivelId, concepto) VALUES (UPPER('$nivelId'), UPPER('$concepto'))";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Nivel de Instruccion Agregado con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
}	
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location: levels.php');

?>