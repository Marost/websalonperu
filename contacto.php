<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SALON PERU - CONTACTO</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link href="css/formulario.css" rel="stylesheet" type="text/css" />

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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
           		<div id="texto">FORMULARIO DE CONTACTO EMPRESAS</div>
                <form id="form1" name="form1" method="post" action="conexion/nuevocontacto.php">
                <div id="contenido_info_centro">
                		<div id="texto_cotenido2">
                        	<div id="nombres_form">
                                <div id="item_form">Empresa: </div>
                                <div id="item_form">Persona de Contacto: </div>
                                <div id="item_form">Cargo: </div>
                                <div id="item_form">Direccion: </div>
                                <div id="item_form">C.P.: </div>
                                <div id="item_form">Población: </div>
                                <div id="item_form">Provincia: </div>
                                <div id="item_form">Pais: </div>
			          <div id="item_form">Email: </div>
                                <div id="item_form">Teléfono: </div>
                                <div id="item_form">Móvil: </div>
                                <div id="item_form">Comentario: </div>
                            </div>
                          <div id="cajas_form">
<div id="item_caja_form"><span id="sprytextfield1">
                            	  <input type="text" name="empresa" id="empresa" />
                           	    <span class="textfieldRequiredMsg">Ingrese la Empresa</span></span></div>
                                <div id="item_caja_form"><span id="sprytextfield2">
                                <input type="text" name="personac" id="personac" />
                                <span class="textfieldRequiredMsg">Ingrese a la Pers. Contacto</span></span></div>
<div id="item_caja_form"><span id="sprytextfield3">
                                  <input type="text" name="cargo" id="cargo" />
                                <span class="textfieldRequiredMsg">Ingrese el Cargo</span></span></div>
                                <div id="item_caja_form"><span id="sprytextfield5">
                                  <input type="text" name="direccion" id="direccion" />
                                <span class="textfieldRequiredMsg">Ingrese la Direccion</span></span></div>
                                <div id="item_caja_form"><span id="sprytextfield6">
                                  <input type="text" name="cp" id="cp" />
                                <span class="textfieldRequiredMsg">Ingrese C.P.</span></span></div>
<div id="item_caja_form"><span id="sprytextfield7">
                                  <input type="text" name="poblacion" id="poblacion" />
                                <span class="textfieldRequiredMsg">Ingrese la Población</span></span></div>
<div id="item_caja_form"><span id="sprytextfield8">
                                  <input type="text" name="provincia" id="provincia" />
                                <span class="textfieldRequiredMsg">Ingrese la Provincia</span></span></div>
<div id="item_caja_form"><span id="sprytextfield9">
                                  <input type="text" name="pais" id="pais" />
                                <span class="textfieldRequiredMsg">Ingrese el Pais</span></span></div>
                                
<div id="item_caja_form"><span id="sprytextfield4">
  <input type="text" name="email" id="email" />
<span class="textfieldRequiredMsg">Ingrese un Email.</span><span class="textfieldInvalidFormatMsg">Ingrese un Email  válido.</span></span></div>
                                <div id="item_caja_form"><span id="sprytextfield10">
                                  <input type="text" name="telefono" id="telefono" />
                                <span class="textfieldRequiredMsg">Ingrese el Telefono</span></span></div>
                            <div id="item_caja_form"><span id="sprytextfield11">
                              <input type="text" name="movil" id="movil" />
                          <span class="textfieldRequiredMsg">Ingrese el Movil</span></span></div>
                              <div id="item_caja_textarea">
                                <div id="item_caja_form2">
                                  <label>
                                    <textarea name="comentario" id="comentario" cols="30" rows="5"></textarea>
                                  </label>
                                </div>
                                <label></label>
                              </div>
                            </div>
                            <div id="boton_form">
                              <input type="submit" name="button" id="button" value="Enviar" /> 
                              <input type="reset" name="button2" id="button2" value="Limpiar" />
                            </div>
                        </div>
                        <div id="texto_cotenido2">
                        	<p><strong>Informe:</strong></p>
                       	  <p><strong>E-mail</strong>: admin@salonperu.org</p>
                        	<p><strong>Prensa:</strong> prensa@salonperu.org</p>
                    </div>
                    </div>
                    
                    </form>
				<div class="espacio"></div>
                    <div class="espacio_largo"></div>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
swfobject.registerObject("FlashID2");
//-->
</script>
</body>
</html>
