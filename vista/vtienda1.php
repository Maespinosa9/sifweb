<?php
	include ("controlador/ctienda.php");
?>


<div name="izquierda" id="izquierda">
<form name="form1" action="home.php?pac=102" id="form1" method="post">
<H3>INFORMACION DE LA TIENDA</H3>
<label>Nit&nbsp;</label>
<input type="hidden" name="actu" value="actu" />
<input type="text" name="id_nit" style="width:13em; " required="required"  value="<?php echo $editar[0]['id_nit']; ?>"/>&nbsp;
<label>Logo&nbsp;</label>
<input style="width:10em; " type="text" name="logo"   value="<?php echo $editar[0]['logo']; ?>"/></br></br> 
<label>Raz&oacute;n Social&nbsp;</label>
<input style="width:20em" type="text" name="razon_social"  value="<?php echo $editar[0]['razon_social']; ?>" required="required"/></br></br>
<label>Direcci&oacute;n&nbsp;</label>
<input style="width:20em" type="text" name="direccion"  value="<?php echo $editar[0]['direccion']; ?>" required="required"/></br></br>
<label>Tel&eacute;fono&nbsp;</label>
<input style="width:13em"type="text" name="telefono"  value="<?php echo $editar[0]['telefono']; ?>"/>
<label>&nbsp;Celular&nbsp;</label>
<input style="width:15em" type="text" name="celular"  value="<?php echo $editar[0]['celular']; ?>"/></br></br>
<label>E-mail&nbsp;</label>
<input style="width:20em" type="email" name="e_mail" required="required"  value="<?php echo $editar[0]['email']; ?>"/></br></br></br>
<label>Regimen&nbsp;</label>
<select style="width:14em; height:2em" name="regimen"  value="<?php echo $editar[0]['regimen']; ?>"/>
<option value="Reg.Comun">Reg.Comun</option>
<option value="Reg.Simplificado">Reg.Simplificado</option>
<option value="Reg.Simplificado">Persona Natural</option>
<option value="Reg.Simplificado">Persona Jur&iacute;dica</option>
</select>
<label>&nbsp;Resoluci&oacute;n&nbsp;</label>
<input style="width:13em"type="text" name="resolucion"  value="<?php echo $editar[0]['resolucion']; ?>"/></br></br>
<label>Administrador&nbsp;</label>
<input style="width:20em" type="text" name="administrador" required="required"  value="<?php echo $editar[0]['administrador']; ?>"/></br></br>
<p> 
<input class="guardar" id="boton" type="submit" value="Guardar" />	
</p>
</form>
</div>

<div name="derecha" id="derecha">
<form name="form2" action="" id="form1"  method="GET" onSubmit="return confirm('¿Desea editar?')">
<H3> MODIFICAR INFORMACION</H3>
<?php 
           
         for ($i=0; $i < count($dat1); $i++){
      ?>
<label>Nit&nbsp;</label>
<input type="text" name="id_nit" style="width:13em; " value="<?php echo $dat1[0]['id_nit']?>" disabled/>
<label>Logo&nbsp;</label>
<input style="width:10em; " type="text" name="logo" disabled/></br></br>
<label>Raz&oacute;n Social&nbsp;</label>
<input style="width:20em" type="text" name="razon_social" value="<?php echo $dat1[0]['razon_social']?>" disabled/></br></br>
<label>Direcci&oacute;n&nbsp;</label>
<input style="width:20em" type="text" name="direccion" value="<?php echo $dat1[0]['direccion']?>" disabled/></br></br>
<label>Tel&eacute;fono&nbsp;</label>
<input style="width:13em"type="text" name="telefono" value="<?php echo $dat1[0]['telefono']?>" disabled/>
<label>&nbsp;Celular&nbsp;</label>
<input style="width:15em" type="text" name="celular" value="<?php echo $dat1[0]['celular']?>" disabled/></br></br>
<label>E-mail&nbsp;</label>
<input style="width:20em" type="email" name="e_mail" value="<?php echo $dat1[0]['e_mail']?>" disabled/></br></br></br>
<label>Regimen&nbsp;</label>
<select style="width:14em; height:2em" name="regimen" disabled/>
<option value="<?php echo $dat1[0]['id_nit']?>"><?php echo $dat1[0]['regimen'];?></option>
</select>
<label>&nbsp;Resoluci&oacute;n&nbsp;</label>
<input style="width:13em"type="text" name="resolucion" value="<?php echo $dat1[0]['resolucion']?>" disabled/></br></br>
<label>Administrador&nbsp;</label>
<input style="width:20em" type="text" name="administrador" value="<?php echo $dat1[0]['administrador']?>" disabled/></br></br>
<p> 
<input class="guardar" type="submit"  id="guardar" value="Editar" href="home2.php?pr=<?php echo $datos[$i]['id_nit'] ?>&pac=102&up=11&ed=1&prr=<?php echo $datos[$i]['idparametro'] ?>">
</p>
  <?php  }  ?> 
</form>

</div>
