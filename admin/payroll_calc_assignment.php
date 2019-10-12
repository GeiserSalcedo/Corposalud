<?php 
    include 'includes/session.php';
    include 'functions/funciones.php';
 
    $codigoRac = $_POST['codigorac'];
    $hijos = $_POST['hijos'];
    $anos = $_POST['anos'];
    $nivel = $_POST['nivel_instruccion'];
    $compensacion = $_POST['compensacion'];
    $compensacione = $_POST['compensacione'];
    $guardianocturna = $_POST['guardianocturna'];
    $domingoferdiur = $_POST['domingoferdiur'];
    $domingofernoc = $_POST['domingofernoc'];

    //Busco el salario del trabajor
    $sql_cargo = "SELECT * FROM empleados INNER JOIN cargos ON empleados.cargoId=cargos.cargoId WHERE codigoRac = '$codigoRac' ";
    $consultcargo = $conn->query($sql_cargo);
    $filaemp = $consultcargo->fetch_assoc();

    //Consulto todas las tablas asignaciones y deducciones
    $sql_asignciones = "SELECT * FROM asignaciones";
    $consultasig = $conn->query($sql_asignciones);
    $filasig = $consultasig->fetch_assoc();

    $sql_deducciones = "SELECT * FROM deducciones";
    $consultdeduc = $conn->query($sql_deducciones);
    $filadeduc = $consultdeduc->fetch_assoc();
?>
  <div class="valores_asignaciones">
  <h5 class="modal-title"><b>Calculo Asignaciones</b></h5>

<script>

  </script>         
        <div class="calculoasig">
            <ul>
                <li>
        <?php   
            echo "
                <label>SALARIO BASE: </label>
                <input type='text' class='montos' name='salario' value='".$filaemp['salario']."' readonly>
                <input type='hidden' name='codigoRac' value='".$codigoRac."'>
                ";
        ?>
                </li>
            </ul>   
<?php
        if (isset($_POST['0005'])) {
            $primahijo = $_POST['0005'];
            $sqlhijo = "SELECT * FROM asignaciones WHERE asignacionId = '$primahijo' ";
            $consultprimahijo = $conn->query($sqlhijo);
            $filahijo = $consultprimahijo->fetch_assoc();

            $montoprimahijo = $filahijo['valor'] * $hijos;
?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filahijo['concepto']."</label>
            <input type='text' class='montos' name='montoprimahijo' value='".$montoprimahijo."' readonly>
                ";
            }
        else {
            $montoprimahijo = 0;
            echo "<input type='hidden' name='montoprimahijo' value='".$montoprimahijo."'>";
        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0801'])) {
            $primeco = $_POST['0801'];
            $sqlprimeco = "SELECT * FROM asignaciones WHERE asignacionId = '$primeco' ";
            $consultprimeco = $conn->query($sqlprimeco);
            $filaprimeco = $consultprimeco->fetch_assoc();

            $valorprimeco = $filaprimeco['valor'] / 100 * $filaemp['salario'];


?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimeco['concepto']."</label>
                <input type='text' class='montos' name='valorprimeco' value='".$valorprimeco."' readonly>
                ";
            }
        else {
            $valorprimeco = 0;
            echo "<input type='hidden' name='valorprimeco' value='".$valorprimeco."'>";
            
        }
        ?>
                </li>
            </ul>

