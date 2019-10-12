<?php 

function fechaguardar($fech)

			{
         //formato fecha dia mes año
         $fecha=date("Y-m-d",strtotime($fech));
         //El nuevo valor de la variable: $fecha="Año,mes,dia"
    return $fecha;
   			 }


 
function fechaVer($fech)

			{
	//recibe formato fecha Año,mes,dia
	$fecha=date("d-m-Y",strtotime($fech));
	//devuelve formato dia mes año
	return $fecha;

			 }

 ?>