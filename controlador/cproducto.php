<?php 
    include ("modelo/mproducto.php");
    include ("modelo/mpagina.php");
    $ins = new mproducto();

    $delete = isset($_GET["delete"]) ? $_GET["delete"]:NULL;
    if ($delete){
      $ins->delete_producto($delete);
    }

    
    $pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
    $id_producto = isset($_POST["idProducto"]) ? $_POST["idProducto"]:NULL;
    $codigo_barras = isset($_POST["codBarras"]) ? $_POST["codBarras"]:NULL;
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"]:NULL;
    $precio_venta = isset($_POST["preVenta"]) ? $_POST["preVenta"]:NULL;
    $impuesto = isset($_POST["impuesto"]) ? $_POST["impuesto"]:NULL;
    $categoria_id = isset($_POST["categoria"]) ? $_POST["categoria"]:NULL;
    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    $arrayCategoria = $ins->selCategoria();
    $editar = $ins->selEditar($pr);


    $actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
    	if($codigo_barras && $descripcion && $precio_venta && $impuesto && $categoria_id && $actu){
        	$ins->update_producto($id_producto,$codigo_barras, $descripcion, $precio_venta, $impuesto, $categoria_id);
    }

    if(!$actu && $codigo_barras && $descripcion && $precio_venta && $impuesto && $categoria_id){
        $ins->insert_producto($codigo_barras, $descripcion, $precio_venta, $impuesto, $categoria_id);
    }
	
    $tabla = $ins->select();

    //Paginar
    $bo = "";
    $nreg = 3;//numero de registros a mostrar
    $pag = new mpagina($nreg);
    $conp ="SELECT count(id_producto)as Npe FROM producto";  
    if($filtro) $conp.= " WHERE producto.id_producto LIKE '%".$filtro."%'";
?>