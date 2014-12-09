<?php
include ("controlador/ccaaja.php");
?>
<script language="javascript" src="../js/jquery-1.2.6.min.js"></script>
        <script language="javascript">
            function obtenerSuma()
            {
                document.getElementById('resultado').value=parseFloat(document.getElementById('sumando1').value)-parseFloat(document.getElementById('sumando2').value);
            }
        </script> 

<div name="izquierda" id="izquierda">
<form name="form1" action=""  method="post">
<H3>CAJA</H3>
<label>Fecha&nbsp;</label>
<input type="hidden" name="ncaja_id" value='4' />
<input type="date" name="fecha" id="fecha"  />&nbsp;&nbsp;
<label>Base&nbsp;</label>
<input id="resultado" type="text" name"base" id="base" style="width:13em" readonly="readonly"></br></br>
<label>Venta&nbsp;</label>
<input onkeyup="obtenerSuma();" id="sumando1" name="venta" type="text"  >&nbsp;&nbsp;
<label>Gasto&nbsp;</label>     
<input onkeyup="obtenerSuma();" id="sumando2" type="text" name="gasto" ></br></br> 
<label>Observaciones&nbsp;</label>           
<textarea name="observacion" cols="60" maxlength="100" id="observacion" placeholder="observaciones" ></textarea></br></br> 
<p> 
<input class="guardar" type="submit"  id="guardar" value="Guardar"/>
<input class="guardar" name="del" type="button" value="volver" onclick="location = 'home.php?pac=113'">
</p> 
</form>

  
<table cellpadding="8" align="center" width="200">
<form id="form2" name="form2" method="GET" action="" onSubmit="return confirm('Eliminara el Producto Desea Continuar')">
    <thead>  
      <th>Observacion</th>
      <th>Ingreso</th>
      <th>Egreso</th>
    </thead> 
      <?php 
          $tabla = $ins->selec();
          for ($i=0; $i < count($tabla); $i++){
          ?>   
             <tbody>
               <tr>
                <td class="style2" align="center"><?php echo $tabla[$i]['observacion'] ?></td>                
                <td class="style2" align="center"><?php echo $tabla[$i]['venta'] ?></td> 
                <td class="style2" align="center"><?php echo $tabla[$i]['gasto'] ?></td> 
               </tr>
             </tbody> 


              <?php  
              }  
            ?>
          </form>
    </table>
   <?php 
          $tabla = $ins->sumcaja();
          for ($i=0; $i < count($tabla); $i++){
          ?>   
             <label>SALDO TOTAL&nbsp;</label>
             <input type="text" name="base" id="base" style="width:13em" values="<?php echo $tabla[$i]['total'] ?>" readonly="readonly"/>
              <?php  
              }  
            ?>
 </div>