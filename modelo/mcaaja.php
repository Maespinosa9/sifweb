<?php
include("controlador/conexion.php");

class mcaja{

	function mcaja(){

	}
	
	function insert($base, $fecha, $venta, $gasto, $observacion, $ncaja_id){
		$sql = "INSERT INTO ncaja (base, fecha, venta, gasto, observacion, ncaja_id) VALUES ('".$base."','".$fecha."', '".$venta."','".$gasto."', '".$observacion."', '".$ncaja_id."');";
		$this->cons($sql);
	}
	
	function delete($id_caja){
		$sql = "DELETE FROM caja WHERE id_caja='".$id_caja."';";
		$this->cons($sql);
	}
	
	function update($id_caja, $base, $fecha, $venta, $gasto, $observacion, $ncaja_id){
		$sql = "UPDATE ncaja SET  base='".$base."', fecha='".$fecha."', base='".$base."', venta='".$venta."', gasto='".$gasto."', observacion='".$observacion."' , observacion='".$ncaja_id."'  WHERE id_caja = '".$id_caja."';";
		$this->cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	

	function selec(){
		$sql = "SELECT  * FROM caja";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selcaja($ncaja_id){
		$sql = "SELECT id_ncaja FROM ncaja WHERE id_ncaja = '".$caja_id."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function validacaja($id_producto, $orden_id){
		$sql = "SELECT * From det_compra WHERE producto_id = '".$id_producto."' AND orden_id = '".$orden_id."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function sumcaja(){
		$sql = "select sum(base) as total from caja";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}


}