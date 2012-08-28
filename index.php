<?php
require_once("panel@salonperu/conexion/conexion.php");
require_once("panel@salonperu/conexion/funciones.php");

//NOTICIAS
$rst_noticias=mysql_query("SELECT * FROM slp_noticia WHERE fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 4;", $conexion);

//GALERIA
$rst_galeria=mysql_query("SELECT * FROM slp_galeria", $conexion);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SALON PERU</title>
<link href="css/prueba.css" rel="stylesheet" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

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
<link type="text/css" rel="stylesheet" href="libs/coinslider/coin-slider-styles.css"/>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="libs/coinslider/coin-slider.min.js"></script>
<script type="text/javascript">
var jSld = jQuery.noConflict();
jSld(document).ready(function() {
	jSld('#coin-slider').coinslider({
		width: 550,
		height: 340,
		spw: 7,
		sph: 5,
		delay: 5000,
		sDelay: 30,
		opacity: 0.7,
		titleSpeed: 500,
		effect: 'random',
		navigation: true,
		links : true,
		hoverPause: false 
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
              
              <?php include("widgets/wg_pizq.php") ?>
              
            </div>
            
            <!-- CONTENIDO -->
<div id="contenido_info">

  <div id="contenido_info_centro">
         
        <div id="slider_superior">
            <div id="coin-slider">
            	
                <?php while($fila_galeria=mysql_fetch_array($rst_galeria)){
					$galeria_id=$fila_galeria["id"];
					$galeria_titulo=$fila_galeria["titulo"];
					$rst_galslide=mysql_query("SELECT * FROM slp_galeria_slide WHERE noticia=$galeria_id ORDER BY orden ASC LIMIT 2;", $conexion);					
					while($fila_galslide=mysql_fetch_array($rst_galslide)){
						$galslide_id=$fila_galslide["id"];
						$galslide_imagen=$fila_galslide["imagen"];
						$galslide_imagen_carpeta=$fila_galslide["carpeta"];
						$galslide_noticia=$fila_galslide["noticia"];
				?>
                <a>
                	<img src="imagenes/galeria/<?php echo $galslide_imagen_carpeta."thumb/".$galslide_imagen; ?>" />
                    <span><?php echo $galeria_titulo; ?></span>
                </a>                
                <?php }} ?>
                
            </div><!--FIN CONTAINER-->    
        </div><!--FIN SLIDER-->
  </div><!--FIN CONTENIDO INFO CENTRO-->
  
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
            
            <div class="more_not"><a href="noticias">&#8250;&#8250; MÁS NOTICIAS &#8249;&#8249;</a></div>
        	
        </div>
    
  </div>
  
</div>              
   	  </div>
      </div>
    </div>
</div>

<?php require_once("footer.php"); ?>

<script type="text/javascript">
<!--
swfobject.registerObject("FlashID2");
//-->
</script>
</body>
</html>
