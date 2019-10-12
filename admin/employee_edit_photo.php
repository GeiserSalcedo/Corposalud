<?php
	include 'includes/session.php';
 
	if(isset($_POST['upload'])){
		$empid = $_POST['id'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE empleados SET photo = '$filename' WHERE codigoRac = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Foto del trabajador actualizada';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Seleccione un trabajador primero';
	}

	header('location: employee.php');
?>