<?php
include ("../../../conexion/conexion.php");
include ("../../../conexion/funciones.php");

//DATOS USUARIO
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$usuario=$_REQUEST["usuario"];
$email=$_POST["email"];
$clave=$_POST["clave"];

mysql_query("UPDATE ".$tabla_suf."_usuario SET 
clave='$clave', 
nombre='$nombre', 
apellidos='$apellidos', 
email='$email' WHERE usuario='$usuario';",$conexion);

if (mysql_errno()!=0)
{
	echo "error al insertar los datos ". mysql_errno() . " - ". mysql_error();
	mysql_close($conexion);
	//header("Location:listar.php?mensaje=5");
} else {
	mysql_close($conexion);
	header("Location:listar.php?mensaje=2");
}

?>