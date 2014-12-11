<?php 
    include ("modelo/musuario.php");
      include ("modelo/mpagina.php");
    $ins = new musuario();

   
    $pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
    $id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"]:NULL;
    $tipo_document = isset($_POST["tipo_document"]) ? $_POST["tipo_document"]:NULL;
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"]:NULL;
    $apellido = isset($_POST["apellido"]) ? $_POST["apellido"]:NULL;
    $telefono_1 = isset($_POST["telefono_1"]) ? $_POST["telefono_1"]:NULL;
    $celular = isset($_POST["celular"]) ? $_POST["celular"]:NULL;
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"]:NULL;
    $e_mail = isset($_POST["e_mail"]) ? $_POST["e_mail"]:NULL;
    $cargo = isset($_POST["cargo"]) ? $_POST["cargo"]:NULL;
    $clave = isset($_POST["clave"]) ? $_POST["clave"]:NULL;
    $perfil_id = isset($_POST["perfil_id"]) ? $_POST["perfil_id"]:NULL;
    $fecha_ingreso = isset($_POST["fecha_ingreso"]) ? $_POST["fecha_ingreso"]:NULL;
    $salario = isset($_POST["salario"]) ? $_POST["salario"]:NULL;
    $activo = isset($_POST["activo"]) ? $_POST["activo"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    $editar = $ins->selEditar($pr);
    $document = $ins->selparametro(1);
    $perfil = $ins->selPerfil();
    $dat = $ins->selecUsu();
    
     
    $delete = isset($_GET["delete"]) ? $_GET["delete"]:NULL;
    if ($delete){
      $ins->deleteUsu($delete);
    }

    if($id_usuario && $actu ){
            $ins->updateUsu($id_usuario, $tipo_document, $nombre ,$apellido , $telefono_1 , $celular , $direccion , $e_mail , $cargo , $clave , $perfil_id , $fecha_ingreso , $salario , $activo );
    }


 //   if($id_usuario && $tipo_document && $nombre && $apellido && $telefono_1 && $celular && $direccion && $e_mail && $cargo && $clave && $perfil_id && $fecha_ingreso && $salario && $activo && $actu ){
   //     	$ins->updateUsu($tipo_document, $nombre ,$apellido , $telefono_1 , $celular , $direccion , $e_mail , $cargo , $clave , $perfil_id , $fecha_ingreso , $salario , $activo );
   // }

  
     if($id_usuario && $tipo_document && $nombre && $apellido && $telefono_1 && $celular && $direccion && $e_mail && $cargo && $clave && $perfil_id && $fecha_ingreso && $salario  && !$actu ){
        $duplicar = $ins->Duplicidad($id_usuario);
        if ($duplicar==0){
         $ins->insertUsu($id_usuario, $tipo_document, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail, $cargo , $clave , $perfil_id , $fecha_ingreso , $salario , $activo );
           if($perusu==1 || $perusu==2){
            echo "<script type='text/javascript'>alert('Se ha registro satisfactoriamente el usuario.');window.location='home2.php?pac=105';</script>";
        }else {
           echo "<script type='text/javascript'>alert('Se ha registro satisfactoriamente el usuario.');window.location='home2.php?pac=105';</script>";   
        }    
        }
    }

     //if(!$actu && $id_usuario && $tipo_document && $nombre && $apellido && $telefono_1 && $celular && $direccion && $e_mail && $cargo && $clave && $perfil_id && $fecha_ingreso && $salario && $activo){
       //     $ins->insertUsu($id_usuario, $tipo_document, $nombre, $apellido, $telefono_1, $celular, $direccion, $e_mail, $cargo , $clave , $perfil_id , $fecha_ingreso , $salario , $activo );
        //}
   
   
      //Paginar
    $bo = "";
    $nreg = 4;//numero de registros a mostrar
    $pag = new mpagina($nreg);
    $conp ="SELECT count(id_usuario)as Npe FROM usuario";  
    if($filtro) $conp.= " WHERE usuario.id_usuario LIKE '%".$filtro."%'";
?>