<?php
	session_start();
	include 'includes/conn.php';

	if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {

		if (isset($_SESSION['user'])) {
		$sql = "SELECT * FROM usuarios WHERE username = '".$_SESSION['user']."'";
		$query = $conn->query($sql);
		$user = $query->fetch_assoc();
		}

		else if(isset($_SESSION['admin'])) {
		$sql = "SELECT * FROM usuarios WHERE username = '".$_SESSION['admin']."'";
		$query = $conn->query($sql);
		$user = $query->fetch_assoc();
		}
	}

	else {
		header('location:index.php');
	}

?>

