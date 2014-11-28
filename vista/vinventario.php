<?php 
    include ("controlador/cinventario.php");
?>

<script language="javascript" src="js/jquery-1.2.6.min.js"></script><!-- llamamos al JQuery-->
<center>
	<form name="form1" action="" method="POST">
		<table align="center" width="400" border="0" cellspacing="5" cellpadding="3">
			<tr>
				<td colspan=5 align="center"><h1>Registro Inventario</h1></td>
            </tr>
            <tr>
                 <td valign="bottom">
	            	<div align="left" id="2" class="rojo">Producto:</div>
	        		<select name="producto" style="width: 195px;" id="producto" required="required">
	        			<option value="" selected="selected">Seleccione</option>
	        				<?php 
	                        	for ($i=0; $i < count($arrayProducto); $i++){
	                     	?>
	                    		<option value="<?php echo $arrayProducto[$i]['id_producto'] ?>"><?php echo $arrayProducto[$i]['codigo_barras']." - ".$arrayProducto[$i]['descripcion'] ?></option>
	                    	<?php 
	                    		} 
	                    	?>
	                </select>
	            </td>                                
            </tr>
            <tr>
                <td>
                    <input type="date" name="fecha" id="fecha" size="25" maxlength="30" required="required" placeholder="Fecha" />
                </td>
                <td>
                    <input type="number" name="cantidad" id="cantidad" size="25" maxlength="30"  placeholder="Cantidad" />
                </td>
            </tr>
            <tr>
               <td>
               		<label for="entrada">Entrada: </label>
                    <input type="checkbox" name="entrada" id="entrada" style = "width: 15px;">
                </td>
                <td>
                    <input type="text" name="observacion" id="observacion" size="25" maxlength="30"  placeholder="Observacion" />
                </td>              
            </tr>
            <tr>
                <td  align="center" valign="bottom">
                	<input id="boton" type="submit" value="Guardar" />
                </td>
	            <td  align="center" valign="bottom">
                    <input id="boton1" type="button" value=" Volver " onclick="location = 'home.php'" />
                </td>
            </tr>
        </table>
    </form>
    <form name="form2" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
    	<div align="center">
    		<table width="550" border="1" cellspacing="0" cellpadding="4">
	    	    <tr>
	    	    	<td class="style1" align="center" width="80">Codigo
	    	    		<input name="pac" type="hidden" id="pac" value="111"/>
	    	    	</td>
	              	<td class="style1" align="center">Producto</td>
	              	<td class="style1" align="center">Fecha</td>
	              	<td class="style1" align="center">Cantidad</td>
	              	<td class="style1" align="center">Entrada</td>
	              	<td class="style1" align="center">Observacion</td>
	              	<td class="style1" align="center">Editar</td>
	            </tr>
	    	    <?php 
					for ($i=0; $i < count($tabla); $i++){
		  		?>   
		        <tr>
	            	<td class="style2" align="center"><input type="submit" name="delete" value=<?php echo $tabla[$i]['id_inventario'] ?>></td>
	             	<td class="style1" align="center"><?php echo $tabla[$i]['codigo_barras']." - ". $tabla[$i]['descripcion']?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['fecha']  ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['cantidad'] ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['entrada'] ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['observacion'] ?></td>
	             	<td align="center"><a href="home.php?pr=<?php echo $tabla[$i]['id_inventario'] ?>&pac=<?php echo $pac; ?>&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
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