<?php
	$conn = new mysqli('localhost', 'root', '', 'bdsalud');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>