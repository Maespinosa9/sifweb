<?php 
    include ("controlador/cinventario.php");
?>

<center>
<div id="inventario" name="inventario">
<h3>MOVIMIENTOS DE INVENTARIO</h3>

<br/>   <table width="400" align="right"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();" placeholder= "C&oacute;digo del Producto">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>


</tr></table><br/><br/><br/>
 <table cellpadding="8" align="center" width="95%">
 <form name="formfil" action="home.php" method="GET" onSubmit="return confirm('Eliminara el Inventario Desea Continuar')">
                <thead>
	    	    	<th>Codigo<input name="pac" type="hidden" id="pac" value="111"/></th>
	              	<th>Producto</th>
	              	<th>Fecha del Movimiento</th>
	              	<th>Cantidad</th>
	              	<th>Entrada</th>
	              	<th>Observacion</th>
	              	<th>Acciones</th>
	            </thead>
	    	    <?php 
	    	    	 $dat=$ins->selMovimiento($filtro, $pag->rvalini(), $pag->rvalfin()); 
					for ($i=0; $i < count($dat); $i++){
		  		?>   
		        <tbody>
                  <tr>
	            	<td class="style2" align="center"><?php echo $dat[$i]['id_inventario'] ?></td>
	             	<td class="style1" align="center"><?php echo $dat[$i]['codigo_barras']." - ". $tabla[$i]['descripcion']?></td>
	             	<td class="style2" align="center"><?php echo $dat[$i]['fecha']  ?></td>
	             	<td class="style2" align="center"><?php echo $dat[$i]['cantidad'] ?></td>
	             	<td class="style2" align="center"><?php if ($dat[$i]['entrada']  == 1) {?><img src="image/activa.png"><?php }?></td>
	             	<td class="style2" align="center"><?php echo $dat[$i]['observacion'] ?></td>
	             	<td align="center"><a href="home.php?pr=<?php echo $dat[$i]['id_inventario'] ?>&pac=<?php echo $pac; ?>&up=11"><img border=0 src="image/editar.png" name="editar" title= "Editar" /></a>
					</td>
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
</center>
