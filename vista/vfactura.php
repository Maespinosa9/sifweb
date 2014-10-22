<?php
include ("controlador/cfactura.php");
//include ("controlador/cproductof.php");

?>

<link rel="stylesheet" type="text/css" href="../css/style.css" />
<script src="js/jquery-1.9.1.js" type="text/javascript"></script>
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
                        $("#reloadPrecio").html(response);
                }
        });
     }
</script>

<div name="izquierda" id="izquierda">
<form name="form1" action="" method="post">

        
<table align="center" width="300" border="2">
    <tr>
        <td>
            <H3 style="font-family:'Comic Sans MS', cursive; font-size:22px" align="center">Factura de Venta<H3> 

        </td>
    <tr>
    <tr>
        <td align="center">
        	<img src="image/codbar.jpg" width="200" height="50">
        </td>
    </tr>
    <tr>
                <input type=hidden name="fecha" value="select now();"></input>
            
                <input type=hidden name="subtotal" value="0.0"></input>
           
                <input type=hidden name="total" value="0.0"></input>
            
                <input type=hidden name="iva" value="0.0"></input>
            
                <input type=hidden name="cliente_id" value="1"></input>
           
                <input type=hidden name="estado" value="1"></input>
          
                <input type=hidden name="descuento" value="0.0"></input>
            
                <input type=hidden name="usuario_id" value="1"></input>
                
                <input type=hidden name="observacion" value="Escriba su observacion"></input>
        
            <td colspan=3 align="center">
                <input class="guardar" id="guardar" type="submit" value="Generar"></input>
            </td>
    </tr>
</table>

<div style="width:400; height:100; float:left"></div>

</form>
    <form name "form4" action="" method="post">
    <table>
    <tr>
    	<td colspan="2" align="center">
			<H3 style="font-family:'Comic Sans MS', cursive; font-size:22px" align="center">Productos</H3>
        </td>
    </tr>
    <tr>
        <td>
             <div align="left" id="10" class="rojo">Producto</div>

                   <select name="producto" onchange="javascript:RecargarProdcutos(this.value);" style="width: 195px;" onblur="probar(id='depto', 10)" required>

            <option value="" id="producto">Seleccione</option>
             <?php 
                //Select
                     $dat5 = $ins->selproducto();
                         for ($i=0; $i < count($dat5); $i++){
             ?>
            
            <option value="<?php echo $dat5[$i]['id_producto'] ?>"><?php echo $dat5[$i]['descripcion'] ?></option>
            
            <?php } ?>
        </select>
        </td>
        <td valign="bottom">
        <div id="reloadPrecio"></div>
    </td>
    </tr>
    <tr>
    	<td>
        	<label>Cantidad</label>
        	<input type="text" name="cantidad" id="cantidad">
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="center">
            <input class="guardar" id="guardar" type="submit" value="Agregar"></input>
        </td>
    </tr>
    
    
    </table>
    </form>
</div>
<div style="width:250; height:150; float:left"></div>
<div style="width:351; height:150; float:left"></div>
<div name="derecha" id="derecha">


<form id="form2" method="get" action="" onsubmit="return confirm('¿Desea Eliminar?')">
<table width="100" style="float:left">
    <tr>
        <td height="50"><label style="font-family:'Comic Sans MS', cursive; font-size:15px ">No. Factura:</label></td><input name="pac" type="hidden" id="pac" value="103"/></td>

	</tr>
    <tr>
        <td height="59"><label style="font-family:'Comic Sans MS', cursive; font-size:15px ">Fecha:</label></td>
   </tr>
   <tr>
   		<td height="20"><label style="font-family:'Comic Sans MS', 		cursive; font-size:15px ">Estado:</label></td>

	<?php 
    //Select
        $dat = $ins->selfactura();
        for ($i=0; $i < count($dat); $i++){
      ?>

</table>
<table width="300" style="float:left" border="2">
    <tr>
        <td width="150" align="center"><input class="guardar" id="guardar" type="submit" name="del" value=<?php echo $dat[$i]['id_factura'] ?>></td>
        <td  width="150" align="center"><a href="home.php?pr=<?php echo $dat[$i]['id_factura'] ?>&pac=103&up=11"><img src="image/editar.jpg" width="40" height="40" style=""/></a>
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
	<table height="50">
	</table>
    
	<table border="2">
		<tr>
        	<td>
            	Producto
            </td>
            <td>
            	Precio
            </td>
        	<td>
            	Cantidad
            </td>
    	</tr>
	</table>

</div>







