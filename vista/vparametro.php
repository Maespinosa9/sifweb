<?php
include ("controlador/cparametro.php");
?>

<div name="izquierda" id="izquierda">
<form name="form1" action=""  method="post">
<H3>INSERTAR PARAMETRO</H3>
<label>Nombre de Parametro&nbsp;</label>
<input style="width:37em" type="text" name="nomparametro" maxlength="20" required="required"/></br></br></br></br>
<label>Permanente</label>
<input type= "radio" name="parametro_fijo" value='0' required="required"></br></br>
<label>Parcial</label>
<input type= "radio" name="parametro_fijo" value='1' required="required">
<p> 
<input class="guardar" id="boton1" type="submit" value="Guardar">
</p></br></br>
</form>
<center>
        <table cellpadding="8" >
        <form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('¿Eliminara El Parametro y sus Valores asociados desea continuar?')">
        <thead>
            <th>Cod. Parametro<input name="pac" type="hidden" id="pac" value="109" /></th>
            <th>Nombre Parametro</th>
            <th>Editar</th>
        </thead>
        <?php 
        //Select
            $datos = $ins->selpar();
            for ($i=0; $i < count($datos); $i++){
         ?>
        <tbody>
             <tr>
                <td>
     <?php if ($datos[$i]['parametro_fijo']==0){ 
        echo $datos[$i]['idparametro'];
     }else{ ?>           
        <input type="submit" name="del" id="del" value=<?php echo $datos[$i]['idparametro']?>>
        <?php } ?>  </td>
                <td align="center"><?php echo $datos[$i]['nomparametro'] ?></td>
                <td><a href="home2.php?pr=<?php echo $datos[$i]['idparametro'] ?>&pac=109&up=11&ed=0" style="width: 30px"><img border=0 src="image/editar.png" name="editar" title = "Editar" width="19" height="19"/></a></td>
             </tr>
        </tbody>
        <?php } ?>
        </form>
    </table>
    </center>
</div>



<div name="derecha" id="derecha">
<form name="form3" action="" method="post" >
<h3>INSERTAR VALORES</h3>
<label>Nombre del Valor&nbsp;</label>
<input style="width:37em" type="text" name="nomvalor" maxlength="20" required="required"/></br></br>
<label>Parametro&nbsp;</label>
<select name="idparametro" required="required" >
    <option value="">Seleccione</option>
    <?php 
    //Select
        $dat1 = $ins->selpar();
        for ($i=0; $i < count($dat1); $i++){
      ?>
    <option value="<?php echo $dat1[$i]['idparametro'] ?>" ><?php echo $dat1[$i]['nomparametro'] ?></option>
    <?php } ?>
</select></br></br>
<label>Permanente</label>
<input type= "radio" name="valor_fijo" value='0' required="required"></br></br>
<label>Parcial</label>
<input type= "radio" name="valor_fijo" value='1' required="required">
<p> 
<input class="guardar" id="boton1" type="submit" value="Guardar">
</p></br></br>
</form>
<center>
 <table cellpadding="8" >
       <form id="form4" name="form1"  method="GET" action="" onSubmit="return confirm('¿Eliminara los valores Desea Continuar?')">
        <thead>
            <th>Cod. Valor<input name="pac" type="hidden" id="pac" value="109" /></th>
            <th>Nombre Valor</th>
            <th>Nombre Parametro</th>
            <th>Editar</th>
        </thead>
       <?php 
        //Select
        $datos = $ins->selval1();
            for ($i=0; $i < count($datos); $i++){
    ?>  

    <tbody>
        <tr>         
        <td align="center">
     <?php if ($datos[$i]['valor_fijo']==0){ 
        echo $datos[$i]['idvalor'];
     }else{ ?>           
        <input type="submit" name="del2" value=<?php echo $datos[$i]['idvalor']?>>
        <?php } ?>
        </td>
        
            <td align="center"><?php echo $datos[$i]['nomvalor'] ?></td>
            <td><?php echo $datos[$i]['nomparametro'] ?></td>
            <td align = "center"><a href="home2.php?pr=<?php echo $datos[$i]['idvalor'] ?>&pac=109&up=11&ed=1&prr=<?php echo $datos[$i]['idparametro'] ?>" style="width: 30px"><img border=0 src="image/editar.png" name="editar" width="19" height="19" title = "Editar" /></a></td>    
        </tr>
        </tbody>
    <?php  }  ?>
        </form>
    </table>
    </center>
</div>
     