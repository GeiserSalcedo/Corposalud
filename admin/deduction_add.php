<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$deduccionId = $_POST['deduccionId'];
		$concepto = $_POST['concepto'];
		$frecuencia = $_POST['frecuencia'];
		$valor = $_POST['valor'];

$sql_search = "SELECT * FROM deducciones WHERE deduccionId = '$deduccionId'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

	$_SESSION['error'] = 'Ya existe una deducción registrada con el mismo identificador';
}

else {
		$sql = "INSERT INTO deducciones (deduccionId, concepto, frecuencia, valor) VALUES ('$deduccionId', UPPER('$concepto'), UPPER('$frecuencia'), '$valor')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Deducción Agregada con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
}
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location: deduction.php');

?>