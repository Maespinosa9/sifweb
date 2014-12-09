<?php
include ("/modelo/mabonocompra.php");
	$ins = new mabonocompra();
	
	//Eliminar
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
		$ins->deltienda($del);
	}

	$pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
	$orden_id = isset($_GET["er"]) ? $_GET["er"]:NULL;
	$id_abono= isset($_POST["id_abono"]) ? $_POST["id_abono"]:NULL;
	$valor= isset($_POST["valor"]) ? $_POST["valor"]:NULL;
	$fecha= isset($_POST["fecha"]) ? $_POST["fecha"]:NULL;
	$orden_id= isset($_POST["orden_id"]) ? $_POST["orden_id"]:NULL;
	$forma_pago= isset($_POST["forma_pago"]) ? $_POST["forma_pago"]:NULL;
	$usuario_id= isset($_POST["usuario_id"]) ? $_POST["usuario_id"]:NULL;
	$observacion= isset($_POST["observacion"]) ? $_POST["observacion"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;

 
	

	$dat1 = $ins->usuario();
	$dat2 = $ins->orden();
	$dat = $ins->selec();


	
	if ($id_abono && $valor && $fecha && $orden_id && $forma_pago && $usuario_id   &&  !$actu){
		$ins->insabono($id_abono , $valor , $fecha , $orden_id , $forma_pago , $usuario_id , $observacion );
	}

	//actualiza
 if ( $id_abono && $valor && $fecha  && $forma_pago && $orden_id  && $usuario_id  && $actu){
		$ins->updabo($id_abono , $valor , $fecha , $orden_id , $forma_pago , $usuario_id , $observacion );
	}
	
	
	
	

?>