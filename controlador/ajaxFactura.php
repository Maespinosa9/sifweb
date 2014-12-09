<?php
include_once("conexion.php");
include_once("../modelo/mseguridad.php");

$datos=$_POST["datos"];
$Codigo=$_POST["CodigoProducto"] ? $_POST["CodigoProducto"]:NULL ;
$Cantidad=$_POST["Cantidad"] ? $_POST["Cantidad"]:NULL ;

if ($datos == "detalle"){
		$data2 = selProducto($Codigo); 
		$data = selfactura();
		$idfactura = $data[0]['id_factura'];
		$producto = $data2[0]['id_producto'];
		$precio = $data2[0]['precio_venta'];
		$validaProd = validaDetalle($producto, $idfactura);
		$validaInv = validaInventario($producto);
		if ($validaInv[0]['cantidad'] < $Cantidad){
			echo "La cantidad que intenta ingresar no es valida, las existencias para este producto es de: ". $validaInv[0]['cantidad'];
		}else{
			if (is_null($validaProd)){
				$insert = "INSERT INTO detalle_venta (producto_id, cantidad, valor_unitario, factura_id) "; 
				$insert .= "values ('".$producto."', '".$Cantidad."','".$precio."','".$idfactura."');";
				cons($insert);
				actualizaInventario($producto, $Cantidad);
			}else{
				$cant = $Cantidad + $validaProd[0]['cantidad'];
				$update = "UPDATE detalle_venta set cantidad = '".$cant."' where producto_id = '".$producto."' and factura_id = '".$idfactura."'";
				cons($update);
				actualizaInventario($producto, $cant);
			}
			echo "";
		}
}

if ($datos == "Factura"){ 
	date_default_timezone_set("America/Bogota"); 
	$idusu = isset($_SESSION["idUser"]) ? $_SESSION["idUser"]:NULL;
	$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
	$sql = "INSERT INTO fac_venta (fecha, subtotal, total, iva, estado, descuento, usuario_id, observacion) 
	values ('".$fecha."', '0','0','0','1','0','".$idusu."','0');";
	cons($sql);
}

if ($datos == "pinta"){
	$factu = selfactura();
	$resultado = selDetalles($factu[0]['id_factura']);
	return $resultado;
}


function cons($c){
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$conexionBD->ejeCon($c,0);
}

function selfactura(){
		$sql = "SELECT id_factura from fac_venta order by id_factura DESC LIMIT 1";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
}

function selProducto($codigo){
	$sql = "SELECT id_producto, precio_venta FROM producto where codigo_barras = '".$codigo."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($sql,0);
	return $data;
}


function validaDetalle($id_producto, $idfactura){
	$sql = "SELECT id_detalle, cantidad from detalle_venta where producto_id = '".$id_producto."' and factura_id = '".$idfactura."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($sql,0);
	return $data;
}

function validaInventario($id_producto){
	$sql = "SELECT cantidad from inventario where producto_id = '".$id_producto."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($sql,0);
	return $data;
}

function actualizaInventario ($id_producto, $cantidad){
	$cantIni = validaInventario($id_producto);
	$cantFin = $cantIni[0]['cantidad'] - $cantidad;
	echo $cantFin;
	if ($cantFin < 0){
		echo "no se puede actualizar el inventario";
	}else{
		$sql = "UPDATE inventario set cantidad = '".$cantFin."' where producto_id = '".$id_producto."'";
		cons($sql);
	}
}

function selDetalles ($idfactura){
	$sql = "SELECT * from detalle_venta WHERE factura_id = '".$idfactura."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($valida, 0);
	return $data;
}