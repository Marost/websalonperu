<?php
require_once("panel@salonperu/conexion/conexion.php");
require_once("panel@salonperu/conexion/funciones.php");

//VARIABLES
$noticia_id=$_REQUEST["id"];
$noticia_url=$_REQUEST["url"];
$urlweb=$web."noticia/".$noticia_id."-".$noticia_url;

//NOTICIAS
$rst_noticia=mysql_query("SELECT * FROM slp_noticia WHERE id=$noticia_id AND url='$noticia_url';", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//VARIABLES
$noticia_titulo=$fila_noticia["titulo"];
$noticia_contenido=$fila_noticia["contenido"];
$noticia_imagen=$fila_noticia["imagen"];
$noticia_imagen_carpeta=$fila_noticia["carpeta_imagen"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $noticia_titulo; ?></title>
<base href="<?php echo $web; ?>" />
<link href="css/prueba.css" rel="stylesheet" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

<!-- OPEN GRAPH -->
<meta property="og:title" content="<?php echo $noticia_titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo $urlweb; ?>" />
<meta property="og:image" content="<?php echo $web."imagenes/upload/".$noticia_imagen_carpeta."".$noticia_imagen; ?>" />
<meta property="og:site_name" content="<?php echo $web_nombre; ?>" />
<meta property="fb:admins" content="1376286793" />

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

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
             		
                    <h2 class="noticia_titulo"><?php echo $noticia_titulo; ?></h2>
                	
                    <div id="contenido-social">
              	
                        <div class="cntsc_item">
                            <a href="http://www.facebook.com/sharer.php?u=<?php echo $urlweb; ?>&t=<?php echo $noticia_titulo; ?>" target="blank">
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
                            
                            <div class="fb-like" data-href="<?php echo $urlweb; ?>" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
                            
                        </div><!-- FIN CONTENIDO SOCIAL ITEM -->
                        
                        <div class="cntsc_item">
                            <a href="https://twitter.com/share" class="twitter-share-button" 
                            data-url="<?php echo $urlweb; ?>" 
                            data-text="<?php echo $noticia_titulo; ?>" data-lang="es">Twittear</a>
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
                    
                    <div class="noticia_imagen">
                        <img src="/imagenes/upload/<?php echo $noticia_imagen_carpeta."".$noticia_imagen; ?>" alt="<?php echo $noticia_titulo; ?>" />                    
                    </div>
                	
                    <div class="noticia_info">
                		<?php echo $noticia_contenido; ?>
                    </div>
                    
                    <div id="contenido-social">
              	
                        <div class="cntsc_item">
                            <a href="http://www.facebook.com/sharer.php?u=<?php echo $urlweb; ?>&t=<?php echo $noticia_titulo; ?>" target="blank">
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
                            
                            <div class="fb-like" data-href="<?php echo $urlweb; ?>" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
                            
                        </div><!-- FIN CONTENIDO SOCIAL ITEM -->
                        
                        <div class="cntsc_item">
                            <a href="https://twitter.com/share" class="twitter-share-button" 
                            data-url="<?php echo $urlweb; ?>" 
                            data-text="<?php echo $noticia_titulo; ?>" data-lang="es">Twittear</a>
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
                      
                      <div class="an100 float_left" id="noticia-comentarios">
                      		
                            <h4 class="padding_20 texto_t22">Comentarios</h4>
                            
                            <div id="fb-root"></div>
							<script>(function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=217179171676130";
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            
                            <div class="fb-comments" data-href="<?php echo $urlweb; ?>" data-num-posts="5" data-width="560"></div>
                        	
                      </div><!-- COMENTARIOS NOTICIA -->
                    
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
