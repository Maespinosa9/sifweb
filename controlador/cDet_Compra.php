<?php 
 include ("modelo/mDet_Compra.php");
 include ("modelo/mpagina.php");
 $ins = new mDet_Compra();


	$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
		if ($delete){
		$ins->delete($delete);
	}
	$up = isset($_GET["up"]) ? $_GET["up"]:NULL;
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
	$editar = $ins -> SelEditar($pr);
	$validaProducto = $ins ->validaProducto($producto);

	if (is_null($validaProducto)){
		if (!$actu && !is_null($valor_unitario) && !is_null($producto)){
			$ins -> insert($producto, $cantidad, $valor_unitario, $orden_id);
		}
	}

	if ($actu && !is_null($orden_id)){
		$ins-> update($id_deta_compra, $cantidad, $valor_unitario, $orden_id);
	}
	//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(d.id_deta_compra)as Npe, p.descripcion FROM det_compra as d inner join producto as p on p.id_producto = d.producto_id WHERE d.orden_id = '".$orden_id."'";  
	if($filtro) $conp.= " AND p.descripcion LIKE '%".$filtro."%'";
 ?>