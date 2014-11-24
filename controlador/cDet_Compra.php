<?php 
 include ("modelo/mDet_Compra.php");
 include ("modelo/mpagina.php");
 $ins = new mDet_Compra();


	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
		if ($delete){
		$ins->delete($delete);
	}



	$orden_id = isset($_GET["or"]) ? $_GET["or"]:NULL;
	$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	$pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;

	$factura = $ins->SelOrden($orden_id);
	$productos = $ins -> SelProducto();

	//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(id_deta_compra)as Npe FROM det_compra";  
	if($filtro) $conp.= " WHERE det_compra.id_deta_compra LIKE '%".$filtro."%'";
 ?>