<?php
        if (isset($_POST['0601'])) {
            $primcomp = $_POST['0601'];
            $sqlprimcomp = "SELECT * FROM asignaciones WHERE asignacionId = '$primcomp' ";
            $consultprimcomp = $conn->query($sqlprimcomp);
            $filaprimcomp = $consultprimcomp->fetch_assoc();

?>          
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimcomp['concepto']."</label>
                <input type='text' class='montos' name='valorprimcomp' value='".$compensacion."' readonly>
                ";
            }
        else {
            $compensacion = 0;
        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0701'])) {
            $primcompe = $_POST['0701'];
            $sqlprimcompe = "SELECT * FROM asignaciones WHERE asignacionId = '$primcompe' ";
            $consultprimcompe = $conn->query($sqlprimcompe);
            $filaprimcompe = $consultprimcompe->fetch_assoc();

?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimcompe['concepto']."</label>
                <input type='text' class='montos' name='valorprimcompe' value='".$compensacione."' readonly>
                ";
            }
        else {
            $compensacione = 0;
        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0501'])) {
            $primsns = $_POST['0501'];
            $sqlprimsns = "SELECT * FROM asignaciones WHERE asignacionId = '$primsns' ";
            $consultprimsns = $conn->query($sqlprimsns);
            $filaprimsns = $consultprimsns->fetch_assoc();
            $valorprimsns = $filaprimsns['valor'] / 100 * $filaemp['salario'] ;

?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimsns['concepto']."</label>
                <input type='text' class='montos' name='valorprimsns' value='".$valorprimsns."' readonly>
                ";
            }
        else {
            $valorprimsns = 0;
        }
        ?>
                </li>
            </ul>
<?php
    
        if (isset($_POST['0301'])) {
            $primanti05 = $_POST['0301'];
            $sqlanti05 = "SELECT * FROM asignaciones WHERE asignacionId = '$primanti05' ";
            $consultprimanti05 = $conn->query($sqlanti05);
            $filanti05 = $consultprimanti05->fetch_assoc();

        $sumaprimaanti05 = $filaemp['salario'] + $valorprimsns + $compensacion + $compensacione;
        $valorprimaanti05 = $sumaprimaanti05 * $filanti05['valor'] / 100;
        $valorprimaanti05 = redondear($valorprimaanti05);


?>
        
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filanti05['concepto']."</label>
                <input type='text' class='montos' name='valorprimaanti' value='".$valorprimaanti05."' readonly>
                <input type='hidden' name='primanti' value='".$primanti05."'>

                ";
            }
        else {
            $valorprimaanti05 = 0;
        }
        ?>
                </li>
            </ul>
    
<?php       
            
        if (isset($_POST['0302'])) {
            $primanti610 = $_POST['0302'];
            $sqlanti610 = "SELECT * FROM asignaciones WHERE asignacionId = '$primanti610' ";
            $consultprimanti610 = $conn->query($sqlanti610);
            $filanti610 = $consultprimanti610->fetch_assoc();

        $sumaprimaanti610 = $filaemp['salario'] + $valorprimsns + $compensacion + $compensacione;
        $valorprimaanti610 = $sumaprimaanti610 * $filanti610['valor'] / 100;
        $valorprimaanti610 = redondear($valorprimaanti610);


?>
        
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filanti610['concepto']."</label>
                <input type='text' class='montos' name='valorprimaanti' value='".$valorprimaanti610."' readonly>
                <input type='hidden' name='primanti' value='".$primanti610."'>

                ";
            }
        else {
            $valorprimaanti610 = 0;
        }
        ?>
                </li>
            </ul>
        
<?php           
        if (isset($_POST['0303'])) {
            $primanti1115 = $_POST['0303'];
            $sqlanti1115 = "SELECT * FROM asignaciones WHERE asignacionId = '$primanti1115' ";
            $consultprimanti1115 = $conn->query($sqlanti1115);
            $filanti1115 = $consultprimanti1115->fetch_assoc();

        $sumaprimaanti1115 = $filaemp['salario'] + $valorprimsns + $compensacion + $compensacione;
        $valorprimaanti1115 = $sumaprimaanti1115 * $filanti1115['valor'] / 100;
        $valorprimaanti1115 = redondear($valorprimaanti1115);


?>
        
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filanti1115['concepto']."</label>
                <input type='text' class='montos' name='valorprimaanti' value='".$valorprimaanti1115."' readonly>
                <input type='hidden' name='primanti' value='".$primanti1115."'>

                ";
            }
        else {
            $valorprimaanti1115 = 0;
        }
        ?>
                </li>
            </ul>
        
