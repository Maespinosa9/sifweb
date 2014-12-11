<?php 
    include ("controlador/cusuario.php");
?>

<div name="izquierda" id="izquierda">
<form name="form1" action="home2.php?pac=105" method="POST">
<h3>EDITAR USUARIO</h3>
        <label>Tipo de Documento&nbsp;</label> 
        <select name="tipo_document" id="tipo_document" required="required">
        <option value="">Seleccione</option>
                          <?php 
                            //Select
                            //$document = $ins->selparametro(1);
                            for ($i=0; $i < count($document); $i++){
                         ?>
                              <option value="<?php echo $document[$i]['idvalor']; ?>" <?php if($editar[0]['tipo_document']==$document[$i]['idvalor']) echo 'selected'; ?> ><?php echo $document[$i]['nomvalor']; ?></option>

                        <?php } ?>
        </select></br></br>
        <label>Documento&nbsp;</label>  
        <input type="text" style="width:15em;" name="id_usuario" id="id_usuario_duplicado"  required="required" value="<?php echo $editar[0]['id_usuario']; ?>"/>   
        <input type="hidden" name="actu" value="actu" readonly="readonly"/></br></br>
        <label>Nombre&nbsp;</label>  
        <input type="text" style="width:15em;"name="nombre" id="nombre"  required="required" 
        value="<?php echo $editar[0]['nombre']; ?>"/>&nbsp;
        <label>Apellido&nbsp;</label>  
        <input type="text" style="width:15em;"name="apellido" id="apellido" required="required"
        value="<?php echo $editar[0]['apellido']; ?>"/></br></br>  
        <label>Tel&eacute;fono&nbsp;</label>
        <input type="text" style="width:10em;" name="telefono_1" id="telefono_1" required="required"
        value="<?php echo $editar[0]['telefono_1']; ?>"/>
        <label>Celular&nbsp;&nbsp;&nbsp;</label>
        <input type="text" style="width:10em;" name="celular" id="celular" required="required"
        value="<?php echo $editar[0]['celular']; ?>"/></br></br>
        <label>Direcci&oacute;n&nbsp;</label>
        <input type="text" style="width:15em;" name="direccion" id="direccion" required="required"
        value="<?php echo $editar[0]['direccion']; ?>"/></br></br>  
        <label>Email&nbsp;</label>
        <input type="email" style="width:15em;" name="e_mail" id="e_mail" required="required"
        value="<?php echo $editar[0]['e_mail']; ?>"/></br></br></br>         
        <label>Cargo&nbsp;</label>  
        <input type="text" style="width:15em;" name="cargo" id="cargo" required="required"
        value="<?php echo $editar[0]['cargo']; ?>"/></br></br>                  
        <label>Fecha de Ingreso&nbsp;</label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso" required="required" value= "<?php echo $editar[0]['fecha_ingreso']; ?>"/>&nbsp;
        <label>Salario&nbsp;</label>
        <input type="text" style="width:10em;" name="salario" id="salario" required="required"
         value="<?php echo $editar[0]['salario']; ?>"/></br></br> 
        <label>Perfil&nbsp;</label> 
        <select name="perfil_id" id="perfil_id">
        <option value="">Seleccione</option>
                       <?php 
                            //Select
                           //$dat4 = $ins->selperfil();
                           for ($i=0; $i < count($perfil); $i++){
                         ?>
                           <option value="<?php echo $perfil[$i]['id_perfil']; ?>" <?php if($editar[0]['perfil_id']==$perfil[$i]['id_perfil']) echo 'selected'; ?> ><?php echo  $perfil[$i]['descripcion']; ?> </option>
                        <?php } ?>
             </select></br></br>
       <label>Clave&nbsp;</label>
       <input type="text"  style="width:15em;" name="clave" id="clave" required="required"
       value="<?php echo $editar[0]['clave']; ?>"/></br></br>
       <label>Activo</label>
       <input  type="checkbox" id= "activo" name="activo" value=1 <?php if ($editar[0]['activo']== 1) echo "checked";?> /></br></br>
        <p>  
        <input class="guardar" id="boton1" type="submit" value="Guardar"/>
        <input class="guardar" type="button" value=" Volver " onclick="location = 'home2.php?pac=105'" />
       </p> 
           </form>
    </div>



<div id="derecha" name="derecha">
<h3>Registros Activos</h3>
<br/>   <table width="650" align="center"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home2.php">
      <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
          <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit(); " placeholder= "NIT">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
   
    </td>   
     <div id="paginar" style="position:absolute; bottom:0px; right:50px;" >
        <td align="bottom" valign="bottom" >
            <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            ?>
        </td>
    </div>
 </form>
</tr></table>
 <table cellpadding="8">
<form id="form2"  method="GET" action="home2.php" onSubmit="return confirm('¿Eliminara el usuario Desea Continuar?')">
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
       $dat=$ins->selpro2($filtro, $pag->rvalini(), $pag->rvalfin());
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
            <td align="center" ><a href = "home2.php?pr=<?php echo $dat[$i]['id_usuario'] ?>&pac=<?php echo $pac; ?>&up=11" style="width: 30px"><img src="image/editar.png" name="editar" title = "Editar" width="19" height="19"></a></td>

            </tr>
        </tbody>
        <?php  }  ?>       
</form>
    </table>
 </div>
   
