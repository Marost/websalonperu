<?php
//CONEXION MAROST
$conexion=mysql_connect("localhost","salonper_WAdmSP","znU=hT@K[u7sJc9Jzx");
mysql_select_db("salonper_slperupry12",$conexion);

//ZONA HORARIA
date_default_timezone_set('America/Lima');

//VARIABLES GLOBALES
global $carpeta_admin;
global $tabla_suf;
global $sesion_pre;
global $rst_empresa;
global $fila_empresa;
global $rst_prv_user;
global $fila_prv_user;
global $usuario_user;
global $usuario_nombre;
global $usuario_apellido;
global $usuario_email;
global $web;
global $web_nombre;
global $fechaActual;

//VARIABLES
$carpeta_admin="panel@salonperu";
$tabla_suf="slp";
$sesion_pre="slps";
$fechaActual=date("Y-m-d H:i:s");

//EMPRESA
$rst_empresa=mysql_query("SELECT * FROM ".$tabla_suf."_empresa WHERE id=1;", $conexion);
$fila_empresa=mysql_fetch_array($rst_empresa);
$web=$fila_empresa["web"];
$web_nombre=$fila_empresa["nombre"];

if ($_SESSION["user-".$sesion_pre.""]<>""){
	$usuario_user=$_SESSION["user-".$sesion_pre.""];
	$usuario_nombre=$_SESSION["user_nombre-".$sesion_pre.""];
	$usuario_apellido=$_SESSION["user_apellido-".$sesion_pre.""];
	$usuario_email=$_SESSION["user_email-".$sesion_pre.""];
}
?>