<?php
include("controlador/cfactura.php");
?>
<script type="text/javascript">
$( window ).load(function() {
      var postForm = { //Fetch form data
            'datos'  : 'Factura'
        };
        $.ajax({
        url: "controlador/ajaxFactura.php",
        type: "post",
        data: postForm,
        success: function(response){
        },
        error:function(){
            alert("failure");
            $("#result").html('There is error while submit');
        }
    });
});

function agregaProducto(){
    if ($("#CodigoProducto").val() == '' || $("#cantidad").val() == '' ){
        alert("Debe Ingresar un Producto e ingresar la cantidad a vender");
        $("#CodigoProducto").focus();
    }else{
    	var postForm = { //Fetch form data
                'CodigoProducto'  : $("#CodigoProducto").val(),
                'Cantidad' : $("#cantidad").val(),
                'datos' : 'detalle'
            };
            $.ajax({
            url: "controlador/ajaxFactura.php",
            type: "post",
            data: postForm,
            success: function(response){
                var val=$.trim(response);
                if(val!= ""){
                    alert(response);
                }
                $("#CodigoProducto").focus();
                $("#CodigoProducto").val('');
                $("#cantidad").val('');
                pintaDatos();
            },
            error:function(){
                alert("failure");
                $("#result").html('There is error while submit');
            }
        });
    }
}
function fnElimina(detalle){
    var postForm = { //Fetch form data
            'detalle' : detalle,
            'datos' : 'elimina'
        };
        $.ajax({
        url: "controlador/ajaxFactura.php",
        type: "post",
        data: postForm,
        success: function(response){
            alert(response);
            $("#CodigoProducto").focus();
            $("#CodigoProducto").val('');
            $("#cantidad").val('');
            pintaDatos();
        },
        error:function(){
            alert("failure");
            $("#result").html('There is error while submit');
        }
    });
}

function pintaDatos(){
     var postForm = { //Fetch form data
            'datos'  : 'pinta'
        };
        $.ajax({
        url: "controlador/ajaxFactura.php",
        type: "post",
        data: postForm,
        success: function(response){
            $("#tablaDetalle").html(response);
        },
        error:function(){
            alert("failure");
            $("#result").html('There is error while submit');
        }
    });
}

function BuscaCliente(){
     var cliente = "";
   // $("#nombre").attr("value","191901991");
    var postForm = { //Fetch form data
            'datos'  : 'BuscaCliente',
            'identificacion' : $("#idCliente").val(),
        };
        alert($("#idCliente").val());
        $.ajax({
        url: "controlador/ajaxFactura.php",
        type: "post",
        data: postForm,
        success: function(response){
            alert(response.0.id_cliente);
        },
        error:function(){
            alert("failure");
            $("#result").html('There is error while submit');
        }
    });
}
</script>


<div id="izquierda">	
	<h3>FACTURA DE VENTA</h3>
		<label for="idCliente" style ="margin-right: 5em">Cliente</label>
		<input type="text" name="idCliente" id="idCliente" style="margin-right:20px">
		<input class="guardar" type="button" id="guardar" value="Buscar" style="margin:0px" onclick="BuscaCliente()">
	</form>
	<form name "form4" action="" method="post">
		<label  for="CodigoProducto" style ="margin-right: 4.2em">Producto</label>
		<input type="text" name="CodigoProducto" id="CodigoProducto" style = "margin-right: 4em" />
		  </br></br><label  for="cantidad" style ="margin-right: 4em">Cantidad</label>
		<input type="number" min="0" width="25em" name="cantidad" id="cantidad" size="10px" onblur = "agregaProducto()" >
	</br></br></br>
	<table cellpadding="8" align="center" id="tablaDetalle">
		<thead>
            <th>Producto</th>
            <th>Valor Unitario</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </thead>
	</table>

<div style="position:absolute; bottom: 0px; left:50px;">
		<input class="guardar" id="boton" type="submit" value="Guardar" />
    </div>
	</form>
	</br>
	</br>
</div>
</div>
<div id="derecha">
<div id="clienteFac" style = "display:block">
	<form name="form1" action="home.php?pac=114" method="POST">
<h3>CLIENTE</h3>
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
        <label>Numero del Documento&nbsp;</label>
        <input type="hidden" name="actu" value="actu" />
        <input type="text" style="width:15em;" name="id_cliente"  id="id_cliente" required="required" readonly="readonly"/></br></br>   
        <label>Ingrese su Nombre&nbsp;</label>
        <input type="text" style="width:25em;" name="nombre" id="nombre" required="required"/></br></br>
        <label>Ingrese su Apellido&nbsp;</label>
        <input type="text" style="width:25em;" name="apellido" id="apellido" required="required"/></br></br>                   
        <label>Tel&eacute;fono Fijo&nbsp;</label>
        <input type="text" style="width:13em;" name="telefono_1" id="telefono_1"  required="required"/></br></br>
        <label>N&uacute;mero Celular&nbsp;</label>
        <input type="text" style="width:13em;" name="celular" id="celular" required="required"/></br></br>
        <label>Ingrese su Direcci&oacute;n&nbsp;</label>
        <input type="text" style="width:20em;" name="direccion" id="direccion" required="required"/> </br></br>
        <label>Ingrese su E-mail&nbsp;</label>
        <input type="email" style="width:25em;" name="e_mail" id="e_mail" required="required"/></br></br>
        <p>  
        <input class="guardar" id="boton" type="submit" value="Guardar" />
        <input class="guardar" type="button" value="Volver" onclick="location = 'home.php?pac=114'"/></br></br>
        </p> 
</form>
</div>
</div>