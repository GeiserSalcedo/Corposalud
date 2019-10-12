<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['codigoRac_delete'];
		$mes = $_POST['mes_delete'];
		$ano = $_POST['ano_delete'];
		
$sql_asig = "DELETE FROM asigna_empleado WHERE codigoRac = '$id' AND mes = '$mes' AND ano = '$ano'";

$sql_deduc = "DELETE FROM deduc_empleado WHERE codigoRac = '$id' AND mes = '$mes' AND ano = '$ano'";

$sql_nom = "DELETE FROM nomina WHERE codigoRac = '$id' AND mes = '$mes' AND ano = '$ano'";


		if($conn->query($sql_asig) && $conn->query($sql_deduc) && $conn->query($sql_nom)){
			$_SESSION['success'] = 'Nomina Borrada con Exito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccione un elemento para eliminar';
	}

	header('location: payroll.php');
	
?>