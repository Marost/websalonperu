<?php
include ("conexion.php");
$empresa=$_POST["empresa"];
$personac=$_POST["personac"];
$cargo=$_POST["cargo"];
$direccion=$_POST["direccion"];
$cp=$_POST["cp"];
$poblacion=$_POST["poblacion"];
$provincia=$_POST["provincia"];
$pais=$_POST["pais"];
$email=$_POST["email"];
$telefono=$_POST["telefono"];
$movil=$_POST["movil"];
$comentario=$_POST["comentario"];

mysql_query("INSERT INTO contacto (EMPRESA,PERSONACONTACTO,CARGO,DIRECCION,CP,POBLACION,PROVINCIA,PAIS,EMAIL,TELEFONO,MOVIL,COMENTARIO) values ('$empresa','$personac','$cargo','$direccion','$cp','$poblacion','$provincia','$pais','$email','$telefono','$movil','$comentario');",$conexion);

if (mysql_errno()!=0)
{
	echo "error al insertar los datos". mysql_errno() . " - ". mysql_error();
	mysql_close($conexion);
} else {
	mysql_close($conexion);
	header("Location:../index.html");
}

//ENVIAR A CORREO ELECTRONICO

$msg= "";
$msg= "CONTACTO - SALON PERU";
$msg.="\nEmpresa: $empresa";
$msg.="\nPersona de Contacto: $personac";
$msg.="\nCargo: $cargo";
$msg.="\nDireccion: $direccion";
$msg.="\nCP: $cp";
$msg.="\nPoblación: $poblacion";
$msg.="\nProvincia: $provincia";
$msg.="\nPais: $pais";
$msg.="\nEmail: $email";
$msg.="\nTelefono: $telefono";
$msg.="\nMovil: $movil";
$msg.="\nComentario: $comentario";

$remitente = "$email";
$subject = "SALON PERU - Mensaje enviado por: '$personac'";
mail('direccion@salonperu.org', $subject, $msg, "FROM: $remitente");

$remitente = "$email";
$subject = "SALON PERU - Mensaje enviado por: '$personac'";
mail('devmarost@hotmail.com', $subject, $msg, "FROM: $remitente");

?>
