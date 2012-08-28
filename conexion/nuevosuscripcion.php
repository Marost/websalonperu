<?php
include ("conexion.php");
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$nacionalidad=$_POST["nacionalidad"];
$ciudad=$_POST["ciudad"];
$movil=$_POST["movil"];
$email=$_POST["email"];
$comentario=$_POST["comentario"];

mysql_query("INSERT INTO suscripcion (NOMBRE,APELLIDO,NACIONALIDAD,CIUDAD,MOVIL,EMAIL,COMENTARIO) values ('$nombre','$apellido','$nacionalidad','$ciudad','$movil','$email','$comentario');",$conexion);

if (mysql_errno()!=0)
{
	echo "error al insertar los datos". mysql_errno() . " - ". mysql_error();
	mysql_close($conexion);
} else {
	mysql_close($conexion);
	header("Location:../index.html");
}

//ENVIAR A CORREO ELECTRONICO

$msg= "";
$msg= "SUSCRIPCION - SALON PERU";
$msg.="\nNombre: $nombre";
$msg.="\nApellido: $apellido";
$msg.="\nNacionalidad: $nacionalidad";
$msg.="\nCiudad: $ciudad";
$msg.="\nMovil: $movil";
$msg.="\nEmail: $email";
$msg.="\nComentario: $comentario";

$remitente = "$email";
$subject = "SALON PERU - Mensaje enviado por: '$personac'";
mail('direccion@salonperu.org', $subject, $msg, "FROM: $remitente");

$remitente = "$email";
$subject = "SALON PERU - Mensaje enviado por: '$personac'";
mail('devmarost@hotmail.com', $subject, $msg, "FROM: $remitente");

//ENVIO DE CORREO ELECTRONICO A SUSCRIPTORES

$envia="direccion@salonperu.org";
$destinatario = $email; 
$asunto = "Bienvenido a SALON PERÚ"; 
$cuerpo = '<html>
<title>Suscriptores</title>
<style type="text/css">
body{ margin:15px;}
p{margin:0;}
#imagen-logo{
	width:205px;
	float:left;
}

#texto-logo{
	width:250px;
	float:left;
	color:#A29E00;
	font-size:22px;
	padding:50px 0 0 20px;
}

#contenido{
	width:600px;
	float:left;
	text-align:justify;
	color:#004C00;
}
</style>

</head>

<body>
<div id="imagen-logo">
  <p><strong><img width="192" height="151" src="http://www.salonperu.org/imagenes/logo.png" alt="logo_org" /></strong></p>
</div>
<div id="texto-logo">
  <p><strong>Nuevos caminos</strong><br />
    <strong>Para grandes negocios</strong></p>
</div>

<p>&nbsp;</p>
<br clear="all" />
<p>&nbsp;</p>
<div id="contenido">
<strong><p>¡Bienvenido a &lsquo;Salón Perú&rsquo;!</p></strong>
<p>En breve te llegará el último boletín sobre nuestra  organización, que incluye además noticias económicas sobre el mercado peruano y  global.</p>
<p>Gracias por contactarte con nosotros, y esperamos que  sigas de cerca el &lsquo;Salón Perú&rsquo; 2010, evento que se celebrará en la Fira de Barcelona  (Barcelona –España), durante el próximo 22, 23 y 24 de octubre.</p>
<p>Y recuerda que &lsquo;Salón  Perú&rsquo; es un punto de encuentro, una vitrina en Europa que busca generar, nuevos  caminos para grandes negocios. &#13;</p>
</div>
</body>
</html>'; 

//para el envío en formato HTML 
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; 

//dirección del remitente 
$headers .= 'From: <'.$envia.'>' . "\r\n";

mail($destinatario,$asunto,$cuerpo,$headers);

?>
