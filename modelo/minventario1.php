<?php<?php
if(isset($_GET["pr"]) && !is_null($_GET["pr"])){
	include_once("../controlador/conexion.php");
}else{
	include_once("../controlador/conexion.php");
}
class minventario1{
	var $arr;
	
	function minventario1(){}

	function selct(){
		$sql = "SELECT * FROM inventario";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function select1($pr){
       $sql = "SELECT inventario.id_inventario, producto.codigo_barras, producto.descripcion, inventario.fecha, inventario.cantidad, inventario.entrada, inventario.observacion FROM inventario as inventario, producto as producto WHERE producto.id_producto = inventario.producto_id && id_inventario = '".$pr."' ;";
        $conexionBD = new conexion();        
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selProducto(){
		$sql= "SELECT id_producto, codigo_barras, descripcion FROM producto";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>