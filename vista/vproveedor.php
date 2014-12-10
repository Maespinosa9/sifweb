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


<div name="izquierda" id="izquierda">
<form name="form1" action="" method="POST">
<h3>PROVEEDORES</h3>
    <label>Tipo de identificaci&oacute;n&nbsp;</label>
    <select name="tipo_documento" style="width: 195px;" required="required">
    <option id="tipo_documento" value="">Seleccione</option>
                    <?php 
                            //Select
                            $dat3 = $ins->selparametro(2);
                            for ($i=0; $i < count($dat3); $i++){
                         ?>
                            <option value="<?php echo $dat3[$i]['idValor'] ?>"><?php echo $dat3[$i]['nomvalor'] ?></option>
                        <?php } ?>
          </select></br></br>
           <label>Identificaci&oacute;n&nbsp;</label>
           <input type="hidden" name="actu" value="actu" />
           <input type="text"  style="width:20em;" name="id_nit" id="id_nit_duplicado" size="25" maxlength="11"  required="required"  onblur="javascript:Duplicidad(this.value);" /></br></br>
           <label>Razon social&nbsp;</label>
           <input type="text"  style="width:25em;" name="razon_social" id="razon_social" size="25" maxlength="30" required="required" /></br></br>
           <label>Contacto&nbsp;</label>
           <input type="text"  style="width:20em;" name="contacto" id="contacto" size="25" maxlength="30" required="required" /></br></br>                
           <label>Tel&eacute;fono 1&nbsp;</label>
           <input type="text"  style="width:14em;" name="telefono_1" id="telefono_1" size="25" maxlength="20" required="required"  /></br></br>
           <label>Tel&eacute;fono 2&nbsp;</label>
           <input type="text"  style="width:14em;" name="telefono_2" id="telefono_2" size="25" maxlength="20"   /></br></br>
           <label>Email&nbsp;</label>
           <input type="email" style="width:20em;" name="e_mail" id="e_mail" size="25" maxlength="30" required="required"/></br></br></br>
           <label>Direcci&oacute;n&nbsp;</label>
           <input type="text"  style="width:20em;" name="direccion" id="direccion" size="25" maxlength="30"   /></br></br>             
           <label>Observaciones&nbsp;</label>                 
           <textarea name="observaciones" cols="60" maxlength="100" id="observaciones" placeholder="observaciones" ></textarea></br></br>
           <p> 
           <input  class="guardar"  id="boton" type="submit" value="Guardar" />
           <input  class="guardar" id="boton1" type="button" value=" Volver " onclick="location = 'home.php'" />
           </p> 
    </form>
</div>



<div id="derecha" name="derecha">
<h3>REGISTRO PROVEEDORES</h3>
 <table cellpadding="8" align="center" width="200">
    <form name="form2" action="home.php" method="GET" onSubmit="return confirm('¿Eliminara el Proveedor Desea Continuar?')">
           <thead>
    	        <th>Identificaci&oacute;n<input name="pac" type="hidden" id="pac" value="101"/></td>
              <th>Raz&oacute;n Social</th>
              <th>Tel&eacute;fono1</th>
              <th>Tel&eacute;fono2</th>
              <th>Contacto</th>
              <th>Acciones</th>
           </thead>
    	    <?php 
 	//Select
		$dat = $ins->select_proveedor();
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


