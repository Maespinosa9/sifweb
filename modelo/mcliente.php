<?php
include("controlador/conexion.php");
class mcliente{
	var $arr;
	function mcliente(){

	}

	function insert($id_cliente, $tipo_documento, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail){
        $sql = "INSERT INTO cliente values ('".$id_cliente."', '".$tipo_documento."','".$nombre."','".$apellido."','".$telefono_1."','".$celular."','".$direccion."','".$e_mail."');";
        $this->cons($sql);
	}

    function delete($id_cliente){
    	$sql = "DELETE FROM cliente where id_cliente='".$id_cliente."';";
    	$this->cons($sql);
    }

    function update($id_cliente, $tipo_documento, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail){
        $sql = "UPDATE cliente SET tipo_documento='".$tipo_documento."',  nombre='".$nombre."', apellido='".$apellido."', telefono_1='".$telefono_1."', celular='".$celular."', direccion='".$direccion."', e_mail='".$e_mail."' WHERE id_cliente='".$id_cliente."';";
        $this->cons($sql);
    } 

    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

   	function Duplicidad($id_cliente){
		$sql = "SELECT count(id_cliente) as total FROM cliente WHERE id_cliente='".$id_cliente."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data[0]["total"];
	}

	function select(){
		$sql= "SELECT * FROM cliente";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function select2($id_cliente){
		$sql= "SELECT * FROM cliente  WHERE id_cliente = '".$id_cliente."';";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
    

	function selpara($num){
       $sql = "SELECT  idvalor, nomvalor, idparametro FROM valor WHERE idparametro='".$num."';";
        $conexionBD = new conexion();        
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

}
?>