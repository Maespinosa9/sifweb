<?php
include ("modelo/mfactura.php");


$ins = new mfactura();

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

?>