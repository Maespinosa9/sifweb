<?Php
include ("controlador/cOrdenCompra.php");
?>

<div name="OrdenCompra" id="izquierda">
<h3>EDITAR ORDEN DE COMPRA</h3>
<form name="OrdenCompra" action="" method="post">
	<label style = "margin-right: 2.5em">Fecha de Compra&nbsp;</label>
	<input type="date" id= "FechaFactura" name="FechaFactura" required="required" value= "<?php echo $editar[0]['fecha_factura']; ?>"/><br/><br/>
    <label>Fecha de Vencimiento&nbsp;</label>
    <input type = "date" id= "Vencimiento" name = "Vencimiento" required="required" value= "<?php echo $editar[0]['vencimiento']; ?>"/><br/><br/>
    <input type = "text" id="Factura" name = "Factura" placeholder="N&uacute;mero de Factura" size="20px" required="required" value= "<?php echo $editar[0]['factura']; ?>" />
    <input type = "text" id = "subtotal" name="subtotal" placeholder="SubTotal" size="20px" required="required" value= "<?php echo $editar[0]['subtotal']; ?>"/></br></br>
    <input type = "text" id = "iva" name= "iva" placeholder="Iva" size="20px" required="required" value= "<?php echo $editar[0]['iva']; ?>"/>

    <label for="pagado" style= "float:inherit">Pagado</label>
    <input type="checkbox" id= "pagado" name="pagado" value=1 <?php if ($editar[0]['pagado']== 1) echo "checked"; ?>>
    </br></br>

    <label for="Usuario">Usuario&nbsp;&nbsp;&nbsp; </label>
    <select name="Usuario" required="required" >
    <option value="">Seleccione</option>
    <?php 
		for($i = 0; $i<count($usu); $i++){
	?>
    <option value="<?php echo $usu[$i]['id_usuario']; ?>" <?php if($editar[0]['usuario_id']==$usu[$i]['id_usuario']) echo 'selected'; ?> ><?php echo $usu[$i]['nombre']; ?> <?php echo $usu[$i]['apellido']; ?></option>
    <?php
		}
	?>
    </select>
    <input type="text" id="descuento" name="descuento" placeholder="Descuento %" required="required" value= "<?php echo $editar[0]['descuento']; ?>"></br><br/>
    <input type="text" id ="Total" name = "Total" placeholder="Valor Total" required="required" value= "<?php echo $editar[0]['total']; ?>">
    <input type="text" name="ajuste" id="ajuste" placeholder="Ajuste" required="required" value= "<?php echo $editar[0]['ajuste']; ?>"></br><br/><br/>
    <textarea id="Observaciones" style = "resize:none; width:90%" name= "Observaciones" rows="4" cols="50" placeholder="Ingrese sus Observaciones, M&aacute;ximo 250 caracteres" maxlength="250"><?php echo $editar[0]['observacion']; ?></textarea>
	<br/><br/>
    <input type="text" name="Vendedor" id="Vendedor" placeholder="Vendedor" required= "required" value= "<?php echo $editar[0]['vendedor']; ?>">
        
    <label for="proveedor">Proveedor&nbsp;&nbsp;&nbsp;</label>
    <select style="width: 14.5em" name="proveedor" required= "required">
    <option value="">Seleccione</option>
    <?php
		for ($i = 0; $i<count($pro); $i++){
	?>
    	<option value="<?php echo $pro[$i]['id_nit']; ?>" <?php if($editar[0]['nit_id']==$pro[$i]['id_nit']) echo 'selected'; ?>><?php echo $pro[$i]['razon_social']; ?></option>
    <?php
		}
	?>
    </select><br><br>   <br><br>  
    <input class="guardar" type="submit"  id="guardar" value="Guardar">
    <a href="home.php?pac=108"><input class="guardar" name="del" type="button" value="Cancelar"></a>

</form>
</div>
<div id= "derecha">

    <h3>Ordenes de Compra Ingresadas</h3>

<br/>   <table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();" placeholder= "Nro. de orden">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>

</tr></table>
<br><br>
    <table cellpadding="8" >
        <form id="formfil" name="formfil" method="GET" action="home.php" onSubmit="return confirm('¿Desea eliminar?')">
        <thead>
            <th>Nro. Factura</th>
            <th>Pagada</th>
            <th>Descuento</th>
            <th>Total</th>
            <th>Proveedor</th>
            <th>Acciones</th>
        </thead>
        <input name="pac" type="hidden" id="pac" value="106"/>
        <?php 
         $dat=$ins->selOrden2($filtro, $pag->rvalini(), $pag->rvalfin());  
        for($i = 0; $i<count($dat); $i++){
         ?>
        <tbody>
            <tr>
                <td><?php echo $dat[$i]['factura']; ?></td>
                <td align= "center"><?php if ($dat[$i]['pagado'] == 1){?><img src="image/activa.png"><?php }?></td>
                <td><?php echo $dat[$i]['descuento']; ?></td>
                <td><?php echo $dat[$i]['total']; ?></td>
                <td><?php echo $dat[$i]['razon_social']; ?></td>
                <td align = "center">
                <a href="home.php?or=<?php echo $dat[$i]['id_orden'] ?>&pac=110"><img src="image/plusmen.png" title="Agregar Detalles"></a>
                <a href = "home.php?pr=<?php echo $dat[$i]['id_orden'] ?>&pac=<?php echo $pac; ?>&up=11"><img src="image/editar.png" name="editar" title = "Editar"></a>
               <a href = "home.php?del=<?php echo $dat[$i]['id_orden'] ?>&pac=<?php echo $pac; ?>"><img src="image/eliminar.png" name="del" title= "Eliminar"></a></td>
            </tr>
        </tbody>
        <?php } ?>
        </form>
    </table>
    <div  id="paginar" style="position:absolute; bottom:0px; right:50px;">
        <td align="bottom" valign="bottom">
            <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
 
            ?>
        </td>
    </div>
</div>
