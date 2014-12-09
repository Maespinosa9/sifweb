<?php
include_once("conexion.php");
$datos=$_POST["datos"];
$funcion = $_POST['funcion'];


if ($funcion == "orden_compra"){

	$validar=validaOrden($datos);
	if(!is_null($validar) && count($validar)!=0)
		echo "La Factura con n&uacute;mero ".$datos." ya existe";
}

if ($funcion == "deta_compra"){
	$id_orden = $_POST['orden'];
	$validar = validaProducto($datos, $id_orden);
	if(!is_null($validar) && count($validar)!=0)
		echo "El producto: ".$validar[0]['descripcion']." ya fue ingresado en la factura";
}

function validaOrden($factura){
	$valida = "SELECT factura from orden_compra WHERE factura = '".$factura."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($valida, 0);
	return $data;
}

function validaProducto($idProducto, $id_orden){
	$valida = "SELECT d.producto_id, p.descripcion from det_compra as d ";
	$valida .= " inner join producto as p on d.producto_id = p.id_producto";
	$valida .= " WHERE producto_id = '".$idProducto."' AND orden_id = '".$id_orden."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($valida, 0);
	return $data;
}

function cons($c){
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$this->result=$conexionBD->ejeCon($c,0);
}


?>

