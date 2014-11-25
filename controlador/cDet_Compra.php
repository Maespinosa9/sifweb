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
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	$producto = isset($_POST["producto"]) ? $_POST["producto"]:NULL;
	$cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"]:NULL;
	$valor_unitario = isset($_POST['valor_unitario']) ? $_POST['valor_unitario']:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$id_deta_compra = isset($_POST["id_deta_compra"]) ? $_POST["id_deta_compra"]:NULL;
	$factura = $ins->SelOrden($orden_id);
	$productos = $ins -> SelProducto();

	if (!$actu && !is_null($valor_unitario) && !is_null($producto)){
		$ins -> insert($producto, $cantidad, $valor_unitario, $orden_id);
	}

	if ($actu && !is_null($orden_id)){
		$ins-> update($id_deta_compra, $producto, $cantidad, $valor_unitario, $orden_id);
	}
	//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(id_deta_compra)as Npe FROM det_compra";  
	if($filtro) $conp.= " WHERE det_compra.id_deta_compra LIKE '%".$filtro."%'";
 ?>