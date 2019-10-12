<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM ubicacion INNER JOIN institucion ON institucion.institucionId=ubicacion.institucionId INNER JOIN distrito ON distrito.distritoId=ubicacion.distritoId INNER JOIN departamento ON departamento.departamentoId=ubicacion.departamentoId INNER JOIN area_laboral1 ON area_laboral1.laboral1Id=ubicacion.laboral1Id INNER JOIN area_laboral2 ON area_laboral2.laboral2Id=ubicacion.laboral2Id WHERE ubicacionId = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>