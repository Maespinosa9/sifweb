<?php
include ("controlador/cfactura.php");
//include ("controlador/cproductof.php");
?>
<script type="text/javascript">
 function RecargarProdcutos(value){
    var parametros = {
                "valor" : value
        };
        $.ajax({
                data:  parametros,
                url:   'vista/vproduct.php',
                type:  'post',
                success:  function (response) {
                        $("#valor_unitario").html(response);
                }
        });
     }
</script>

  <!--   <form name "form4" action="" method="post">
    	<input type=hidden name="accion" value=""></input>
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <H3 style="font-family:'Comic Sans MS', cursive; font-size:22px" align="center">Productos</H3>
                </td>
            </tr>
            <tr>
                <td>
                     <div align="left" id="10" class="rojo">Producto</div>
        			 
                    <select name="producto_id" onchange="javascript:RecargarProdcutos(this.value);">
                        <option value="" id="producto_id">Seleccione</option>
                         <?php 
                            //Select
                                 //$dat5 = $ins->selproducto();
                                  ///   for ($i=0; $i < count($dat5); $i++){
                         ?>
                        
                      ///  <option value="<?php// echo $dat5[$i]['id_producto'] ?>"><?php //echo $dat5[$i]['descripcion'] ?></option>
                        
                        <?php } ?>
                    </select>
                </td>
                <td valign="bottom">
                <div id="valor_unitario"></div>
            	</td>
            </tr>
            <tr>
                <td aling="right">
                    <label>Cantidad</label>
                </td>
                <td>
                    <input type="text" name="cantidad" id="cantidad">
                </td>
                <td>
               /*  <?php 
            //Select
                //$dat = $ins->selfactura();
                //for ($i=0; $i < count($dat); $i++){
              ?>*/
        
    
                <input id="factura_id" type="hidden" name="factura_id" 
                value=<?php// echo $dat[$i]['id_factura'] ?>></input>
                 <?php  }  ?>
                
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input class="guardar" id="guardar" type="button" value="Agregar" onclick="this.form.accion.value='AddProducto'; this.form.submit();"></input>
                </td>
            </tr>
            
        
        </table> -->
    
	<table align="center" border="2">
		<tr>
        	<td>
            	Producto
            </td>
            <td>
            	Valor Unitario
            </td>
        	<td>
            	Cantidad
            </td>
            <td>
            	Precio
            </td>
            <td>
            	Eliminar
            </td>
    	</tr>
        <?php 

			foreach ($productos as $idpr) {
				echo "<tr><td>".$idpr["producto_id"]."</td><td>".$idpr["valor_unitario"]."</td><td>".$idpr["cantidad"]."</td>
				<td>".$idpr["valor_total"]."</td><td align='center'><img src='image/elimipro.jpg' width='40' height='40'/></td></tr>";
				
			}
				echo "<table border='1' align='center'center'><tr><td colspan='3'><input type='submit' 
				value='ENVIAR' class='guardar' id='guardar'></input></td></tr><table>";
		
		?>
	</table>
       <?php 

			foreach ($productos as $idpr => $Cantidad) {
				echo "<input type=hidden name='producto[".$idpr["producto_id"]."]' value='".$idpr["cantidad"]."'></input>";
			}
		
		?>
        
            </form>
<!-- </div> -->

<div name="izquierda" id="izquierda"> 

<form name="form1" action="" method="post">    
    <table align="center" width="300">
        <tr>
            <td>
                <H3 style="font-family:'Comic Sans MS', cursive; font-size:22px" align="center">Factura de Venta<H3> 
            </td>
        </tr>
        <tr>
            <input type=hidden name="fecha" value="select now();">
            <input type=hidden name="subtotal" value="0.0">
            <input type=hidden name="total" value="0.0">
            <input type=hidden name="iva" value="0.0">
            <input type=hidden name="cliente_id" value="1">
            <input type=hidden name="estado" value="1">
            <input type=hidden name="descuento" value="0.0">
            <input type=hidden name="usuario_id" value="1">
            <input type=hidden name="observacion" value="Escriba su observacion">            
             <td colspan=3 align="center">
                    <input class="guardar" id="guardar" type="submit" value="Generar">
             </td>
        </tr>
    </table>

<div style="width:400; height:200; float:left"></div>

</form>

<h3 align="center">Informacion Factura</h3>
<form id="form2" method="get" action="" onsubmit="return confirm('¿Desea Eliminar?')">

	<table width="100" align="center" style="float:left">
            <tr>
                <td height="50"><label style="font-family:'Comic Sans MS', cursive; font-size:15px ">
                No. Factura:</label></td><input name="pac" type="hidden" id="pac" value="103"/></td>
            </tr>
            <tr>
                <td height="59"><label style="font-family:'Comic Sans MS',cursive; font-size:15px ">Fecha:</label></td>
           </tr>
           <tr>
                <td height="20"><label style="font-family:'Comic Sans MS',cursive; font-size:15px ">Estado:</label></td>
        
            <?php 
            //Select
                $dat = $ins->selfactura();
                for ($i=0; $i < count($dat); $i++){
              ?>
        
     </table>
     <table width="300" style="float:left" align="center" border="2">
            <tr>
                <td width="150" align="center"><input class="guardar" id="guardar" type="submit" name="del" 
                value=<?php echo $dat[$i]['id_factura'] ?>></td>
                <td  width="150" align="center"><a href="home.php?pr=<?php echo $dat[$i]['id_factura'] ?>&pac=103&up=11">
                <img src="image/editar.jpg" width="40" height="40" style=""/></a>
                </td>
            <tr>
                <td align="center">Eliminar</td>
                <td align="center">Editar</td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $dat[$i]['fecha'] ?></td>
           </tr>
           <tr>
                <td  height="50"colspan="2" align="center"><?php echo $dat[$i]['estado'] ?></td>
                
            <?php  }  ?>
	 </table>
</form>
<!-- </div> -->
</div>






