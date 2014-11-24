<?Php
include ("controlador/cDet_Compra.php");
?>
<br>
<h2 align="center">Detalles para la Factura de compra Nro. <?php echo $factura[0]['factura']?></h2>
<div name="det_compra" id="izquierda">
	<h3> Ingresar Detalle</h3>
	<br>
	<form name = "form_Det_Compra" action = "" method = "POST">
		<label for ="producto">Producto: &nbsp;&nbsp;</label>
		<select name= "producto" required>
			<option value = "">Seleccione</option>
		<?php 
			for($i = 0; $i<count($productos); $i++){
		?>
		<option value="<?php echo $productos[$i]['id_producto']; ?>" ><?php echo $productos[$i]['descripcion']; ?></option>
	    <?php
			}
		?>
		</select>
		<input type="number" placeholder = "Cantidad">
	</form>
</div>

<div name="table_det_compra" id="derecha">
	<H3>Detalles de la Orden </H3>
</div>