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
//SELECT `id_factura`, `fecha`, `subtotal`, `total`, `iva`, `cliente_id`, `estado`, `descuento`, `usuario_id`, `observacion` FROM `fac_venta` WHERE 1
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
		$sql = "SELECT MAX(fac_venta.id_factura) as id_factura , fac_venta.fecha, fac_venta.subtotal, fac_venta.total, 
		fac_venta.iva, cliente.id_cliente as cliente, fac_venta.estado,fac_venta.descuento, usuario.id_usuario as usuario, 
		fac_venta.observacion  FROM fac_venta, cliente, usuario  WHERE fac_venta.cliente_id = cliente.id_cliente 
		AND fac_venta.usuario_id = usuario.id_usuario;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selfactura1($id_factura){
		$sql = "SELECT id_factura, fecha, subtotal, total, iva, cliente_id, estado, descuento, usuario_id, observacion FROM fac_venta WHERE id_factura='".$id_factura."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}


//INSERT INTO `fac_venta`(`id_factura`, `fecha`, `subtotal`, `total`, `iva`, `cliente_id`, `estado`, `descuento`, `usuario_id`, `observacion`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])
	
	}
?>