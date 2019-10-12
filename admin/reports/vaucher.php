<?php 

include "../../conn.php";

include "../functions/funciones.php";

include "../functions/formatofecha.php";

require "../../bower_components/fpdf/fpdf.php";

$cedula=$_REQUEST['cedula_pdf'];
$codigoRac=$_REQUEST['codigoRac_pdf'];
$mes=$_REQUEST['mes_pdf'];
$ano=$_REQUEST['ano_pdf'];


$sql_datos = "SELECT * FROM empleados INNER JOIN nomina ON nomina.codigoRac=empleados.codigoRac INNER JOIN cargos ON cargos.cargoId=empleados.cargoId INNER JOIN estatus ON estatus.estatusId=empleados.estatusId INNER JOIN ubicacion ON ubicacion.ubicacionId=empleados.ubicacionId INNER JOIN institucion ON institucion.institucionId=ubicacion.institucionId INNER JOIN distrito ON distrito.distritoId=ubicacion.distritoId INNER JOIN departamento ON departamento.departamentoId=ubicacion.departamentoId INNER JOIN area_laboral1 ON area_laboral1.laboral1Id=ubicacion.laboral1Id INNER JOIN area_laboral2 ON area_laboral2.laboral2Id=ubicacion.laboral2Id WHERE cedula = '$cedula'";

$query_datos = $conn->query($sql_datos);
$filadatos = $query_datos->fetch_assoc();


$sql_nomina = "SELECT * FROM nomina WHERE codigoRac = '$codigoRac' AND mes = '$mes' AND ano = '$ano'";

$query_nomina = $conn->query($sql_nomina);
$filanomina = $query_nomina->fetch_assoc();


$sql_asig = "SELECT * FROM asignaciones INNER JOIN asigna_empleado ON asigna_empleado.asignacionId=asignaciones.asignacionId WHERE codigoRac = '$codigoRac' AND mes = '$mes' AND ano = '$ano' AND monto != '0'";

$sql_deduc = "SELECT * FROM deducciones INNER JOIN deduc_empleado ON deduc_empleado.deduccionId=deducciones.deduccionId WHERE codigoRac = '$codigoRac' AND mes = '$mes' AND ano = '$ano' AND monto != '0'";


$query_asig = $conn->query($sql_asig);
$query_deduc = $conn->query($sql_deduc);


class PDF extends FPDF

