<?php
	include 'includes/session.php';

	if(isset($_POST['guardar'])){
		$codigoRac = $_POST['codigoRac'];
		//Asignaciones ya con los montos
		$salario = $_POST['salario'];
		$montoprimahijo = $_POST['montoprimahijo'];
		$valorprimeco = $_POST['valorprimeco'];
		$valorprimcomp = $_POST['valorprimcomp'];
		$valorprimcompe = $_POST['valorprimcompe'];
		$valorprimsns = $_POST['valorprimsns'];
		$valorprimaanti = $_POST['valorprimaanti'];
		$primanti = $_POST['primanti'];
		$valorprimprof = $_POST['valorprimprof'];
		$primprof = $_POST['primprof'];

		$valorprimnocfijo = $_POST['valorprimnocfijo'];
		$valorprimguarnoc = $_POST['valorprimguarnoc'];
		$valorprimdomferdiur = $_POST['valorprimdomferdiur'];
		$valorprimdomfernoc = $_POST['valorprimdomfernoc'];
		$valorprimdiaadd = $_POST['valorprimdiaadd'];
		$valorprimescala = $_POST['valorprimescala'];

		//total Asignaciones
		$total_asignaciones = $_POST['total_asignaciones'];
		//Deducciones ya con los montos
		$valorivss = $_POST['valorivss'];
		$valorfaov = $_POST['valorfaov'];
		$valorrpe = $_POST['valorrpe'];
		$valorfpj = $_POST['valorfpj'];
		//total Deducciones
		$total_deducciones = $_POST['total_deducciones'];
		//Periodo
		$mes = $_POST['mes'];
		$ano = $_POST['ano'];
		$total = $_POST['total'];

		$fecha_actual=date("Y/m/d");

$sql_asignaciones = "INSERT INTO asigna_empleado (codigoRac, asignacionId, mes, ano, monto) VALUES ('$codigoRac', '0001', '$mes', '$ano', '$salario'), ('$codigoRac', '0005', '$mes', '$ano', '$montoprimahijo'), ('$codigoRac', '0801', '$mes', '$ano', '$valorprimeco'), ('$codigoRac', '0601', '$mes', '$ano', '$valorprimcomp'), ('$codigoRac', '0701', '$mes', '$ano', '$valorprimcompe'), ('$codigoRac', '0501', '$mes', '$ano', '$valorprimsns'), ('$codigoRac', '$primanti', '$mes', '$ano', '$valorprimaanti'), ('$codigoRac', '$primprof', '$mes', '$ano', '$valorprimprof'), ('$codigoRac', '0201', '$mes', '$ano', '$valorprimnocfijo'), ('$codigoRac', '0101', '$mes', '$ano', '$valorprimguarnoc'), ('$codigoRac', '0002', '$mes', '$ano', '$valorprimdomferdiur'), ('$codigoRac', '0003', '$mes', '$ano', '$valorprimdomfernoc'), ('$codigoRac', '0004', '$mes', '$ano', '$valorprimdiaadd'), ('$codigoRac', '0901', '$mes', '$ano', '$valorprimescala')";

$sql_deducciones = "INSERT INTO deduc_empleado (codigoRac, deduccionId, mes, ano, monto) VALUES ('$codigoRac', '5001', '$mes', '$ano', '$valorivss'), ('$codigoRac', '5002', '$mes', '$ano', '$valorfaov'), ('$codigoRac', '5003', '$mes', '$ano', '$valorrpe'), ('$codigoRac', '5004', '$mes', '$ano', '$valorfpj')";

$sql_nomina ="INSERT INTO nomina (codigoRac, percibido, deducido, mes, ano, fecha,total) VALUES ('$codigoRac', '$total_asignaciones', '$total_deducciones', '$mes', '$ano', '$fecha_actual', '$total')";

$sql_consulta = "SELECT * FROM nomina WHERE codigoRac = '$codigoRac' AND mes = '$mes' AND ano = '$ano'";
	
	$query_consulta = $conn->query($sql_consulta);

	if($query_consulta->num_rows > 0 ) {
		$_SESSION['error'] = 'Ya existe una nomina guardada para este trabajador en este periodo';
		header('location: payroll.php');
	}

	else {
		if($conn->query($sql_asignaciones) && $conn->query($sql_deducciones) && $conn->query($sql_nomina)){
			$_SESSION['success'] = 'Nomina del trabajador guardada correctamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		} 
	}	
}


	else{
		$_SESSION['error'] = 'Verifique los datos Ingresados';
	}

	header('location: payroll.php');

?>