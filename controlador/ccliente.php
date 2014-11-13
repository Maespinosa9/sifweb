<?php 
    include ("modelo/mcliente.php");
    $ins = new mcliente();

    $delete = isset($_GET["delete"]) ? $_GET["delete"]:NULL;
    if ($delete){
      $ins->delete($delete);
    }

    $id_cliente = isset($_POST["documento"]) ? $_POST["documento"]:NULL;
    $tipo_documento = isset($_POST["tipo_documento"]) ? $_POST["tipo_documento"]:NULL;
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"]:NULL;
    $apellido = isset($_POST["apellido"]) ? $_POST["apellido"]:NULL;
    $telefono_1 = isset($_POST["telefono_1"]) ? $_POST["telefono_1"]:NULL;
    $celular = isset($_POST["celular"]) ? $_POST["celular"]:NULL;
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"]:NULL;
    $e_mail = isset($_POST["e_mail"]) ? $_POST["e_mail"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	
    if($id_cliente && $actu ){
        	$ins->update ($tipo_documento, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail);
    }


    if(!$actu && $id_cliente){
        $ins->insert($id_cliente, $tipo_documento, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail);
        echo "<script type='text/javascript'>alert('Se ha registro satisfactoriamente.');</script>";
        /*$duplicar = $ins->Duplicidad($id_cliente);
        if ($duplicar==0){
            $ins->insert($id_clinete, $tipo_documento, $nombre, $telefono_1, $celular, $direccion, $e_mail, $apellido, $contacto);
    }*/
}
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    $dat = $ins->select($pr);
?>