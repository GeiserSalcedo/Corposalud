<?php
	session_start();
	include '../includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
		$query = $conn->query($sql);

	if($query->num_rows > 0){

			$row = $query->fetch_assoc();

			if ($row['nivel'] == "Admin") {

				$_SESSION['admin'] = $row['username'];

				header('location: ../home.php');

			}

			else if ($row['nivel'] != "Admin") {

				$_SESSION['user'] = $row['username'];

				header('location: ../home.php');

			}
}

	else 	{
	$_SESSION['error'] = 'Usuario o Contraseña Incorrecta';
	header('location: ../index.php');
	}
		}
		
else{
		$_SESSION['error'] = 'Ingrese sus credenciales';
	}

?>