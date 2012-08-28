<?php
require_once("panel@salonperu/conexion/conexion.php");
require_once("panel@salonperu/conexion/funciones.php");
require_once("panel@salonperu/conexion/funcion-paginacion.php");

//VARIABLES
$url=$web."noticias";

//NOTICIAS
$rst_noticias=mysql_query("SELECT * FROM slp_noticia WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC;", $conexion);
$num_noticias=mysql_num_rows($rst_noticias);
	
$registros=10 ; $pagina=$_GET["pag"];
if (is_numeric($pagina)){ $inicio=(($pagina-1)*$registros); }else{ $inicio=0; };

$rst_noticias=mysql_query("SELECT * FROM slp_noticia WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT $inicio, $registros;", $conexion);
$paginas=ceil($num_noticias/$registros);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SALON PERU</title>
<link href="css/prueba.css" rel="stylesheet" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

<!-- LIGTHBOX -->
<link rel="stylesheet" href="js/lightbox/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/lightbox/prototype.js"></script>
<script type="text/javascript" src="js/lightbox/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox/lightbox.js"></script>

<script src="css/jquery-latest.js" type="text/javascript"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

<script type="text/javascript">
var jpfl = jQuery.noConflict();
jpfl(document).ready(function(){
	jpfl("#pageflip").hover(function() {
		jpfl("#pageflip img , .msg_block").stop()
			.animate({
				width: '307px', 
				height: '319px'
			}, 500); 
		} , function() {
		jpfl("#pageflip img").stop() 
			.animate({
				width: '50px', 
				height: '52px'
			}, 220);
		jpfl(".msg_block").stop() 
			.animate({
				width: '50px', 
				height: '50px'
			}, 200);
	});
});
</script>

<!-- SLIDE -->
<link href="js/slides/slider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/slides/slides.min.jquery.js"></script>
<script type="text/javascript" charset="utf-8">
var jsld = jQuery.noConflict();
jsld(function(){
	jsld('#slider_superior').slides({
		play: 7000,
		preload: true,
		preloadImage: 'imagenes/slpreload.gif',
		pagination: false,
		generateNextPrev: false,
		effect: "fade",
		crossfade: true,
		slideSpeed: 350,
		fadeSpeed: 500
	});
	
});
</script>

</head>

<body>
		<div id="pageflip">
			<img style="overflow: hidden; width: 50px; display: block; height: 52px;" src="imagenes/prueba/page_flip.png" alt="" />
		<div style="overflow: hidden; width: 50px; display: block; height: 50px;" class="msg_block"></div>
	</div>
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
                      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
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
              
              <div> </div>
            </div>
            <!-- CONTENIDO -->
<div id="contenido_info"><!--FIN CONTENIDO INFO CENTRO-->
  
  <div id="contenido_info_centro">
    	
        <div id="news-panel">
        	
            <h4>Noticias</h4>
            
            <?php while($fila_noticias=mysql_fetch_array($rst_noticias)){
				//VARIABLES
				$noticia_id=$fila_noticias["id"];
				$noticia_url=$fila_noticias["url"];
				$noticia_titulo=$fila_noticias["titulo"];
				$noticia_contenido=$fila_noticias["contenido"];
				$noticia_imagen=$fila_noticias["imagen"];
				$noticia_imagen_carpeta=$fila_noticias["carpeta_imagen"];
			?>
            <div class="nwp-item">
            	
                <div class="nwpi-imagen">
                	<img width="120" height="100" src="/imagenes/upload/<?php echo $noticia_imagen_carpeta."thumb/".$noticia_imagen; ?>" alt="<?php echo $noticia_titulo; ?>" />
                </div>
                
                <div class="nwpi-datos">
                	<h3><a href="/noticia/<?php echo $noticia_id."-".$noticia_url; ?>"><?php echo $noticia_titulo; ?></a></h3>
                    <?php echo primerParrafo($noticia_contenido)."</p>" ?>
                </div>
            
            </div>
            <?php } ?>
        </div>
        
        <div class="float_left an100 texto_centro">
        	<?php 
			if (!isset($_GET["pag"])){ $pag=1; }else{ $pag=$_GET["pag"]; };
			echo paginar($pag, $num_noticias, $registros, "$url?pag=", 10);
			?>
        </div>
    
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
            <a href="como_llegar.php">Como Llegar</a> | <a href="hoteles_turismo.php">Hoteles y Turismo</a> | <a href="noticias_enlaces.php">Noticias y Enlaces de Interes</a> |<a href="suscripcion-contacto.php"> Suscripción y Contacto</a></p>
        </div>
            <div class="copy">
              <p>&copy;  Design: <a href="http://www.marostdevelopers.com">MAROST</a></p>
              <p><iframe width="83" height="17" frameborder="0" scrolling="no" src="contador.php"></iframe> </p>
            </div>
        </div>
	</div>
    </div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID2");
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>
