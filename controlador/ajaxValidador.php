<?php
include_once("conexion.php");
$datos=$_POST["datos"];
$funcion = $_POST['funcion'];

if ($funcion == "orden_compra"){
	$validar=validaOrden($datos);
	if(!is_null($validar) && count($validar)!=0)
		echo "La Factura con n&uacute;mero ".$datos." ya existe";
		//echo json_encode($result);
}

function validaOrden($factura){
	$valida = "SELECT factura from orden_compra WHERE factura = '".$factura."'";
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

