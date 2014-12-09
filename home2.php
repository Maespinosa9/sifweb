<?php include_once("modelo/mseguridad.php"); 
$perusu = isset($_SESSION["perfil"]) ? $_SESSION["perfil"]:NULL;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/estilos.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js' type='text/javascript'/></script>
</head>
<body>
<div id="contenedor">
<div id="cabez">
</div>
<div id="inicio">&nbsp;&nbsp;<a id="ini"href="home.php"><img border=0 src="image/home.png" width="30" height="30"/></a></div>
  <div id="salir"><a href='vista/salir.php'><img border=0 src="image/salir1.png"  width="30" height="30"/></a></div>
<div id="contenidorc1">
    <div id="menu">
        <?php
            include("vista/menusec.php");
        ?>
    </div>
    <div id="contcen" class="bodytext" style="padding:12px;">
        <?php
            $Pac = isset($_GET["pac"]) ? $_GET["pac"] : NULL;
            $Up = isset($_GET["up"]) ? $_GET["up"] : NULL;
            if (is_null($Pac)) {
                include("vista/vtienda.php"); 
            } else if ($Pac == "102") {
                include("vista/vtienda.php");
            } else if ($Pac == "105") {
                if (is_null($Up)) {
                  include("vista/vusuario.php");
            }else{
                  include("vista/vusuario1.php");
            }
            } else if ($Pac == "106") {
                include("vista/vPago.php");    
            } else if ($Pac == "109") {
                    if (is_null($Up)) {
                  include("vista/vparametro.php");
            }else{
                  include("vista/vparametro1.php");
            }
                
            }
        ?>
    </div>
</div>
</div>
</div>    
</body>
</html>