<?php
	include ("controlador/ctienda.php");
?>


<div name="izquierda" id="izquierda">
<form name="form1" action="" id="form1" method="post">
<H3>INFORMACION DE LA TIENDA</H3>
<label>Nit&nbsp;</label>
<input type="text" name="nit" required="required"/></br></br>
<label>Logo&nbsp;</label>
<input style="width:10em; " type="text" name="logo"/></br></br>
<label>Raz&oacute;n Social&nbsp;</label>
<input style="width:33em" type="text" name="razon_social"  required="required"/></br></br>
<label>Direcci&oacute;n&nbsp;</label>
<input style="width:35em" type="text" name="direccion" required="required"/></br></br>
<label>Tel&eacute;fono&nbsp;</label>
<input style="width:13em"type="text" name="telefono"/>
<label>&nbsp;Celular&nbsp;</label>
<input style="width:15em" type="text" name="celular"/></br></br>
<label>E-mail&nbsp;</label>
<input style="width:37em" type="email" name="e_mail" required="required"/></br></br>
<label>Regimen&nbsp;</label>
<select style="width:14em; height:2em" name="regimen"/>
<option value="Reg.Comun">Reg.Comun</option>
<option value="Reg.Simplificado">Reg.Simplificado</option>
</select>
<label>&nbsp;Resoluci&oacute;n&nbsp;</label>
<input style="width:13em"type="text" name="resolucion"/></br></br>
<label>Administrador&nbsp;</label>
<input style="width:32em" type="text" name="administrador" required="required"/></br></br>
<p> 
<input class="guardar" type="submit"  id="guardar" value="Guardar">
</p>
</form>
</div>

<div name="derecha" id="derecha">
<form name="form2" action="" id="form1" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
<H3> MODIFICAR INFORMACION</H3>
<label>Nit&nbsp;</label>
<input type="text" name="nit" value="<?php echo $dat1[0]['id_nit']?>" disabled/></br></br>
<label>Logo&nbsp;</label>
<input style="width:10em; " type="text" name="logo"/></br></br>
<label>Raz&oacute;n Social&nbsp;</label>
<input style="width:33em" type="text" name="razon_social" value="<?php echo $dat1[0]['razon_social']?>" disabled/></br></br>
<label>Direcci&oacute;n&nbsp;</label>
<input style="width:35em" type="text" name="direccion" value="<?php echo $dat1[0]['direccion']?>" disabled/></br></br>
<label>Tel&eacute;fono&nbsp;</label>
<input style="width:13em"type="text" name="telefono" value="<?php echo $dat1[0]['telefono']?>" disabled/>
<label>&nbsp;Celular&nbsp;</label>
<input style="width:15em" type="text" name="celular" value="<?php echo $dat1[0]['celular']?>" disabled/></br></br>
<label>E-mail&nbsp;</label>
<input style="width:37em" type="email" name="e_mail" value="<?php echo $dat1[0]['e_mail']?>" disabled/></br></br>
<label>Regimen&nbsp;</label>
<select style="width:14em; height:2em" name="regimen" disabled/>
<option value="<?php echo $dat1[0]['id_nit']?>"><?php echo $dat1[0]['regimen'];?></option>
</select>
<label>&nbsp;Resoluci&oacute;n&nbsp;</label>
<input style="width:13em"type="text" name="resolucion" value="<?php echo $dat1[0]['resolucion']?>" disabled/></br></br>
<label>Administrador&nbsp;</label>
<input style="width:32em" type="text" name="administrador" value="<?php echo $dat1[0]['administrador']?>" disabled/></br></br>
<p> 
<input class="guardar" type="submit"  id="guardar" value="Editar">
<input class="guardar" name="del" type="submit" value="Eliminar Todo">
</p>
</form>
</div>
