<?php  

function formateo ($monto) {

$monto = str_replace(".","",$monto);  //borro los separadores de miles, si hay 2690,50
$monto = str_replace(",",".",$monto); //convierto las comas en puntos 2690.50
$monto = bcdiv($monto, '1', 2); //evito redondear el numero con 2 decimales 2690.50
    return $monto;

}

function formato ($monto) {
	$monto = number_format($monto,2,',','.');
		return $monto;
}

function redondear ($valor) {

$valor = number_format($valor,2,'.','');
$valor = bcdiv($valor, '1', 2);
    return $valor;
}

function escalafon ($valor) {
	if ($valor >= 3 && $valor <= 5) {
		$porcentaje = 0.14;
		return $porcentaje;	
	}
	else if ($valor >= 6 && $valor <= 8) {
		$porcentaje = 0.21;
		return $porcentaje;	
	}

	else if ($valor >= 9 && $valor <= 11) {
		$porcentaje = 0.28;
		return $porcentaje;	
	}

	else if ($valor >= 12 && $valor <= 14) {
		$porcentaje = 0.35;
		return $porcentaje;	
	}

	else if ($valor >= 15 && $valor <= 17) {
		$porcentaje = 0.42;
		return $porcentaje;	
	}

	else if ($valor >= 18 && $valor <= 20) {
		$porcentaje = 0.49;
		return $porcentaje;	
	}

	else if ($valor >= 21 && $valor <= 23) {
		$porcentaje = 0.56;
		return $porcentaje;	
	}

	else if ($valor >= 24 && $valor <= 26) {
		$porcentaje = 0.63;
		return $porcentaje;	
	}

	else if ($valor >= 27 && $valor <= 29) {
		$porcentaje = 0.70;
		return $porcentaje;	
	}

	else if ($valor >= 30 && $valor <= 32) {
		$porcentaje = 0.77;
		return $porcentaje;	
	}

	else if ($valor >= 33) {
		$porcentaje = 0.84;
		return $porcentaje;	
	}
}

?>
