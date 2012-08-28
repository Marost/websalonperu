<?php
include("conexion/funciones.php");

//VARIABLES
$web="http://salonperu.org/";
$proceso=$_POST["proceso"];

if($proceso=="enviar"){
	//VARIABLES
	$family_name=$_POST["family_name"];
	$given_name=$_POST["given_name"];
	$address=$_POST["address"];
	$city_zipcode=$_POST["city_zipcode"];
	$state=$_POST["state"];
	$telephone=$_POST["telephone"];
	$business=$_POST["business"];
	$home=$_POST["home"];
	$celular=$_POST["celular"];
	$fax=$_POST["fax"];
	$email=$_POST["email"];
	$chapter=$_POST["chapter"];
	$name_institution=$_POST["name_institution"];
	$position=$_POST["position"];
	$first_convention=$_POST["first_convention"];
	
	//TIPO REGISTRO
	$registro=$_POST["registro"];
	if($registro=="full_registro"){
		$registro_pago="<p><strong>Precios:</strong></p>
		<p>FULL REGISTRATION ..... € 130.0</p>";
	}elseif($registro=="individual_registro"){
		$pago1=$_POST["pago1"];
		$pago2=$_POST["pago2"];
		$pago3=$_POST["pago3"];
		$pago4=$_POST["pago4"];
		$registro_pago="<p><strong>Precios:</strong></p>
		<p>INDIVIDUAL INSCRIPTION</p>";
		if($pago1==1){ $pago_individual1="<p>Registration and Inauguration Ceremony : Friday 10 -21- 11 .... € 15.00</p>"; }
		if($pago2==1){ $pago_individual2="<p>Recognition Lunch: Saturday 10 -22- 11 ..... € 25.00</p>"; }
		if($pago3==1){ $pago_individual3="<p>Recognition Brunch: Sunday 10 -23- 11 ..... € 25.00</p>"; }
		if($pago4==1){ $pago_individual4="<p>Dinner Dance: Sunday 10 -23- 11 ..... € 70.00</p>"; }	
	}
	
	//PRECIOS DEL PAGO
	$info_pago=$_POST["info_pago"];
	if($info_pago=="num_operacion"){
		$tipo_operacion="<p><strong>Información del pago</strong></p>
		<p>Número de operación: ".$_POST["num_operacion"]."</p>";
	}elseif($info_pago=="imagen_boucher"){
		$archivo=$_FILES["archivo_boucher"];
		$imagen=guardarArchivo("imagenes/inscripcion/",$archivo);
		$tipo_operacion='<p><strong>Información del pago</strong></p>
		<p>Imagen del boucher o cheque: </p>
		<p><img src="'.$web.'imagenes/inscripcion/'.$imagen.'"/></p>
		';
	}
	
	//ENVIAR CORREO
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
	<p>'.$family_name.', acaba de rellenar sus datos en la ficha de inscripción:</p>
	<p>&nbsp;</p>
<p>Family Name: '.$family_name.'</p>
<p>Given Name: '.$given_name.'</p>
<p>Address: '.$address.'</p>
<p>City - Zip Code: '.$city_zipcode.'</p>
<p>State: '.$state.'</p>
<p>Telephone: '.$telephone.'</p>
<p>Business: '.$business.'</p>
<p>Home: '.$home.'</p>
<p>Celular: '.$celular.'</p>
<p>Fax: '.$fax.'</p>
<p>E-mail: '.$email.'</p>
<p>Chapter: '.$chapter.'</p>
<p>Name of the Institution: '.$name_institution.'</p>
<p>Position: '.$position.'</p>
<p>If this is your first Convention: '.$first_convention.'</p>
'.$registro_pago.' '.$pago_individual1.' '.$pago_individual2.' '.$pago_individual3.' '.$pago_individual4.' '.$tipo_operacion.'
	</body>
	</html>';
	
	$email_salonperu="comunicaciones@salonperu.org";
	$email_femip="femip1@hotmail.com";
	$email_marost="mlopez18073@gmail.com";
	$from="noreply@salonperu.org";
	$asunto="Salon Peru | Ficha de Inscripción";
	$headers= "From: Salon Perú <".strip_tags($from)."> \r\n";
	$headers.= "MIME-Version: 1.0\r\n";
	$headers.= "Content-Type: text/html; charset=UTF-8\r\n";

	mail($email_salonperu, $asunto, $body, $headers);
	mail($email_femip, $asunto, $body, $headers);
	mail($email_marost, $asunto, $body, $headers);
	
	header("Location: ".$web);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SALON PERU - Ficha de Inscripción</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link href="css/formulario.css" rel="stylesheet" type="text/css" />

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script><script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function comprueba_extension(formulario, archivo) { 
   extensiones_permitidas = new Array(".jpg"); 
   mierror = ""; 
   if (archivo!="") {
      extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
      permitida = false; 
      for (var i = 0; i < extensiones_permitidas.length; i++) { 
         if (extensiones_permitidas[i] == extension) { 
         permitida = true; 
         break; 
         } 
      } 
      if (!permitida) { 
         mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join(); 
		 alert (mierror); 
      	}else{ 
         formulario.submit(); 
         return 1; 
      	} 
   }
   return 0; 
} 
</script>

</head>

<body>
<div id="superior">
  <div class="interior">
<div id="sombra_izq_sup"></div>
      	<div id="imagen_superior">
      	  <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="850" height="150">
      	    <param name="movie" value="flash/banner_sup.swf" />
      	    <param name="quality" value="high" />
      	    <param name="wmode" value="opaque" />
      	    <param name="swfversion" value="6.0.65.0" />
      	    <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
      	    <param name="expressinstall" value="Scripts/expressInstall.swf" />
      	    <!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
      	    <!--[if !IE]>-->
      	    <object type="application/x-shockwave-flash" data="flash/banner_sup.swf" width="850" height="150">
      	      <!--<![endif]-->
      	      <param name="quality" value="high" />
      	      <param name="wmode" value="opaque" />
      	      <param name="swfversion" value="6.0.65.0" />
      	      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      	      <param name="BGCOLOR" value="#F1C73D" />
      	      <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
      	      <div>
      	        <h4>El contenido de esta página requiere una versión más reciente de Adobe Flash Player.</h4>
      	        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
   	          </div>
      	      <!--[if !IE]>-->
   	        </object>
      	    <!--<![endif]-->
   	      </object>
</div>
        <div id="sombra_der_sup"></div>
  </div>
</div>
<div id="contenido">
	<div class="interior">
  <div id="content">
        	<div id="content_pagina">
            <!--HORA-->
            <div id="hora">
            	<div id="hora_lima">
            	  <p style="float:left;">Lima: </p> <strong><?php include("frame/hora_lima.php"); ?></strong>
            	</div>
                <div id="hora_espania">
                   <p style="float:left;">Barcelona: </p> <strong><?php include("frame/hora_espania.php"); ?></strong>
                </div>
            </div>
            <!--MENU Y CONTENIDO IZQUIERDO-->
            <div id="menu_contenido_izq">
              <div id="menu">
                <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="240" height="320">
                  <param name="movie" value="flash/menu.swf" />
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="8.0.35.0" />
                  <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
                  <param name="expressinstall" value="Scripts/expressInstall.swf" />
                  <!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
                  <!--[if !IE]>-->
                  <object type="application/x-shockwave-flash" data="flash/menu.swf" width="240" height="320">
                    <!--<![endif]-->
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="8.0.35.0" />
                    <param name="expressinstall" value="Scripts/expressInstall.swf" />
                    <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
                    <div>
                      <h4>El contenido de esta página requiere una versión más reciente de Adobe Flash Player.</h4>
                      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" /></a></p>
                    </div>
                    <!--[if !IE]>-->
                  </object>
                  <!--<![endif]-->
                </object>
</div>
              <div class="espacio"></div>
              <div class="espacio"></div>
              <div class="espacio"></div>
              
              <?php include("widgets/wg_pizq.php") ?>
              
              <div id="content_pagina_der2">
                <div class="espacio"></div>
                <div class="espacio"></div>
              </div>
              <div> </div>
            </div>
            <!-- CONTENIDO -->
              <div id="contenido_info">
           		<div id="texto">fICHA DE INSCRIPCION</div>
                <form action="" method="post" enctype="multipart/form-data" name="form1" id="ficha_inscripcion">
                <div id="contenido_info_centro">
                		<div id="texto_cotenido2">
                        
                        	<fieldset class="sin_borde">
                        	  <label>Family Name:</label>
                        	  <span id="sprytextfield1">
                        	  <input type="text" name="family_name" id="family_name" />
                        	  </span><span  class="texto_rojo">*</span>
                        	</fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Given Name:</label>
                        	  <span id="sprytextfield2">
                        	  <input type="text" name="given_name" id="given_name" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Address:</label>
                        	  <span id="sprytextfield3">
                        	  <input type="text" name="address" id="address" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>City - Zip Code:</label>
                        	  <span id="sprytextfield4">
                        	  <input type="text" name="city_zipcode" id="city_zipcode" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>State:</label>
                        	  <span id="sprytextfield5">
                        	  <input type="text" name="state" id="state" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Telephone:</label>
                        	  <span id="sprytextfield6">
                        	  <input type="text" name="telephone" id="telephone" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Business:</label>
                        	  <span id="sprytextfield7">
                        	  <input type="text" name="business" id="business" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Home:</label>
                        	  <span id="sprytextfield8">
                        	  <input type="text" name="home" id="home" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Celular:</label>
                        	  <span id="sprytextfield9">
                        	  <input type="text" name="celular" id="celular" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Fax:</label>
                        	  <span id="sprytextfield10">
                        	  <input type="text" name="fax" id="fax" />
                        	  <span class="textfieldRequiredMsg"></span></span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Email:</label>
                        	  <span id="sprytextfield11">
                              <input type="text" name="email" id="email" />
                              <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg">Email no válido.</span></span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Chapter:</label>
                        	  <span id="sprytextfield12">
                        	  <input type="text" name="chapter" id="chapter" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Name of the Institution:</label>
                        	  <span id="sprytextfield13">
                        	  <input type="text" name="name_institution" id="name_institution" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>Position:</label>
                        	  <span id="sprytextfield14">
                        	  <input type="text" name="position" id="position" />
                        	  </span><span  class="texto_rojo">*</span>
                            </fieldset>
                            
                            <fieldset class="sin_borde">
                        	  <label>If this is your first Convention:</label>
                        	  <span id="spryselect1">
                        	  <select name="first_convention" id="first_convention">
                        	    <option value="0">Selecciona...</option>
                        	    <option value="Si">Si</option>
                        	    <option value="No">No</option>
                      	    </select>
                        	  </span><span  class="texto_rojo">*</span>
           	                </fieldset>
                            
<script type="text/javascript">

window.onload=function(){ desTodoInicio(); }

function desTodoInicio(){
	ficha_inscripcion.pago1.disabled = true;
	ficha_inscripcion.pago2.disabled = true;
	ficha_inscripcion.pago3.disabled = true;
	ficha_inscripcion.pago4.disabled = true;
	ficha_inscripcion.num_operacion.disabled = true;
	ficha_inscripcion.archivo_boucher.disabled = true;
}

function disableCheck(field, causer){
	if (causer.checked){ field.checked = false; field.disabled = true; }
	else{ field.disabled = false;}
}

function actCheck(field, causer){
	if (causer.checked) { field.checked = false; field.disabled = false; }
}

function desIndividual(field){
	disableCheck(ficha_inscripcion.pago1, field);
	disableCheck(ficha_inscripcion.pago2, field);
	disableCheck(ficha_inscripcion.pago3, field);
	disableCheck(ficha_inscripcion.pago4, field);
}

function habIndividualDesFull(field){
	radio_full.checked = false;
	actCheck(ficha_inscripcion.pago1, field);
	actCheck(ficha_inscripcion.pago2, field);
	actCheck(ficha_inscripcion.pago3, field);
	actCheck(ficha_inscripcion.pago4, field);
}

function habNumOperacion(){
	ficha_inscripcion.num_operacion.disabled = false;
	ficha_inscripcion.archivo_boucher.disabled = true;
}

function habImgBoucher(){
	ficha_inscripcion.num_operacion.disabled = true;
	ficha_inscripcion.archivo_boucher.disabled = false;
}

</script>
                            
<fieldset >
    <legend>Precios</legend>
    <p>
    
      <input type="radio" id="radio_full" value="full_registro" name="registro" onClick="desIndividual(this)" />
      <strong>FULL REGISTRATION ..... € 130.00</strong></span>
    </p>
    <p>&nbsp;</p>
    <p><strong>
      <input type="radio" name="registro" id="radio_personal" value="individual_registro" onClick="habIndividualDesFull(this)" />
    INDIVIDUAL INSCRIPTION</strong></p>
    <p class="texto_izquierda"> 
      <input name="pago1" type="checkbox" id="pago1" value="1" />
    Registration and Inauguration Ceremony : Friday 10 -21- 11 .... <strong>€ 15.00</strong></p>
    <p class="texto_izquierda">  
      <input name="pago2" type="checkbox" id="pago2" value="1" />
    Recognition Lunch: Saturday 10 -22- 11 ..... <strong>€ 25.00</strong></p>
    <p class="texto_izquierda">  
      <input name="pago3" type="checkbox" id="pago3" value="1" />
    Recognition Brunch: Sunday 10 -23- 11 ..... <strong>€ 25.00</strong></p>
    <p class="texto_izquierda">  
      <input name="pago4" type="checkbox" id="pago4" value="1" />
    Dinner Dance: Sunday 10 -23- 11 ..... <strong>€ 70.00</strong>                          </p>
</fieldset>
<fieldset class="sin_borde"></fieldset>
<fieldset >
    <legend>Información del Pago</legend>
    <p>
    
      <input type="radio" id="radio_full" value="num_operacion" name="info_pago" onClick="habNumOperacion()" />
      <strong>Número de operación</strong>: 
      <input name="num_operacion" type="text" id="num_operacion" size="50" />
    </p>
    <p>&nbsp;</p>
    <p><strong>
      <input type="radio" name="info_pago" id="radio_personal" value="imagen_boucher" onClick="habImgBoucher()" />
    Imagen del boucher o cheque: 
    <input type="file" name="archivo_boucher" id="archivo_boucher" />
    </strong></p>
    <p>(Solo imagenes con extensión <strong>.jpg</strong>)</p>
</fieldset>
<div id="boton_form">
                    <input type="submit" name="button" id="button" value="Enviar" onclick="comprueba_extension(this.form, this.form.archivo_boucher.value)" />
                    <input name="proceso" type="hidden" id="proceso" value="enviar" />
                        </div>
                        
                    </div>
                </div>
                    
                    </form>
              </div>          
   	  </div>
      </div>
    </div>
</div>
<div id="todo_footer">
	<div class="interior">
        <div id="footer">
          <div class="contenido_footer">
          <p align="center"><a href="index.php">Inicio</a> | <a href="quienes_somos.php">Quienes Somos</a> | <a href="organizacion.php">Organización</a> | <a href="informacion_comercial.php">Información Comercial</a> | <a href="programa_actividades.php">Programa de Actividades</a><br />
            <a href="como_llegar.php">Como Llegar</a> | <a href="hoteles_turismo.php">Hoteles y Turismo</a> | <a href="noticias_enlaces.php">Noticias y Enlaces de Interes</a> | <a href="suscripcion-contacto.php">Suscripción y Contacto</a></p>
        </div>
            <div class="copy">&copy; Web Design: <a href="http://www.marostdevelopers.com" target="_blank">MAROST</a></div>
        </div>
	</div>
    </div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "email");
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12");
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13");
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
//-->
</script>
</body>
</html>