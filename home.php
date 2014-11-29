<?php include("modelo/mseguridad.php"); 
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
  <div id="salir"><img border=0 src="image/salir1.png" width="30" height="30"/></div>
  <div id="contenidorc">
  <div id="contcen" class="bodytext" style="padding:12px;">
  <?php  
    $Pac = isset($_GET["pac"]) ? $_GET["pac"] : NULL;
    $Up = isset($_GET["up"]) ? $_GET["up"] : NULL;
    if (is_null($Pac)) {
      include("vista/menu.php");
    } else if ($Pac == "101") {
      include("vista/vproveedor.php");
    }else if ($Pac == "102") {
      include("vista/vtienda.php");
    } else if ($Pac == "103") {
      if (is_null($Up)) {
        include("vista/vfactura.php");
      } else {
        include("vista/vfactura1.php");
      }
    }else if ($Pac == "104") {
      include("vista/menusec.php");
    }else if ($Pac == "105") {
      include("vista/vusuario.php");
    }else if ($Pac == "106") {
      include("vista/vPago.php");
    }else if ($Pac == "107") {
      if (is_null($Up)) {
        include("vista/vproducto.php");
      } else {
        include("vista/vproducto1.php");
      }
    }else if ($Pac == "108") {
      if (is_null($Up)) {
        include("vista/vOrdenCompra.php");
      }else{
        include("vista/vOrdenCompra1.php");
      }
    }else if ($Pac == "200") {
      include("home2.php");
    }else if ($Pac == "109"){
      include("vista/vparametro.php");
    }else if ($Pac == "110"){
      include("vista/vDet_Compra.php");
    }else if ($Pac == "111"){
      if (is_null($Up)) {
        include("vista/vinventario.php");
      } else {
        include("vista/vinventario1.php");
      }
    }
  ?>
  </div>
  </div>
  </div>
<div id="pie">
</div>
</div>    
</body>
</html>