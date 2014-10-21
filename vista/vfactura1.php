<?php
include("controlador/cfactura.php");

?>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<div align="center" style=" width:1350; height:100">
<H3 style="font-family:'Comic Sans MS', cursive; font-size:20px;"> FACTURA DE VENTA </H3>
</div>
<div align="center" style=" width:1350; height:800">
<form name="form3" action="home.php?pac=103" method="post">

<table>
    <tr>
    	<td>
        <label  style="font-family:'Comic Sans MS', cursive; font-size:15px "> No de Factura </label>
        <?php echo $datt[0]['id_factura'] ?>
        <input type="hidden" name="id_factura" value="<?php echo $datt[0]['id_factura'] ?>" />
            <input type="hidden" name="actu" value="actu" />
        </td>
        <td>
        <label  style="font-family:'Comic Sans MS', cursive; font-size:15px ">Fecha</label>
        <input type="date" name="fecha" value="<?php echo $datt[0]['fecha'] ?>"></input>
        </td>
    </tr>
     <tr>
    	 <td>
        <label  style="font-family:'Comic Sans MS', cursive; font-size:15px ">Estado</label>
        <input type="text" name="estado" value="<?php echo $datt[0]['estado'] ?>"></input>
        </td>
        <td>
        <label  style="font-family:'Comic Sans MS', cursive; font-size:15px ">Descuento</label>
        <input type="text" name="descuento" value="<?php echo $datt[0]['descuento'] ?>"></input>
        </td>
    </tr>
    <tr>
        <td>
        <label  style="font-family:'Comic Sans MS', cursive; font-size:15px ">Subtotal</label>
        <input type="text" name="subtotal" value="<?php echo $datt[0]['subtotal'] ?>"></input>
        </td>
        <td>
                <label style="font-family:'Comic Sans MS', cursive; font-size:15px ">Total</label>
                <input type="text" name="total" value="<?php echo $datt[0]['total'] ?>"></input>
        </td>
        <td>
                <label style="font-family:'Comic Sans MS', cursive; font-size:15px ">Iva</label>
                <input type="text" name="iva" value="<?php echo $datt[0]['iva'] ?>"></input>
        </td>
	</tr>
    <tr>
        <td>
        <label  style="font-family:'Comic Sans MS', cursive; font-size:15px ">Cliente</label>
        <input type="text" name="cliente_id" value="<?php echo $datt[0]['cliente_id'] ?>"></input>
        </td>
        <td>
                <label style="font-family:'Comic Sans MS', cursive; font-size:15px ">Usuario</label>
                <input type="text" name="usuario_id" value="<?php echo $datt[0]['usuario_id'] ?>"></input>
        </td>
	</tr>
    <tr>
    	<td colspan="2"> 
        <label style="font-family:'Comic Sans MS', cursive; font-size:15px "> Observacion</label>
        </td>
    </tr>
    <tr>
    	<td colspan="2">
        <textarea  name="observacion" cols="76" rows="3"><?php echo $datt[0]['observacion'] ?></textarea>
        </td>
    </tr>
     <tr>
    	<td align="center" colspan="2"> 
        <input class="guardar" id="guardar" type="submit" value="Editar"></input>
        </td>
    </tr>
    
</table>
</form>
</div>
