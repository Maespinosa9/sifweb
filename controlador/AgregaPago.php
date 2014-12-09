<?php
include_once("conexion.php");
$datos=$_POST["datos"];


function insertarTipoPago($valor){

}


function cons($c){
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$this->result=$conexionBD->ejeCon($c,0);
}

?>