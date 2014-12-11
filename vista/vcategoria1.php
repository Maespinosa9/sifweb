<?php 
    include ("controlador/ccategoria.php");
?>


<center>
<div id="categorias" name="inventario">
<form name="form1" action="home.php?pac=116" method="POST">	
<h3>CATEGORIAS</h3>
<label>Nombre de la categoria&nbsp;</label>
<input type="hidden" name="actu" value="actu" />
<input type="hidden" name="id_categoria" value="<?php echo $editar[0]['id_categoria']; ?>" />
<input type="text" style="width:20em;" name="descripcion"  id="descripcion" required="required"  
        value="<?php echo $editar[0]['descripcion']; ?>" /></br></br>   
<p>  
    <input class="guardar" id="boton" type="submit" value="Guardar" />
    <input class="guardar" type="button" value="Volver" onclick="location = 'home.php?pac=116'"/></br></br>
</p> 
</form>