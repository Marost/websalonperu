<?php
	
	//VARIABLES
	$web="http://marostdevelopers.com/salonperu/";
	$family_name=$_POST["family_name"];
	$given_name=$_POST["given_name"];
	$address=$_POST["address"];
	$city_zipcode=$_POST["city_zipcode"];
	$state=$_POST["state"];
	$telephone=$_POST["telephone"];
	$business=$_POST["business"];
	$home=$_POST["home"];
	$celular=$_POST["celular"];
	$fax=$_POST["fax"];
	$email=$_POST["email"];
	$chapter=$_POST["chapter"];
	$name_institution=$_POST["name_institution"];
	$position=$_POST["position"];
	$first_convention=$_POST["first_convention"];
	
	//TIPO REGISTRO
	$registro=$_POST["registro"];
	if($registro=="full_registro"){
		$registro_pago="<p><strong>Precios:</strong></p>
		<p>FULL REGISTRATION ..... € 130.0</p>";
	}elseif($registro=="individual_registro"){
		$pago1=$_POST["pago1"];
		$pago2=$_POST["pago2"];
		$pago3=$_POST["pago3"];
		$pago4=$_POST["pago4"];
		$registro_pago="<p><strong>Precios:</strong></p>
		<p>INDIVIDUAL INSCRIPTION</p>";
		if($pago1==1){
			$pago_individual.="<p>Registration and Inauguration Ceremony : Friday 10 -21- 11 .... € 15.00</p>";
		}elseif($pago2==2){
			$pago_individual.="<p>Recognition Lunch: Saturday 10 -22- 11 ..... € 25.00</p>";
		}elseif($pago3==3){
			$pago_individual.="<p>Recognition Brunch: Sunday 10 -23- 11 ..... € 25.00</p>";
		}elseif($pago4==4){
			$pago_individual.="<p>Dinner Dance: Sunday 10 -23- 11 ..... € 70.00</p>";
		}	
	}
	
	//PRECIOS DEL PAGO
	$info_pago=$_POST["info_pago"];
	if($info_pago=="num_operacion"){
		$tipo_operacion="<p><strong>Información del pago</strong></p>
		<p>Número de operación: ".$_POST["num_operacion"]."</p>";
	}elseif($info_pago=="imagen_boucher"){
		$archivo=$_FILES["archivo_boucher"];
		$imagen=guardarArchivo("../../imagenes/inscripcion/",$archivo);
		$tipo_operacion='<p><strong>Información del pago</strong></p>
		<p>Imagen del boucher o cheque: </p>
		<p><img src="'.$web.'imagenes/inscripcion/'.$imagen.'"/></p>
		';
	}
	
	//ENVIAR CORREO
	$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Salon Perú</title>
	<style type="text/css">
		body{ font-family: Arial, Helvetica, sans-serif; font-size: 12px;}
		body{ margin:0;}
	</style>
	</head>
	<body>
	<p><img src="'.$web.'imagenes/logo.png" height="39" />
	</p>
	<p>'.$family_name.', acaba de rellenar sus datos en la ficha de inscripción:</p>
	<p>&nbsp;</p>
<p>Family Name: '.$family_name.'</p>
<p>Given Name: '.$given_name.'</p>
<p>Address: '.$address.'</p>
<p>City - Zip Code: '.$city_zipcode.'</p>
<p>State: '.$state.'</p>
<p>Telephone: '.$telephone.'</p>
<p>Business: '.$business.'</p>
<p>Home: '.$home.'</p>
<p>Celular: '.$celular.'</p>
<p>Fax: '.$fax.'</p>
<p>E-mail: '.$email.'</p>
<p>Chapter: '.$chapter.'</p>
<p>Name of the Institution: '.$name_institution.'</p>
<p>Position: '.$position.'</p>
<p>If this is your first Convention: '.$first_convention.'</p>
'.$registro_pago.' '.$pago_individual.'
	</body>
	</html>';
	
	$email="marcolopez49@hotmail.com";
	$from="noreply@salonperu.org";
	$asunto="Salon Peru | Ficha de Inscripción";
	$headers= "From: Salon Perú <".strip_tags($from)."> \r\n";
	$headers.= "MIME-Version: 1.0\r\n";
	$headers.= "Content-Type: text/html; charset=UTF-8\r\n";

	mail($email, $asunto, $body, $headers);
?>