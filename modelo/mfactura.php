<?php
include ("controlador/conexion.php");


class mfactura {
	var $arr;

	function mfactura(){}

	function insfactura($fecha,$subtotal,$total,$iva,$cliente_id,$estado,$descuento,$usuario_id,$observacion){
	$sql = "INSERT INTO fac_venta (fecha, subtotal, total, iva, cliente_id, estado, descuento, usuario_id, observacion) 
	values ('".$fecha."', '".$subtotal."','".$total."','".$iva."','".$cliente_id."','".$estado."','".$descuento."','".$usuario_id."','".$observacion."');";
	$this->cons($sql);
	
		}
	function delfactura($id_factura){
		$sql = "DELETE FROM fac_venta WHERE id_factura='".$id_factura."';";
		$this->cons($sql);
	}
	function updfactura($id_factura,$fecha,$subtotal,$total,$iva,$cliente_id,$estado,$descuento,$usuario_id,$observacion){
		$sql = "UPDATE fac_venta SET fecha='".$fecha."',subtotal='".$subtotal."',total='".$total."',iva='".$iva."'
		,cliente_id='".$cliente_id."',estado='".$estado."',descuento='".$descuento."',usuario_id='".$usuario_id."',observacion='".$observacion."' 
		WHERE id_factura='".$id_factura."';";
		$this->cons($sql);
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	function selfactura(){
		$sql = "SELECT * from fac_venta order by id_factura DESC LIMIT 1";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selfactura1($id_factura){
		$sql = "SELECT MAX(fac_venta.id_factura) as id_factura, fecha, subtotal, total, iva, cliente_id, estado, descuento, usuario_id, 
		observacion FROM fac_venta WHERE id_factura='".$id_factura."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
//SELECT `id_producto`, `codigo_barras`, `descripcion`, `precio_venta`, `impuesto`, `categoria_id` FROM `producto` WHERE 1

	function selproducto(){
		$sql = "SELECT id_producto, descripcion FROM producto;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	}
	
?>