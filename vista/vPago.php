<?php 
include ("controlador/cPago.php");
?>

<script type="text/javascript">
	function agregaTipo(){
		document.getElementById("agrega").style.display='none';
		var tipo;
		var newdiv = document.createElement('div');
		tipo = document.getElementById("divPago");
		newdiv.innerHTML = "<br><form id = 'formTipos' action = '' method = 'POST'>";
		newdiv.innerHTML += "<br><input type='text' name='pago' placeholder = 'Inserte el nuevo tipo de pago'>";
		newdiv.innerHTML += "<input type='submit' value='guardar'></form>"
		//formu +="<input type='text' name='pago' placeholder = 'Inserte el nuevo tipo de pago'>"; 
		
		alert(newdiv);
		tipo.appendChild(newdiv);
	}
</script>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
<div name="izquierda" id="izquierda">
	<form name="FormPago" action="" method="post">
	<H3>PAGO</H3>
    	<label for="fecha">Fecha de Pago&nbsp;&nbsp;</label>
        <input type="date" name="fecha" id = "fechaPago" required = "required"/></br></br>
        <label for= "ValorPago">Valor del Pago&nbsp;&nbsp;</label>
        <input type="text" name="ValorPago" id = "ValorPago" required="required"/></BR></br>
        <label for="tipoPago">Tipo de Pago&nbsp;&nbsp;&nbsp;</label>
        <select name="tipoPago" required = "required">
        <?php
			for ($i=0; $i<count($dat); $i++){ 
		?>
		<option value = "<?php echo $dat[$i]['idValor']; ?>"><?php echo $dat[$i]['descripcion']; ?></option>
         <?php
			}
		?>
		</select>
        <input id="agrega" type="button" value="Agregar" onclick="agregaTipo();" />
        <div id = "divPago"></div>
        </br></br>
        <textarea name="descripcion" rows="3" cols="35" placeholder = "Ingrese la Descripci&oacute;n del Pago Realizado"></textarea><br/></br>
        </br></br></br></br></br></br><input class="guardar" type="submit"  id="guardar" value="Guardar">
    </form>
</div>