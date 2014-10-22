<?php
include ("/modelo/mtienda.php");
	$ins = new mtienda();
	
	//Eliminar
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
		$ins->deltienda($del);
	}
	
	$id_nit= isset($_POST["nit"]) ? $_POST["nit"]:NULL;
	$razon_social= isset($_POST["razon_social"]) ? $_POST["razon_social"]:NULL;
	$direccion= isset($_POST["direccion"]) ? $_POST["direccion"]:NULL;
	$telefono= isset($_POST["telefono"]) ? $_POST["telefono"]:NULL;
	$celular= isset($_POST["celular"]) ? $_POST["celular"]:NULL;
	$e_mail= isset($_POST["e_mail"]) ? $_POST["e_mail"]:NULL;
	$regimen= isset($_POST["regimen"]) ? $_POST["regimen"]:NULL;
	$resolucion= isset($_POST["resolucion"]) ? $_POST["resolucion"]:NULL;
	$logo = isset($_POST["logo"]) ? $_POST["logo"]:NULL;
	$administrador = isset($_POST["administrador"]) ? $_POST["administrador"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	
	if ($id_nit && $razon_social && $direccion && $telefono && $celular && $e_mail && $regimen && $resolucion && $logo && $administrador && $actu){
		$ins->updtienda($id_nit , $razon_social , $direccion , $telefono , $celular ,$e_mail , $regimen, $resolucion ,$logo , $administrador);
	}
	
	
 if ($id_nit && $razon_social && $direccion && $telefono && $celular && $e_mail && $regimen && $resolucion && $logo && $administrador && !$actu){
		$ins->instienda($id_nit , $razon_social , $direccion , $telefono , $celular ,$e_mail , $regimen, $resolucion ,$logo , $administrador);
	}
	
	$dat1 = $ins->seltienda();
	

?>