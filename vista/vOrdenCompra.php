<?Php
include ("controlador/cOrdenCompra.php");
?>

<div name="OrdenCompra" id="izquierda">
<h3>INGRESAR ORDEN DE COMPRA</h3>

<form name="OrdenCompra" action="" method="post">
	<label style = "margin-right: 2.5em">Fecha de Compra&nbsp;</label>
	<input type="date" id= "FechaFactura" name="FechaFactura" required="required"/><br/><br/>
    <label>Fecha de Vencimiento&nbsp;</label>
    <input type = "date" id= "Vencimiento" name = "Vencimiento" required="required"/><br/><br/>
    <input type = "text" id="Factura" name = "Factura" placeholder="N&uacute;mero de Factura" size="20px" required="required" onblur="fnValidar(this.value)"/>
    <div id="divmsg" style = "display:none"><span id='resultado' style='color:red'><strong><?php echo is_null($mensaje)?'':$mensaje;?></strong></span><br/></div>
    <input type = "text" id = "subtotal" name="subtotal" placeholder="SubTotal" size="20px" required="required"/></br></br>
    <input type = "text" id = "iva" name= "iva" placeholder="Iva" size="20px" required="required"/>

    <label for="pagado" style= "float:inherit">Pagado</label>
    <input type="checkbox" id= "pagado" name="pagado" value=1>
</br></br>


    <label for="Usuario">Usuario&nbsp;&nbsp;&nbsp; </label>
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
    <input type="text" name="ajuste" id="ajuste" placeholder="Ajuste" required="required"></br><br/><br/>
    <textarea id="Observaciones" style = "resize:none; width:90%" name= "Observaciones" rows="4" cols="50" placeholder="Ingrese sus Observaciones, M&aacute;ximo 250 caracteres" maxlength="250"></textarea>
	<br/><br/>
    <input type="text" name="Vendedor" id="Vendedor" placeholder="Vendedor" required= "required">
        
    <label for="proveedor">Proveedor&nbsp;&nbsp;&nbsp;</label>
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
<div name="table_orden_compra" id= "derecha">

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
        <input name="pac" type="hidden" id="pac" value="108"/>
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
    <div id="paginar" style="position:absolute; bottom:0px; right:50px;">
        <td align="bottom" valign="bottom">
            <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
 
            ?>
        </td>
    </div>
</div>

<script>
    function fnValidar(num){
        var postForm = { //Fetch form data
            'datos'  : num,
            'funcion' : 'orden_compra'
        };
        $.ajax({
        url: "controlador/ajaxValidador.php",
        type: "post",
        data: postForm,
        success: function(response){
            //alert("success");
            $("#resultado").html(response);
            var val=$.trim(response);
            if(val!= ""){
                $("#divmsg").css({'display':'block',});
                $("#Factura").focus();
                $("#Factura").select();
            }else
                $("#divmsg").css({'display':'none',});
        },
        error:function(){
            alert("failure");
            $("#result").html('There is error while submit');
        }
    });
    }
</script>
