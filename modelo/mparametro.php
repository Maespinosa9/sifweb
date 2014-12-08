<?php
include ("controlador/conexion.php");


class mparametro{
	var $arr;
	function mparametro(){}
	
	function inspar($nomparametro,$delpara){
		$sql = "INSERT INTO parametro (nomparametro,parametro_fijo) VALUES ('".$nomparametro."','".$delpara."');";
		$this->cons($sql);
	}
	
	function insval($idvalor, $nomvalor, $idparametro, $delvalor){
		$sql = "INSERT INTO valor ( idvalor , nomvalor, idparametro, valor_fijo ) values ('".$idvalor."', '".$nomvalor."', '".$idparametro."',
		'".$delvalor."');";
		$this->cons($sql);
	}

	function delpar($idparametro){
		$sql = "DELETE FROM parametro WHERE idparametro='".$idparametro."';";
		$this->cons($sql);
	}
	
	function delval($idvalor){
		$sql = "DELETE FROM valor WHERE idvalor='".$idvalor."';";
		$this->cons($sql);
	}

	function updpar($idparametro, $nomparametro){
		$sql = "UPDATE parametro SET nomparametro='".$nomparametro."' WHERE idparametro='".$idparametro."';";
		$this->cons($sql);
	}

    function updval($idvalor, $nomvalor, $idparametro){
		$sql = "UPDATE valor SET idvalor='".$idvalor."' , nomvalor='".$nomvalor."' , idparametro='".$idparametro."' WHERE idvalor='".$idvalor."';";
		$this->cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	function selpar(){
		$sql = "SELECT idparametro, nomparametro , parametro_fijo FROM parametro;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
		function selval(){
		$sql = "SELECT valor.idvalor, valor.nomvalor, valor.idparametro, parametro.nomparametro FROM valor, parametro;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selpar1($idparametro){
		$sql = "SELECT idparametro, nomparametro FROM parametro WHERE idparametro='".$idparametro."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selval2($idvalor){
		$sql = "SELECT idvalor, nomvalor FROM valor WHERE idvalor='".$idvalor."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function selval1(){
		$sql = "SELECT valor.idvalor, valor.nomvalor,valor.valor_fijo, valor.idparametro, parametro.nomparametro FROM valor, parametro WHERE valor.idparametro= parametro.idparametro;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	
	}
		function selpaji($filtro,$rvalini,$rvalfin){
		$sql = "SELECT parametro.nompar ,valor.codval, valor.nomval, valor.valor_fijo  FROM parametro LEFT JOIN valor ON parametro.codpar=valor.codpar";
		if($filtro)
			$sql.= " WHERE valor.codval LIKE '%".$filtro."%'";
		$sql .= "  ORDER BY valor.codval LIMIT ".$rvalini.", ".$rvalfin;
		//echo "<br><br>".$sql."<br><br>";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}	
		

}
?>