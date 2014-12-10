<?php
include("controlador/conexion.php");
class minventario{

	function minventario(){
	}
	
	function insert_inventario($producto, $fecha, $cantidad, $entrada, $observacion){
        $sql = "INSERT INTO inventario values (NULL, '".$producto."','".$fecha."','".$cantidad."','".$entrada."','".$observacion."');";
        $this->cons($sql);
	}

    function delete_inventario($id_inventario){
    	$sql = "DELETE FROM inventario where id_inventario='".$id_inventario."';";
    	$this->cons($sql);
    }

    function update_inventario($id_inventario, $producto, $fecha, $cantidad, $entrada, $observacion){
        $sql = "UPDATE inventario SET producto_id='".$producto."', fecha='".$fecha."', cantidad='".$cantidad."',entrada='".$entrada."', observacion='".$observacion."' WHERE id_inventario='".$id_inventario."';";
        $this->cons($sql);
    } 

    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function selProducto(){
		$sql= "SELECT id_producto, codigo_barras, descripcion FROM producto order by codigo_barras";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function select(){
       $sql = "SELECT inventario.id_inventario, producto.codigo_barras, producto.descripcion, inventario.fecha, inventario.cantidad, inventario.entrada, inventario.observacion FROM inventario INNER JOIN producto ON producto.id_producto = inventario.producto_id order by inventario.id_inventario;";
        $conexionBD = new conexion();        
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;

	}
	function selEditar($id_inventario){
		$sql = "SELECT * FROM inventario WHERE id_inventario = '".$id_inventario."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selMovimiento($filtro,$rvalini,$rvalfin){
		$sql = "SELECT inventario.id_inventario, producto.codigo_barras, producto.descripcion, inventario.fecha, inventario.cantidad, inventario.entrada, inventario.observacion FROM inventario INNER JOIN producto ON producto.id_producto = inventario.producto_id";
		if($filtro)
		$sql.= " WHERE producto.codigo_barras LIKE '%".$filtro."%'";
		$sql.= " ORDER BY inventario.id_inventario LIMIT ".$rvalini.", ".$rvalfin;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>