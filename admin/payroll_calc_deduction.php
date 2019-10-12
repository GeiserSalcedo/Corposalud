<div class="valores_deducciones">          
<h5 class="modal-title"><b>Calculo Deducciones</b></h5>

<?php $paradeducciones =  $filaemp['salario'] + $valorprimprof18 + $valorprimprof22 + $valorprimprof26 + $valorprimprof28 + $valorprimaanti05 + $valorprimaanti610 + $valorprimaanti1115 + $valorprimaanti1620 + $valorprimaanti21 + $compensacion + $compensacione + $valorprimsns; ?>

<?php	
		if (isset($_POST['5001'])) {
			$ivss = $_POST['5001'];
			$sqlivss = "SELECT * FROM deducciones WHERE deduccionId = '$ivss' ";
			$consultivss = $conn->query($sqlivss);
			$filaivss = $consultivss->fetch_assoc();

			$valorivss = $paradeducciones * 12/52 * $filaivss['valor'] / 100 * 4;

            $valorivss = redondear($valorivss);

?>
			<ul>
				<li>
		<?php  	

			echo "
				<label>".$filaivss['concepto']."</label>
				<input type='text' name='valorivss' value='".$valorivss."' readonly>
				";
			}
		else {
			$valorivss = 0;
		}
		?>
				</li>
			</ul>
<?php	
		if (isset($_POST['5002'])) {
			$faov = $_POST['5002'];
			$sqlfaov = "SELECT * FROM deducciones WHERE deduccionId = '$faov' ";
			$consultfaov = $conn->query($sqlfaov);
			$filafaov = $consultfaov->fetch_assoc();

			$valorfaov = $paradeducciones * $filafaov['valor'] / 100;
            $valorfaov = redondear($valorfaov);

?>
			<ul>
				<li>
		<?php  	

			echo "
				<label>".$filafaov['concepto']."</label>
				<input type='text' name='valorfaov' value='".$valorfaov."' readonly>
				";
			}
		else {
			$valorfaov = 0;
		}
		?>
				</li>
			</ul>
<?php	
		if (isset($_POST['5003'])) {
			$rpe = $_POST['5003'];
			$sqlrpe = "SELECT * FROM deducciones WHERE deduccionId = '$rpe' ";
			$consultrpe = $conn->query($sqlrpe);
			$filarpe = $consultrpe->fetch_assoc();
			
			$valorrpe = $paradeducciones * 12/52 * $filarpe['valor'] / 100 * 4;
            $valorrpe = redondear($valorrpe);

?>
			<ul>
				<li>
		<?php  	

			echo "
				<label>".$filarpe['concepto']."</label>
				<input type='text' name='valorrpe' value='".$valorrpe."' readonly>
				";
			}
		else {
			$valorrpe = 0;
		}
		?>
				</li>
			</ul>
<?php	
		if (isset($_POST['5004'])) {
			$fpj = $_POST['5004'];
			$sqlfpj = "SELECT * FROM deducciones WHERE deduccionId = '$fpj' ";
			$consultfpj = $conn->query($sqlfpj);
			$filafpj = $consultfpj->fetch_assoc();

			$valorfpj = $paradeducciones * $filafpj['valor'] / 100;
            $valorfpj = redondear($valorfpj);

?>
			<ul>
				<li>
		<?php  	

			echo "
				<label>".$filafpj['concepto']."</label>
				<input type='text' name='valorfpj' value='".$valorfpj."' readonly>
				";
			}
		else {
			$valorfpj = 0;
		}
		?>
				</li>
			</ul>
			<ul>
                <li>
                <span><u>Total de Deducciones: </u></span>
                <?php 

$total_deducciones = $valorivss + $valorrpe + $valorfaov + $valorfpj; 

$total = $total_asignaciones - $total_deducciones;
?>
                <input type="text" name="total_deducciones" id="spTotal_input" value="<?php echo  $total_deducciones;?>" readonly>
                </li>
            </ul>
	</div>
	<div id="total">
		<span>Total:</span> <input type="text" name="total" value="<?php echo  $total;?>" readonly>
	</div>
<div id="periodo">
    <span>Periodo para el Pago:</span>
    <label>Mes:</label>
    <select name="mes">
        <?php
        for ($i=1; $i<=12; $i++) {
            if ($i == date('m'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
    </select>
    <label>Año:</label>
    <select name="ano">
        <?php
        for($i=date('o'); $i>=1910; $i--){
            if ($i == date('o'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
</select>
  </div>
<?php	
 ?>	