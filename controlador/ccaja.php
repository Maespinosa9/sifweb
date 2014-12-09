<?php
	include ("modelo/mcaja.php");
    
    $ins = new mcaja();
   
    $pac=113;
    $id_ncaja =isset($_POST["id_ncaja"]) ? $_POST["id_ncaja"]:NULL;
	$usuario_id =isset($_POST["usuario_id"]) ? $_POST["usuario_id"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    $arrayProducto = $ins->selusuario();
    $editar = $ins->selEditar($pr);

    $del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	if ($del){
		$ins->delete($del);
	}
    
    //actualizar
    if ($id_ncaja && $actu){
		$ins->update($id_ncaja ,$usuario_id);
	}
	
	//Insertar

	if ($id_ncaja&&$usuario_id&&!$actu){
		$duplicar = $ins->Duplicidad($id_ncaja);
		if ($duplicar==0){
		$ins->insert($id_ncaja,$usuario_id);
	       if($perusu==1 || $perusu==2){
            echo "<script type='text/javascript'>alert('Se registro la caja.');window.location='home2.php?pac=113';</script>";
        }else {
           echo "<script type='text/javascript'>alert('Se registro la caja.');window.location='home2.php?pac=113';</script>";   
        }    
        }
    }
	


	?>