<?Php
include ("controlador/cOrdenCompra.php");
?>

<div name="OrdenCompra" id="izquierda">
<h3>INGRESAR ORDEN DE COMPRA</h3>

<form name="OrdenCompra" action="" method="post">
	<label>Fecha de Compra&nbsp;</label>
	<input type="date" id= "FechaFactura" name="FechaFactura" required="required"/><br/><br/>
    <label>Fecha de Vencimiento</label>
    <input type = "date" id= "Vencimiento" name = "Vencimiento" /><br/><br/>
    <input type = "text" id="Factura" name = "Factura" placeholder="N&uacute;mero de Factura" size="20px"/>
    <input type = "text" id = "subtotal" name="subtotal" placeholder="SubTotal" size="20px"/>
    <br/><br/>
    <input type = "text" id = "iva" name= "iva" placeholder="Iva" size="20px"/>

    <label for="pagado">Pagado</label>
    <input type="checkbox" id= "pagado" name="pagado" value="True">
    <br/><br/>

    <label for="Usuario">Usuario</label>
    <select name="Usuario" >
    <?php 
		for($i = 0; $i<count($usu); $i++){
	?>
    <option value="<?php echo $usu[$i]['id_usuario']; ?>" ><?php echo $usu[$i]['nombre']; ?> <?php echo $usu[$i]['apellido']; ?></option>
    <?php
		}
	?>
    </select>
    <input type="text" id="descuento" name="descuento" placeholder="Descuento %"></br><br/>
    <input type="text" id ="Total" name = "Total" placeholder="Valor Total">
    <input type="text" name="ajuste" id="ajuste" placeholder="Ajuste"></br><br/>
    <textarea id="Observaciones" name= "Observaciones" rows="4" cols="50" placeholder="Ingrese sus Observaciones, M&aacute;ximo 250 caracteres" maxlength="250"></textarea>
	<br/><br/><br/><br/>
    <input type="text" name="Vendedor" id="Vendedor" placeholder="Vendedor">
        
    <label for="proveedor">Proveedor</label>
    <select style="width: 14.5em" name="proveedor">
    <?php
		for ($i = 0; $i<count($pro); $i++){
	?>
    	<option value="<?php echo $pro[$i]['id_nit']; ?>"><?php echo $pro[$i]['razon_social']; ?></option>
    <?php
		}
	?>
    </select>
    <br/><br/>
    <p>
        <input class="guardar" type="submit"  id="guardar" value="Guardar">
        <input class="guardar" name="del" type="submit" value="Cancelar">
    </p>
</form>
</div>
	