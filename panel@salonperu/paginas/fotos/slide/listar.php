<?php
session_start();
include("../../../conexion/conexion.php");
include("../../../conexion/verificar_sesion.php");
include("../../../conexion/funciones.php");
include("../../../conexion/funcion-paginacion.php");

//VARIABLES
$cebra=1;
$url="listar.php";
$idnoticia=$_REQUEST["noticia"];

//NOTICIA
$rst_noticia=mysql_query("SELECT * FROM ".$tabla_suf."_fotos WHERE id=$idnoticia", $conexion);
$fila_noticia=mysql_fetch_array($rst_noticia);

//GALERIA
$rst_fotos=mysql_query("SELECT * FROM ".$tabla_suf."_fotos_slide WHERE noticia=$idnoticia ORDER BY orden ASC;", $conexion);
$num_fotos=mysql_num_rows($rst_fotos);
	
if ($num_fotos==0){ $mensaje2="No hay registros en la base de datos";}

// MENSAJE DE ERROR
if($_REQUEST["mensaje"]==1){
	$mensaje="El registro fue agregado exitosamente";
}elseif($_REQUEST["mensaje"]==2)
	$mensaje="El registro fue modificado exitosamente";
elseif($_REQUEST["mensaje"]==3)
	$mensaje="El registro fue eliminado exitosamente";
elseif($_REQUEST["mensaje"]==4)
	$mensaje="Se ha producido un error al ingresar el nuevo registro";
elseif($_REQUEST["mensaje"]==5)
	$mensaje="Se ha producido un error al modificar el registro";
elseif($_REQUEST["mensaje"]==6)
	$mensaje="Se ha producido un error al eliminar el registro";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administración | </title>
<link rel="stylesheet" type="text/css" href="../../../css/estilo-panel.css"/>
<link rel="stylesheet" type="text/css" href="../../../css/style-listas.css">
<script type="text/javascript" src="../../../../js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../../../js/jquery-ui-1.8.5.custom.min.js"></script>
<script type="text/javascript">
var jq = jQuery.noConflict();
jq(document).ready(function() {
	jq("#test-list").sortable({
	  handle : '.handle',
	  update : function () {
		var order = jq('#test-list').sortable('serialize');
		jq("#info").load("ordenar.php?"+order);
	  }
	});
});
</script>

<script type="text/javascript">
function eliminarRegistro(registro, noticia) {
if(confirm("¿Está seguro de borrar este registro?")) {
	document.location.href="eliminar.php?id="+registro+"&noticia="+noticia;
	}
}
function eliminarTodo(noticia, tipo) {
if(confirm("¿Está seguro de borrar todos los registros?")) {
	document.location.href="eliminar.php?noticia="+noticia+"&tipo="+tipo;
	}
}
</script>

</head>

<body>
<div id="contenedor" class="limpiar">
	<?php include("../../../cabecera.php") ?>
    <div id="cuerpo" class="limpiar">
    	<div class="interior">
        	<div id="panel-izq">
				<?php include("../../../menu-izq.php"); ?>
            </div><!--FIN PANEL IZQ-->
            <div id="panel-der">
            	  <h2>Lista - Galeria: <?php echo $fila_noticia["titulo"] ?></h2>
    <div id="contenido_total">
    	<div id="mensaje" >
    	  <p class="mensaje"><?php echo $mensaje; ?></p>
        </div>
        <div id="contenido">

              <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                  <tr>
                    <td width="71%" ><p><a href="form-agregar.php?noticia=<?php echo $idnoticia; ?>">
                    <strong>AGREGAR FOTOS</strong></a></p></td>
                    <td width="29%" ><p>
                    <a onclick="eliminarTodo(<?php echo $idnoticia; ?>, 'all');" href="javascript:;">
                    <strong>Borrar todo</strong></a></p></td>
                  </tr>
                  <tr>
                    <td colspan="2">
<ul id="test-list">
	<?php while($fila_fotos=mysql_fetch_array($rst_fotos)){ ?>
        <li id="listItem_<?php echo $fila_fotos["id"] ?>" class="alto">
            <img src="../../../img/arrow.png" alt="move" width="16" height="16" class="handle" />
            <a onclick="eliminarRegistro(<?php echo $fila_fotos["id"] ?>, <?php echo $idnoticia ?>);" href="javascript:;">
            <img src="../../../images/eliminar_16.png" width="16" height="16" title="Eliminar registro" /></a>
            <a href="form-modificar.php?id=<?php echo $fila_fotos["id"] ?>&amp;noticia=<?php echo $idnoticia ?>">
            <img src="../../../images/editar_16.png" width="16" height="16" /></a>
            <img src="../../../../imagenes/galeria/<?php echo $fila_fotos["carpeta"]."thumb/".$fila_fotos["imagen"] ?>" width="150" />
        </li>
    <?php } ?>
</ul>
                    </td>
                  </tr>
          </table>

      </div><!-- FIN CONTENIDO -->
  </div>
          </div><!--FIN PANEL DER-->
        </div><!--FIN INTERIOR-->
    </div><!--FIN CUERPO-->
</div>
</body>
</html>