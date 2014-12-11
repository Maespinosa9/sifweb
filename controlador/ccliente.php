<?php 
    include ("modelo/mcliente.php");
    include ("modelo/mpagina.php");
    
    $ins = new mcliente();
 


    $pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
    $id_cliente = isset($_POST["id_cliente"]) ? $_POST["id_cliente"]:NULL;
    $tipo_documento = isset($_POST["tipo_documento"]) ? $_POST["tipo_documento"]:NULL;
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"]:NULL;
    $apellido = isset($_POST["apellido"]) ? $_POST["apellido"]:NULL;
    $telefono_1 = isset($_POST["telefono_1"]) ? $_POST["telefono_1"]:NULL;
    $celular = isset($_POST["celular"]) ? $_POST["celular"]:NULL;
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"]:NULL;
    $e_mail = isset($_POST["e_mail"]) ? $_POST["e_mail"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    
    $editar = $ins->select2($pr);

    $document = $ins->selpara(1);
   
 
    
    $delete = isset($_GET["delete"]) ? $_GET["delete"]:NULL;
    if ($delete){
      $ins->delete($delete);
    }

    if($id_cliente && $actu ){
            $ins->update($id_cliente, $tipo_documento, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail);
    }



    if($id_cliente && $tipo_documento && $nombre && $apellido && $telefono_1 && $celular && $direccion && $e_mail && !$actu){
        $duplicar = $ins->Duplicidad($id_cliente);
        if ($duplicar==0){
            $ins->insert($id_cliente, $tipo_documento, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail);
           if($perusu==1 || $perusu==2){
            echo "<script type='text/javascript'>alert('Se ha registro satisfactoriamente el cliente.');window.location='home.php?pac=114';</script>";
        }else {
           echo "<script type='text/javascript'>alert('Se ha registro satisfactoriamente el cliente.');window.location='home.php?pac=114';</script>";   
        }    
        }
    }

    //Paginar
    $bo = "";
    $nreg = 5;//numero de registros a mostrar
    $pag = new mpagina($nreg);
    $conp ="SELECT count(id_cliente)as Npe FROM cliente";  
    if($filtro) $conp.= " WHERE cliente.id_cliente LIKE '%".$filtro."%'";
?>