<?php       
        if (isset($_POST['0304'])) {
            $primanti1620 = $_POST['0304'];
            $sqlanti1620 = "SELECT * FROM asignaciones WHERE asignacionId = '$primanti1620' ";
            $consultprimanti1620 = $conn->query($sqlanti1620);
            $filanti1620 = $consultprimanti1620->fetch_assoc();

        $sumaprimaanti1620 = $filaemp['salario'] + $valorprimsns + $compensacion + $compensacione;
        $valorprimaanti1620 = $sumaprimaanti1620 * $filanti1620['valor'] / 100;
        $valorprimaanti1620 = redondear($valorprimaanti1620);


?>  
        
            <ul>
                <li>        
        <?php   

            echo "
                <label>".$filanti1620['concepto']."</label>
                <input type='text' class='montos' name='valorprimaanti' value='".$valorprimaanti1620."' readonly>
                <input type='hidden' name='primanti' value='".$primanti1620."'>

                ";
            }
        else {
            $valorprimaanti1620 = 0;
        }
        ?>
                </li>
            </ul>
        
<?php
        if (isset($_POST['0305'])) {
            $primanti21 = $_POST['0305'];
            $sqlanti21 = "SELECT * FROM asignaciones WHERE asignacionId = '$primanti21' ";
            $consultprimanti21 = $conn->query($sqlanti21);
            $filanti21 = $consultprimanti21->fetch_assoc();

        $sumaprimaanti21 = $filaemp['salario'] + $valorprimsns + $compensacion + $compensacione;
        $valorprimaanti21 = $sumaprimaanti21 * $filanti21['valor'] / 100;
        $valorprimaanti21 = redondear($valorprimaanti21);

?>
        
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filanti21['concepto']."</label>
                <input type='text' class='montos' name='valorprimaanti' value='".$valorprimaanti21."' readonly>
                <input type='hidden' name='primanti' value='".$primanti21."'>

                ";
            }
        else {
            $valorprimaanti21 = 0;
        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0401'])) {
            $primprof18 = $_POST['0401'];
            $sqlprimprof18 = "SELECT * FROM asignaciones WHERE asignacionId = '$primprof18' ";
            $consultprimprof18 = $conn->query($sqlprimprof18);
            $filaprimprof18 = $consultprimprof18->fetch_assoc();

$sumaprimprof18 = $filaemp['salario'] + $valorprimsns + $compensacion + $compensacione + $valorprimaanti05 + $valorprimaanti610 +$valorprimaanti1115 + $valorprimaanti1620 + $valorprimaanti21;

        $valorprimprof18 = $sumaprimprof18 * $filaprimprof18['valor'] / 100;
        $valorprimprof18 = redondear($valorprimprof18);


?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimprof18['concepto']."</label>
                <input type='text' class='montos' name='valorprimprof' value='".$valorprimprof18."' readonly>
                <input type='hidden' name='primprof' value='".$primprof18."'>

                ";
            }
        else {
            $valorprimprof18 = 0;
        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0402'])) {
            $primprof22 = $_POST['0402'];
            $sqlprimprof22 = "SELECT * FROM asignaciones WHERE asignacionId = '$primprof22' ";
            $consultprimprof22 = $conn->query($sqlprimprof22);
            $filaprimprof22 = $consultprimprof22->fetch_assoc();

$sumaprimprof22 = $filaemp['salario'] + $valorprimsns + $compensacion + $compensacione + $valorprimaanti05 + $valorprimaanti610 +$valorprimaanti1115 + $valorprimaanti1620 + $valorprimaanti21;

        $valorprimprof22 = $sumaprimprof22 * $filaprimprof22['valor'] / 100;
        $valorprimprof22 = redondear($valorprimprof22);



?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimprof22['concepto']."</label>
                <input type='text' class='montos' name='valorprimprof' value='".$valorprimprof22."' readonly>
                <input type='hidden' name='primprof' value='".$primprof22."'>

                ";
            }
        else {
            $valorprimprof22 = 0;
        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0403'])) {
            $primprof26 = $_POST['0403'];
            $sqlprimprof26 = "SELECT * FROM asignaciones WHERE asignacionId = '$primprof26' ";
            $consultprimprof26 = $conn->query($sqlprimprof26);
            $filaprimprof26 = $consultprimprof26->fetch_assoc();

$sumaprimprof26 = $filaemp['salario'] + $valorprimsns + $compensacion + $compensacione + $valorprimaanti05 + $valorprimaanti610 +$valorprimaanti1115 + $valorprimaanti1620 + $valorprimaanti21;

        $valorprimprof26 = $sumaprimprof26 * $filaprimprof26['valor'] / 100;
        $valorprimprof26 = redondear($valorprimprof26);


?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimprof26['concepto']."</label>
                <input type='text' class='montos' name='valorprimprof' value='".$valorprimprof26."' readonly>
                <input type='hidden' name='primprof' value='".$primprof26."'>

                ";
            }
        else {
            $valorprimprof26 = 0;
        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0404'])) {
            $primprof28 = $_POST['0404'];
            $sqlprimprof28 = "SELECT * FROM asignaciones WHERE asignacionId = '$primprof28' ";
            $consultprimprof28 = $conn->query($sqlprimprof28);
            $filaprimprof28 = $consultprimprof28->fetch_assoc();

$sumaprimprof28 = $filaemp['salario'] + $valorprimsns + $compensacion + $compensacione + $valorprimaanti05 + $valorprimaanti610 +$valorprimaanti1115 + $valorprimaanti1620 + $valorprimaanti21;

        $valorprimprof28 = $sumaprimprof28 * $filaprimprof28['valor'] / 100;
        $valorprimprof28 = redondear($valorprimprof28);


?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimprof28['concepto']."</label>
                <input type='text' class='montos' name='valorprimprof' value='".$valorprimprof28."' readonly>
                <input type='hidden' name='primprof' value='".$primprof28."'>

                ";
            }
        else {
            $valorprimprof28 = 0;
        }
        ?>
                </li>
            </ul> 
