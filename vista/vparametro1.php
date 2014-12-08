<?php
include ("/controlador/cparametro.php");
?>
<div name="izquierda" id="izquierda">
<form name="form1" action="home2.php?pac=<?php echo $pac; ?>" method="post" >
<!--<form name="form1" action="home.php?pac=102" method="post" >-->
<H3>MODIFICAR PARAMETRO</H3>
<label>Nombre de Parametro&nbsp;</label>
<input style="width:37em" type="text" name="nomparametro" maxlength="20" required="required"
value="<?php echo $dat5[0]['nomparametro'] ?>"/>
<input type="hidden" name="actu" value="actu" />
<input type="hidden" name="idparametro" value="<?php echo $dat5[0]['idparametro'] ?>"/></br></br></br></br>
<p> 
<input class="guardar" id="boton" type="submit" value="Editar">
</p></br></br>
</form>
</div>
 

<div name="derecha" id="derecha">
<form name="form3" action="home2.php?pac=109" method="post" >
<h3>MODIFICAR VALORES</h3>
<label>Nombre del Valor&nbsp;</label>
<input style="width:37em" type="text" name="nomvalor" maxlength="20" required="required"
value="<?php echo $dat4[0]['nomvalor'] ?>"/></br></br>
<input type="hidden" name="actu" value="actu" />
<input type="hidden" name="idvalor" value="<?php echo $dat4[0]['idvalor'] ?>"/>
<label>Parametro&nbsp;</label>
<select name="idparametro"> 
    <?php 
    //Select
        $dat1 = $ins->selpar();
        for ($i=0; $i < count($dat1); $i++){
      ?>
        <option value="<?php echo $dat1[$i]['idparametro'] ?>" <?php if($dat3[0]['idparametro']==$dat1[$i]['idparametro']) echo 'selected'; ?>><?php echo $dat1[$i]['nomparametro']?></option>
    <?php } ?>
</select></br></br>
<p> 
<input class="guardar" id="boton1" type="submit" value="Guardar">
</p></br></br>
</form>
</div>
          
               
   
  
 