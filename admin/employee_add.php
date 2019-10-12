<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$codigorac = $_POST['codigorac'];
		$cedula = $_POST['cedula'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$nivel = $_POST['nivel'];
		$estadocivil = $_POST['estadocivil'];
		$fechanacimiento = $_POST['fechanacimiento'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$fechainicio = $_POST['fechainicio'];
		$fechainicioadm = $_POST['fechainicioadm'];
		$hijos = $_POST['hijos'];
		$cuenta = $_POST['cuenta'];
		$cargos = $_POST['cargos'];
		$ubicacion = $_POST['ubicacion'];
		$tipo = $_POST['tipo'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		list($anio, $mes, $dia) = explode("/",$fechainicioadm); 

			$diaAC=date("j"); 
			$mesAC=date("n"); 
			$anoAC=date("Y"); 

			if (($mes == $mesAC) && ($dia > $diaAC)) 

			{ 

				$anoAC=($anoAC-1); 
			} 
		
			if ($mes > $mesAC) 

			{
 
			 $anoAC=($anoAC-1); 

			} 

			$años=($anoAC-$anio);

$sql_search = "SELECT * FROM empleados WHERE codigoRac = '$codigorac' OR cedula = '$cedula'";
$query_search = $conn->query($sql_search);

if($query_search->num_rows > 0) {

	$_SESSION['error'] = 'Ya existe un registro para este trabajador';
}

else {

		$sql = "INSERT INTO empleados (codigoRac, cedula, nombre, apellido, genero, estadoCivil, fechaNacimiento, direccion, telefono, fechaInicio, fechaInicioAdm, numeroHijos, numeroCuenta, anosServicio, nivel_instruccion, cargoId, ubicacionId, estatusId, photo) VALUES ('$codigorac', '$cedula',UPPER('$firstname'), UPPER('$lastname'), UPPER('$gender'), UPPER('$estadocivil'), '$fechanacimiento', UPPER('$address'), '$contact', '$fechainicio', '$fechainicioadm', '$hijos', '$cuenta', '$años', UPPER('$nivel'), UPPER('$cargos'), UPPER('$ubicacion'), '$tipo', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Trabajador Registrado con Exito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
}
	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location: employee.php');
?>