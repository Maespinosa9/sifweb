<?php
include("controlador/conexion.php");
class mproveedor{
	var $arr;
	function mproveedor(){

	}



	function Duplicidad($id_nit){
		$sql = "SELECT count(id_nit) as total FROM proveedor WHERE id_nit='".$id_nit."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data[0]["total"];
	}
	
	function insert_proveedor($id_nit, $tipo_documento, $razon_social, $telefono_1, $telefono_2, $direccion, $e_mail, $observaciones, $contacto){
       echo "si entro";
        $sql = "INSERT INTO proveedor values ('".$id_nit."', '".$tipo_documento."','".$razon_social."','".$telefono_1."','".$telefono_2."','".$direccion."','".$e_mail."','".$observaciones."','".$contacto."');";
        //echo $sql;
        $this->cons($sql);
	}

    function delete_proveedor($id_nit){
    	$sql = "DELETE FROM proveedor where id_nit='".$id_nit."';";
    	$this->cons($sql);
    }

    function update_proveedor($id_nit, $razon_social, $telefono_1, $telefono_2, $direccion, $e_mail, $observaciones, $contacto){
        $sql = "UPDATE proveedor SET  id_nit='".$id_nit."', razon_social='".$razon_social."', telefono_1='".$telefono_1."',telefono_2='".$telefono_2."', direccion='".$direccion."', e_mail='".$e_mail."', observaciones='".$observaciones."', contacto='".$contacto."' WHERE id_nit='".$id_nit."';";
        //echo $sql;
        $this->cons($sql);
    } 

    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function select_proveedor(){
		$sql= "SELECT id_nit, tipo_documento, razon_social, telefono_1, telefono_2, direccion, e_mail, observaciones, contacto  FROM proveedor";		      
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function select_proveedor1($id_nit){
       $sql = "SELECT  id_nit, tipo_documento, razon_social, telefono_1, telefono_2, direccion, e_mail, observaciones, contacto    FROM proveedor WHERE id_nit = '".$id_nit."';";
        $conexionBD = new conexion();        
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;

	}

function selparametro1($num){
		$sql = "SELECT idValor, nomvalor, idParametro FROM valor where idValor='".$num."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selparametro($a){
		$sql = "SELECT idValor, nomvalor, idParametro FROM valor WHERE idParametro='".$a."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selpro2($filtro,$rvalini,$rvalfin){
	$sql = "SELECT p.*, v.nomvalor FROM proveedor as p inner join valor as v on p.tipo_documento = v.idValor";
	if($filtro)
	$sql.= " WHERE id_nit LIKE '%".$filtro."%'";
	$sql.= " ORDER BY id_nit LIMIT ".$rvalini.", ".$rvalfin;
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($sql,0);
	return $data;
	}
   



}
?>