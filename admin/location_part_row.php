<?php 
	include 'includes/session.php';

	if(isset($_POST['inst'])){
		$id = $_POST['inst'];
		$sql = "SELECT * FROM institucion WHERE institucionId = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}

	if(isset($_POST['dist'])){
		$id = $_POST['dist'];
		$sql = "SELECT * FROM distrito WHERE distritoId = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}

	if(isset($_POST['depar'])){
		$id = $_POST['depar'];
		$sql = "SELECT * FROM departamento WHERE departamentoId = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}

	if(isset($_POST['area1'])){
		$id = $_POST['area1'];
		$sql = "SELECT * FROM area_laboral1 WHERE laboral1Id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}

	if(isset($_POST['area2'])){
		$id = $_POST['area2'];
		$sql = "SELECT * FROM area_laboral2 WHERE laboral2Id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>