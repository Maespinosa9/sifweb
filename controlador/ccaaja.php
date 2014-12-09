<?php
	include ("modelo/mcaaja.php");
    
    $ins = new mcaja();
   
    $pac=115;
    $id_caja =isset($_POST["id_caja"]) ? $_POST["id_caja"]:NULL;
	$base=isset($_POST["base"]) ? $_POST["base"]:NULL;
	$fecha = isset($_POST["fecha"]) ? $_POST["fecha"]:NULL;
    $venta = isset($_GET["venta"]) ? $_GET["venta"]:NULL;
    $gasto =isset($_POST["gasto"]) ? $_POST["gasto"]:NULL;
	$observacion =isset($_POST["observacion"]) ? $_POST["observacion"]:NULL;
	$ncaja_id = isset($_POST["or"]) ? $_POST["or"]:NULL;
	//if ($ncaja_id){
	//	$ins->selcaja($ncaja_id);
	//}
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
   

    $total=$ins -> sumcaja();


	//Insertar
    if(!$actu && $base && $fecha && $venta && $gasto && $observacion && $ncaja_id){
        $ins->insert( $base, $fecha, $venta, $gasto, $observacion, $ncaja_id);
    }

	?>