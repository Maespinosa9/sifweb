<?php 
    include ("modelo/mproveedor.php");
    $ins = new mproveedor();

    $delete = isset($_GET["delete"]) ? $_GET["delete"]:NULL;
    if ($delete){
      $ins->delete_proveedor($delete);
    }

    $pac = 101;
    $id_nit = isset($_POST["id_nit"]) ? $_POST["id_nit"]:NULL;
    $tipo_documento = isset($_POST["tipo_documento"]) ? $_POST["tipo_documento"]:NULL;
    $razon_social = isset($_POST["razon_social"]) ? $_POST["razon_social"]:NULL;
    $telefono_1 = isset($_POST["telefono_1"]) ? $_POST["telefono_1"]:NULL;
    $telefono_2 = isset($_POST["telefono_2"]) ? $_POST["telefono_2"]:NULL;
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"]:NULL;
    $e_mail = isset($_POST["e_mail"]) ? $_POST["e_mail"]:NULL;
    $observaciones = isset($_POST["observaciones"]) ? $_POST["observaciones"]:NULL;
    $contacto = isset($_POST["contacto"]) ? $_POST["contacto"]:NULL;
    
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	
    	if($id_nit && $actu ){
        	$ins->update_proveedor ($id_nit, $razon_social, $telefono_1, $telefono_2, $direccion, $e_mail, $observaciones, $contacto);
    }


    if(!$actu && $id_nit && $tipo_documento && $razon_social && $telefono_1 && $telefono_2 && $direccion && $e_mail && $observaciones && $contacto ){
        $duplicar = $ins->Duplicidad($id_nit);
        if ($duplicar==0){
            $ins->insert_proveedor($id_nit, $tipo_documento, $razon_social, $telefono_1, $telefono_2, $direccion, $e_mail, $observaciones, $contacto);
    }
}
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    $dat = $ins->select_proveedor1($pr);
?>