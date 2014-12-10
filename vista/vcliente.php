<?php 
    include ("controlador/ccliente.php");
?>


<script type="text/javascript">
 function Duplicidad(Id){
      var doc = {
                "Id" : Id
        };
        $.ajax({
                data:  doc,
                url:   'vista/vduplicidad2.php',
                type:  'post',
                success:  function (response) {
                        $("#id_cliente_duplicado").html(response);
                }
        });
     }
</script>

<div name="izquierda" id="izquierda">
<form name="form1" action="" method="POST">
<h3>CLIENTE</h3>
        <label>Tipo de Documento&nbsp;</label> 
        <select name="tipo_documento" id="tipo_documento" required="required">
        <option value="">Seleccione</option>
                          <?php 
                            //Select
                            $dat3 = $ins->selpara(1);
                            for ($i=0; $i < count($dat3); $i++){
                         ?>
                            <option value="<?php echo $dat3[$i]['idvalor'] ?>"><?php echo $dat3[$i]['nomvalor'] ?></option>
                        <?php } ?>
        </select></br></br>
            <label>Documento&nbsp;</label>
            <input type="text" style="width:15em;" name="id_cliente"  id="id_cliente_duplicado"  required="required"  onblur="javascript:Duplicidad(this.value);"/></br></br>   
            <label>Nombres&nbsp;</label>
            <input type="text" style="width:25em;" name="nombre" id="nombre" required="required"/></br></br>
            <label>Apellidos&nbsp;</label>
            <input type="text" style="width:25em;" name="apellido" id="apellido" required="required" /></br></br>                   
            <label>Tel&eacute;fono Fijo&nbsp;</label>
            <input type="text" style="width:13em;" name="telefono_1" id="telefono_1"  required="required"/></br></br>
            <label>N&uacute;mero Celular&nbsp;</label>
            <input type="text" style="width:13em;" name="celular" id="celular" required="required"/></br></br>
            <label>Direcci&oacute;n&nbsp;</label>
            <input type="text" style="width:20em;" name="direccion" id="direccion" required="required"/> </br></br>
            <label>E-mail&nbsp;</label>
            <input type="email" style="width:25em;" name="e_mail" id="e_mail" required="required"/></br></br>
            <p>  
            <input class="guardar" id="boton" type="submit" value="Guardar" />
            <input class="guardar" type="button" value="Volver" onclick="location = 'home.php'"/></br></br>
            </p> 
</form>
</div>

<div id="derecha" name="derecha">
<h3>REGISTRO CLIENTES</h3>
 <table cellpadding="8" align="center" width="200">
<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('¿Eliminara el Cliente Desea Continuar?')">
    <thead>
         <th>No. Documento<input name="pac" type="hidden" id="pac" value="114"/></th>
         <th>Nombre</th>
         <th>Celular</th>
         <th>Tel&eacute;fono</th>
         <th>Acciones</th>
      </thead>
      <?php 
            $dat = $ins->select();
         for ($i=0; $i < count($dat); $i++){
      ?>
       <tbody>
            <tr>
            <td class="style2" align="center"><?php echo $dat[$i]['id_cliente'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['nombre'] ?>&nbsp;&nbsp;<?php echo $dat[$i]['apellido'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['celular'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['telefono_1'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['id_cliente'] ?>&pac=114&up=11"><img border=0 src="image/editar.png"  name="editar" title = "Editar" width="19" height="19" /></a></td>
                          <!--     <a href="home.php?delete=<?php echo $dat[$i]['id_cliente'] ?>&pac=<?php echo $pac; ?>"><img src="image/eliminar.png" name="delete" title= "Eliminar"></a>-->
            </tr>
        </tbody>
        <?php  }  ?>      
    
</form>
    </table>
 </div>