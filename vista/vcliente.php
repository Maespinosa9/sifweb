<?php 
    include ("controlador/ccliente.php");
    include ("js/cliente.js");
?>



<script language="javascript" src="../Sifweb/js/jquery-1.2.6.min.js"></script><!-- llamamos al JQuery-->
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

<div id="izquierda">
	<form name="form1" action="" method="POST">
    <h3>Registrese</h3>
    <label for="tipo_documento">Tipo de Documento &nbsp;</label>
        <td><select name="tipo_documento" id="tipo_documento">
        <option value="" selected="selected">Seleccione </option>
           <?php 
                //Select
                $dat3 = $ins->selpara(1);
                for ($i=0; $i < count($dat3); $i++){
             ?>
                <option value="<?php echo $dat3[$i]['idvalor'] ?>"><?php echo $dat3[$i]['descripcion'] ?></option>
            <?php } ?>
        </select>
            <div id="id_nit_duplicado"></div>
            <br/><br/><label for="documento">Numero del Documento&nbsp;</label>
            <input type="text" name="documento" id="documento" size="25" maxlength="11"  required="required" onkeypress="return validar(event);" onblur="Duplicidad(this.value)" />
            <br/><br/><label for="nombre">Ingrese su Nombre&nbsp;</label>
            <input type="text" name="nombre" id="nombre" size="25" maxlength="30" required/>
            <br/><br/><label for="apellido">Ingrese su Apellido&nbsp;</label>
            <input type="text" name="apellido" id="apellido" size="25" maxlength="30" required />                    
            <br/><br/><label for="telefono_1">Tel&eacute;fono Fijo&nbsp;</label>
            <input type="text" name="telefono_1" id="telefono_1" size="25" maxlength="20" required onkeypress="return validar(event)" />
            <br/><br/><label for="celular">N&uacute;mero Celular&nbsp;</label>
            <input type="text" name="celular" id="celular" size="25" maxlength="20" onkeypress="return validar(event)" />
            <br/><br/><label for="e_mail">Ingrese su E-mail&nbsp;</label>
            <input type="email" name="e_mail" id="e_mail" size="25" maxlength="30" required />
            <br/><br/><label for="direccion">Ingrese su Direcci&oacute;n&nbsp;</label>
          
            <input type="text" name="direccion" id="direccion" size="25" maxlength="30" required /> 
              <p>             
            <br/><br/><br/><br/><input id="boton" type="submit" value="Guardar" class="guardar" />
            <input id="boton1" type="button" class="guardar" value=" Volver " onclick="location = 'home.php'" />
            </p>
</form>
</div>