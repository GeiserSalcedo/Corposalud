<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$estatusId = $_POST['estatusId'];
		$tipo = $_POST['tipo'];

$sql_search = "SELECT * FROM estatus WHERE estatusId = '$estatusId'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

$_SESSION['error'] = 'Ya existe un registro con el mismo identificador';

}

else {

		$sql = "INSERT INTO estatus (estatusId, tipo ) VALUES ('$estatusId', UPPER('$tipo'))";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Nivel Agregado con Éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
}	
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location: status.php');

?>