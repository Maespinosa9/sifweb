<?php

include ("../controlador/conexion.php");
//SELECT `codubi`, `nomubi` FROM `vieubica` WHERE 1
//SELECT `codubi`, `nomubi`, `depubi`, `estado` FROM `ubicacion` WHERE 1
    $valor = $_REQUEST["valor"];
	if($valor==0){
	}else{
    $sql2 = "SELECT id_producto, precio_venta FROM producto WHERE id_producto=".$valor.";";
	//echo $sql2;
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$estados = $conexionBD->ejeCon($sql2,0);
	$result=array();
	$i=0;
	foreach($estados as $estado){
		$result[$i]["value"]=$estado["id_producto"];
		$result[$i]["precio_venta"]=$estado["precio_venta"];
		$i++;
		}
	$div='Precio<br/>';   
	$html='<select name="precio_venta" id="precio_venta" style="width: 195px;">';
	//$html.='<option value=""></option>';
	foreach($result as $res){
			$html.='<option value="'.$res["precio_venta"].'">'.$res["precio_venta"].'</option>';
		}
	$html.='</select>';
	echo $div;
	echo $html;
	}
?>