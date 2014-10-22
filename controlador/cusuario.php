<?php 
    include ("modelo/musuario.php");
    $ins = new musuario();

    $delete = isset($_GET["delete"]) ? $_GET["delete"]:NULL;
    if ($delete){
      $ins->delete($delete);
    }

 
    $id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"]:NULL;
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
    $foto = isset($_POST["foto"]) ? $_POST["foto"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	
    if($id_usuario && $actu ){
        	$ins->update ($id_usuario , $nombre ,$apellido , $telefono_1 , $celular , $direccion , $e_mail , $cargo , $clave , $perfil_id , $fecha_ingreso , $salario , $activo , $foto);
    }


    if(!$actu && $id_usuario){
        $ins->insert($id_usuario , $nombre ,$apellido , $telefono_1 , $celular , $direccion , $e_mail , $cargo , $clave , $perfil_id , $fecha_ingreso , $salario , $activo , $foto);
        echo "<script type='text/javascript'>alert('Se ha registro satisfactoriamente.');</script>";
  
}
     $dat = $ins->selecUsu();
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
   
?>