<?php 
    include ("controlador/cproveedor.php");
?>
<center>
	<form name="form2" action="home.php?pac=101" method="POST" >
		<table align="center" width="400" border="0" cellspacing="5" cellpadding="3" >

         <tr>
      <td><input type="hidden"<?php echo $dat[0]['id_nit'] ?>/>
          <input type="hidden" name="id_nit" value="<?php echo $dat[0]['id_nit']?>" />
          <input type="hidden" name="actu" value="actu" />
      </td>
      </tr>

            <tr>
                <td colspan=5 align="center"><h1>Editar Proveedor</h1></td>
            </tr>

           <tr>
               <td valign="bottom">    
    <div align="left" id="2" class="rojo">*&nbsp;Tipo de Documento:</div>
<select name="tipo_documento" style="width: 195px;" onblur="probar(id='tipo_documento', 2)">
    
                    <?php 
                            //Select
                            $dat3 = $ins->selparametro1(1);
                            for ($i=0; $i < count($dat3); $i++){
                         ?>
                            <option value="<?php echo $dat3[$i]['idValor'] ?>"><?php echo $dat3[$i]['nomvalor'] ?></option>
                        <?php } ?>
          </select>
    </td>

              <td >
                    <input type="text" name="id_nit" id="id_nit" size="25" maxlength="11"  required="required" placeholder="Numero" value="<?php echo $dat[0]["id_nit"];?>" /></td>
            </tr>

            <tr>
                <td>Razon Social
                    <input type="text" name="razon_social" id="razon_social" size="25" maxlength="30" required="required" placeholder="Razon Social" value="<?php echo $dat[0]["razon_social"];?>"/> </td>

                <td>Contacto
                    <input type="text" name="contacto" id="contacto" size="25" maxlength="30" required="required" placeholder="Contacto" value="<?php echo $dat[0]["contacto"];?>" /></td>                    

            </tr>

            <tr>
                <td>Telefono 1
                    <input type="text" name="telefono_1" id="telefono_1" size="25" maxlength="20" required="required" placeholder="Telefono_1" value="<?php echo $dat[0]["telefono_1"]; ?>"/></td>

                <td>Telefono 2
                    <input type="text" name="telefono_2" id="telefono_2" size="25" maxlength="20"  placeholder="Telefono_2" value="<?php echo $dat[0]["telefono_2"];?>"/></td>
            </tr>


            <tr>
                <td>Email
                    <input type="email" name="e_mail" id="e_mail" size="25" maxlength="30" required="required" placeholder="Email" value="<?php echo $dat[0]["e_mail"];?>" />
                </td>  

                <td>Direccion
                    <input type="text" name="direccion" id="direccion" size="25" maxlength="30" required="required" placeholder="Dirección" value="<?php echo $dat[0]["direccion"];?>" /></td>               
            </tr>

            <tr>
                <td colspan="2"> Observaciones                  
              <textarea name="observaciones" cols="60" maxlength="100" id="observaciones" placeholder="observaciones" required><?php echo $dat[0]["observaciones"];?></textarea></td>
              
            </tr>

            <tr>
                <td  align="center" valign="bottom">
                    <input type="submit" value="Editar" name="editar" id="editar" />


                </td>


                <td  align="center" valign="bottom">

                    <input id="boton1" type="button" value=" Volver " onclick="location = 'home.php'" />
                </td>
            </tr>
        </table>
    </form>

