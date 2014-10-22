<?php
include ("/controlador/conexion.php");
class mtienda{
	var $arr;
	function mtienda(){}

	function instienda($id_nit , $razon_social , $direccion , $telefono , $celular ,$e_mail , $regimen, $resolucion ,$logo , $administrador){
		
		$sql = "INSERT INTO tienda ( id_nit ,  razon_social ,  direccion ,  telefono ,  celular ,  e_mail ,  regimen ,  resolucion ,  logo ,  administrador ) VALUES ('".$id_nit."', '".$razon_social."', '".$direccion."', '".$telefono."', '".$celular."','".$e_mail."', '".$regimen."',  '".$resolucion."','".$logo."', '".$administrador."');";
		$this->cons($sql);
		
		
	}
	
	function deltienda($id_nit){
		$sql = "DELETE FROM tienda WHERE id_nit='".$id_nit."'";
		$this->cons($sql);
	}
	
	
	function updtienda($id_nit , $razon_social , $direccion , $telefono , $celular ,$e_mail , $regimen, $resolucion ,$logo , $administrador){
		$sql = "UPDATE tienda SET id_nit='".$id_nit."', razon_social='".$razon_social."', direccion='".$direccion."', telefono='".$telefono."', celular='".$celular."', e_mail='".$e_mail."', regimen='".$regimen."', resolucion='".$resolucion."', logo='".$logo."', administrador='".$administrador."' WHERE id_nit='".$id_nit."';";
		$this->cons($sql);
		
	}

		function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	
	}	

	function seltienda(){
		$sql = "SELECT * FROM tienda";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>	
