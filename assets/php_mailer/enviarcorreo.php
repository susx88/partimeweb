<?php

function EnviarCorreo ($para,$asunto,$mensaje,$archivo="")
{
  require "includes/class.phpmailer.php";
  $mail = new phpmailer();
  $mail->PluginDir = "";
  //$mail->Mailer = "smtp";
  //$mail->Host = "servidor1";
  //if ($archivo != "")
  //    $mail->AddAttachment("../reportes/pdfs/presup_".$archivo.".pdf", "presup_".$archivo.".pdf");
  $mail->SMTPAuth = false;
  $mail->From = "no-responder@partimeweb.cl";
  $mail->FromName = "Partime Web - CRM";
  $mail->Timeout=120;
  $mail->IsHTML(true);
  $desti = explode(";",$para);
  $nro = sizeof($desti);
  for ($i=0;$i<$nro;$i++)
    {
     $mail->AddAddress($desti[$i]);
	}
//  $mail->AddAddress($desti[1]);
  $mail->Subject = "$asunto";
  $mail->Body = "$mensaje";
  $exito = $mail->Send();
  $intentos=1; 
  while ((!$exito) && ($intentos < 5)) {
	sleep(5);
     	//echo $mail->ErrorInfo;
     	$exito = $mail->Send();
     	$intentos=$intentos+1;	
	
   }	
  return $exito;
}

function EnviarCorreoMasivo ($para,$asunto,$mensaje,$archivo="")
{
  require "includes/class.phpmailer.php";
  $mail = new phpmailer();
  $mail->PluginDir = "";
  //$mail->Mailer = "smtp";
  //$mail->Host = "servidor1";
  //if ($archivo != "")
  //    $mail->AddAttachment("../reportes/pdfs/presup_".$archivo.".pdf", "presup_".$archivo.".pdf");
  $mail->SMTPAuth = false;
  $mail->From = "no-responder@partimeweb.cl";
  $mail->FromName = "Partime Web - CRM";
  $mail->Timeout=120;
  $mail->IsHTML(true);
  $desti = explode(";",$para);
  $nro = sizeof($desti);
  for ($i=0;$i<$nro;$i++)
    {
     $mail->AddAddress($desti[$i]);
  }
//  $mail->AddAddress($desti[1]);
  $mail->Subject = "$asunto";
  $mail->Body = "$mensaje";
  $exito = $mail->Send();
  $intentos=1; 
  while ((!$exito) && ($intentos < 5)) {
  sleep(5);
      //echo $mail->ErrorInfo;
      $exito = $mail->Send();
      $intentos=$intentos+1;  
  
   }  
  return $exito;
}



?>