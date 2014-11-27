<?php
include("controlador/conexion.php");
 
class mDet_Compra{

	function mDet_Compra(){}

	function insert($producto_id, $cantidad, $valor_unitario, $orden_id){
		$sql = "INSERT INTO det_compra(producto_id, cantidad, valor_unitario, orden_id)";
		$sql .=" VALUES ('".$producto_id."','".$cantidad."','".$valor_unitario."','".$orden_id."')";
		$this->cons($sql);
	}

	function update($id_deta_compra, $cantidad, $valor_unitario, $orden_id){
		$sql = "UPDATE det_compra SET cantidad = '".$cantidad."', valor_unitario = '".$valor_unitario."'";
		$sql .=" WHERE id_deta_compra = '".$id_deta_compra."'";
		$this -> cons($sql);
	}

	function delete($id_deta_compra){
		$sql = "DELETE FROM det_compra WHERE id_deta_compra = '".$id_deta_compra."'";
		$this -> cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function SelOrden($id_orden){
		$sql = "SELECT * FROM orden_compra WHERE id_orden = '".$id_orden."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function SelEditar($id_deta_compra){
		$sql = "SELECT d.* from det_compra as d inner join producto as p on p.id_producto = d.producto_id WHERE d.id_deta_compra = '".$id_deta_compra."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function SelProducto(){
		$sql = "SELECT id_producto, descripcion	FROM producto";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selDetalle($filtro,$rvalini,$rvalfin, $id_orden){
		$sql = "SELECT d.*, p.descripcion FROM det_compra as d inner join producto as p on d.producto_id = p.id_producto";
		$sql .= " WHERE d.orden_id = '".$id_orden."'";
		if($filtro)
		$sql.= " AND p.descripcion LIKE '%".$filtro."%'";
		$sql.= " ORDER BY d.id_deta_compra LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function validaProducto($id_producto){
		$sql = "SELECT * From producto WHERE id_producto = '".$id_producto."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>