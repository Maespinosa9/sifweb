<?php 
    include ("modelo/mproveedor.php");
    include ("modelo/mpagina.php");
    $ins = new mproveedor();

    $delete = isset($_GET["delete"]) ? $_GET["delete"]:NULL;
    if ($delete){
      $ins->delete_proveedor($delete);
    }

  $pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
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


    if($id_nit && $tipo_documento && $razon_social && $telefono_1  && $direccion && $e_mail  && $contacto && !$actu){
        $duplicar = $ins->Duplicidad($id_nit);
        if ($duplicar==0){
            $ins->insert_proveedor($id_nit, $tipo_documento, $razon_social, $telefono_1, $telefono_2, $direccion, $e_mail, $observaciones, $contacto);
          if($perusu==1 || $perusu==2){
            echo "<script type='text/javascript'>alert('Se ha registro satisfactoriamente el proveedor.');window.location='home.php?pac=101';</script>";
        }else {
           echo "<script type='text/javascript'>alert('Se ha registro satisfactoriamente el proveedor.');window.location='home.php?pac=101';</script>";   
        }    
    }
     
    }


   
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    $dat = $ins->select_proveedor1($pr);

    //Paginar
    $bo = "";
    $nreg = 4;//numero de registros a mostrar
    $pag = new mpagina($nreg);
    $conp ="SELECT count(id_nit)as Npe FROM proveedor";  
    if($filtro) $conp.= " WHERE proveedor.id_nit LIKE '%".$filtro."%'";

 
?>