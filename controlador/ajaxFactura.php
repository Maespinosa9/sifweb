<?php
include_once("conexion.php");
include_once("../modelo/mseguridad.php");

$datos=$_POST["datos"];


	date_default_timezone_set("America/Bogota"); 
	$idusu = isset($_SESSION["idUser"]) ? $_SESSION["idUser"]:NULL;
	$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
	$sql = "INSERT INTO fac_venta (fecha, subtotal, total, iva, estado, descuento, usuario_id, observacion) 
	values ('".$fecha."', '0','0','0','1','0','".$idusu."','0');";
	echo $idusu;
	echo $sql;
	cons($sql);

function cons($c){
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$conexionBD->ejeCon($c,0);
}
