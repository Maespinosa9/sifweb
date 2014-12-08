<?php
include("controlador/conexion.php");
class musuario{
	var $arr;
	function musuario(){

	}

	
	function insertUsu($id_usuario, $tipo_document, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail, $cargo, $clave, $perfil_id, $fecha_ingreso, $salario, $activo){
         $sql = "INSERT INTO usuario values ('".$id_usuario."', '".$tipo_document."','".$nombre."','".$apellido."','".$telefono_1."','".$celular."','".$direccion."','".$e_mail."','".$cargo."','".$clave."','".$perfil_id."','".$fecha_ingreso."','".$salario."','".$activo."');";
         $this->cons($sql);
	}

    function deleteUsu($id_usuario){
    	$sql = "DELETE FROM usuario where id_usuario='".$id_usuario."';";
    	$this->cons($sql);
    }

    function updateUsu($id_usuario, $tipo_document, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail, $cargo, $clave, $perfil_id, $fecha_ingreso, $salario, $activo){
        $sql = "UPDATE usuario SET  tipo_document='".$tipo_document."', nombre='".$nombre."', apellido='".$apellido."', telefono_1='".$telefono_1."',celular='".$celular."', direccion='".$direccion."', e_mail='".$e_mail."', cargo='".$cargo."', clave='".$clave."', perfil_id='".$perfil_id."', fecha_ingreso='".$fecha_ingreso."', salario='".$salario."', activo='".$activo."' WHERE id_usuario='".$id_usuario."';";
        $this->cons($sql);
    } 

    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function selecUsu(){
		$sql= "SELECT * FROM usuario ";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function Duplicidad($id_usuario){
		$sql = "SELECT count(id_usuario) as total FROM usuario WHERE id_usuario='".$id_usuario."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data[0]["total"];
	}

	function selparametro($a){
       $sql = "SELECT  idvalor, nomvalor, idparametro FROM valor WHERE idparametro = '".$a."';";
        $conexionBD = new conexion();        
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selperfil(){
       $sql = "SELECT id_perfil, descripcion FROM perfil ";
        $conexionBD = new conexion();        
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selEditar($id_usuario){
		$sql = "SELECT  * FROM usuario WHERE id_usuario = '".$id_usuario."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>