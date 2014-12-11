<?Php
include ("controlador/cDet_Compra.php");
?>
<section name="insertar" style= "<?php if (!is_null($up)) echo 'display:none'; ?>">
<br>
<h2 align="center">Detalles para la Factura de compra Nro. <?php echo $factura[0]['factura']?></h2>
<div name="det_compra" id="izquierda">
	<h3> Ingresar Detalle</h3>
	<br>
	<form name = "form_Det_Compra" action = "" method = "POST">
		<label for ="producto">Producto: &nbsp;&nbsp;</label>
		<select name= "producto" required onblur="fnValidar(this.value, <?php echo $orden_id ?>)">
			<option value = "">Seleccione</option>
		<?php 
			for($i = 0; $i<count($productos); $i++){
		?>
		<option value="<?php echo $productos[$i]['id_producto']; ?>" ><?php echo $productos[$i]['descripcion']; ?></option>
	    <?php
			}
		?>
		</select>
        
		<input type="number" id= "cantidad" name="cantidad" placeholder = "Cantidad"><br><br>
        <div id="divmsg" style = "display:none"><span id='resultado' style='color:red'><strong><?php echo is_null($mensaje)?'':$mensaje;?></strong></span><br/><br/></div>
		<input type="text" name="valor_unitario" id="valor_unitario" placeholder= "Valor Unitario" ><br><br><br><br>
		<input class="guardar" type="submit"  id="guardar" value="Guardar">
    	<a href="home.php?pac=108"><input class="guardar" name="del" type="button" value="Cancelar"></a>
	</form>
</div>
</section>
<section name="editar" style= "<?php if (is_null($up)) echo 'display:none'; ?>">
    <br>
    <h2 align="center">Detalles para la Factura de compra Nro. <?php echo $factura[0]['factura']?></h2>
    <div name="det_compra" id="izquierda">
    <h3> Modificar Detalle</h3>
    <br>
    <form name = "formEditar" action = "home.php?pac=110&or=<?php echo $orden_id ?>" method = "POST">
        <label for ="producto">Producto: &nbsp;&nbsp;</label>
        <select name= "producto" required disabled="disabled">
            <option value = "">Seleccione</option>
        <?php 
            for($i = 0; $i<count($productos); $i++){
        ?>
        <option value="<?php echo $productos[$i]['id_producto']; ?>" <?php if($editar[0]['producto_id']==$productos[$i]['id_producto']) echo 'selected'; ?> ><?php echo $productos[$i]['descripcion']; ?></option>
        <?php
            }
        ?>
        </select>
        <input type="hidden" id="actu" name="actu" value="actu"/>
        <input type="hidden" id="id_deta_compra" name="id_deta_compra" value="<?php echo $editar[0]['id_deta_compra']; ?>">
        <input type="number" id= "cantidad" name="cantidad" placeholder = "Cantidad" value="<?php echo $editar[0]['cantidad']; ?>"><br><br>
        <input type="text" name="valor_unitario" id="valor_unitario" placeholder= "Valor Unitario" value="<?php echo $editar[0]['valor_unitario']; ?>"><br><br><br><br>
        <input class="guardar" type="submit"  id="editar" value="Editar">
        <a href="home.php?pac=110&or=<?php echo $orden_id ?>"><input class="guardar" name="del" type="button" value="Cancelar"></a>
    </form>
</div>
</section>
<div name="table_det_compra" id="derecha">
	<H3>Detalles de la Orden </H3>
	<br/>   <table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>"/>
            <input name="or" type="hidden" value="<?php echo $orden_id; ?>">
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();" placeholder= "Producto">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>
	</tr></table>
	<br><br>
 <table cellpadding="10" align="center">
        <form id="formfil" name="formfil" method="GET" action="home.php" onSubmit="return confirm('¿Desea eliminar?')">
        <thead>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Valor Unitario</th>
            <th>Acciones</th>
        </thead>
        <input name="pac" type="hidden" id="pac" value="110"/>
        <?php 
        	$dat=$ins->selDetalle($filtro, $pag->rvalini(), $pag->rvalfin(), $orden_id);  
        for($i = 0; $i<count($dat); $i++){
         ?>
        <tbody>
        	<tr>
        	<td><?php echo $dat[$i]['descripcion'] ?></td>
        	<td align="right"><?php echo $dat[$i]['cantidad'] ?></td>
        	<td align="right"><?php echo $dat[$i]['valor_unitario'] ?></td>
        	<td align = "center">
            <a href = "home.php?pr=<?php echo $dat[$i]['id_deta_compra'] ?>&pac=<?php echo $pac; ?>&up=11&or=<?php echo $orden_id; ?>"><img src="image/editar.png" name="editar" title = "Editar"></a>
           	<a href = "home.php?del=<?php echo $dat[$i]['id_deta_compra'] ?>&pac=<?php echo $pac; ?>&or=<?php echo $orden_id ?>"><img src="image/eliminar.png" name="del" title= "Eliminar"></a></td>
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
    function fnValidar(num, id_orden){
        var postForm = { //Fetch form data
            'datos'  : num,
            'funcion' : 'deta_compra',
            'orden' : id_orden
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