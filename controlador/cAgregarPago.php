<?php
	include("../controlador/conexion.php");
	$pago = isset ($_POST["new_pago"]) ? $_POST["new_pago"]:NULL;
	if(!is_null($pago)){
		InsertaTipo($pago);
		$dat = selTipo();
		var_dump($dat);

	}

	function InsertaTipo($pago){
		$sql = "INSERT INTO valor (descripcion, idparametro) VALUES ('".$pago."', 1);";
		$this->cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selTipo (){
		$sql = "SELECT idValor, descripcion FROM valor where idParametro = 1;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

?>