<?php 
    include ("modelo/minventario.php");
     include ("modelo/mpagina.php");

    $ins = new minventario();

    $delete = isset($_GET["delete"]) ? $_GET["delete"]:NULL;
    if ($delete){
      $ins->delete_inventario($delete);
    }

    $pac = 111;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
    $id_inventario = isset($_POST["idInventario"]) ? $_POST["idInventario"]:NULL;
    $producto = isset($_POST["producto"]) ? $_POST["producto"]:NULL;
    $fecha = isset($_POST["fecha"]) ? $_POST["fecha"]:NULL;
    $cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"]:NULL;
    $entrada = isset($_POST["entrada"]) ? 1 : 0;
    $observacion = isset($_POST["observacion"]) ? $_POST["observacion"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    $arrayProducto = $ins->selProducto();
    $editar = $ins->selEditar($pr);


    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    	if($producto && $fecha && $cantidad && $observacion && $actu){
        	$ins->update_inventario($id_inventario,$producto, $fecha, $cantidad, $entrada, $observacion);
    }

    if(!$actu && $producto && $fecha && $cantidad && $entrada && $observacion){
        $ins->insert_inventario($producto, $fecha, $cantidad, $entrada, $observacion);
    }
	
    $tabla = $ins->select();

    //Paginar
        //Paginar
    $bo = "";
    $nreg = 15;//numero de registros a mostrar
    $pag = new mpagina($nreg);
    $conp ="SELECT count(i.id_inventario)as Npe, p.codigo_barras FROM inventario as i inner join producto as p on i.producto_id = p.id_producto";  
    if($filtro) $conp.= " WHERE p.codigo_barras LIKE '%".$filtro."%'";
?>