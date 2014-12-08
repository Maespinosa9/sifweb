<?php
	include ("modelo/mparametro.php");
	//include ("modelo/mpagina.php");
	
	$ins = new mparametro();
	
	$pac=109;
	$ed = isset($_GET["ed"]) ? $_GET["ed"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	$prr = isset($_GET["prr"]) ? $_GET["prr"]:NULL;
	//$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	$idparametro = isset($_POST["idparametro"]) ? $_POST["idparametro"]:NULL;
	$nomparametro = isset($_POST["nomparametro"]) ? $_POST["nomparametro"]:NULL;
	$idvalor = isset($_POST["idvalor"]) ? $_POST["idvalor"]:NULL;
	$nomvalor = isset($_POST["nomvalor"]) ? $_POST["nomvalor"]:NULL;
	$delpara =isset($_POST["parametro_fijo"]) ? $_POST["parametro_fijo"]:NULL;
	$delvalor =isset($_POST["valor_fijo"]) ? $_POST["valor_fijo"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	


	$dat5 = $ins->selpar1($pr);
	$dat3 = $ins->selpar1($prr);
	$dat4 = $ins->selval2($pr);


	//Eliminar
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
		$ins->delpar($del);
	}
	
	$del2 = isset($_GET["del2"]) ? $_GET["del2"]:NULL;
	if ($del2){
		$ins->delval($del2);
	}
	
	//Actualizar
	if ($nomparametro && $actu){
		$ins->updpar($idparametro,$nomparametro);
	}
	
	//Insertar
	if ($nomparametro && !$actu){
		$ins->inspar($nomparametro,$delpara);
	}
	
	//Actualizar Valor
	if($idvalor && $nomvalor && $idparametro && $actu){
		$ins->updval($idvalor, $nomvalor, $idparametro);
	}
	
	//Insertar Valor
	if ($nomvalor && $idparametro && !$actu){
		$ins->insval($idvalor, $nomvalor, $idparametro, $delvalor);
	}
	//Paginar
	//$bo = "";
	//$nreg = 10;//numero de registros a mostrar
	//$pag = new mpagina($nreg);
	//$conp ="SELECT count(codval)as Npe FROM valor";  
	//if($filtro) $conp.= " WHERE valor.codval LIKE '%".$filtro."%'";
	
	//$dat2=$ins->selval1();

?>