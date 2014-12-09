<?php
include ("controlador/ccaja.php");
?>

<script language="javascript" src="../js/jquery-1.2.6.min.js"></script><!-- llamamos al JQuery-->
<script language="javascript">
    
 function Duplicidad(Id){
      var doc = {
                "Id" : Id
        };
        $.ajax({
                data:  doc,
                url:   'vista/vduplicidad3.php',
                type:  'post',
                success:  function (response) {
                        $("#id_caja_duplicado").html(response);
                }
        });
     }
</script>

<div name="izquierda" id="izquierda">
<form name="form1" action=""  method="post">
<H3>CAJA</H3>
<label>Numero caja&nbsp;</label>
<input style="width:5em" type="number" name="id_ncaja"  id="id_caja_duplicado" maxlength="20" required="required"  onblur="javascript:Duplicidad(this.value);"/></br></br></br></br>
<label>Usuario &nbsp;</label>
<select name="usuario_id"style="width: 195px;" >
    <option value="0" >Seleccione</option>
    <?php 
    //Select
        $dat1 = $ins->selusuario();
         for ($i=0; $i < count($dat1); $i++){
    ?>
         <option value="<?php echo $dat1[$i]['id_usuario'] ?>"><?php echo $dat1[$i]['nombre']."  ".$dat1[$i]['apellido']?></option>
    <?php } ?>
    </select></br></br>
      <p> 
<input class="guardar" type="submit"  id="guardar" value="Guardar"/>
<a href="home.php"><input class="guardar" name="del" type="button" value="volver"></a>
  </p> 
</form>
</div>

<div id="derecha" name="derecha">
<h3>CAJAS</h3>
<table cellpadding="8" align="center" width="200">
<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('Eliminara el Producto Desea Continuar')">
    <thead>  	
	    <th>N. caja</th>
	    <th>usuario</th>
	    <th>Acciones</th>
	</thead>
	    	    <?php 
					$tabla = $ins->selec();
					for ($i=0; $i < count($tabla); $i++){
		  		?>   
		        <tbody>
                  <tr>
	            	<td class="style2" align="center"><?php echo $tabla[$i]['id_ncaja'] ?></td>
	             	<td class="style1" align="center"><a value="<?php echo $tabla[$i]['id_usuario'] ?>"><?php echo $tabla[$i]['nombre']."  ".$tabla[$i]['apellido']?></a></td>
	             	<td align="center"><a href="home.php?pr=<?php echo $tabla[$i]['id_ncaja'] ?>&pac=113&up=11"><img border=0 src="image/editar.png"  name="editar" title= "Editar" /></a>
	             	<a href="home.php?del=<?php echo $tabla[$i]['id_ncaja'] ?>&pac=<?php echo $pac; ?>"><img src="image/eliminar.png" name="del" title= "Eliminar"></a> 
	                <a href="home.php?or=<?php echo $dat[$i]['id_ncaja'] ?>&pac=115"><img src="image/abrir.jpg" title="Abrir caja" width="20" height="20" ></a></td>
	            </tr>
	            </tbody> 
	            <?php  
	        		}  
	        	?>
	        
         	</form>
    </table>
 </div>