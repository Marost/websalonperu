<?php
require_once("panel@salonperu/conexion/conexion.php");
require_once("panel@salonperu/conexion/funciones.php");

//VARIABLES URL
$id_galeria=$_REQUEST["id"];
$url_galeria=$_REQUEST["url"];
$url_web=$web."fotos/".$id_galeria."-".$url_galeria;

//GALERIA
$rst_galeria=mysql_query("SELECT * FROM slp_fotos WHERE id=$id_galeria AND url='$url_galeria' ORDER BY id DESC;", $conexion);
$fila_galeria=mysql_fetch_array($rst_galeria);

//VARIABLES GALERIA
$galeria_titulo=$fila_galeria["titulo"];
$galeria_contenido=$fila_galeria["contenido"];

//GALERIA SLIDE
$rst_galeria_slide=mysql_query("SELECT * FROM slp_fotos_slide WHERE noticia=$id_galeria ORDER BY orden ASC;", $conexion);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $galeria_titulo; ?></title>
<base href="<?php echo $web; ?>" />
<link href="css/prueba.css" rel="stylesheet" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

<!-- OPEN GRAPH -->
<meta property="og:title" content="<?php echo $galeria_titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo $url_web; ?>" />
<meta property="og:description" content="<?php echo soloDescripcion($galeria_contenido); ?>" />
<meta property="fb:admins" content="1376286793" />

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

<!-- GALLERIA -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js" type="text/javascript"></script>
<script src="libs/galleria/galleria-1.2.7.min.js" type="text/javascript"></script>
<script type="text/javascript">
  Galleria.loadTheme('libs/galleria/galleria.classic.min.js');
  Galleria.run('#galleria');
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34395601-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

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
             		
                    <h2 class="noticia_titulo"><?php echo $galeria_titulo; ?></h2>
                	
                    <div id="contenido-social">
              	
                        <div class="cntsc_item">
                            <a href="http://www.facebook.com/sharer.php?u=<?php echo $url_web; ?>&t=<?php echo $galeria_titulo; ?>" target="blank">
                                <img src="/imagenes/compartirfb.jpg" width="82" height="18" alt="Compartir"></a>
                        </div>
                        
                        <div class="cntsc_item">
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=217179171676130";
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            
                            <div class="fb-like" data-href="<?php echo $url_web; ?>" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
                            
                        </div><!-- FIN CONTENIDO SOCIAL ITEM -->
                        
                        <div class="cntsc_item">
                            <a href="https://twitter.com/share" class="twitter-share-button" 
                            data-url="<?php echo $url_web; ?>" 
                            data-text="<?php echo $galeria_titulo; ?>" data-lang="es">Twittear</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div><!-- FIN CONTENIDO SOCIAL ITEM -->
                        
                        <div class="cntsc_item">
                            <div class="g-plusone" data-size="medium" ></div>
                            <script type="text/javascript">
                              window.___gcfg = {lang: 'es-419'};
                            
                              (function() {
                                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                po.src = 'https://apis.google.com/js/plusone.js';
                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                              })();
                            </script>                            
                            
                        </div>
                        
                        <div class="cntsc_fecha">
                            <?php echo $noticia_fecha; ?>
                        </div>
                        
                    </div><!-- FIN CONTENIDO SOCIAL -->
                    
                    <div id="galleria">
                      <?php while($fila_galeria_slide=mysql_fetch_array($rst_galeria_slide)){
                                    
                          //VARIABLES
                          $galeriasl_imagen=$fila_galeria_slide["imagen"];
                          $galeriasl_imagen_carpeta=$fila_galeria_slide["carpeta"];
                      ?>
                      <a href="/imagenes/galeria/<?php echo $galeriasl_imagen_carpeta."".$galeriasl_imagen; ?>">
                          <img
                               src="/imagenes/galeria/<?php echo $galeriasl_imagen_carpeta."thumb/".$galeriasl_imagen; ?>"
                               data-title="<?php echo $galeria_titulo; ?>">
                      </a>
                      <?php } ?>
                    </div><!-- FIN GALLERIA -->
                    
                    
                    <div id="contenido-social">
              	
                      <div class="cntsc_item">
                          <a href="http://www.facebook.com/sharer.php?u=<?php echo $url_web; ?>&t=<?php echo $galeria_titulo; ?>" target="blank">
                              <img src="../imagenes/compartirfb.jpg" width="82" height="18" alt="Compartir"></a>
                      </div>
                      
                      <div class="cntsc_item">
                          <div id="fb-root"></div>
                          <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=217179171676130";
                            fjs.parentNode.insertBefore(js, fjs);
                          }(document, 'script', 'facebook-jssdk'));</script>
                          
                          <div class="fb-like" data-href="<?php echo $url_web; ?>" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
                      </div><!-- FIN CONTENIDO SOCIAL ITEM -->
                      
                      <div class="cntsc_item">
                          <a href="https://twitter.com/share" class="twitter-share-button" 
                          data-url="<?php echo $url_web; ?>" 
                          data-text="<?php echo $galeria_titulo; ?>" data-lang="es">Twittear</a>
                          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                      </div><!-- FIN CONTENIDO SOCIAL ITEM -->
                      
                      <div class="cntsc_item">
                          <div class="g-plusone" data-size="medium" ></div>
                          <script type="text/javascript">
                            window.___gcfg = {lang: 'es-419'};
                          
                            (function() {
                              var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                              po.src = 'https://apis.google.com/js/plusone.js';
                              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                            })();
                          </script>                            
                      </div>
                      
                    </div><!-- FIN CONTENIDO SOCIAL -->
                                          
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
