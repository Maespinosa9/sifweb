<?php 
include ("controlador/cPago.php");
?>

<script type="text/javascript">
	function agregaTipo(){
		document.getElementById("agrega").style.display='none';
		var tipo;
		var newdiv = document.createElement('div');
		tipo = document.getElementById("divPago");
		newdiv.innerHTML = "<br><form id = 'formTipos' action = '' method = 'POST'>";
		newdiv.innerHTML += "<br><input type='text' name='pago' id='nuevoPago'"
		newdiv.innerHTML +=	"placeholder = 'Inserte el nuevo tipo de pago' required='required'>";
		newdiv.innerHTML += "<input type='submit' value='guardar'></form>"
		//formu +="<input type='text' name='pago' placeholder = 'Inserte el nuevo tipo de pago'>"; 
		
		alert(newdiv);
		tipo.appendChild(newdiv);
	}
</script>
<script>
function fnAgregarPago(){

var AgregaPago = $("#new_pago").val();

	 $.ajax({
        type: "POST",
        dataType: 'html',
        url: "home.php?pac=106",
		data: "new_pago="+AgregaPago,
        success: function(resp){
            $('#SelectPagos').html(resp);
            Limpiar();
            Cargar();
        }
    });
}  
function Cargar()
{
    $('#SelectPagos').load('cAgregarPago.php');   
}
}

</script>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
<div name="izquierda" id="izquierda">
	<form name="FormPago" action="" method="post">
	<H3>PAGO</H3>
    	<label for="fecha">Fecha de Pago&nbsp;&nbsp;</label>
        <input type="date" name="fecha" id = "fechaPago" required = "required"/></br></br>
        <label for= "ValorPago">Valor del Pago&nbsp;&nbsp;</label>
        <input type="text" name="ValorPago" id = "ValorPago" required="required"/></BR></br>
        <div id ="SelectPagos">
        
        <label for="tipoPago">Tipo de Pago&nbsp;&nbsp;&nbsp;</label>
        <select name="tipoPago" required = "required">
        <?php
			for ($i=0; $i<count($dat); $i++){ 
		?>
		<option value = "<?php echo $dat[$i]['idValor']; ?>"><?php echo $dat[$i]['descripcion']; ?></option>
         <?php
			}
		?>
		</select>
        </div>
        <input id="agrega" type="button" value="Agregar" onclick="$('#divPago').css('display','block');" /><br/><br/>
        <div id = "divPago" style="display:none">
        	<input type="text" name="new_pago" id="new_pago" >
        	<input type='button' value='Agregar' onclick="fnAgregarPago();">
        </div>
        </br></br>
        <textarea name="descripcion" rows="3" cols="35" placeholder = "Ingrese la Descripci&oacute;n del Pago Realizado"></textarea><br/></br>
        </br></br></br></br></br></br><input class="guardar" type="submit"  id="guardar" value="Guardar">
    </form>
</div>

<script>
    function AgregaPago(num){
        var postForm = { //Fetch form data
            'datos'  : $("#new_pago"),
        };
        $.ajax({
        url: "controlador/AgregaPago.php",
        type: "post",
        data: postForm,
        success: function(response){
            //alert("success");
            $("#resultado").html(response);
            var val=$.trim(response);
            if(val!= ""){
                $("#divmsg").css({'display':'block',});
                $("#Factura").focus();
                $("#Factura").select();
            }else
                $("#divmsg").css({'display':'none',});
        },
        error:function(){
            alert("failure");
            $("#result").html('There is error while submit');
        }
    });
    }
</script>
