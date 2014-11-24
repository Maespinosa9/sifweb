<?php
include("controlador/conexion.php");

class mOrdenCompra{

	function mOrdenCompra(){

	}
	
	function insert($FechaFactura, $vencimiento, $factura, $subtotal, $iva, $pagado, $IdUsuario, $descuento, $total, $observacion, $vendedor, $ajuste, $nit_id){
		echo "entro";
		$sql = "INSERT INTO orden_compra(fecha_factura, vencimiento, factura, subtotal, iva, pagado, usuario_id, descuento, total, observacion, vendedor, ajuste, nit_id) VALUES ('".$FechaFactura."', '".$vencimiento."', '".$factura."', '".$subtotal."', '".$iva."', '".$pagado."', '".$IdUsuario."', '".$descuento."', '".$total."', '".$observacion."', '".$vendedor."', '".$ajuste."', '".$nit_id."');";
		$this->cons($sql);
	}
	
	function delete($id_orden){
		$sql = "DELETE * FROM orden_compra WHERE id_orden='".$id_orden."';";
		$this->cons($sql);
	}
	
	function update($id_orden, $FechaFactura, $vencimiento, $factura, $subtotal, $iva, $pagado, $IdUsuario, $descuento, $total, $observacion, $vendedor, $ajuste, $nit_id){
		$sql = "UPDATE orden_compra SET fecha_factura='".$FechaFactura."', vencimiento= '".$vencimiento."', factura='".$factura."', subtotal= '".$subtotal."', iva='".$iva."', pagado='".$pagado."', usuario_id='".$IdUsuario."', descuento= '".$descuento."', total= '".$total."', observacion= '".$observacion."', vendedor= '".$vendedor."', ajuste= '".$ajuste."', nit_id='".$nit_id."' WHERE id_orden = '".$id_orden."';";
		$this->cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	function selOrden(){
		$sql = "SELECT * FROM orden_compra";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function selUsuario(){
		$sql = "SELECT id_usuario, nombre, apellido FROM USUARIO;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function selProveedor(){
		$sql = "SELECT id_nit, razon_social From proveedor;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}