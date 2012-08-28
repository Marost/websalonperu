<?php
$rst_query=mysql_query("SELECT * FROM ct_eventos WHERE id>0 ORDER BY id DESC LIMIT 1;", $conexion);
	$fila_query=mysql_fetch_array($rst_query);
	$id=$fila_query["id"];
	
	$Tabla = mysql_query("SELECT email FROM ct_rss ORDER BY id ASC;", $conexion) or die(mysql_error());
	$losemails="";
 	while ($row = mysql_fetch_array ($Tabla)){
		$nombre_completo="Corazon Timbero";
		$asunto="Corazon Timbero - Llego la Timba Cubana";
		$log = $row["email"];
		$mensaje="<html><head><title>$asunto</title>
		<style type='text/css'>
		body{
			font-family:Verdana, Geneva, sans-serif;
		}
		</style>
		</head>
		<body>
		<p style='color:#000; font-size:16px; font-family:Verdana, Geneva, sans-serif'><strong>
		<a href='http://www.corazontimbero.com/' style='text-decoration:none;'>Corazon Timbero - Llego la Timba Cubana</a>
		</strong></p>
		<hr/>
		<p style='color:#000; font-size:14px;'>EVENTO</p>
		<p style='color:#000; font-size:14px;'><strong>$titulo</strong></p>
		<p style='color:#000; font-size:12px;'>".substr($contenido,0,300)."..."."</p>
		<p><a href='http://www.corazontimbero.com/eventos.php?id=$id#evento' style='text-decoration:none;'>Seguir leyendo [+]</a></p>
        </body>
		</html>"; 
		$envia=$nombre_completo; 
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; 			
		$headers .= 'From: '.$nombre_completo.' <corazon_timbero@hotmail.com>' . "\r\n";
		mail($log, $asunto, $mensaje, $headers);
	}

	mysql_free_result($Tabla);
	mysql_close($conexion);
	header("Location:listar.php?mensaje=1");
?>