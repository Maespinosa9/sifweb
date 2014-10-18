<?php
include("../controlador/conexion.php");

class mPago{
	function mPago(){
	}
	
	function insert($descripcion, $valor, $fecha, $tipo){
		$sql = "INSERT INTO pago (descripcion, valor, fecha, tipo) values ('".$descripcion."', '".$valor."', '".$fecha."', '".$tipo."');";
		$this->cons($sql);
	}
	
	function update($id_pago, $descripcion, $valor, $fecha, $tipo){
		$sql = "UPDATE pago SET descripcion = '".$descripcion."', valor = '".$valor."', fecha = '".$fecha."', tipo = '".$tipo."'";
		$sql .=" WHERE id_pago = '".$id_pago."';";
	}
	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
}
?>