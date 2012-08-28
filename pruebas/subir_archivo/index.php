<?php
include("../../conexion/funciones.php");

//VARIABLES
$web="http://marostdevelopers.com/salonperu/";
$proceso=$_POST["proceso"];

if($proceso=="enviar"){
	$archivo=$_FILES["archivoupload"];
	$imagen=guardarArchivo("../../imagenes/inscripcion/",$archivo);
	
	$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Salon Perú</title>
	<style type="text/css">
		body{ font-family: Arial, Helvetica, sans-serif; font-size: 12px;}
		body{ margin:0;}
	</style>
	</head>
	<body>
	<p><img src="'.$web.'imagenes/logo.png" height="39" />
	</p>
	<p>Marco Lopez, acaba de rellenar sus datos en la ficha de inscripción:</p>
	<p>Se adjunta la imagen del boucher del pago realizado:</p>
	<p><img src="'.$web.'imagenes/inscripcion/'.$imagen.'"/></p>
	</body>
	</html>';
	
	$email="marcolopez49@hotmail.com";
	$from="noreply@salonperu.org";
	$asunto="Salon Peru | Ficha de Inscripción";
	$headers= "From: Salon Perú <".strip_tags($from)."> \r\n";
	$headers.= "MIME-Version: 1.0\r\n";
	$headers.= "Content-Type: text/html; charset=UTF-8\r\n";

	mail($email, $asunto, $body, $headers);

	echo "se envio el correo<br>";
	echo $imagen;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script type="text/javascript">
function comprueba_extension(formulario, archivo) { 
   extensiones_permitidas = new Array(".jpg"); 
   mierror = ""; 
   //if (!archivo) { 
      //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario 
      	//mierror = "No has seleccionado ningún archivo"; 
   //}else{ 
      //recupero la extensión de este nombre de archivo 
      extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
      //alert (extension); 
      //compruebo si la extensión está entre las permitidas 
      permitida = false; 
      for (var i = 0; i < extensiones_permitidas.length; i++) { 
         if (extensiones_permitidas[i] == extension) { 
         permitida = true; 
         break; 
         } 
      } 
      if (!permitida) { 
         mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join(); 
      	}else{ 
         	 //submito! 
         alert ("Todo correcto. Voy a submitir el formulario."); 
         formulario.submit(); 
         return 1; 
      	} 
   //} 
   //si estoy aqui es que no se ha podido submitir 
   alert (mierror); 
   return 0; 
} 
</script>
</head>

<body>
<form method="post" action="" enctype="multipart/form-data"> 
<input type="file" name="archivoupload"> 
<input type="button" name="Submit" value="Enviar" onclick="comprueba_extension(this.form, this.form.archivoupload.value)"> 
<input name="proceso" type="hidden" id="proceso" value="enviar" />
</form> 
</body>
</html>