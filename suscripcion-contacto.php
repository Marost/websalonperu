<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SALON PERU - HOTELES Y TURISMO</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
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
              
              <?php include("widgets/wg_pizq.php") ?>
              
              <div id="content_pagina_der2">
                <div class="espacio"></div>
                <div class="espacio"></div>
              </div>
              <div> </div>
            </div>
            <!-- CONTENIDO -->
  <div id="contenido_info">
    <div id="contenido_info_centro">
      <p><a href="suscripcion.php"><img src="imagenes/suscripcion.png" width="400" height="110" /></a></p>
      <p>&nbsp;</p>
      <blockquote>
        <p><a href="contacto.php"><img src="imagenes/contacto.png" width="400" height="116" /></a></p>
      </blockquote>
    </div>
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
            <a href="como_llegar.php">Como Llegar</a> | <a href="hoteles_turismo.php">Hoteles y Turismo</a> | <a href="noticias_enlaces.php">Noticias y Enlaces de Interes </a>| <a href="suscripcion-contacto.php">Suscripción y Contacto</a></p>
        </div>
            <div class="copy">&copy; Web Design: <a href="http://www.marostdevelopers.com" target="_blank">MAROST</a></div>
        </div>
	</div>
    </div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID2");
//-->
</script>
</body>
</html>
