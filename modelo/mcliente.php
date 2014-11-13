<?php
include("controlador/conexion.php");
class mcliente{
	var $arr;
	function mcliente(){

	}



	/*function Duplicidad($id_cliente){
		$sql = "SELECT count(id_nit) as total FROM cliente WHERE id_nit='".$id_nit."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data[0]["total"];
	}*/
	
	function insert($id_cliente, $tipo_documento, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail){
        //echo "si entro";
        $sql = "INSERT INTO cliente values ('".$id_cliente."', '".$tipo_documento."','".$nombre."','".$apellido."','".$telefono_1."','".$celular."','".$direccion."','".$e_mail."');";
        //echo $sql;
        $this->cons($sql);
	}

    function delete($id_cliente){
    	$sql = "DELETE FROM cliente where id_cliente='".$id_cliente."';";
    	$this->cons($sql);
    }

    function update($tipo_documento, $nombre, $telefono_1, $celular, $direccion, $e_mail, $apellido){
        $sql = "UPDATE cliente SET  id_cliente='".$id_cliente."', nombre='".$nombre."', apellido='".$apellido."', telefono_1='".$telefono_1."',celular='".$celular."', direccion='".$direccion."', e_mail='".$e_mail."' WHERE id_cliente='".$id_cliente."';";
        //echo $sql;
        $this->cons($sql);
    } 

    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function select(){
		$sql= "SELECT id_cliente, tipo_documento, nombre, telefono_1, celular, direccion, e_mail, apellido  FROM cliente";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selpara($num){
       $sql = "SELECT  idvalor, descripcion, idparametro FROM valor WHERE idparametro = '".$num."';";
        $conexionBD = new conexion();        
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>