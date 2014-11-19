<?Php
include ("controlador/cOrdenCompra.php");
?>

<div name="OrdenCompra" id="izquierda">
<h3>INGRESAR ORDEN DE COMPRA</h3>

<form name="OrdenCompra" action="" method="post">
	<label style = "margin-right: 2.5em">Fecha de Compra</label>
	<input type="date" id= "FechaFactura" name="FechaFactura" required="required"/><br/><br/>
    <label>Fecha de Vencimiento</label>
    <input type = "date" id= "Vencimiento" name = "Vencimiento" required="required"/><br/><br/>
    <input type = "text" id="Factura" name = "Factura" placeholder="N&uacute;mero de Factura" size="20px" required="required"/>
    <input type = "text" id = "subtotal" name="subtotal" placeholder="SubTotal" size="20px" required="required"/>
    <input type = "text" id = "iva" name= "iva" placeholder="Iva" size="20px" required="required"/>
</br>
    <label for="pagado" style= "float:inherit">Pagado</label>
    <input type="checkbox" id= "pagado" name="pagado" value="True">
</br></br>


    <label for="Usuario">Usuario</label>
    <select name="Usuario" required="required" >
    <option value="">Seleccione</option>
    <?php 
		for($i = 0; $i<count($usu); $i++){
	?>
    <option value="<?php echo $usu[$i]['id_usuario']; ?>" ><?php echo $usu[$i]['nombre']; ?> <?php echo $usu[$i]['apellido']; ?></option>
    <?php
		}
	?>
    </select>
    <input type="text" id="descuento" name="descuento" placeholder="Descuento %" required="required"></br><br/>
    <input type="text" id ="Total" name = "Total" placeholder="Valor Total" required="required">
    <input type="text" name="ajuste" id="ajuste" placeholder="Ajuste" required="required"></br><br/>
    <textarea id="Observaciones" name= "Observaciones" rows="4" cols="50" placeholder="Ingrese sus Observaciones, M&aacute;ximo 250 caracteres" maxlength="250"></textarea>
	<br/><br/><br/><br/>
    <input type="text" name="Vendedor" id="Vendedor" placeholder="Vendedor" required= "required">
        
    <label for="proveedor">Proveedor</label>
    <select style="width: 14.5em" name="proveedor" required= "required">
    <option value="">Seleccione</option>
    <?php
		for ($i = 0; $i<count($pro); $i++){
	?>
    	<option value="<?php echo $pro[$i]['id_nit']; ?>"><?php echo $pro[$i]['razon_social']; ?></option>
    <?php
		}
	?>
</select><br><br>   <br><br>  
    <input class="guardar" type="submit"  id="guardar" value="Guardar">
    <a href="home.php"><input class="guardar" name="del" type="button" value="Cancelar"></a>

</form>
</div>
<div id= "derecha">
    <table>
        <form id="formfil" name="formfil" method="GET" action="home.php">
        <thead>
            <th>Nro. Factura</th>
            <th>Pagada</th>
            <th>Total</th>
            <th>Proveedor</th>
            <th>Acciones</th>
        </thead>
        <input name="pac" type="hidden" id="pac" value="106"/>
        <?php 
        for($i = 0; $i<count($dat); $i++){
         ?>
        <tbody>
            <tr>
                <td><?php echo $dat[$i]['factura']; ?></td>
                <td><?php echo $dat[$i]['pagado']; ?></td>
                <td><?php echo $dat[$i]['total']; ?></td>
                <td><?php echo $dat[$i]['nit_id']; ?></td>
                <td align = "center"><a href = "home.php?pr=<?php echo $dat[$i]['id_orden'] ?>&pac=<?php echo $pac; ?>&up=11"><input type="button" name="del" value="Editar"/></a>
    <a href = "home.php?del=<?php echo $dat[$i]['id_orden'] ?>&pac=<?php echo $pac; ?>"><button value="<?php echo $dat[$i]['id_orden'] ?>" name="del">Eliminar</button></a></td>
            </tr>
        </tbody>
        <?php } ?>
        </form>
    </table>
</div>