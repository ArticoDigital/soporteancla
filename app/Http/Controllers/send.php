<?php

//librerias
  require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();

//Configuracion servidor mail
$mail->From = "analistati@cajasfuertesancla.com"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ='mail@gmail.com'; //nombre usuario
$mail->Password = '@ncla2020'; //contraseña

//Agregar destinatario
$mail->AddAddress($_POST['email']);
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];

//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo'<script type="text/javascript">
           alert("Enviado Correctamente");
        </script>';
} else {
    echo'<script type="text/javascript">
           alert("NO ENVIADO, intentar de nuevo");
        </script>';
}
//configurar preguntas
echo p<"EL TIEMPO DE RESPUESTA A SU SOLICITUD FUE:">;
        </script> img1
        </script> img2
        </script> img3
            
echo p<"COMO TE PARECIO LA ATENCION DE LA PERSONA QUE REALIZO LA VISITA?">;
        </script> img1
        </script> img2
        </script> img3 
            SEND
            