<?php 

$salario_normal = $filaemp['salario'] + $compensacion + $compensacione + $valorprimsns + $valorprimaanti05 + $valorprimaanti610 + $valorprimaanti1115 + $valorprimaanti1620 + $valorprimaanti21 + $valorprimprof18 + $valorprimprof22 + $valorprimprof26 + $valorprimprof28;


        if (isset($_POST['0201'])) {
            $primanocfijo = $_POST['0201'];
            $sqlnocfijo = "SELECT * FROM asignaciones WHERE asignacionId = '$primanocfijo' ";
            $consultprimanocfijo = $conn->query($sqlnocfijo);
            $filanocfijo = $consultprimanocfijo->fetch_assoc();
            $valorprimnocfijo = $filanocfijo['valor'] / 100 * $salario_normal;
            $valorprimnocfijo = redondear($valorprimnocfijo);
?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filanocfijo['concepto']."</label>
                <input type='text' class='montos' name='valorprimnocfijo' value='".$valorprimnocfijo."' readonly>

                ";
            }
        else {
$valorprimnocfijo = 0;
echo "<input type='hidden' name='valorprimnocfijo' value='".$valorprimnocfijo."'>";

        }
        ?>
                </li>
            </ul>
 <?php
        if (isset($_POST['0101'])) {
            $primguarnoc = $_POST['0101'];
            $sqlprimguarnoc = "SELECT * FROM asignaciones WHERE asignacionId = '$primguarnoc' ";
            $consultprimguarnoc = $conn->query($sqlprimguarnoc);
            $filaprimguarnoc = $consultprimguarnoc->fetch_assoc();
            $valorprimguarnoc = $salario_normal / 30 / 6 * 1.5 * 12 * $guardianocturna;
            $valorprimguarnoc = redondear($valorprimguarnoc);


?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimguarnoc['concepto']."</label>
                <input type='text' class='montos' name='valorprimguarnoc' value='".$valorprimguarnoc."' readonly>

                ";
            }
        else {
$valorprimguarnoc = 0;
echo "<input type='hidden' name='valorprimguarnoc' value='".$valorprimguarnoc."'>";
            
        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0002'])) {
            $primdomferdiur = $_POST['0002'];
        $sqlprimdomferdiur = "SELECT * FROM asignaciones WHERE asignacionId = '$primdomferdiur' ";
            $consultprimdomferdiur = $conn->query($sqlprimdomferdiur);
            $filaprimdomferdiur = $consultprimdomferdiur->fetch_assoc();
            $valorprimdomferdiur = $salario_normal * 1.58 / 30 * 1.5 * $domingoferdiur;
            $valorprimdomferdiur = redondear($valorprimdomferdiur);


?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimdomferdiur['concepto']."</label>
                <input type='text' class='montos' name='valorprimdomferdiur' value='".$valorprimdomferdiur."' readonly>

                ";
            }
        else {
$valorprimdomferdiur = 0;
echo "<input type='hidden' name='valorprimdomferdiur' value='".$valorprimdomferdiur."'>";

        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0003'])) {
            $primdomfernoc = $_POST['0003'];
        $sqlprimdomfernoc = "SELECT * FROM asignaciones WHERE asignacionId = '$primdomfernoc' ";
            $consultprimdomfernoc = $conn->query($sqlprimdomfernoc);
            $filaprimdomfernoc = $consultprimdomfernoc->fetch_assoc();

            $valorprimdomfernoc = $salario_normal * 1.58 / 30 * 1.5 * 1.5 * $domingofernoc;
            $valorprimdomfernoc = redondear($valorprimdomfernoc);


?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimdomfernoc['concepto']."</label>
                <input type='text' class='montos' name='valorprimdomfernoc' value='".$valorprimdomfernoc."' readonly>

                ";
            }
        else {
$valorprimdomfernoc = 0;
echo "<input type='hidden' name='valorprimdomfernoc' value='".$valorprimdomfernoc."'>";

        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0004'])) {
            $primdiaadd = $_POST['0004'];
        $sqlprimdiaadd = "SELECT * FROM asignaciones WHERE asignacionId = '$primdiaadd' ";
            $consultprimdiaadd = $conn->query($sqlprimdiaadd);
            $filaprimdiaadd = $consultprimdiaadd->fetch_assoc();

            $valorprimdiaadd = $salario_normal / 30;
            $valorprimdiaadd = redondear($valorprimdiaadd);


?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimdiaadd['concepto']."</label>
                <input type='text' class='montos' name='valorprimdiaadd' value='".$valorprimdiaadd."' readonly>

                ";
            }
        else {
$valorprimdiaadd = 0;
echo "<input type='hidden' name='valorprimdiaadd' value='".$valorprimdiaadd."'>";

        }
        ?>
                </li>
            </ul>
