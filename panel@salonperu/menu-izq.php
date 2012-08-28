<script type="text/javascript" src="<?php echo $fila_empresa["web"] ?>js/jquery-1.2.6.js"></script>
<script type="text/javascript" src="<?php echo $fila_empresa["web"] ?>js/jscript_jquery.dimensions.js"></script>
<script type="text/javascript" src="<?php echo $fila_empresa["web"] ?>js/jscript_jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo $fila_empresa["web"] ?>js/jscript_jzScrollHorizontalPane.js"></script>
<script type="text/javascript">
var jmnpr = jQuery.noConflict();
jmnpr(document).ready(function(){
	if(jmnpr("#nav")) {
		jmnpr("#nav dd").hide();
		jmnpr("#nav dt b").click(function() {
			if(this.className.indexOf("clicked") != -1) {
				jmnpr(this).parent().next().slideUp(200);
				jmnpr(this).removeClass("clicked");
			}
			else {
				jmnpr("#nav dt b").removeClass();
				jmnpr(this).addClass("clicked");
				jmnpr("#nav dd:visible").slideUp(200);
				jmnpr(this).parent().next().slideDown(500);
			}
			return false;
		});
	}
});
</script>

<dl id="nav">

  <dt class="items"><b>Opciones</b></dt>
  <dd>
    <ul class="items">
      <li><a href="<?php echo $web."".$carpeta_admin; ?>/paginas/noticias/noticias/listar.php">
        	Noticias</a></li>
      <li><a href="<?php echo $web."".$carpeta_admin; ?>/paginas/galeria/listar.php">
        	Galeria Fotos</a></li>
    </ul>
  </dd>
  
  <div class="espacio"></div>
  <dt class="items"><b>Usuario</b></dt>
  <dd>
    <ul>
      <li>
      	<a href="<?php echo $fila_empresa["web"]."".$carpeta_admin; ?>/paginas/usuarios/administracion/form-agregar.php">
        	Agregar</a></li>
      <li>
      	<a href="<?php echo $fila_empresa["web"]."".$carpeta_admin; ?>/paginas/usuarios/administracion/listar.php">
        	Listar</a></li>
    </ul>
  </dd>
</dl>
<!--FIN MENU NAV-->