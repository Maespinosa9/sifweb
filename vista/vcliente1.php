<?php 
    include ("controlador/ccliente.php");
?>

<div name="izquierda" id="izquierda">
<form name="form1" action="home.php?pac=114" method="POST">
<h3>EDITAR CLIENTE</h3>
        <label>Tipo de Documento&nbsp;</label> 
        <select name="tipo_documento" id="tipo_documento" required="required">
        <option value="">Seleccione</option>
                          <?php 
                            //Select
                            //$document = $ins->selparametro(1);
                            for ($i=0; $i < count($document); $i++){
                         ?>
                              <option value="<?php echo $document[$i]['idvalor']; ?>" <?php if($editar[0]['tipo_documento']==$document[$i]['idvalor']) echo 'selected'; ?> ><?php echo $document[$i]['nomvalor']; ?></option>

                        <?php } ?>
        </select></br></br>
        <label>Documento&nbsp;</label>
        <input type="hidden" name="actu" value="actu" />
        <input type="text" style="width:15em;" name="id_cliente"  id="id_cliente_duplicado" required="required"  
        value="<?php echo $editar[0]['id_cliente']; ?>" readonly="readonly"/></br></br>   
        <label>Nombre&nbsp;</label>
        <input type="text" style="width:25em;" name="nombre" id="nombre" required="required"
        value="<?php echo $editar[0]['nombre']; ?>"/></br></br>
        <label>Apellido&nbsp;</label>
        <input type="text" style="width:25em;" name="apellido" id="apellido" required="required" 
        value="<?php echo $editar[0]['apellido']; ?>"/></br></br>                   
        <label>Tel&eacute;fono Fijo&nbsp;</label>
        <input type="text" style="width:13em;" name="telefono_1" id="telefono_1"  required="required"
        value="<?php echo $editar[0]['telefono_1']; ?>"/></br></br>
        <label>N&uacute;mero Celular&nbsp;</label>
        <input type="text" style="width:13em;" name="celular" id="celular" required="required"
        value="<?php echo $editar[0]['celular']; ?>"/></br></br>
        <label>Direcci&oacute;n&nbsp;</label>
        <input type="text" style="width:20em;" name="direccion" id="direccion" required="required"
        value="<?php echo $editar[0]['direccion']; ?>"/> </br></br>
        <label>E-mail&nbsp;</label>
        <input type="email" style="width:25em;" name="e_mail" id="e_mail" required="required"
        value="<?php echo $editar[0]['e_mail']; ?>"/></br></br>
        <p>  
        <input class="guardar" id="boton" type="submit" value="Guardar" />
        <input class="guardar" type="button" value="Volver" onclick="location = 'home.php?pac=114'"/></br></br>
        </p> 
</form>
</div>


<div id="derecha" >
<h3>REGISTRO CLIENTES</h3>
<br/>   <table width="650"><tr>
    <td>
          <form id="formfil" name="formfil" method="GET" action="home.php">
      <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
          <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();" placeholder="N&uacute;mero de Documento">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
    </form>
    </td>
 <div  id="paginar" style="position:absolute; bottom:0px; right:50px;">
        <td align="bottom" valign="bottom">
            <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            ?>
        </td>
    </div>
</tr></table>
<br><br>
 <table cellpadding="8">
<form id="formfil" name="formfil" method="GET" action="home.php" onSubmit="return confirm('¿Eliminara el Cliente Desea Continuar?')" placeholder= "Nro. de orden">
    <thead>
         <th>No. Documento</th>
         <th>Nombre</th>
         <th>Celular</th>
         <th>Tel&eacute;fono</th>
         <th>Acciones</th>
         <input name="pac" type="hidden" id="pac" value="114"/>
      </thead>
      <?php 
      $dat=$ins->selpro2($filtro, $pag->rvalini(), $pag->rvalfin());
           
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