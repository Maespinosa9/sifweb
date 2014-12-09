<?php
include("controlador/conexion.php");

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
		$this->cons($sql);
	}
	
	function delete ($id_pago){
		$sql = "DELETE * FROM pago WHERE id_pago = '".$id_pago."';";
		$this->cons($sql);
	}
	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function InsertaTipo($pago){
		$sql = "INSERT INTO valor (nomvalor, idparametro) VALUES ('".$pago."', 1);";
		$this->cons($sql);
	}
	function selTipo (){
		$sql = "SELECT idValor, nomvalor FROM valor where idParametro = 1;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>