{
	//cabecera
	function Header()
	{
		include "../../conn.php";

		$codigoRac=$_REQUEST['codigoRac_pdf'];
		$cedula=$_REQUEST['cedula_pdf'];
		$mes=$_REQUEST['mes_pdf'];
		$ano=$_REQUEST['ano_pdf'];

		$sql_datos = "SELECT * FROM empleados INNER JOIN nomina ON nomina.codigoRac=empleados.codigoRac INNER JOIN cargos ON cargos.cargoId=empleados.cargoId INNER JOIN estatus ON estatus.estatusId=empleados.estatusId INNER JOIN ubicacion ON ubicacion.ubicacionId=empleados.ubicacionId INNER JOIN institucion ON institucion.institucionId=ubicacion.institucionId INNER JOIN distrito ON distrito.distritoId=ubicacion.distritoId INNER JOIN departamento ON departamento.departamentoId=ubicacion.departamentoId INNER JOIN area_laboral1 ON area_laboral1.laboral1Id=ubicacion.laboral1Id INNER JOIN area_laboral2 ON area_laboral2.laboral2Id=ubicacion.laboral2Id WHERE cedula = '$cedula'";
		$query_datos = $conn->query($sql_datos);
		$filadatos = $query_datos->fetch_assoc();



		
		$this->SetFont('Times','',9);
		$this->Cell(80,5,utf8_decode('CORPORACIÓN DE SALUD DEL ESTADO MERIDA'),0,0,'L');
		$this->Cell(0,5,fechaVer($filadatos['fecha']),0,1,'R');
		$this->Cell(80,5,utf8_decode('COORDINACIÓN DE NOMINA'),0,0,'C');
		$this->Ln();
		$this->SetFont('Times','I',9); 
		$this->Cell(18,5,$filadatos['ubicacionId'],0,1,'L');
		$this->SetFont('Times','',9);
		$this->Cell(18,5,utf8_decode($filadatos['nombre_institucion']),0,0,'L');
		$this->Cell(0,5,utf8_decode('NOMINA DE PAGO'),0,1,'C');
		$this->Cell(100,5,$filadatos['nombre_area1'],0,0,'L');
	$this->Cell(0,5,utf8_decode('SALARIO ').$filadatos['tipo'].utf8_decode(' - CORPORACIÓN'),0,1,'L');
		$this->Cell(100,5,$filadatos['nombre_area2'],0,0,'L');
		$this->SetFont('Times','B',9);
	$this->Cell(0,5,utf8_decode('SALARIO ').$filadatos['tipo'].utf8_decode(' - CORPORACIÓN'),0,1,'L');
	}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTitle('Recibo de pago');

$pdf->SetFont('Times','',5);
$pdf->Line(10, 40 , 270, 40);
$pdf->SetFont('Times','',9);
$pdf->Cell(20,5,utf8_decode('CODIGO'),0,0,'C');
$pdf->Cell(50,5,utf8_decode('APELLIDOS Y NOMBRES'),0,0,'L');
$pdf->Cell(50,5,utf8_decode('CEDULA'),0,0,'C');
$pdf->Cell(50,5,utf8_decode('FECHA INGRESO'),0,0,'C');
$pdf->Cell(0,5,utf8_decode('MONTOS'),0,1,'C');

$pdf->Cell(20,5,utf8_decode('CODIGO-RAC'),0,0,'C');
$pdf->Cell(50,5,utf8_decode('DESCRIPCIÓN DEL CARGO'),0,0,'L');
$pdf->Cell(50,5,utf8_decode('GRADO / COD CARGO'),0,0,'C');
$pdf->Cell(50,5,utf8_decode('SUELDO MAESTRO'),0,0,'C');
$pdf->Cell(80,5,utf8_decode('ASIGNACIÓNES   DEDUCCIONES'),0,0,'C');
$pdf->SetFont('Times','I',9);
$pdf->Cell(0,5,utf8_decode('FIRMA'),0,1,'L');
$pdf->Line(10, 50 , 270, 50);

$pdf->SetFont('Times','',9);
$pdf->Cell(0,5,$filadatos['nombre_area2'],0,1,'L');

$pdf->Cell(20,5,$filadatos['codigoRac'],0,0,'L');
$pdf->Cell(50,5,utf8_decode($filadatos['apellido']." ".$filadatos['nombre']),0,0,'L');
$pdf->Cell(50,5,$filadatos['cedula'],0,0,'C');
$pdf->Cell(50,5,fechaVer($filadatos['fechaInicio']),0,1,'C');

$pdf->Cell(20,5,$filadatos['codigoRac'],0,0,'L');
$pdf->Cell(50,5,utf8_decode($filadatos['nombreCargo']),0,0,'L');
$pdf->Cell(20,5,$filadatos['grado'],0,0,'C');
$pdf->Cell(30,5,$filadatos['cargoId'],0,0,'C');
$pdf->Cell(50,5,formato($filadatos['salario']),0,1,'C');
$pdf->Ln(); 

//asignaciones y deducciones con los montos

while ($filaasig = $query_asig->fetch_assoc()) {
	$pdf->Cell(45,5,$filaasig['asignacionId'],0,0,'R');
	$pdf->Cell(15,5,"",0,0,'L');
	$pdf->Cell(60,5,utf8_decode($filaasig['concepto']),0,0,'L');
	$pdf->Cell(90,5,formato($filaasig['monto']),0,1,'R');
}

while ($filadeduc = $query_deduc->fetch_assoc()) {
	$pdf->Cell(45,5,$filadeduc['deduccionId'],0,0,'R');
	$pdf->Cell(15,5,"",0,0,'L');
	$pdf->Cell(60,5,utf8_decode($filadeduc['concepto']),0,0,'L');
	$pdf->Cell(115,5,formato($filadeduc['monto']),0,1,'R');
}
//total de nomina
$pdf->Cell(160,5,utf8_decode('TOTAL CONCEPTOS:'),0,0,'R');
$pdf->Cell(50,5,formato($filanomina['percibido']),0,0,'R');
$pdf->Cell(25,5,formato($filanomina['deducido']),0,1,'R');


$pdf->Cell(180,5,utf8_decode('NETO A COBRAR:'),0,0,'R');
$pdf->Cell(40,5,formato($filanomina['total']),0,0,'R');
$pdf->Cell(15,5,"",0,0,'R');
$pdf->SetFont('Times','',7);
$pdf->Cell(0,2.5,utf8_decode($filadatos['apellido']),0,2,'C');
$pdf->Cell(0,2.5,utf8_decode($filadatos['nombre']),0,0,'C');



$pdf->Output('recibo.pdf','I');

 ?>