<?php
include("controlador/conexion.php");
class mproducto{

	function mproducto(){
	}
	
	function insert_producto($codigo_barras, $descripcion, $precio_venta, $impuesto, $categoria_id){
        $sql = "INSERT INTO producto values (NULL, '".$codigo_barras."','".$descripcion."','".$precio_venta."','".$impuesto."','".$categoria_id."');";
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

	function selCategoria(){
		$sql= "SELECT id_categoria, descripcion FROM categoria_producto order by descripcion";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function select(){
       $sql = "SELECT producto.id_producto, producto.codigo_barras, producto.descripcion, producto.precio_venta, producto.impuesto, categoria_producto.descripcion as categoria FROM producto INNER JOIN categoria_producto ON categoria_producto.id_categoria = producto.categoria_id order by producto.id_producto;";
        $conexionBD = new conexion();        
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;

	}
	function selEditar($id_producto){
		$sql = "SELECT * FROM producto WHERE id_producto = '".$id_producto."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>