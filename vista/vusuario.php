<?php 
    include ("controlador/cusuario.php");
?>

<script language="javascript" src="../js/jquery-1.2.6.min.js"></script><!-- llamamos al JQuery-->
<script language="javascript">
    
 function Duplicidad(Id){
      var doc = {
                "Id" : Id
        };
        $.ajax({
                data:  doc,
                url:   'vista/vduplicidad1.php',
                type:  'post',
                success:  function (response) {
                        $("#id_usuario_duplicado").html(response);
                }
        });
     }
</script>



<div name="izquierda" id="izquierda">
<form name="form1" action="" method="POST">
<h3>Registro</h3>
        <label>Tipo de Documento&nbsp;</label> 
        <select name="tipo_document" id="tipo_document" required="required">
        <option value="">Seleccione</option>
                          <?php 
                            //Select
                            $dat3 = $ins->selparametro(1);
                            for ($i=0; $i < count($dat3); $i++){
                         ?>
                            <option value="<?php echo $dat3[$i]['idvalor'] ?>"><?php echo $dat3[$i]['nomvalor'] ?></option>
                        <?php } ?>
        </select></br></br>
        <label>Documento &nbsp;</label>  
        <input type="text" style="width:37em;" name="id_usuario" id="id_usuario_duplicado"  required="required"  onblur="javascript:Duplicidad(this.value);" /> </br></br> 
        <label>Nombre &nbsp;</label>  
        <input type="text" style="width:37em;"name="nombre" id="nombre"  required="required" /> </br></br> 
        <label>Apellido &nbsp;</label>  
        <input type="text" style="width:37em;"name="apellido" id="apellido" required="required"/></br></br>                    
        <label>Telefono &nbsp;</label>
        <input type="text" style="width:15em;" name="telefono_1" id="telefono_1" required="required"/>
        <label>&nbsp;Celular &nbsp;</label>
        <input type="text" style="width:15em;" name="celular" id="celular" required="required"/></br></br>
        <label>Direccion&nbsp;&nbsp;</label>
        <input type="text" style="width:36em;" name="direccion" id="direccion" required="required"/></br></br>  
        <label>Email &nbsp;</label>
        <input type="email" style="width:38em;" name="e_mail" id="e_mail" required="required"/></br></br>             
        <label>Cargo &nbsp;</label>  
        <input type="text" style="width:38em;" name="cargo" id="cargo" required="required"/></br></br>                  
        <label>&nbsp;Fecha de Ingreso &nbsp;</label>
        <input type="date" name="fecha_ingreso"  id="fehca_ingreso" required="required"/>
        <label>Salario &nbsp;</label>
        <input type="text" style="width:15em;" name="salario" id="salario" required="required"/></br></br> 
        <label>&nbsp;Perfil&nbsp;</label> 
        <select name="perfil_id" id="perfil_id" required="required">
        <option value="">Seleccione</option>
                       <?php 
                            //Select
                           $dat4 = $ins->selperfil();
                           for ($i=0; $i < count($dat4); $i++){
                         ?>
                           <option value="<?php echo $dat4[$i]['id_perfil'] ?>" ><?php echo $dat4[$i]['descripcion'] ?></option>
                        <?php } ?>
             </select></br></br>
       <label>Clave &nbsp;</label>
       <input type="password"  style="width:18em;" name="clave" id="clave" required="required"/></br></br>
       <label>Activo</label>
        <input type="checkbox" id="activo" name="activo" value=1></br></br>
      <p>  
        <input class="guardar" id="boton" type="submit" value="Guardar" />
        <input class="guardar" type="button" value=" Volver " onclick="location = 'home.php'" />
       </p> 
    </form>
    </div>



<div id="derecha" name="derecha">
<h3>Registros Activos</h3>
 <table cellpadding="8" align="center" width="200">
<form id="form2"  method="GET" action="" onSubmit="return confirm('¿Eliminara el usuario Desea Continuar?')">
    <thead>
         <th>No. Documento<input name="pac" type="hidden" id="pac" value="105"/></th>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>Cargo</th>
         <th>Perfil</th>
         <th>Activo</th>
         <th>Editar</th>
      </thead>
      <?php 
         for ($i=0; $i < count($dat); $i++){
      ?>
       <tbody>
            <tr>
            <td class="style2" align="center"><input type="submit" name="delete" value=<?php echo $dat[$i]['id_usuario'] ?>></td>
            <td class="style2" align="center"><?php echo $dat[$i]['nombre']  ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['apellido'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['cargo'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['perfil_id'] ?></td>
            <td align= "center"><?php if ($dat[$i]['activo'] == 1){?><label>si</label><?php }?></td>
            <td align="center"><a href = "home2.php?pr=<?php echo $dat[$i]['id_usuario'] ?>&pac=<?php echo $pac; ?>&up=11"><img src="image/editar.png" name="editar" title = "Editar"></a></td>

            </tr>
        </tbody>
        <?php  }  ?>       
</form>
    </table>
 </div>
   
