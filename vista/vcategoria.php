<?php 
    include ("controlador/ccategoria.php");
?>


<center>
<div id="categorias" name="inventario">
<form name="form1" action="" method="POST">	
<h3>CATEGORIAS</h3>
<label>Nombre de la categoria&nbsp;</label>
<input type="text" style="width:20em;" name="descripcion"  id="descripcion" required="required" /></br></br>   
<p>  
   <input class="guardar" id="boton" type="submit" value="Guardar" />
   <input class="guardar" type="button" value="Volver" onclick="location = 'home.php'"/></br></br>
</p> 
</form>
<table width="650"><tr>
    <td>
          <form id="formfil" name="formfil" method="GET" action="home.php">
      <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
          <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit(); " placeholder= "C&oacute;digo">
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
<form id="formfil" name="formfil" method="GET" action="home.php" onSubmit="return confirm('¿Eliminara el Cliente Desea Continuar?')">
    <thead>
         <th>C&oacute;digo</th>
         <th>Nombre</th>
         <th>Acciones</th>
         <input name="pac" type="hidden" id="pac" value="116"/>
    </thead>
      <?php 
      $dat=$ins->selpro2($filtro, $pag->rvalini(), $pag->rvalfin());
           
         for ($i=0; $i < count($dat); $i++){
      ?>
       <tbody>
            <tr>
            <td class="style2" align="center"><?php echo $dat[$i]['id_categoria'] ?></td>
            <td class="style2" align="center"><?php echo $dat[$i]['descripcion'] ?></td>
            <td align="center"><a href="home.php?pr=<?php echo $dat[$i]['id_categoria'] ?>&pac=116&up=11"><img border=0 src="image/editar.png"  name="editar" title = "Editar" width="19" height="19" /></a></td>
          <!--  <a href="home.php?delete=<?php echo $dat[$i]['id_categoria'] ?>&pac=<?php echo $pac; ?>"><img src="image/eliminar.png" name="delete" title= "Eliminar"></a> </td>-->
                 </tr>
        </tbody>
        <?php  }  ?>      
</form>
    </table>
     
 </div>  
</center>