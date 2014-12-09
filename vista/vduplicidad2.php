<?php
  include ("../controlador/conexion.php");
  //echo "<script type='text/javascript'>alert('HOLA MUNDO');</script>";
  $valor = $_REQUEST["Id"];
  $sql2 = "SELECT count(id_cliente) as total FROM cliente WHERE id_cliente='".$valor."';";
  $conexionBD = new conexion();
  $conexionBD->conectarBD();
  $estados = $conexionBD->ejeCon($sql2,0);
  $estados[0]["total"];   if ($estados[0]["total"] != 0) {

    echo "<script type='text/javascript'>alert('El numero del documento ya esta registrado');</script>";
  }
  
?>