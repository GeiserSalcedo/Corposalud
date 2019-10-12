<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, empleados.codigoRac AS empid FROM empleados LEFT JOIN cargos ON cargos.cargoId=empleados.cargoId LEFT JOIN ubicacion ON ubicacion.ubicacionId=empleados.ubicacionId LEFT JOIN estatus ON estatus.estatusId=empleados.estatusId LEFT JOIN nivel_instruccion ON nivel_instruccion.nivelId=empleados.nivel_instruccion WHERE empleados.codigoRac = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>