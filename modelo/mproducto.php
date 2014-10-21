<?php
include("controlador/conexion.php");
class mproducto{

	function mproducto(){
	}
	
	function insert_producto($id_producto, $codigo_barras, $descripcion, $precio_venta, $impuesto, $categoria_id){
        $sql = "INSERT INTO producto values ('".$id_producto."', '".$codigo_barras."','".$descripcion."','".$precio_venta."','".$impuesto."','".$categoria_id."');";
        $this->cons($sql);
	}

    function delete_producto($id_producto){
    	$sql = "DELETE FROM producto where id_producto='".$id_producto."';";
    	$this->cons($sql);
    }

    function update_producto($id_producto, $codigo_barras, $descripcion, $precio_venta, $impuesto, $categoria_id){
        $sql = "UPDATE producto SET codigo_barras='".$codigo_barras."', descripcion='".$descripcion."', precio_venta='".$precio_venta."',impuesto='".$impuesto."', categoria_id='".$categoria_id."' WHERE id_producto='".$id_producto."';";
        $this->cons($sql);
    } 

    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function select_producto1(){
		$sql= "SELECT id_producto, codigo_barras, descripcion, precio_venta, impuesto, categoria_id FROM producto";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function select_producto2($id_producto){
       $sql = "SELECT id_producto, codigo_barras, descripcion, precio_venta, impuesto, categoria_id FROM producto WHERE id_producto = '".$id_producto."';";
        $conexionBD = new conexion();        
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;

	}
}
?>