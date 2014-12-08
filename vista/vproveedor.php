<?php 
    include ("controlador/cproveedor.php");
?>



<script language="javascript" src="../js/jquery-1.2.6.min.js"></script><!-- llamamos al JQuery-->
<script language="javascript">
    
 function Duplicidad(Id){
      var doc = {
                "Id" : Id
        };
        $.ajax({
                data:  doc,
                url:   'vista/vduplicidad.php',
                type:  'post',
                success:  function (response) {
                        $("#id_nit_duplicado").html(response);
                }
        });
     }
</script>


<center>
	<form name="form1" action="" method="POST">
		<table align="center" width="400" border="0" cellspacing="5" cellpadding="3">

            <tr>
                <td colspan=5 align="center"><h1>Registro Proveedor</h1></td>
            </tr>

           <td valign="bottom">    
    <div align="left" id="2" class="rojo">*&nbsp;Tipo de Documento:</div>
    <select name="tipo_documento" style="width: 195px;" required="required">
    <option id="tipo_documento" value="">Seleccione</option>
                    <?php 
                            //Select
                            $dat3 = $ins->selparametro(1);
                            for ($i=0; $i < count($dat3); $i++){
                         ?>
                            <option value="<?php echo $dat3[$i]['idValor'] ?>"><?php echo $dat3[$i]['nomvalor'] ?></option>
                        <?php } ?>
          </select>
    </td>




              <td >
                    <input type="text" name="id_nit" id="id_nit_duplicado" size="25" maxlength="11"  required="required" placeholder="N&uacute;mero" onblur="javascript:Duplicidad(this.value);" /></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="razon_social" id="razon_social" size="25" maxlength="30" required="required" placeholder="Raz&oacute;n Social" /> </td>

                <td>
                    <input type="text" name="contacto" id="contacto" size="25" maxlength="30" required="required" placeholder="Contacto"  /></td>                    

            </tr>

            <tr>
                <td>
                    <input type="text" name="telefono_1" id="telefono_1" size="25" maxlength="20" required="required" placeholder="Tel&eacute;fono1" /></td>

                <td>
                    <input type="text" name="telefono_2" id="telefono_2" size="25" maxlength="20"  placeholder="Tel&eacute;fono2" /></td>
            </tr>


            <tr>
                <td>
                    <input type="email" name="e_mail" id="e_mail" size="25" maxlength="30" required="required" placeholder="Email" />
                </td>  

                <td>
                    <input type="text" name="direccion" id="direccion" size="25" maxlength="30" required="required" placeholder="Direcci&oacute;n"  /></td>               
            </tr>

            <tr>
                <td colspan="2">                   
              <textarea name="observaciones" cols="60" maxlength="100" id="observaciones" placeholder="observaciones" ></textarea></td>
            </tr>

            <tr>
                <td  align="center" valign="bottom">
                    <input id="boton" type="submit" value="Guardar" />


                </td>


                <td  align="center" valign="bottom">

                    <input id="boton1" type="button" value=" Volver " onclick="location = 'home.php'" />
                </td>
            </tr>
        </table>
    </form>





    <form name="form2" action="" method="GET" onSubmit="return confirm('¿Desea eliminar?')">
    	<div align="center">
    		<table width="550" border="1" cellspacing="0" cellpadding="4">
    	    <tr>
    	      <td class="style1" align="center" width="80">Identificaci&oacute;n
   	            <input name="pac" type="hidden" id="pac" value="101"/></td>
             <td class="style1" align="center">Raz&oacute;n Social</td>
              <td class="style1" align="center">Telefono_1</td>
              <td class="style1" align="center">Telefono_2</td>
              <td class="style1" align="center">Direcci&oacute;n</td>
              <td class="style1" align="center">Email</td>
              <td class="style1" align="center">Contacto</td>
              <td class="style1" align="center">Observaciones</td>
              <td class="style1" align="center">Editar</td>
              </tr>
    	    <?php 
 	//Select
		$dat = $ins->select_proveedor();
		for ($i=0; $i < count($dat); $i++){
	  ?>   

	       <tr>
             <td class="style2" align="center"><input type="submit" name="delete" value=<?php echo $dat[$i]['id_nit'] ?>></td>
             <td class="style1" align="center"><?php echo $dat[$i]['razon_social']  ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['telefono_1']  ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['telefono_2'] ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['direccion'] ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['e_mail'] ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['contacto'] ?></td>
             <td class="style2" align="center"><?php echo $dat[$i]['observaciones'] ?></td>
             <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['id_nit'] ?>&pac=101&up=11"><img border=0 src="image/editar.png" width="16" height="16" /></a></td> 
             </tr>  
              <?php  }  ?>
           <tr>
		    <td colspan=9 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
           </tr>
         </table>
         <p>&nbsp; </p>
         </div>
    </form>
</center>


