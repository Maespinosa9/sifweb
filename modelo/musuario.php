<?php
include("controlador/conexion.php");
class musuario{
	var $arr;
	function musuario(){

	}

	
	function insertUsu($id_usuario , $nombre ,$apellido , $telefono_1 , $celular , $direccion , $e_mail , $cargo , $clave , $perfil_id , $fecha_ingreso , $salario , $activo , $foto){
         $sql = "INSERT INTO cliente values ('".$id_usuario."', '".$nombre."','".$apellido."','".$telefono_1."','".$celular."','".$direccion."','".$e_mail."','".$cargo."','".$clave."','".$perfil_id."','".$fecha_ingreso."','".$salario."','".$activo."','".$foto."');";
         $this->cons($sql);
	}

    function deleteUsu($id_usuario){
    	$sql = "DELETE FROM usuario where id_usuario='".$id_usuario."';";
    	$this->cons($sql);
    }

    function updateUsu($id_usuario , $nombre ,$apellido , $telefono_1 , $celular , $direccion , $e_mail , $cargo , $clave , $perfil_id , $fecha_ingreso , $salario , $activo , $foto){
        $sql = "UPDATE usuario SET  id_usuario='".$id_usuario."', nombre='".$nombre."', apellido='".$apellido."', telefono_1='".$telefono_1."',celular='".$celular."', direccion='".$direccion."', e_mail='".$e_mail."', cargo='".$cargo."', clave='".$clave."', perfil_id='".$perfil_id."',fecha_ingreso='".$fecha_ingreso."', salario='".$salario."', activo='".$activo."', foto='".$foto."' WHERE id_usuario='".$id_usuario."';";
        $this->cons($sql);
    } 

    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function selecUsu(){
		$sql= "SELECT * FROM usuario";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selpara($num){
       $sql = "SELECT  codval, nomval, codpar FROM valor WHERE codpar = '".$num."';";
        $conexionBD = new conexion();        
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;

	}
}
?>