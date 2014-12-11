<?php
include("controlador/conexion.php");
class mcategoria{
	var $arr;
	function mcliente(){

	}

	function insert($descripcion){
        $sql = "INSERT INTO categoria_producto (descripcion) values ('".$descripcion."');";
        $this->cons($sql);
	}

    function delete($id_categoria){
    	$sql = "DELETE FROM categoria_producto where id_categoria='".$id_categoria."';";
    	$this->cons($sql);
    }

    function update($id_categoria,$descripcion){
        $sql = "UPDATE categoria_producto SET descripcion='".$descripcion."' WHERE id_categoria='".$id_categoria."';";
        $this->cons($sql);
    } 

    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function select(){
		$sql= "SELECT * FROM cliente";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

   
    function selpro2($filtro,$rvalini,$rvalfin){
	$sql = "SELECT * FROM categoria_producto";
	if($filtro)
	$sql.= " WHERE id_categoria LIKE '%".$filtro."%'";
	$sql.= " ORDER BY id_categoria LIMIT ".$rvalini.", ".$rvalfin;
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($sql,0);
	return $data;
	}
   

	function select2($id_categoria){
		$sql= "SELECT * FROM categoria_producto  WHERE id_categoria = '".$id_categoria."';";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
    


}
?>