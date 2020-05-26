<?php
  /**
  * This example shows making an SMTP connection with authentication.
  */
  //Import the PHPMailer class into the global namespace
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;

  //SMTP needs accurate times, and the PHP time zone MUST be set
  //This should be done in your php.ini, but this is how to do it if you don't have access to that
  date_default_timezone_set('Etc/UTC');

  //Create a new PHPMailer instance
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';
  $mail = new PHPMailer();

  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // SMTP::DEBUG_OFF = off (for production use)
  // SMTP::DEBUG_CLIENT = client messages
  // SMTP::DEBUG_SERVER = client and server messages
  $mail->SMTPDebug = SMTP::DEBUG_OFF;
  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 587;
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = 'selkisven@gmail.com';
  //Password to use for SMTP authentication
  $mail->Password = 'enucvjfojazonnhq';
  //Set who the message is to be sent from
  $mail->setFrom('selkisven@gmail.com', 'Media');
  //Set an alternative reply-to address
  // $mail->addReplyTo('y3ssic454@gmail.com', 'Magic');
  //Set who the message is to be sent to
  $mail->addAddress('selkisven@gmail.com', 'Selkis');
  //Set segure
  $mail->SMTPSecure = 'tls';
  //Set the subject line
  $mail->Subject = 'Nueva Solicitud';
  $mail->Body = "<h1>Nueva Solicitud</h1> <br>";
  $mail->Body .= "<ul>"; // Mensaje a enviar
  $mail->Body .= "<li><strong>Nombre:".$_POST['name']." </strong></li>"; // Mensaje a enviar
  $mail->Body .= "<li><strong>Correo: ".$_POST['email']."</strong></li>"; // Mensaje a enviar
  $mail->Body .= "<li><strong>Subjecto: ".$_POST['subject']."</strong></li>"; // Mensaje a enviar
  $mail->Body .= "<li><strong>Mensaje: ".$_REQUEST['message']."</strong></li>"; // Mensaje a enviar
  $mail->Body .= "</ul>"; // Mensaje a enviar
  $mail->IsHTML(true);
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
  //Replace the plain text body with one created manually
  //$mail->AltBody = 'This is a plain-text message body';
  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');

  //send the message, check for errors
  if (!$mail->send()) {
  // echo '{"code":"WS003", "message": "Operación Fallida", "error":'.$mail->ErrorInfo.'}';
  echo 'Se produjo un error. Inténtalo de nuevo más tarde.';
  } else {
  echo 'OK';
}