<?php
        if (isset($_POST['0901'])) {
            $primescala = $_POST['0901'];
        $sqlprimescala = "SELECT * FROM asignaciones WHERE asignacionId = '$primescala' ";
            $consultprimescala = $conn->query($sqlprimescala);
            $filaprimescala = $consultprimescala->fetch_assoc();

            $escalafon = escalafon($anos);

            $valorprimescala = $filaemp['salario'] * $escalafon;
            $valorprimescala = redondear($valorprimescala);


?>
            <ul>
                <li>
        <?php   

            echo "
                <label>".$filaprimescala['concepto']."</label>
                <input type='text' class='montos' name='valorprimescala' value='".$valorprimescala."' readonly>

                ";
            }
        else {
$valorprimescala = 0;
echo "<input type='hidden' name='valorprimescala' value='".$valorprimescala."'>";

        }
        ?>
                </li>
            </ul>
            <ul>
                <li>
                <span><u>Total de Asignaciones: </u></span>
                <?php

$total_asignaciones = $filaemp['salario'] + $montoprimahijo + $valorprimeco + $compensacion + $compensacione + $valorprimsns + $valorprimaanti05 + $valorprimaanti610 + $valorprimaanti1115 + $valorprimaanti1620 + $valorprimaanti21 + $valorprimprof18 + $valorprimprof22 + $valorprimprof26 + $valorprimprof28 + $valorprimnocfijo + $valorprimguarnoc + $valorprimdomferdiur + $valorprimdomfernoc + $valorprimdiaadd + $valorprimescala; 

?>
                <input type="text" name="total_asignaciones" id="spTotal_input" value="<?php echo  $total_asignaciones;?>" readonly>
                </li>
            </ul>
        </div>
    </div>

<?php include 'payroll_calc_deduction.php'; ?>