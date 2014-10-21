<?php 
    include ("modelo/mproducto.php");
    $ins = new mproducto();

    $delete = isset($_GET["delete"]) ? $_GET["delete"]:NULL;
    if ($delete){
      $ins->delete_producto($delete);
    }

    $id_producto = isset($_POST["id_producto"]) ? $_POST["id_producto"]:NULL;
    $codigo_barras = isset($_POST["codigo_barras"]) ? $_POST["codigo_barras"]:NULL;
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"]:NULL;
    $precio_venta = isset($_POST["precio_venta"]) ? $_POST["precio_venta"]:NULL;
    $impuesto = isset($_POST["impuesto"]) ? $_POST["impuesto"]:NULL;
    $categoria_id = isset($_POST["categoria_id"]) ? $_POST["categoria_id"]:NULL;
    
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    	if($id_producto && $codigo_barras && $descripcion && $precio_venta && $impuesto && $categoria_id && $actu){
        	$ins->update_producto($id_producto, $codigo_barras, $descripcion, $precio_venta, $impuesto, $categoria_id);
    }

    if(!$actu && $id_producto && $codigo_barras && $descripcion && $precio_venta && $impuesto && $categoria_id){
            $ins->insert_producto($id_producto, $codigo_barras, $descripcion, $precio_venta, $impuesto, $categoria_id);
    }
	
    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    $dat = $ins->select_producto2($pr);
?>