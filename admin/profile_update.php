<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nivel = $_POST['nivel'];
		$tipo = $_POST['tipo'];
		$photo = $_FILES['photo']['name'];
		if($curr_password == $user['password']){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}

			$sql = "UPDATE usuarios SET username = '$username', password = '$password', nivel = '$nivel', tipo = '$tipo', photo = '$filename' WHERE username = '".$user['username']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Datos de Usuario actualizados';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Contraseña Incorrecta';
		}
	}
	else{
		$_SESSION['error'] = 'Ingrese los datos requeridos primero';
	}

	header('location:'.$return);

?>