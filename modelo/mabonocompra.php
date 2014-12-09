<?php
include ("/controlador/conexion.php");
class mabonocompra{
	var $arr;
	function mabonocompra(){}
	
	function insabono($id_abono , $valor , $fecha , $orden_id , $forma_pago , $usuario_id , $observacion ){
		$sql = "INSERT INTO abono_compra ( id_abono , valor , fecha , orden_id , forma_pago , usuario_id , observacion ) VALUES ('".$id_abono."', '".$valor."', '".$fecha."', '".$orden_id."', '".$forma_pago."','".$usuario_id."', '".$observacion."');";
		$this->cons($sql);
		
	}
	
	function deltienda($id_abono){
		$sql = "DELETE FROM abono_compra WHERE id_abono='".$id_abono."'";
		$this->cons($sql);
	}
	
	
	function updabo($id_abono , $valor , $fecha , $orden_id , $forma_pago , $usuario_id , $observacion){
		$sql = "UPDATE abono_compra SET id_abono='".$id_abono."', valor='".$valor."', fecha='".$fecha."', orden_id='".$orden_id."', forma_pago='".$forma_pago."', usuario_id='".$usuario_id."', observacion='".$observacion."';";
		$this->cons($sql);
		
	}

		function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	
	}	

	function usuario(){
		$sql = "SELECT id_usuario,  nombre , apellido FROM usuario";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function orden(){
		$sql = "SELECT id_orden,  fecha_factura  FROM orden_compra";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selec(){
		$sql = "SELECT ab.id_abono , ab.valor , DATE_FORMAT(ab.fecha,'%Y-%m-%d') fecha, ab.orden_id , ab.forma_pago , ab.usuario_id , ab.observacion , a.nombre, a.apellido FROM abono_compra AS ab, usuario AS a WHERE ab.usuario_id=a.id_usuario ";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}


}
?>	