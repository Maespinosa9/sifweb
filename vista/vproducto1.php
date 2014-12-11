<?php 
    include ("controlador/cproducto.php");
    
?>

<script language="javascript" src="js/jquery-1.2.6.min.js"></script><!-- llamamos al JQuery-->

<div name="izquierda" id="izquierda">
<form name="form1" action="home.php?pac=107" method="POST">
<h3>EDITAR PRODUCTO</h3>
        <label>C&oacute;digo de barras&nbsp;</label>
        <input type="text" name="codBarras" id="codBarras" size="25" maxlength="30" required="required" placeholder="Codigo de Barras" value = "<?php echo $editar[0]['codigo_barras']; ?>"/> 
        <input type="hidden" id="idProducto" name="idProducto" value="<?php echo $editar[0]['id_producto']; ?>"/>
    	<input type="hidden" id="actu" name="actu" value="actu"/></br></br>
        <label>Descripci&oacute;n&nbsp;</label> 
        <input type="text" name="descripcion" id="descripcion" size="25" maxlength="30" required="required" placeholder="Descripcion" value = "<?php echo $editar[0]['descripcion']; ?>" /></br></br>
        <label>Precio&nbsp;</label>
        <input type="number" name="preVenta" id="preVenta" size="25" maxlength="30" required="required" placeholder="Precio Venta" value = "<?php echo $editar[0]['precio_venta']; ?>"/></br></br>
        <label>Impuesto&nbsp;</label>  
        <input type="number" name="impuesto" id="impuesto" size="25" maxlength="30"  placeholder="Impuesto" value = "<?php echo $editar[0]['impuesto']; ?>"/></br></br>
        <label>Categor&iacute;a&nbsp;</label>  
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


<div id="derecha" >
<h3>REGISTRO PRODUCTOS</h3>
<br/>   <table width="650"><tr>
    <td>
          <form id="formfil" name="formfil" method="GET" action="home.php">
      <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
          <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
    </form>
    </td>
 <div  id="paginar" style="position:absolute; bottom:0px; right:50px;">
        <td align="bottom" valign="bottom">
            <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            ?>
        </td>
    </div>
</tr></table>
<br><br>
<table cellpadding="8" >
<form  id="formfil" name="formfil" method="GET" action="home.php" onSubmit="return confirm('Eliminara el Producto Desea Continuar')">
    <thead>  	
    	<th class="style1" align="center" width="80">Codigo</th>
	    <th>Cod. Barras</th>
	    <th>Descripcion</th>
	    <th>Precio Venta</th>
	    <th>Categoria</th>
	    <th>Acciones</th>
	    <input name="pac" type="hidden" id="pac" value="107"/>
	</thead>
	    	    <?php 
	    	     $dat=$ins->selpro2($filtro, $pag->rvalini(), $pag->rvalfin());
					for ($i=0; $i < count($dat); $i++){
		  		?>   
		        <tbody>
                  <tr>
	            	<td class="style2" align="center"><?php echo $dat[$i]['id_producto'] ?></td>
	             	<td class="style1" align="center"><?php echo $dat[$i]['codigo_barras']  ?></td>
	             	<td class="style2" align="center"><?php echo $dat[$i]['nombre']  ?></td>
	             	<td class="style2" align="center"><?php echo $dat[$i]['precio_venta'] ?></td>
	             	<td class="style2" align="center"><?php echo $dat[$i]['descripcion'] ?></td>
	             	<td align="center"><a href="home.php?pr=<?php echo $dat[$i]['id_producto'] ?>&pac=<?php echo $pac; ?>&up=11"><img border=0 src="image/editar.png"  name="editar" title= "Editar" width="17" height="17"/></a></td>
	             	                  <!-- <a href="home.php?delete=<?php echo $tabla[$i]['id_producto'] ?>&pac=<?php echo $pac; ?>"><img src="image/eliminar.png" name="delete" title= "Eliminar"></a> </td>-->
	            </tr>
	            </tbody> 
	            <?php  
	        		}  
	        	?>
	        
         	</form>
    </table>
 </div>