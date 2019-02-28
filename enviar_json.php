<?php
header('Content-Type: text/html; charset=UTF-8');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$nombre = $request->nombre;
$email = $request->email;
$asunto = $request->asunto;
$mensaje = $request->comentario;

$destinatario = "lyda.barragam@transolicar.com";
//$destinatario = "jota5557@yahoo.es";

$cuerpo = "

<table width='100%' border='0' align='center' cellspacing='0'>
  <tr>
    <td><table width='60%' border='0' align='center' cellpadding='10' cellspacing='0' style='font-family: Helvetica, Arial, sans-serif; font-size: 12px;'>
      <tr>
        <td colspan='2' valign='top' style='text-align: center; background-color:#c1272d; '><img src='http://amarresyamor.us/img/logo.png' alt=''/></td>
        </tr>

      <tr>
        <td colspan='2' valign='top' style='text-align: left'><p style='Margin-top: 0; font-weight: normal; font-size: 14px; Margin-bottom: 12px; line-height: 36px; text-align: left; color: #333333;'><strong>".$asunto."</strong>
        <hr></td>
        </tr>
      <tr>
        <td colspan='2' valign='top' style='text-align: left'><p style='text-align: left; font-size: 12px;'>Se ha generado una solicitud a través del sitio web, a continuaci&#243;n detalles: </p></td>
        </tr>
      <tr>
        <td width='97' valign='top' style='text-align: right; font-size: 12px;'>De:</td>
        <td>".$nombre."</td>
        </tr>
      <tr>
        <td valign='top' style='text-align: right;'>E-mail:</td>
        <td>".$email."</td>
      </tr>
      <tr>
        <td valign='top' style='text-align: right;'>Comentario:</td>
        <td>".$mensaje."</td>
      </tr>
      <tr>
        <td colspan='2' valign='top' style='text-align: center;'>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td style='padding:10px'>
    <table width='60%' border='0' align='center' style='padding: 0; vertical-align: top; text-align: center; color: #ffffff; font-size: 10px; line-height: 20px; font-family: Helvetica, Arial, sans-serif;'>
      <tr>
        <td bgcolor='#ae2528'>E-mail enviado vía formulario de contacto.<br>
          Copyright © 2018. Transolicar. Todos los derechos reservados.</td>
        </tr>
    </table></td>
  </tr>
</table>



";



//Envío en formato HTML

$headers = "MIME-Version: 1.0\r\n";

$headers .= "Content-type: text/html; charset=utf-8\r\n";



//Dirección del remitente

$headers .= "From: ".$nombre." "."<".$email.">"."\r\n";



if(mail($destinatario,$asunto,$cuerpo,$headers)){

$permiso = 1;
}else{

$permiso = 0;

}


print json_encode($permiso);




?>
