<?php
include ("modelo/mPago.php");
	$ins = new mPago();
	
	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($del);
    }
	$pago = isset ($_POST["pago"]) ? $_POST["pago"]:NULL;
	$id_pago = isset($_POST["id_pago"]) ? $_POST["id_pago"]:NULL;
	$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"]:NULL;
	$valor = isset($_POST["valor"]) ? $_POST["valor"]:NULL;
	$fecha = isset($_POST["fecha"]) ? $_POST["fecha"]:NULL;
	$tipo = isset($_POST["tipo"]) ? $_POST["tipo"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

	if ($id_pago && $valor && $fecha && $tipo && $actu){
		$ins->update($id_pago,$descripcion,$valor,$fecha,$tipo);
	}
	if ($pago){
		$ins->insertaTipo($pago);
	}
	if ($id_pago && $valor && $fecha && $tipo && !$actu){
		$ins->insert($descripcion,$valor,$fecha, $tipo);
	}

	$dat =  $ins->selTipo();
?>