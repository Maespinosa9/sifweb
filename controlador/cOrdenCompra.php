<?php 
 include ("modelo/mOrdenCompra.php");
 $ins = new mOrdenCompra();
 
  $delete = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($delete){
      $ins->delete($del);
    }
	
	$id_orden = isset($_POST["id_orden"]) ? $_POST["id_orden"]:NULL;
	$FechaFactura = isset ($_POST["FechaFactura"]) ? $_POST["FechaFactura"]:NULL;
	$vencimiento = isset ($_POST["Vencimiento"]) ? $_POST["Vencimiento"]:NULL;
	$factura = isset ($_POST["Factura"]) ? $_POST["Factura"]:NULL;
	$subtotal = isset ($_POST["subtotal"]) ? $_POST["subtotal"]:NULL;
	$iva = isset ($_POST["iva"]) ? $_POST["iva"]:NULL;
	$pagado = isset ($_POST["pagado"]) ? $_POST["pagado"]:NULL;
	$Usuario = isset ($_POST["Usuario"]) ? $_POST["Usuario"]:NULL;
	$descuento = isset ($_POST["descuento"]) ? $_POST["descuento"]:NULL;
	$total = isset ($_POST["Total"]) ? $_POST["Total"]:NULL;
	$observacion = isset ($_POST["Observaciones"]) ? $_POST["Observaciones"]:NULL;
	$vendedor = isset ($_POST["Vendedor"]) ? $_POST["Vendedor"]:NULL;
	$ajuste = isset ($_POST["ajuste"]) ? $_POST["ajuste"]:NULL;
	$proveedor = isset ($_POST["proveedor"]) ? $_POST["proveedor"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

	
	if (is_null($pagado)){
		$pagado = "False";
	}
	//echo $FechaFactura." ".$vencimiento." ".$factura." ".$subtotal." ".$iva." ".$pagado." ".$Usuario." ".$descuento." ".$total." ".$vendedor." ".$ajuste." ".$proveedor." "	;
	if ($id_orden && $actu ){
		$ins-> update($id_orden, $FechaFactura, $vencimiento, $factura, $subtotal, $iva, $pagado, $Usuario, $descuento, $total, $observacion, $vendedor, $ajuste, $proveedor);
	}
	if (!$actu && !is_null($FechaFactura) && !is_null($vencimiento) && !is_null($factura) && !is_null($subtotal) && !is_null($iva) && !is_null($pagado) && !is_null($Usuario) && !is_null($descuento) && !is_null($total) && !is_null($vendedor) && !is_null($ajuste) && !is_null($proveedor)){
		$ins->insert($FechaFactura, $vencimiento, $factura, $subtotal, $iva, $pagado, $Usuario, $descuento, $total, $observacion, $vendedor, $ajuste, $proveedor);
	}
										
	$dat = $ins->selOrden();
	$usu = $ins->selUsuario();
	$pro = $ins->selProveedor();