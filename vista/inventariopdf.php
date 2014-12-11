<?php
	include ("../modelo/minventario1.php");
	$ins = new minventario1();
	ini_set("memory_limit", "64M");
	require_once("../dompdf/dompdf_config.inc.php");
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
    $dat = $ins->select1($pr);
    $dat3 = $ins->selProducto();
    $html = '<center>';
        $html = '<html><head>';
        $html .= '<table align="center" border="1" >';
        $html .= '<tr>';
        	$html .= '<td align="center" colspan="12"  ><font face="Arial" size=3>';
        		$html .= '<h1>';
       				$html .= ' Inventario ';
        		$html .= '</h1>';
        	$html .= '</td >';
        $html .= '</tr>';
        $html .= '<tr>';
	        $html .= '<td align="left" colspan="12"> <font face="Arial" size=3 style="text-transform: capitalize;"> <b>Codigo <b/>';
	        	$html .= '<h3>';
	        		$html .= $dat[0]["id_inventario"];
	        	$html .= '</h3>';
	        	$html .= '</tr>';
        $html .= '<tr>';
	        $html .= '<td align="left" colspan="12"> <font face="Arial" size=3 style="text-transform: capitalize;"> <b>Producto <b/>';
	        	$html .= '<h3>';
	        		$html .= $dat[0]["codigo_barras"].' - '. $dat[0]["descripcion"];
	        	$html .= '</h3>';
	        $html .= '</td >';
        $html .= '</tr>';
          $html .= '<tr>';
	        $html .= '</td >';
	        $html .= '<td align="left" colspan="12"> <font face="Arial" size=3 style="text-transform: capitalize;"> <b>Fecha del movimiento <b/>';
	        	$html .= '<h3>';
	        		$html .= $dat[0]["fecha"];
	        	$html .= '</h3>';
	        $html .= '</td >';
	          $html .= '</tr>';
           $html .= '<tr>';
	        $html .= '<td align="left" colspan="6"> <font face="Arial" size=3 style="text-transform: capitalize;"> <b>cantidad <b/>';
	        	$html .= '<h3>';
	        		$html .= $dat[0]["cantidad"];
	        	$html .= '</h3>';
	        $html .= '</td >';
	            $html .= '<td align="left" colspan="6"> <font face="Arial" size=3 style="text-transform: capitalize;"> <b>Entrada <b/>';
	        	$html .= '<h3>';
	        		if ($dat[0]["entrada"]  == 1) {
	        			$html .= '<img src="../image/activa.png">';
	        			 } else if ($dat[0]["entrada"]  == 0) {
	        			 	$html .= '<img src="../image/noactiva.png">';
	        			 }
	        	$html .= '</h3>';
	        $html .= '</td >';
        $html .= '</tr>';
           $html .= '<tr>';
            $html .= '<td align="center" colspan="12"> <font face="Arial" size=3 style="text-transform: capitalize;"> <b>observacion <b/>';
	        	$html .= '<h3>';
	        		$html .= $dat[0]["observacion"];
	        	$html .= '</h3>';
	        $html .= '</td >';
           $html .= '</tr>';



        $html .='</table>';

		
		/*
	 $a=0;
	 $b=17;
		for ($j=0; $j < count($dat1); $j++){
			 	$a++;
				if($a%2==1){
					//$a=1;|
					$html .= '<tr>';
					$b++;
					$html .= ' <td align="left" > <font face="Arial" size=1 style="text-transform: capitalize;"> <br><b>'.$b;
					$html .= '. ';
					$html .= $dat1[$j]["despre"];
					$html .= '</b><br>';
					$html .= '<td align="left"> <font face="Arial" size=1 style="text-transform: capitalize;"><br>';
						for ($p=0; $p < count($dat2); $p++){
								if($dat1[$j]["codpre"]==$dat2[$p]["codpre"]){
											$html .= $dat2[$p]["resrap"];
											$html .= '<br>';
											
								}

						}
					$html .= '</td>';
					$html .= '</td>';

				}else{
					$b++;
					$html .= '<td align="left"> <font face="Arial" size=1 style="text-transform: capitalize;"><br><b>'.$b;
					$html .= '. ';
					$html .= $dat1[$j]["despre"];
					$html .= '</b><br>';
					$html .= '<td align="left"> <font face="Arial" size=1 style="text-transform: capitalize;"><br>';
						for ($p=0; $p < count($dat2); $p++){
								if($dat1[$j]["codpre"]==$dat2[$p]["codpre"]){
											$html .= $dat2[$p]["resrap"];
											$html .= '<br>';
								}

						}

					$html .= '</td>';
					$html .= '</td>';
					$html .= '</tr>';
				}
		}
		*/
		
		$html .= '</table>';
		$html .= '</div>';
		$html .= '</body>';
		$html .= '</center>';
		$html .= '</html>';

        
		//echo $html;
		$dompdf = new DOMPDF(); 
		$dompdf->load_html($html); 
		$dompdf->render(); 
		$dompdf->stream("Inventario°".$dat[0]["id_inventario"].".pdf");
?>