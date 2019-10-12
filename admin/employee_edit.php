<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
	
		$empid = $_POST['id'];
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
		
$sql = "UPDATE empleados SET codigoRac = '$codigorac', cedula = '$cedula', nombre = UPPER('$firstname'), apellido = UPPER('$lastname'), genero = UPPER('$gender'), estadoCivil = UPPER('$estadocivil'), fechaNacimiento = '$fechanacimiento', direccion = UPPER('$address'), telefono = '$contact', fechaInicio = '$fechainicio', fechaInicioAdm = '$fechainicioadm', numeroHijos = '$hijos', numeroCuenta = '$cuenta', anosServicio = $años, nivel_instruccion=UPPER('$nivel'), cargoId = UPPER('$cargos'), ubicacionId = '$ubicacion', estatusId = UPPER('$tipo') WHERE codigoRac = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Datos del Empleado Actualizados';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Selecciona un Empleado primero para Editar';
	}

	header('location: employee.php');
?>