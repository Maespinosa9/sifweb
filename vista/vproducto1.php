<?php 
    include ("controlador/cproducto.php");
?>

<script language="javascript" src="js/jquery-1.2.6.min.js"></script><!-- llamamos al JQuery-->

<div name="izquierda" id="izquierda">
<form name="form1" action="home.php?pac=107" method="POST">
<h3>EDITAR PRODUCTO</h3>
        <label>Codigo de barras&nbsp;</label>
        <input type="text" name="codBarras" id="codBarras" size="25" maxlength="30" required="required" placeholder="Codigo de Barras" value = "<?php echo $editar[0]['codigo_barras']; ?>"/> 
        <input type="hidden" id="idProducto" name="idProducto" value="<?php echo $editar[0]['id_producto']; ?>"/>
    	<input type="hidden" id="actu" name="actu" value="actu"/></br></br>
        <label>Descripcion&nbsp;</label> 
        <input type="text" name="descripcion" id="descripcion" size="25" maxlength="30" required="required" placeholder="Descripcion" value = "<?php echo $editar[0]['descripcion']; ?>" /></br></br>
        <label>Precio&nbsp;</label>
        <input type="number" name="preVenta" id="preVenta" size="25" maxlength="30" required="required" placeholder="Precio Venta" value = "<?php echo $editar[0]['precio_venta']; ?>"/></br></br>
        <label>Impuesto&nbsp;</label>  
        <input type="number" name="impuesto" id="impuesto" size="25" maxlength="30"  placeholder="Impuesto" value = "<?php echo $editar[0]['impuesto']; ?>"/></br></br>
        <label>Categoria&nbsp;</label>  
	        		<select name="categoria" style="width: 195px;" id="categoria" required="required">
	        			<option value="" selected="selected">Seleccione</option>
	        				<?php 
	                        	for ($i=0; $i < count($arrayCategoria); $i++){
	                     	?>
	                    		<option value="<?php echo $arrayCategoria[$i]['id_categoria'] ?>"<?php if($editar[0]['categoria_id']==$arrayCategoria[$i]['id_categoria']) echo 'selected';?>> <?php  echo $arrayCategoria[$i]['descripcion']; ?></option>
	                    	<?php 
	                    		} 
	                    	?>
	                </select></br></br>
	                <p>
                	<input class="guardar" id="boton" type="submit" value="Guardar" />
                    <input class="guardar" id="boton1" type="button" value=" Volver " onclick="location = 'home.php?pac=107'" />
                    </p> 
         </form>
</div>


<div id="derecha" name="derecha">
<h3>REGISTRO PRODUCTOS</h3>
<table cellpadding="8" align="center" width="200">
<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('Eliminara el Producto Desea Continuar')">
    <thead>  	
    	<th class="style1" align="center" width="80">Codigo<input name="pac" type="hidden" id="pac" value="107"/></th>
	    <th>Cod. Barras</th>
	    <th>Descripcion</th>
	    <th>Precio Venta</th>
	    <th>Impuesto</th>
	    <th>Categoria</th>
	    <th>Acciones</th>
	</thead>
	    	    <?php 
					for ($i=0; $i < count($tabla); $i++){
		  		?>   
		        <tbody>
                  <tr>
	            	<td class="style2" align="center"><?php echo $tabla[$i]['id_producto'] ?></td>
	             	<td class="style1" align="center"><?php echo $tabla[$i]['codigo_barras']  ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['descripcion']  ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['precio_venta'] ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['impuesto'] ?></td>
	             	<td class="style2" align="center"><?php echo $tabla[$i]['categoria'] ?></td>
	             	<td align="center"><a href="home.php?pr=<?php echo $tabla[$i]['id_producto'] ?>&pac=<?php echo $pac; ?>&up=11" ><img border=0 src="image/editar.png"  /></a>
	             	                   <a href="home.php?delete=<?php echo $tabla[$i]['id_producto'] ?>&pac=<?php echo $pac; ?>"><img src="image/eliminar.png" name="delete" title= "Eliminar"></a></td>
	            </tr>
	            </tbody> 
	            <?php  
	        		}  
	        	?>
	      
         	</form>
    </table>
 </div>
   