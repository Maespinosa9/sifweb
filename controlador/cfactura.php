<?php
include ("modelo/mfactura.php");

$productos = array();

$accion = isset($_POST["accion"])? $_POST["accion"]:NULL;

switch($accion){
	
	case "":
		$_SESSION["sPRODUCTOS"] = null;
	break;
	case "delete":
	
	break;
	case "AddProducto":
		print_r($_POST);
		
        $productos = $_SESSION["sPRODUCTOS"];
		
		$numpro = count($productos);
		
		$productos[$numpro] = array(
							"producto_id"=>$_POST["producto_id"],
							"cantidad" => $_POST["cantidad"],
							"valor_unitario" => $_POST["precio_venta"],
							"valor_total" => $_POST["cantidad"] * $_POST["precio_venta"]);
		
		 $_SESSION["sPRODUCTOS"] = $productos ;
		 		
		 print_r($_SESSION);
				
	break;
	case "grabarfactura":
	
	$productos = $_SESSION["sPRODUCTOS"];
		
			
			foreach ($productos as $idpr => $Cantidad) {
				
				//SELECT `id_detalle`, `producto_id`, `cantidad`, `valor_unitario`, `factura_id` FROM `detalle_venta` WHERE 1
				$producto_id = isset($_POST["producto_id"])? $_POST["producto_id"]:NULL;
				$cantidad = isset($_POST["cantidad"])? $_POST["cantidad"]:NULL;
				$valor_unitario = isset($_POST["valor_unitario"])? $_POST["valor_unitario"]:NULL;
				$factura_id = isset($_POST["factura_id"])? $_POST["factura_id"]:NULL;
				$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
				
				
				if ($producto_id && $cantidad && $valor_unitario && $factura_id && !$actu){
				
						$ins->insdetalle_venta($producto_id,$cantidad,$valor_unitario,$factura_id);
				} 
	
			}
	break;
}

$ins = new mfactura();
//factura de venta
 $del = isset($_GET["del"]) ? $_GET["del"]:NULL;
    if ($del){
        $ins->delfactura($del);
    }
	$id_factura = isset($_POST["id_factura"])? $_POST["id_factura"]:NULL;
	$fecha = isset($_POST["fecha"])? $_POST["fecha"]:NULL;
	$subtotal = isset($_POST["subtotal"])? $_POST["subtotal"]:NULL;
	$total = isset($_POST["total"])? $_POST["total"]:NULL;
	$iva = isset($_POST["iva"])? $_POST["iva"]:NULL;
	$cliente_id = isset($_POST["cliente_id"])? $_POST["cliente_id"]:NULL;
	$estado = isset($_POST["estado"])? $_POST["estado"]:NULL;
	$descuento = isset($_POST["descuento"])? $_POST["descuento"]:NULL;
	$usuario_id = isset($_POST["usuario_id"])? $_POST["usuario_id"]:NULL;
	$observacion = isset($_POST["observacion"])? $_POST["observacion"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;

	if ($fecha && $subtotal && $total && $iva && $cliente_id && $estado && $descuento && $usuario_id && $observacion && !$actu){
 	    $ins->insfactura($fecha,$subtotal,$total,$iva,$cliente_id,$estado,$descuento,$usuario_id,$observacion);
    }  
	if ($id_factura && $fecha && $subtotal && $total && $iva && $cliente_id && $estado && $descuento && $usuario_id && $observacion && $actu){
        $ins->updfactura($id_factura,$fecha,$subtotal,$total,$iva,$cliente_id,$estado,$descuento,$usuario_id,$observacion);
    }

  
	$datt = $ins->selfactura1($pr);
	$dat = $ins->selfactura();



?>