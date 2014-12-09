<?php
include ("controlador/conexion.php");


class mfactura {
	var $arr;

	function mfactura(){}

	function insfactura($fecha,$subtotal,$total,$iva,$cliente_id,$estado,$descuento,$usuario_id,$observacion){
	$sql = "INSERT INTO fac_venta (fecha, subtotal, total, iva, cliente_id, estado, descuento, usuario_id, observacion) 
	values ('".$fecha."', '".$subtotal."','".$total."','".$iva."','".$cliente_id."','".$estado."',
	'".$descuento."','".$usuario_id."','".$observacion."');";
	$this->cons($sql);
	
		}
//INSERT INTO `detalle_venta`(`id_detalle`, `producto_id`, `cantidad`, `valor_unitario`, `factura_id`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
	function insdetalle_venta(){
		$$sql = "INSERT INTO detalle_venta (producto_id, cantidad, valor_unitario, factura_id) 
	values ('".$producto_id."', '".$cantidad."','".$valor_unitario."','".$factura_id."');";
	$this->cons($sql);
		}
		
	function delfactura($id_factura){
		$sql = "DELETE FROM fac_venta WHERE id_factura='".$id_factura."';";
		$this->cons($sql);
	}
	function updfactura($id_factura,$fecha,$subtotal,$total,$iva,$cliente_id,$estado,$descuento,$usuario_id,$observacion){
		$sql = "UPDATE fac_venta SET fecha='".$fecha."',subtotal='".$subtotal."',total='".$total."',iva='".$iva."'
		,cliente_id='".$cliente_id."',estado='".$estado."',descuento='".$descuento."',
		usuario_id='".$usuario_id."',observacion='".$observacion."' WHERE id_factura='".$id_factura."';";
		$this->cons($sql);
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	function selfactura(){
		$sql = "SELECT id_factura from fac_venta order by id_factura DESC LIMIT 1";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	

	function selproducto($Codigo){
		$sql = "SELECT id_producto, descripcion FROM producto where codigo_barras = '".$Codigo."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	}
	
?>