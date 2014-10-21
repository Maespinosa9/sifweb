<?php 
 include ("../modelo/mOrdenCompra.php");
 $ins = new mOrdenCompra();
 
  $delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($del);
    }
	
	$id_orden = isset($_POST["id_orden"]) ? $_POST["id_orden"]:NULL;
	$FechaFactura = isset ($_POST["FechaFactura"]) ? $_POST["FechaFactura"]:NULL;
	$vencimiento = isset ($_POST["vencimiento"]) ? $_POST["vencimiento"]:NULL;
	$factura = isset ($_POST["factura"]) ? $_POST["factura"]:NULL;
	$subtotal = isset ($_POST["subtotal"]) ? $_POST["subtotal"]:NULL;
	$iva = isset ($_POST["iva"]) ? $_POST["iva"]:NULL;
	$pagado = isset ($_POST["pagado"]) ? $_POST["pagado"]:NULL;
	$Usuario = isset ($_POST["Usuario"]) ? $_POST["Usuario"]:NULL;
	$descuento = isset ($_POST["descuento"]) ? $_POST["descuento"]:NULL;
	$total = isset ($_POST["total"]) ? $_POST["total"]:NULL;
	$observacion = isset ($_POST["observacion"]) ? $_POST["observacion"]:NULL;
	$vendedor = isset ($_POST["vendedor"]) ? $_POST["vendedor"]:NULL;
	$ajuste = isset ($_POST["ajuste"]) ? $_POST["ajuste"]:NULL;
	$proveedor = isset ($_POST["proveedor"]) ? $_POST["proveedor"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	
	if ($id_orden && $actu ){
		$ins-> update($id_orden, $FechaFactura, $vencimiento, $factura, $subtotal, $iva, $pagado, $IdUsuario, $descuento, $total, $observacion, $vendedor, $ajuste, $nit_id);
	}
	
	if (!$actu && $id_orden){
		$ins->insert($FechaFactura, $vencimiento, $factura, $subtotal, $iva, $pagado, $IdUsuario, $descuento, $total, $observacion, $vendedor, $ajuste, $nit_id);
	}
										
	$dat = $ins->selOrden();
	$usu = $ins->selUsuario();
	$pro = $ins->selProveedor();