<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$mes = $_POST['mes'];
		$sql = "SELECT * FROM nomina WHERE codigoRac = '$id' AND mes = '$mes'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>