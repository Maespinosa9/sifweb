<?php 
    include ("controlador/cproveedor.php");
?>

<div name="izquierda" id="izquierda">
<form name="form2" action="home.php?pac=101" method="POST">
<h3>EDITAR PROVEEDORES</h3>
	
          <input type="hidden"<?php echo $dat[0]['id_nit'] ?>/>
          <input type="hidden" name="id_nit" value="<?php echo $dat[0]['id_nit']?>" />
          <input type="hidden" name="actu" value="actu" />
    

          
<label>Tipo de identificaci&oacute;n&nbsp;</label>
<select name="tipo_documento" style="width: 195px;" onblur="probar(id='tipo_documento', 2)">
                    <?php 
                            //Select
                            $dat3 = $ins->selparametro1(2);
                            for ($i=0; $i < count($dat3); $i++){
                         ?>
                            <option value="<?php echo $dat3[$i]['idValor'] ?>"><?php echo $dat3[$i]['nomvalor'] ?></option>
                        <?php } ?>
          </select></br></br>
          <label>Identificaci&oacute;n&nbsp;</label>
          <input type="hidden" name="actu" value="actu" />
          <input type="text" style="width:20em;" name="id_nit" id="id_nit" size="25" maxlength="11"  required="required"  value="<?php echo $dat[0]["id_nit"];?>" readonly="readonly"/></br></br>
          <label>Razon social&nbsp;</label>
          <input type="text" style="width:25em;" name="razon_social" id="razon_social" size="25" maxlength="30" required="required"  value="<?php echo $dat[0]["razon_social"];?>"/></br></br>
          <label>Contacto&nbsp;</label>
          <input type="text" style="width:20em;" name="contacto" id="contacto" size="25" maxlength="30" required="required"  value="<?php echo $dat[0]["contacto"];?>" /></br></br>                  
          <label>Tel&eacute;fono 1&nbsp;</label>
          <input type="text" style="width:14em;" name="telefono_1" id="telefono_1" size="25" maxlength="20" required="required"  value="<?php echo $dat[0]["telefono_1"]; ?>"/></br></br>
          <label>Tel&eacute;fono 2&nbsp;</label>
          <input type="text" style="width:14em;" name="telefono_2" id="telefono_2" size="25" maxlength="20"   value="<?php echo $dat[0]["telefono_2"];?>"/></br></br>
          <label>Email&nbsp;</label>
          <input type="email" style="width:20em;" name="e_mail" id="e_mail" size="25" maxlength="30" required="required"  value="<?php echo $dat[0]["e_mail"];?>" /></br></br></br>
          <label>Direcci&oacute;n&nbsp;</label>  
          <input type="text" style="width:20em;" name="direccion" id="direccion" size="25" maxlength="30"  value="<?php echo $dat[0]["direccion"];?>" /></br></br>             
          <label>Observaciones&nbsp;</label>           
          <textarea name="observaciones" cols="60" maxlength="100" id="observaciones" placeholder="observaciones" ><?php echo $dat[0]["observaciones"];?></textarea></br></br>
          <p>
          <input class="guardar" type="submit" value="Editar" name="editar" id="editar" />
          <input class="guardar" id="boton1" type="button" value=" Volver " onclick="location = 'home.php?pac=101'" />
          </p> 
     
    </form>
  </div>


<div id="derecha" >
<h3>REGISTRO PROVEEDORES</h3>

<br/>   <table width="650" align="center"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
      <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
          <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit(); " placeholder= "NIT">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
    </form>
    </td>   
     <div id="paginar" style="position:absolute; bottom:0px; right:50px;">
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
    <form name="formfil" action="formfil" method="GET" onSubmit="return confirm('¿Eliminara el Proveedor Desea Continuar?')">
           <thead>
              <th>Identificaci&oacute;n<input name="pac" type="hidden" id="pac" value="101"/></td>
              <th>Raz&oacute;n Social</th>
              <th>Tel&eacute;fono1</th>
              <th>Tel&eacute;fono2</th>
              <th>Contacto</th>
              <th>Acciones</th>
           </thead>
          <?php 
            $dat=$ins->selpro2($filtro, $pag->rvalini(), $pag->rvalfin());
              for ($i=0; $i < count($dat); $i++){
    ?>   
          <tbody>
         <tr>
             <td class="style2" align="center"><?php echo $dat[$i]['id_nit'] ?></td>
             <td class="style1" align="center"><?php echo $dat[$i]['razon_social']  ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['telefono_1']  ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['telefono_2']  ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['contacto'] ?></td>
             <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['id_nit'] ?>&pac=101&up=11"><img border=0 src="image/editar.png" name="editar" title= "Editar" width="19" height="19" /></a></td>
                              <!--  <a href="home.php?delete=<?php echo $dat[$i]['id_nit'] ?>&pac=<?php echo $pac; ?>"><img src="image/eliminar.png" name="delete" title= "Eliminar"></a></td> -->
            </tr>                   
           <tbody>
              <?php  }  ?>
         
    </form>
 </table>
 </div>
