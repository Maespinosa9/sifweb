<?php 
    include ("controlador/cinventario.php");
?>

<script language="javascript" src="js/jquery-1.2.6.min.js"></script><!-- llamamos al JQuery-->

<div name="izquierda" id="izquierda">
<form name="form1" action="home.php?pac=111" method="POST">
<h3>INVENTARIOS</h3>
	<form name="form1" action="" method="POST">
		            <label>Producto &nbsp;</label>
	        		<select name="producto" style="width: 195px;" id="producto" required="required">
	        			<option value="" selected="selected">Seleccione</option>
	        				<?php 
	                        	for ($i=0; $i < count($arrayProducto); $i++){
	                     	?>
	                    		<option value="<?php echo $arrayProducto[$i]['id_producto'] ?>"<?php if($editar[0]['producto_id']==$arrayProducto[$i]['id_producto']) echo 'selected';?>> <?php echo $arrayProducto[$i]['codigo_barras']." - ".$arrayProducto[$i]['descripcion'] ?></option>
	                    	<?php 
	                    		} 
	                    	?>
	                </select></br></br>
	                <input type="hidden" id="idInventario" name="idInventario" value="<?php echo $editar[0]['id_inventario']; ?>"/>
    				<input type="hidden" id="actu" name="actu" value="actu"/>
    				<label>Fecha&nbsp;</label>
                    <input type="date" name="fecha" id="fecha" size="25" maxlength="30" required="required" placeholder="Fecha" value = "<?php echo $editar[0]['fecha']; ?>"/></br></br>
                    <label>Cantidad&nbsp;</label>
                    <input type="number" name="cantidad" id="cantidad" size="25" maxlength="30"  placeholder="Cantidad" value = "<?php echo $editar[0]['cantidad']; ?>"/></br></br>
                    <label for="entrada">Entrada&nbsp;</label>
                    <input type="checkbox" name="entrada" id="entrada" style = "width: 15px;" <?php if($editar[0]['entrada']==1) echo 'checked'; ?> /></br></br>
                    <label>Observaciones&nbsp;</label>
                    <input type="text" name="observacion" id="observacion" size="25" maxlength="30"  placeholder="Observacion" value = "<?php echo $editar[0]['observacion']; ?>"/></br></br>
                    <p> 
                	<input class="guardar" id="boton" type="submit" value="Guardar" />
                    <input class="guardar" id="boton1" type="button" value=" Volver " onclick="location = 'home.php?pac=111'" />
                    </p> 
    </form>
   </div>

    <div id="derecha" name="derecha">
<h3>REGISTRO INVENTARIOS</h3>
 <table cellpadding="8" align="center" width="200">
 <form name="form2" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
                <thead>
	    	    	<th>Codigo<input name="pac" type="hidden" id="pac" value="111"/></th>
	              	<th>Producto</th>
	              	<th>Fecha</th>
	              	<th>Cantidad</th>
	              	<th>Entrada</th>
	              	<th>Observacion</th>
	              	<th>Editar</th>
	            </thead>
	    	    <?php 
					for ($i=0; $i < count($tabla); $i++){
		  		?>   
		        <tbody>
                  <tr>
	            	<td class="style2" align="center"><input type="submit" name="delete" value=<?php echo $tabla[$i]['id_inventario'] ?>></td>
	             	<td class="style1" align="center"><?php echo $tabla[$i]['codigo_barras']." - ". $tabla[$i]['descripcion']?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['fecha']  ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['cantidad'] ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['entrada'] ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['observacion'] ?></td>
	             	<td align="center"><a href="home.php?pr=<?php echo $tabla[$i]['id_inventario'] ?>&pac=<?php echo $pac; ?>&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td>
	              </tr>
                </tbody>
	            <?php } ?>
	            <tr>
			    	<td colspan=9 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
	           	</tr>
         </form>
    </table>
 </div>