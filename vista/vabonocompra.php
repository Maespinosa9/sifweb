<?php
	include ("/controlador/cabonocompra.php");
?>
<div name="izquierda" id="izquierda">
<form name="form1" action="" id="form1" method="post">
<H3>ABONO COMPRA</H3>
<label>Abono&nbsp;</label>
<input type="text" name="id_abono" required="required"/></br></br>
<label>Valor&nbsp;</label>
<input type="text" name="valor" required="required"/></br></br>
<label for'date'> Fecha&nbsp;</label>
<input style="width:12em; " type="date" name="fecha"/></br></br>
<label>orden&nbsp;</label>
 <select name="orden_id"style="width: 195px;" >
    <option value="0" >Seleccione</option>
    <?php 
         for ($i=0; $i < count($dat2); $i++){
    ?>
         <option value="<?php echo $dat2[$i]['id_orden'] ?>"><?php echo $dat2[$i]['id_orden']?></option>
    <?php } ?>
    </select></br></br>
<label>Forma de Pago&nbsp;</label>
<input style="width:35em" type="text" name="forma_pago" required="required"/></br></br>
</br><label>Usuario&nbsp;</label>
 <select name="usuario_id"style="width: 195px;" >
    <option value="0" >Seleccione</option>
    <?php 
         for ($i=0; $i < count($dat1); $i++){
    ?>
         <option value="<?php echo $dat1[$i]['id_usuario'] ?>"><?php echo $dat1[$i]['nombre']."  ".$dat1[$i]['apellido']?></option>
    <?php } ?>
    </select></br></br>
<label>odservacion&nbsp;</label>
<textarea style="width:35em" type="textarea" name="observacion"/></textarea></br></br>
<p> 
<input class="guardar" type="submit"  id="guardar" value="Guardar"/>
<a href="home.php?pac=108"><input class="guardar" name="del" type="button" value="Cancelar"></a>
</p>
</form>
</div>



<div name="table_orden_compra" id= "derecha">

    <h3>Abono de Compras Ingresadas</h3>
<br><br>
    <table cellpadding="8" >
        <form id="form1" name="formfil" method="GET" action="home.php" onSubmit="return confirm('¿Desea eliminar?')">
        <thead>
            <th>Nro. Abono</th>
            <th>Valor</th>
            <th>Nro. Orden</th>
            <th>Cliente</th>
            <th>Acciones</th>
        </thead>
        <input name="pac" type="hidden" id="pac" value="103"/>
        <?php 
         $dat=$ins->selec();  
        for($i = 0; $i<count($dat); $i++){
         ?>
        <tbody>
            <tr>
                <td align="center"><?php echo $dat[$i]['id_abono']; ?></td>
                <td align="center"> <?php echo $dat[$i]['valor']; ?></td>
                <td align="center"><?php echo $dat[$i]['orden_id']; ?></td>
                <td align="center"><?php echo $dat[$i]['nombre']." ".$dat[$i]['apellido']; ?></td>
                <td align = "center">
                <a href = "home.php?pr=<?php echo $dat[$i]['id_abono'] ?>&pac=<?php echo $pac; ?>&up=11"><img src="image/editar.png" name="editar" title = "Editar"></a>
               <a href = "home.php?del=<?php echo $dat[$i]['id_abono'] ?>&pac=<?php echo $pac; ?>"><img src="image/eliminar.png" name="del" title= "Eliminar"></a></td>
            </tr>
        </tbody>
        <?php } ?>
        </form>

        </table>
        </div>
</div>

</body>
</html>