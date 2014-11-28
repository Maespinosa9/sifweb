<?php 
    include ("controlador/cproducto.php");
?>

<script language="javascript" src="js/jquery-1.2.6.min.js"></script><!-- llamamos al JQuery-->
<center>
	<form name="form1" action="home.php?pac=107" method="POST">
		<table align="center" width="400" border="0" cellspacing="5" cellpadding="3">
			<tr>
				<td colspan=5 align="center"><h1>Editar Producto</h1></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="codBarras" id="codBarras" size="25" maxlength="30" required="required" placeholder="Codigo de Barras" value = "<?php echo $editar[0]['codigo_barras']; ?>"/> 
                    <input type="hidden" id="idProducto" name="idProducto" value="<?php echo $editar[0]['id_producto']; ?>"/>
    				<input type="hidden" id="actu" name="actu" value="actu"/>
                </td>
                <td>
                    <input type="text" name="descripcion" id="descripcion" size="25" maxlength="30" required="required" placeholder="Descripcion" value = "<?php echo $editar[0]['descripcion']; ?>" />
                </td>                    
            </tr>
            <tr>
                <td>
                    <input type="number" name="preVenta" id="preVenta" size="25" maxlength="30" required="required" placeholder="Precio Venta" value = "<?php echo $editar[0]['precio_venta']; ?>"/>
                </td>
                <td>
                    <input type="number" name="impuesto" id="impuesto" size="25" maxlength="30"  placeholder="Impuesto" value = "<?php echo $editar[0]['impuesto']; ?>"/>
                </td>
            </tr>
            <tr>
               <td valign="bottom">
	            	<div align="left" id="2" class="rojo">Categoria:</div>
	        		<select name="categoria" style="width: 195px;" id="categoria" required="required">
	        			<option value="" selected="selected">Seleccione</option>
	        				<?php 
	                        	for ($i=0; $i < count($arrayCategoria); $i++){
	                     	?>
	                    		<option value="<?php echo $arrayCategoria[$i]['id_categoria'] ?>"<?php if($editar[0]['categoria_id']==$arrayCategoria[$i]['id_categoria']) echo 'selected';?>> <?php  echo $arrayCategoria[$i]['descripcion']; ?></option>
	                    	<?php 
	                    		} 
	                    	?>
	                </select>
	            </td>              
            </tr>
            <tr>
                <td  align="center" valign="bottom">
                	<input id="boton" type="submit" value="Guardar" />
                </td>
	            <td  align="center" valign="bottom">
                    <input id="boton1" type="button" value=" Volver " onclick="location = 'home.php?pac=107'" />
                </td>
            </tr>
        </table>
    </form>
    <form name="form2" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
    	<div align="center">
    		<table width="550" border="1" cellspacing="0" cellpadding="4">
	    	    <tr>
	    	    	<td class="style1" align="center" width="80">Codigo
	    	    		<input name="pac" type="hidden" id="pac" value="107"/>
	    	    	</td>
	              	<td class="style1" align="center">Cod. Barras</td>
	              	<td class="style1" align="center">Descripcion</td>
	              	<td class="style1" align="center">Precio Venta</td>
	              	<td class="style1" align="center">Impuesto</td>
	              	<td class="style1" align="center">Categoria</td>
	              	<td class="style1" align="center">Editar</td>
	            </tr>
	    	    <?php 
					for ($i=0; $i < count($tabla); $i++){
		  		?>   
		        <tr>
	            	<td class="style2" align="center"><input type="submit" name="delete" value=<?php echo $tabla[$i]['id_producto'] ?>></td>
	             	<td class="style1" align="center"><?php echo $tabla[$i]['codigo_barras']  ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['descripcion']  ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['precio_venta'] ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['impuesto'] ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['categoria'] ?></td>
	             	<td align="center"><a href="home.php?pr=<?php echo $tabla[$i]['id_producto'] ?>&pac=<?php echo $pac; ?>&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
	            </tr>  
	            <?php  
	        		}  
	        	?>
	            <tr>
			    	<td colspan=9 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
	           	</tr>
         	</table>
         	<p>&nbsp; </p>
        </div>
    </form>
</center>