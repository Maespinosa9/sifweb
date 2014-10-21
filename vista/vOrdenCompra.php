<?Php
include ("../controlador/cOrdenCompra.php");
?>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<center>

<div name="OrdenCompra" id="izquierda">
<h3>INGRESAR ORDEN DE COMPRA</h3>

<form name="OrdenCompra" action="" method="post">
	<label>Fecha de Compra&nbsp;</label>
	<input type="date" id= "FechaFactura" name="FechaFactura" required="required"/><br/><br/>
    <label>Fecha de Vencimiento</label>
    <input style="width:14em; height:2em" type = "date" id= "Vencimiento" name = "Vencimiento" /><br/><br/>
    <input style="width:14em; height:1em" type = "text" id="Factura" name = "Factura" placeholder="N&uacute;mero de Factura" size="20px"/>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type = "text" id = "subtotal" name="subtotal" placeholder="SubTotal" size="20px"/>
    <br/>
    <input type = "text" id = "iva" name= "iva" placeholder="Iva" size="20px"/></br><br/>
    Pagado  <input type="checkbox" id= "Pagado" name="pagado" value="True"></br><br/>
    Usuario
    <select name="Usuario" >
    <?php 
		for($i = 0; $i<count($usu); $i++){
	?>
    <option value="<?php echo $usu[$i]['id_usuario']; ?>" ><?php echo $usu[$i]['nombre']; ?> <?php echo $usu[$i]['apellido']; ?></option>
    <?php
		}
	?>
    </select></br><br/>
    <input type="text" id="descuento" name="descuento" placeholder="Descuento %"></br><br/>
    <input type="text" id ="Total" name = "Total" placeholder="Valor Total"></br><br/>
    <textarea id="Observaciones" name= "Observaciones" rows="4" cols="50" placeholder="Ingrese sus Observaciones, M&aacute;ximo 250 caracteres" maxlength="250"></textarea><br><br/>
	<input type="text" name="Vendedor" id="Vendedor" placeholder="Vendedor">
    <input type="text" name="ajuste" id="ajuste" placeholder="Ajuste">
    Seleccione el Proveedor
    <select name="proveedor">
    <?php
		for ($i = 0; $i<count($pro); $i++){
	?>
    	<option value="<?php echo $pro[$i]['id_nit']; ?>"><?php echo $pro[$i]['razon_social']; ?></option>
    <?php
		}
	?>
    </select>
</form>
</div>
	