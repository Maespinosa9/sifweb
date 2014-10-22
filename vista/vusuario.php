<?php 
    include ("controlador/cusuario.php");
    //include ("../js/cliente.js");
?>


<!--
<script language="javascript" src="../../Sifweb/js/jquery-1.2.6.min.js"></script><!-- llamamos al JQuery
<script language="javascript">
    
     function Duplicidad(Id){
      var doc = {
                "Id" : Id
        };

        $.ajax({
                data:  doc,
                url:   '../vista/vduplicidad.php',
                type:  'post',
                success:  function (response) {
                        $("#id_nit_duplicado").html(response);
                }
        });
     }
</script>
-->

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />

</head>
</body>
<div name="izquierda" id="izquierda">
<form name="form1" action="" method="POST">
	<h3>Registro</h3>
        <label>Tipo de Documento&nbsp;</label> 
            <select name="tipo_documento" id="tipo_documento">
                       <?php 
                            //Select
                           // $dat3 = $ins->selpara(1);
                           // for ($i=0; $i < count($dat3); $i++){
                         ?>
                            <option value="<?php //echo $dat3[$i]['codval'] ?>">C.C</option>
                        <?php// } ?>
             </select>
        <label>&nbsp;No Documento&nbsp;</label>      
        <input type="text" style="width:15em;" name="id_usuario" required="required" onkeypress="return validar(event);" onblur="Duplicidad(this.value)" /></br></br>
        <label>Nombre &nbsp;</label>  
        <input type="text" style="width:37em;"name="nombre" id="nombre"  required="required" /> </br></br> 
        <label>Apellido &nbsp;</label>  
        <input type="text" style="width:37em;"name="apellido" id="apellido" required="required"/></br></br>                    
        <label>Telefono &nbsp;</label>
        <input type="text" style="width:15em;" name="telefono_1" id="telefono_1"/>
        <label>&nbsp;Celular &nbsp;</label>
        <input type="text" style="width:15em;" name="celular" id="celular" required="required"/></br></br>
        <label>Email &nbsp;</label>
        <input type="email" style="width:38em;" name="e_mail" id="e_mail"/></br></br> 
        <label>Direccion&nbsp;&nbsp;</label>
        <input type="text" style="width:36em;" name="direccion"/></br></br>                
        <label>Cargo &nbsp;</label>  
        <input type="text" style="width:38em;" name="cargo" required="required"/></br></br>                  
        <label>&nbsp;Fecha de Ingreso &nbsp;</label>
        <input type="date" name="fecha_ingreso" required="required"/>
        <label>Salario &nbsp;</label>
        <input type="text" style="width:15em;" name="salario" required="required"/></br></br> 
        <label>foto&nbsp;</label>
        <input type="text" name="foto"/>
         <label>&nbsp;Perfil&nbsp;</label> 
            <select name="perfil" id="perfil">
                       <?php 
                            //Select
                           // $dat3 = $ins->selpara(1);
                           // for ($i=0; $i < count($dat3); $i++){
                         ?>
                            <option value="<?php //echo $dat3[$i]['codval'] ?>">Administrador</option>
                        <?php// } ?>
             </select></br></br>
       <label>Clave &nbsp;</label>
        <input type="text"  style="width:18em;" name="clave" required="required"/></br></br></br>
      <p>  
        <input class="guardar" type="submit" value="Guardar" />
        <input class="guardar" type="button" value=" Volver " onclick="location = 'home.php'" />
       </p> 
    </form>
    </div>

<div id="derecha" name="derecha">
    <h3>Registros Activos</h3>
    <center>
<form  name="form2" method="get" action="" onSubmit="return confirm('¿Desea eliminar?')">
  
  
    <table width="45%" border="1" cellspacing="0" cellpadding="4">
    <thead>
      <tr>
        <td class="style1" align="center" width="160">No. Documento</td>
        <td class="style1" align="center" width="160">Nombre</td>
        <td class="style1" align="center" width="160">Apellido</td>
        <td class="style1" align="center" width="160">Cargo</td>
        <td class="style1" align="center" width="160">Perfil</td>
        <td class="style1" align="center" width="60">Editar</td>
       
      </tr>
      </thead>
         <?php 
         for ($i=0; $i < count($dat); $i++){
            
      ?>
      <tbody>
          <tr>

            <td class="style2" align="center"><input type="submit" name="del" value=<?php echo $dat[$i]['id_usuario'] ?>></td>
            <td class="style2" align="center"><?php echo $dat[$i]['nombre']  ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['apellido'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['cargo'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['perfil_id'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['id_usuario'] ?>"><img border=0 src="image/editar.png" width="16" height="16" /></a>
                    <?php  }  ?>     </td>     
        </tr>
      
        </tbody>
        <tfoot>
         <tr>
            <td colspan=8 class="style2">Para eliminar presione el n&uacute;mero del c&oacute;digo.</td>
        </tr>
        </tfoot>
    </table>
    <p>&nbsp; </p>
 
</form>
</center>
 </div>
    </body>
    </html>