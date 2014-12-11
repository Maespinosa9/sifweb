<?php 
    include ("modelo/mcategoria.php");
    include ("modelo/mpagina.php");
    
    $ins = new mcategoria();
 


    $pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
    $id_categoria = isset($_POST["id_categoria"]) ? $_POST["id_categoria"]:NULL;
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    
    $editar = $ins->select2($pr);

   
    $delete = isset($_GET["delete"]) ? $_GET["delete"]:NULL;
    if ($delete){
      $ins->delete($delete);
    }

    if($id_categoria && $actu ){
            $ins->update($id_categoria, $descripcion);
    }

    if($descripcion && !$actu){
         $ins->insert($descripcion);
    }
    

    //Paginar
    $bo = "";
    $nreg = 5;//numero de registros a mostrar
    $pag = new mpagina($nreg);
    $conp ="SELECT count(id_categoria)as Npe FROM categoria_producto";  
    if($filtro) $conp.= " WHERE categoria_producto.id_categoria LIKE '%".$filtro."%'";
?>