<?php
include("controlador/conexion.php");

class mcaja{

	function mcaja(){

	}
	
	function insert($id_ncaja, $usuario_id){
		$sql = "INSERT INTO ncaja (id_ncaja, usuario_id) VALUES ('".$id_ncaja."', '".$usuario_id."');";
		$this->cons($sql);
	}
	
	function delete($id_ncaja){
		$sql = "DELETE FROM ncaja WHERE id_ncaja='".$id_ncaja."';";
		$this->cons($sql);
	}
	
	function update($id_ncaja, $usuario_id){
		$sql = "UPDATE ncaja SET usuario_id='".$usuario_id."' WHERE id_ncaja = '".$id_ncaja."';";
		$this->cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	function selusuario(){
		$sql = "SELECT id_usuario, nombre, apellido FROM usuario;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function selec(){
		$sql = "SELECT c.id_ncaja, c.usuario_id, u.id_usuario, u.nombre, u.apellido FROM ncaja as c inner join usuario as u on c.usuario_id=u.id_usuario";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selEditar($id_ncaja){
		$sql = "SELECT  * FROM ncaja WHERE id_ncaja = '".$id_ncaja."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function Duplicidad($id_ncaja){
		$sql = "SELECT count(id_ncaja) as total FROM ncaja WHERE id_ncaja='".$id_ncaja."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data[0]["total"];
	}

}
