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
        <label>Documento &nbsp;</label>  
        <input type="hidden" style="width:37em;" name="id_usuario" id="id_usuario_duplicado"  required="required" value="<?php echo $editar[0]['id_usuario']; ?>"/>   
        <input type="hidden" name="actu" value="actu" /></br></br>
        <label>Nombre &nbsp;</label>  
        <input type="text" style="width:37em;"name="nombre" id="nombre"  required="required" 
        value="<?php echo $editar[0]['nombre']; ?>"/> </br></br> 
        <label>Apellido &nbsp;</label>  
        <input type="text" style="width:37em;"name="apellido" id="apellido" required="required"
        value="<?php echo $editar[0]['apellido']; ?>"/></br></br>  
        <label>Telefono &nbsp;</label>
        <input type="text" style="width:15em;" name="telefono_1" id="telefono_1" required="required"
        value="<?php echo $editar[0]['telefono_1']; ?>"/>
        <label>&nbsp;Celular &nbsp;</label>
        <input type="text" style="width:15em;" name="celular" id="celular" required="required"
        value="<?php echo $editar[0]['celular']; ?>"/></br></br>
        <label>Direccion&nbsp;&nbsp;</label>
        <input type="text" style="width:36em;" name="direccion" id="direccion" required="required"
        value="<?php echo $editar[0]['direccion']; ?>"/></br></br>  
        <label>Email &nbsp;</label>
        <input type="email" style="width:38em;" name="e_mail" id="e_mail" required="required"
        value="<?php echo $editar[0]['e_mail']; ?>"/></br></br>             
        <label>Cargo &nbsp;</label>  
        <input type="text" style="width:38em;" name="cargo" id="cargo" required="required"
        value="<?php echo $editar[0]['cargo']; ?>"/></br></br>                  
        <label>&nbsp;Fecha de Ingreso &nbsp;</label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso" required="required" value= "<?php echo $editar[0]['fecha_ingreso']; ?>"/>
        <label>Salario &nbsp;</label>
        <input type="text" style="width:15em;" name="salario" id="salario" required="required"
         value="<?php echo $editar[0]['salario']; ?>"/></br></br> 
        <label>&nbsp;Perfil&nbsp;</label> 
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
       <label>Clave &nbsp;</label>
       <input type="text"  style="width:18em;" name="clave" id="clave" required="required"
       value="<?php echo $editar[0]['clave']; ?>"/></br></br>
       <label>Activo</label>
       <input  type="checkbox" id= "activo" name="activo" value=1 <?php if ($editar[0]['activo']== 1) echo "checked";?> /></br></br>
        <p>  
        <input class="guardar" id="boton1" type="submit" value="Guardar"/>
        <input class="guardar" type="button" value=" Volver " onclick="location = 'home2.php?pac=105'" />
       </p> 
           </form>
    </div>

