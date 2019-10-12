<?php
	$conn = new mysqli('localhost', 'root', '', 'bdsalud');

	if ($conn->connect_error) {
	    die("Conexión Fallida: " . $conn->connect_error);
	}
	
?>